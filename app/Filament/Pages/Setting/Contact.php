<?php

namespace App\Filament\Pages\Setting;

use App\Models\Organizational;
use AymanAlhattami\FilamentPageWithSidebar\FilamentPageSidebar;
use AymanAlhattami\FilamentPageWithSidebar\PageNavigationItem;
use AymanAlhattami\FilamentPageWithSidebar\Traits\HasPageSidebar;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
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

class Contact extends Page
{
    use HasPageSidebar;

    use InteractsWithFormActions;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.setting.contact';

    protected static ?string $navigationGroup = 'Settings';

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
            ->setTitle('General Settings')
            ->setNavigationItems([
                PageNavigationItem::make('General')
                    ->translateLabel()
                    ->url(General::getUrl())
                    ->isActiveWhen(function () {
                        return request()->routeIs(General::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Contact')
                    ->translateLabel()
                    ->url(Contact::getUrl())
                    ->isActiveWhen(function () {
                        return request()->routeIs(Contact::getRouteName());
                    })
                    ->visible(true),
            ]);
    }

    public function mount(): void
    {
        $this->record = Organizational::firstOrNew([
            'title' => 'Contact',
            'slug' => 'contact',
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
                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                Hidden::make('title'),
                Hidden::make('slug'),
                Builder::make('content')
                    ->hiddenLabel()
                    ->required()
                    ->blocks([
                        Builder\Block::make('sosmed')
                            ->schema([
                                TextInput::make('url')
                                    ->required()
                                    ->url()
                                    ->suffixIcon('heroicon-m-globe-alt'),
                                Select::make('sosmed')
                                    ->options([
                                        'instagram' => 'Instagram',
                                        'twitter' => 'Twitter',
                                        'youtube' => 'Youtube',
                                        'tiktok' => 'Tiktok',
                                    ])
                                    ->required(),
                            ])
                            ->label(function (?array $state): string {
                                if ($state === null) {
                                    return 'Sosmed';
                                }

                                return $state['sosmed'] ?? 'Untitled';
                            })
                            ->icon('heroicon-o-globe-alt')
                            ->columns(2),
                        Builder\Block::make('contact')
                            ->schema([
                                TextInput::make('number')
                                    ->required()
                                    ->tel()
                                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                    ->suffixIcon('heroicon-m-phone'),
                                Select::make('name')
                                    ->options([
                                        'Telepon ISR' => 'Telepon ISR',
                                        'WhatsApp ISR' => 'WhatsApp ISR',
                                        'Telepon Media Partner' => 'Telepon Media Partner',
                                        'WhatsApp Media Partner' => 'WhatsApp Media Partner',
                                        'Telepon Keuangan' => 'Telepon Keuangan',
                                        'WhatsApp Keuangan' => 'WhatsApp Keuangan',
                                    ])
                                    ->required(),
                            ])
                            ->label(function (?array $state): string {
                                if ($state === null) {
                                    return 'Contact';
                                }

                                return $state['name'] ?? 'Untitled';
                            })
                            ->icon('heroicon-o-phone')
                            ->columns(2),
                    ])
                    ->addActionLabel('Add a new contact')
                    ->columnSpanFull()
                    ->blockNumbers(false)
                    ->deletable(false)
                    ->addable(false)
                    ->reorderable(false)
                    ->collapsed(),
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
