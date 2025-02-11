<?php

namespace App\Filament\Resources\AlumniResource\Pages;

use App\Filament\Imports\AlumniImporter;
use App\Filament\Resources\AlumniResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlumnis extends ListRecords
{
    protected static string $resource = AlumniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ImportAction::make()
                ->importer(AlumniImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
