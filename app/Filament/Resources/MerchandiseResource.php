<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MerchandiseResource\Pages;
use App\Models\Merchandise;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\Alignment;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MerchandiseResource extends Resource
{
    protected static ?string $model = Merchandise::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?int $navigationSort = 7;

    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->can('merchandise:all')) {
            return static::getModel()::currentStatus('reviewing')->count();
        }

        return static::getModel()::currentStatus('draft')->where("user_id", Auth::id())->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        if (auth()->user()->can('merchandise:all')) {
            return static::getModel()::currentStatus('reviewing')->count() > 0 ? 'warning' : 'primary';
        }

        return static::getModel()::currentStatus('draft')->where("user_id", Auth::id())->count() > 0 ? 'warning' : 'primary';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 'full',
                    'md' => 6,
                ])
                    ->schema([
                        Section::make('Content')
                            ->columnSpan([
                                'default' => 'full',
                                'md' => 4,
                            ])
                            ->schema([
                                Split::make([
                                    TextInput::make('title')
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->required()
                                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                    TextInput::make('slug')
                                        ->readOnly()
                                        ->required()
                                        ->unique(Merchandise::class, 'slug', fn ($record) => $record),
                                ]),
                                TextInput::make('price')
                                    ->required()
                                    ->mask(RawJs::make('$money($input)'))
                                    ->stripCharacters(',')
                                    ->numeric(),
                                TextInput::make('link')
                                    ->required()
                                    ->url()
                                    ->suffixIcon('heroicon-m-globe-alt'),
                                RichEditor::make('description')
                                    ->disableToolbarButtons([
                                        'attachFiles'
                                    ])->required(),
                            ]),

                        Section::make('Meta')
                            ->columnSpan([
                                'default' => 'full',
                                'md' => 2,
                            ])
                            ->schema([
                                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id())->disabledOn('edit'),
                                Toggle::make('is_published')->label('Published')->onColor('success'),
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->label('Thumbnail')
                                    ->required()
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('1:1')
                                    ->maxSize(2048)
                                    ->multiple()
                                    ->minFiles(1)
                                    ->maxFiles(5)
                                    ->optimize('webp')
                                    ->imageEditor(),
                                DateTimePicker::make('published_at')
                                    ->seconds(false)
                                    ->disabled(),
                                TextInput::make('meta_description'),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('statuses.name')
                    ->label('Status')
                    ->collapsible(),
            ])
            ->groupingSettingsHidden()
            ->defaultGroup('statuses.name')
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')->square(),
                TextColumn::make('title')->limit(50)->searchable(),
                TextColumn::make('user.name')->label('Author'),
                ToggleColumn::make('is_published')->label('Publish')->onColor('success')->disabled(fn (Merchandise $record): bool => !(auth()->user()->can('publish') || $record->user_id === Auth::id())),
                TextColumn::make('link')->limit(10),
                TextColumn::make('statuses.name')
                    ->label('Status')
                    ->badge()
                    ->icon(fn (string $state): string => match ($state) {
                        'draft' => 'heroicon-m-pencil',
                        'reviewing' => 'heroicon-m-clock',
                        'published' => 'heroicon-m-check-circle',
                        'rejected' => 'heroicon-m-exclamation-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'reviewing' => 'warning',
                        'published' => 'success',
                        'rejected' => 'danger',
                    })->alignment(Alignment::Center),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->actions([
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\Action::make('publish')
                    ->action(fn (Merchandise $record) => $record->updateStatus('reviewing'))
                    ->requiresConfirmation()
                    ->button()
                    ->icon("heroicon-m-cloud-arrow-up")
                    ->size(ActionSize::Small)
                    ->color("primary")
                    ->visible(fn (Merchandise $record): bool => ($record->status === "draft" || $record->status === "rejected") && $record->user->id === Auth::id()),
                Tables\Actions\Action::make('accept')
                    ->action(fn (Merchandise $record) => $record->updateStatus('published'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("success")
                    ->visible(fn (Merchandise $record): bool => auth()->user()->can('publish') && $record->status === "reviewing"),
                Tables\Actions\Action::make('reject')
                    ->action(fn (Merchandise $record) => $record->updateStatus('rejected'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("danger")
                    ->visible(fn (Merchandise $record): bool => auth()->user()->can('publish') && ($record->status === "published" || $record->status === "reviewing")),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMerchandises::route('/'),
            'create' => Pages\CreateMerchandise::route('/create'),
            'edit' => Pages\EditMerchandise::route('/{record}/edit'),
        ];
    }
}
