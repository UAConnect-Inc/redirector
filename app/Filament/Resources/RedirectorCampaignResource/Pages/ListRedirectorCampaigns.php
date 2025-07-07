<?php

namespace App\Filament\Resources\RedirectorCampaignResource\Pages;

use App\Filament\Resources\RedirectorCampaignResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRedirectorCampaigns extends ListRecords
{
    protected static string $resource = RedirectorCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
