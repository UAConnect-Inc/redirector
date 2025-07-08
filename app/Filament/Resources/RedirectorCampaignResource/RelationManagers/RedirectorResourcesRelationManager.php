<?php

namespace App\Filament\Resources\RedirectorCampaignResource\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class RedirectorResourcesRelationManager extends RelationManager
{
    protected static string $relationship = 'redirectorResources';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->options([
                        'facebook' => 'Facebook',
                        'telegram' => 'Telegram',
                    ])
                    ->required(),

                TextInput::make('link')
                    ->required()
                    ->maxLength(255)
                    ->url(),

                TextInput::make('utm_source'),

                TextInput::make('utm_medium'),

                TextInput::make('utm_campaign'),

                TextInput::make('utm_term'),

                TextInput::make('utm_content'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('resources')
            ->columns([
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('link'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
