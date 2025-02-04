<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers\CommentsRelationManager;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder as ComponentsBuilder;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\SpatieTagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-m-pencil';

    protected static ?string $navigationLabel = 'Pojok Ilmiah';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->can('post:all')) {
            return static::getModel()::currentStatus('reviewing')->count();
        }

        return static::getModel()::currentStatus('draft')->where("user_id", Auth::id())->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        if (auth()->user()->can('post:all')) {
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
                        Tabs::make('Tabs')
                            ->columnSpan([
                                'default' => 'full',
                                'md' => 4,
                            ])
                            ->tabs([
                                Tabs\Tab::make('Title')
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
                                                ->unique(Post::class, 'slug', fn ($record) => $record),
                                        ]),
                                        Select::make('category_id')
                                            ->label('Category')
                                            ->disabledOn('edit')
                                            ->required()
                                            ->live()
                                            ->relationship(name: 'categories', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query, Post $post) => $query->where("model", $post->getMorphClass()),)
                                            ->suffixAction(
                                                Action::make('create')
                                                    ->label('Create Category')
                                                    ->icon('heroicon-m-plus')
                                                    ->color('gray')
                                                    ->form([
                                                        Split::make([
                                                            TextInput::make('name')
                                                                ->required()
                                                                ->live(onBlur: true)
                                                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                                            TextInput::make('slug')
                                                                ->readOnly()
                                                                ->required()
                                                                ->unique(Category::class, 'slug', fn ($record) => $record),
                                                        ]),
                                                        Hidden::make('model')
                                                            ->dehydrateStateUsing(fn (Post $query) => $query->getMorphClass())
                                                    ])
                                                    ->action(function (array $data, Category $query) {
                                                        $query->create($data);
                                                    })->visible(auth()->user()->can('category:create'))
                                            ),
                                        Select::make('sub_category')
                                            ->required()
                                            ->disabledOn('edit')
                                            ->visible(fn (Category $query, Get $get) => $query->where('parent_id', $get('category_id'))->exists())
                                            ->relationship(name: 'subCategories', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query, Get $get) => $query->where('parent_id', $get('category_id'))
                                                ->whereNotNull('parent_id'),)
                                            ->suffixAction(
                                                Action::make('create')
                                                    ->label('Create Sub Category')
                                                    ->icon('heroicon-m-plus')
                                                    ->color('gray')
                                                    ->form([
                                                        Split::make([
                                                            TextInput::make('name')
                                                                ->required()
                                                                ->live(onBlur: true)
                                                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                                            TextInput::make('slug')
                                                                ->readOnly()
                                                                ->required()
                                                                ->unique(Category::class, 'slug', fn ($record) => $record),
                                                        ]),
                                                        Select::make('parent_id')
                                                            ->label('Category')
                                                            ->required()
                                                            ->options(fn (Post $query): Collection => Category::query()
                                                                ->where("model", $query->getMorphClass())
                                                                ->pluck('name', 'id')),
                                                    ])
                                                    ->action(function (array $data, Category $query) {
                                                        $query->create($data);
                                                    })->visible(auth()->user()->can('category:create'))
                                            ),
                                    ]),
                                Tabs\Tab::make('Content')
                                    ->schema([
                                        ComponentsBuilder::make('content')
                                            ->hiddenLabel()
                                            ->blocks([
                                                ComponentsBuilder\Block::make('heading')
                                                    ->schema([
                                                        TextInput::make('content')
                                                            ->required(),
                                                        Select::make('level')
                                                            ->live(onBlur: true)
                                                            ->options([
                                                                'h1' => 'Heading 1',
                                                                'h2' => 'Heading 2',
                                                                'h3' => 'Heading 3',
                                                            ])
                                                            ->required(),
                                                    ])
                                                    ->label(function (?array $state): string {
                                                        if ($state === null) {
                                                            return 'Heading';
                                                        }

                                                        return $state['level'] ?? 'Untitled heading';
                                                    })
                                                    ->icon('heroicon-o-bookmark')
                                                    ->columns(2),
                                                ComponentsBuilder\Block::make('paragraph')
                                                    ->schema([
                                                        RichEditor::make('content')
                                                            ->label('Paragraph')
                                                            ->disableToolbarButtons([
                                                                'attachFiles',
                                                                'h2',
                                                                'h3'
                                                            ])
                                                            ->required(),
                                                    ])
                                                    ->icon('heroicon-m-bars-3-bottom-left'),
                                                ComponentsBuilder\Block::make('image')
                                                    ->schema([
                                                        FileUpload::make('url')
                                                            ->label('Image')
                                                            ->image()
                                                            ->maxSize(1024)
                                                            ->optimize('webp')
                                                            ->imageEditor()
                                                            ->required(),
                                                        TextInput::make('alt')
                                                            ->label('Alt text')
                                                            ->required(),
                                                    ])
                                                    ->icon('heroicon-o-photo'),
                                            ])
                                            ->blockNumbers(false)
                                            ->minItems(2)
                                            ->maxItems(6)
                                            ->collapsed(),
                                    ]),
                            ]),

                        Section::make('Meta')
                            ->columnSpan([
                                'default' => 'full',
                                'md' => 2,
                            ])
                            ->schema([
                                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id())->disabledOn('edit'),
                                Split::make([
                                    Toggle::make('is_published')->label('Published')->onColor('success')->accepted(),
                                    Toggle::make('is_featured')->label('Featured'),
                                ]),
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->label('Thumbnail')
                                    ->required()
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->maxSize(5120)
                                    ->optimize('webp')
                                    ->imageEditor(),
                                SpatieTagsInput::make('tags'),
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
            ->modifyQueryUsing(fn (Builder $query) => $query->when(!auth()->user()->can('post:all'), function ($query) {
                $query->where('user_id', Auth::id());
            }))
            ->groups([
                Group::make('statuses.name')
                    ->label('Status')
                    ->collapsible(),
            ])
            ->groupingSettingsHidden()
            ->defaultGroup('statuses.name')
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')->width(80),
                TextColumn::make('title')->limit(30)->searchable(),
                TextColumn::make('subCategories.name')->searchable()->label('Sub Category')->default("-"),
                TextColumn::make('user.name')->label('Author'),
                ToggleColumn::make('is_published')->label('Publish')->onColor('success')->disabled(fn (Post $record): bool => !(auth()->user()->can('publish') || $record->user_id === Auth::id())),
                TextColumn::make('views')
                    ->state(
                        fn (Post $record) => $record->getPageViews()
                    )->toggleable(false),
                TextColumn::make('likes')
                    ->state(
                        fn (Post $record) => $record->likes()->count()
                    )->toggleable(false),
                SpatieTagsColumn::make('tags'),
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
                Tables\Filters\Filter::make('featured')
                    ->label('Featured')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true)),
                Tables\Filters\TrashedFilter::make()
            ])
            ->toggleColumnsTriggerAction(
                fn (Tables\Actions\Action $action) => $action->hiddenLabel(),
            )
            ->actions([
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\Action::make('publish')
                    ->action(fn (Post $record) => $record->updateStatus('reviewing'))
                    ->requiresConfirmation()
                    ->button()
                    ->icon("heroicon-m-cloud-arrow-up")
                    ->size(ActionSize::Small)
                    ->color("primary")
                    ->visible(fn (Post $record): bool => ($record->status === "draft" || $record->status === "rejected") && $record->user->id === Auth::id()),
                Tables\Actions\Action::make('accept')
                    ->action(fn (Post $record) => $record->updateStatus('published'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("success")
                    ->visible(fn (Post $record): bool => auth()->user()->can('publish') && $record->status === "reviewing"),
                Tables\Actions\Action::make('reject')
                    ->action(fn (Post $record) => $record->updateStatus('rejected'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("danger")
                    ->visible(fn (Post $record): bool => auth()->user()->can('publish') && ($record->status === "published" || $record->status === "reviewing")),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CommentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
