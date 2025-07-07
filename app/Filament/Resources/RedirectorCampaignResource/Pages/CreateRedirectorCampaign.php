<?php

namespace App\Filament\Resources\RedirectorCampaignResource\Pages;

use App\Filament\Resources\RedirectorCampaignResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRedirectorCampaign extends CreateRecord
{
    protected static string $resource = RedirectorCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
