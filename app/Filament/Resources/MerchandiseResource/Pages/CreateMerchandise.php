<?php

namespace App\Filament\Resources\MerchandiseResource\Pages;

use App\Filament\Resources\MerchandiseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMerchandise extends CreateRecord
{
    protected static string $resource = MerchandiseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $this->record->createStatus('draft');
        // $this->record->addPageView();
    }
}
