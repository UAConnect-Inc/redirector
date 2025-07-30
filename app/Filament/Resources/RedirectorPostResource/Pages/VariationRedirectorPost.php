<?php

namespace App\Filament\Resources\RedirectorPostResource\Pages;

use App\Filament\Resources\RedirectorPostResource;
use App\Models\RedirectorPost;
use App\Services\Redirector\VariationService;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Filament\Notifications\Notification;

class VariationRedirectorPost extends ViewRecord
{
    protected static string $resource = RedirectorPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('edit')
                ->url(RedirectorPostResource::getUrl('edit', ['record' => $this->record])),
            Action::make('runService')
                ->label('Re-Generate Variations')
                ->action(fn () => $this->runService())
                ->color('success'),
        ];
    }

    public function runService()
    {
        // Your custom logic here
        $service = app(VariationService::class);
        /** @var RedirectorPost $this->post */
        $result = $service->handle($this->record);
        Notification::make()
            ->title('Variations generated')
            ->body('Your settings were saved successfully.')
            ->success()
            ->send();
    }
}
