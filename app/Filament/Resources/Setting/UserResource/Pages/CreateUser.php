<?php

namespace App\Filament\Resources\Setting\UserResource\Pages;

use App\Filament\Resources\Setting\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
