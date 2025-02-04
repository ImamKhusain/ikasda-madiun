<?php

namespace App\Filament\Resources\MerchandiseResource\Pages;

use App\Filament\Resources\MerchandiseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMerchandise extends EditRecord
{
    protected static string $resource = MerchandiseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        $this->record->status === "published" ?  $this->record->updateStatus('reviewing') : null;
    }
}
