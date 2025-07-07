<?php

namespace App\Filament\Resources\RedirectorCampaignResource\Pages;

use App\Filament\Resources\RedirectorCampaignResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditRedirectorCampaign extends EditRecord
{
    protected static string $resource = RedirectorCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
