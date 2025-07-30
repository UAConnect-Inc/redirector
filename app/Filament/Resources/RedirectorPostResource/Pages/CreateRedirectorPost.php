<?php

namespace App\Filament\Resources\RedirectorPostResource\Pages;

use App\Filament\Resources\RedirectorPostResource;
use App\Models\RedirectorPost;
use App\Services\Redirector\VariationService;
use Filament\Resources\Pages\CreateRecord;

class CreateRedirectorPost extends CreateRecord
{
    protected static string $resource = RedirectorPostResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }

    public function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $model = parent::handleRecordCreation($data);

        // generate variations
        $variationsService = app(VariationService::class);
        /** @var RedirectorPost $this->post */
        $result = $variationsService->handle($model);

        return $model;
    }
}
