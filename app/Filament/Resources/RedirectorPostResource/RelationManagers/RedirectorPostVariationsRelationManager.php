<?php

namespace App\Filament\Resources\RedirectorPostResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RedirectorPostVariationsRelationManager extends RelationManager
{
    protected static string $relationship = 'postVariations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('postVariations')
            ->columns([
                Tables\Columns\TextColumn::make('text')
                    ->limit(50),
                Tables\Columns\TextColumn::make('redirectorResource.type'),
                Tables\Columns\TextColumn::make('redirectorResource.link'),
            ])
            ->filters([
                //
            ])
            ->headerActions([])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalHeading('Variation Details')
                    ->form([
                        Forms\Components\TextInput::make('redirectorResource.type')
                            ->label('Type')
                            ->disabled(),
                        Forms\Components\TextInput::make('redirectorResource.link')
                            ->label('Link')
                            ->disabled(),
                        Forms\Components\Textarea::make('text')
                            ->rows(20)
                            ->disabled(),
                    ]),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
