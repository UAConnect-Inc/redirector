<?php

namespace App\Filament\Resources\RedirectorPostResource\Pages;

use App\Filament\Resources\RedirectorPostResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRedirectorPosts extends ListRecords
{
    protected static string $resource = RedirectorPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
