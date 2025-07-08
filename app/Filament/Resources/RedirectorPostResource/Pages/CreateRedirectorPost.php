<?php

namespace App\Filament\Resources\RedirectorPostResource\Pages;

use App\Filament\Resources\RedirectorPostResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRedirectorPost extends CreateRecord
{
    protected static string $resource = RedirectorPostResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
