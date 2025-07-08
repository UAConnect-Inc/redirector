<?php

namespace App\Filament\Resources\RedirectorPostResource\Pages;

use App\Filament\Resources\RedirectorPostResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRedirectorPost extends EditRecord
{
    protected static string $resource = RedirectorPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            Action::make('Variations')
                ->url(RedirectorPostResource::getUrl('variations', ['record' => $this->record])),
        ];
    }
}
