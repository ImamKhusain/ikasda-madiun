<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Models\Agenda;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?int $navigationSort = 9;

    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->can('agenda:all')) {
            return static::getModel()::currentStatus('reviewing')->count();
        }

        return static::getModel()::currentStatus('draft')->where("user_id", Auth::id())->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        if (auth()->user()->can('agenda:all')) {
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
                                        ->unique(Agenda::class, 'slug', fn ($record) => $record),
                                ]),
                                Select::make('bg_color')
                                    ->label('Theme')
                                    ->options([
                                        'blue' => 'Blue',
                                        'red' => 'Red',
                                        'yellow' => 'Yellow',
                                        'green' => 'Green',
                                        'purple' => 'Purple',
                                    ])
                                    ->required(),
                                DateTimePicker::make('datetime')
                                    ->native(false)
                                    ->closeOnDateSelection()
                                    ->disabledDates(fn (Agenda $query): array => $query->pluck('datetime')->toArray())
                                    ->seconds(false)
                                    ->required(),
                                RichEditor::make('content')
                                    ->disableToolbarButtons([
                                        'attachFiles'
                                    ])->required()
                            ]),

                        Section::make('Meta')
                            ->columnSpan([
                                'default' => 'full',
                                'md' => 2,
                            ])
                            ->schema([
                                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id())->disabledOn('edit'),
                                Toggle::make('is_published')->label('Published')->onColor('success')->accepted(),
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
                TextColumn::make('title')->limit(50)->searchable(),
                TextColumn::make('user.name')->label('Author'),
                ColorColumn::make('bg_color')->label('Theme'),
                TextColumn::make('datetime'),
                ToggleColumn::make('is_published')->label('Publish')->onColor('success')->disabled(fn (Agenda $record): bool => !(auth()->user()->can('publish') || $record->user_id === Auth::id())),
                TextColumn::make('status')
                    ->state(
                        fn (Agenda $record) => $record->status
                    )
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'reviewing' => 'warning',
                        'published' => 'success',
                        'rejected' => 'danger',
                    }),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->actions([
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\Action::make('publish')
                    ->action(fn (Agenda $record) => $record->updateStatus('reviewing'))
                    ->requiresConfirmation()
                    ->button()
                    ->icon("heroicon-m-cloud-arrow-up")
                    ->size(ActionSize::Small)
                    ->color("primary")
                    ->visible(fn (Agenda $record): bool => ($record->status === "draft" || $record->status === "rejected") && $record->user->id === Auth::id()),
                Tables\Actions\Action::make('accept')
                    ->action(fn (Agenda $record) => $record->updateStatus('published'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("success")
                    ->visible(fn (Agenda $record): bool => auth()->user()->can('publish') && $record->status === "reviewing"),
                Tables\Actions\Action::make('reject')
                    ->action(fn (Agenda $record) => $record->updateStatus('rejected'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("danger")
                    ->visible(fn (Agenda $record): bool => auth()->user()->can('publish') && ($record->status === "published" || $record->status === "reviewing")),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(auth()->user()->can('Agenda:delete'))
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
            'index' => Pages\ListAgenda::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
