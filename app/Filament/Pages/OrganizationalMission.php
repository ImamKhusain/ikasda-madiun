<?php

namespace App\Filament\Pages;

use App\Models\Organizational;
use AymanAlhattami\FilamentPageWithSidebar\FilamentPageSidebar;
use AymanAlhattami\FilamentPageWithSidebar\PageNavigationItem;
use AymanAlhattami\FilamentPageWithSidebar\Traits\HasPageSidebar;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;

use function Filament\authorize;

class OrganizationalMission extends Page
{
    use HasPageSidebar;

    use InteractsWithFormActions;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.organizational-mission';

    protected static ?string $title = 'Mission';

    public ?array $data = [];

    #[Locked]
    public ?Organizational $record = null;

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function sidebar(): FilamentPageSidebar
    {
        return FilamentPageSidebar::make()
            ->setTitle('Organizational')
            ->setDescription('profile ukm, visi dan misi, struktur organisasi, profil kabinet, sambutan ketua, sambutan pembimbing')
            ->setNavigationItems([
                PageNavigationItem::make('Profile UKM')
                    ->translateLabel()
                    ->url(OrganizationalProfile::getUrl())
                    ->isActiveWhen(function () {
                        return request()->routeIs(OrganizationalProfile::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Visi dan Misi')
                    ->translateLabel()
                    ->url(OrganizationalMission::getUrl())
                    ->isActiveWhen(function () {
                        return request()->routeIs(OrganizationalMission::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Struktur Organisasi')
                    ->translateLabel()
                    ->url(OrganizationalStructure::getUrl())
                    ->isActiveWhen(function () {
                        return request()->routeIs(OrganizationalStructure::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Profil Kabinet')
                    ->translateLabel()
                    ->url(CabinetProfile::getUrl())
                    ->isActiveWhen(function () {
                        return request()->routeIs(CabinetProfile::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Sambutan Ketua')
                    ->translateLabel()
                    ->url(SambutanKetua::getUrl())
                    ->isActiveWhen(function () {
                        return request()->routeIs(SambutanKetua::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Sambutan Pembimbing')
                    ->translateLabel()
                    ->url(SambutanPembimbing::getUrl())
                    ->isActiveWhen(function () {
                        return request()->routeIs(SambutanPembimbing::getRouteName());
                    })
                    ->visible(true),
            ]);
    }

    public function mount(): void
    {
        $this->record = Organizational::firstOrNew([
            'slug' => 'mission',
        ]);

        abort_unless(static::canView($this->record), 404);

        $this->fillForm();
    }

    public function fillForm(): void
    {
        $data = $this->record->attributesToArray();

        $this->form->fill($data);
    }


    public function save(): void
    {
        try {
            $data = $this->form->getState();

            $this->handleRecordUpdate($this->record, $data);
        } catch (Halt $exception) {
            return;
        }

        $this->getSavedNotification()->send();
    }

    protected function getSavedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Content')
                            ->schema([
                                Split::make([
                                    TextInput::make('title')
                                        ->required(),
                                    TextInput::make('slug')
                                        ->readOnly(),
                                ])->columnSpanFull(),
                                Fieldset::make('Content')
                                    ->schema([
                                        Builder::make('content')
                                            ->hiddenLabel()
                                            ->required()
                                            ->blocks([
                                                Builder\Block::make('heading')
                                                    ->schema([
                                                        TextInput::make('content')
                                                            ->required(),
                                                        Select::make('level')
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
                                                Builder\Block::make('paragraph')
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
                                                Builder\Block::make('image')
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
                                            ->columnSpanFull()
                                            ->blockNumbers(false)
                                            ->collapsed(),
                                    ]),
                            ])->columns(),
                        Tabs\Tab::make('Meta')
                            ->schema([
                                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                                TextInput::make('meta_description'),
                            ])
                    ])
            ])
            ->model($this->record)
            ->statePath('data')
            ->operation('edit');
    }

    protected function handleRecordUpdate(Organizational $record, array $data): Organizational
    {
        $record->fill($data);

        $record->save();

        return $record;
    }

    /**
     * @return array<Action | ActionGroup>
     */
    public function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
            ->submit('save')
            ->keyBindings(['mod+s']);
    }

    public static function canView(Model $record): bool
    {
        try {
            return authorize('update', $record)->allowed();
        } catch (AuthorizationException $exception) {
            return $exception->toResponse()->allowed();
        }
    }
}
