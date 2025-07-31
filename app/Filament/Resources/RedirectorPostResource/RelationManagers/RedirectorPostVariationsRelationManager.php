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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('redirectorResource'); // Eager load
    }


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
//                Tables\Columns\TextColumn::make('text')
//                    ->limit(50),
                Tables\Columns\TextColumn::make('redirectorResource.name'),
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
                        Forms\Components\TextInput::make('name')
                            ->label('Type')
                            ->formatStateUsing(fn ($record) => $record->redirectorResource->name)
                            ->default(fn ($record) => dd($record))
                            ->disabled(),
                        Forms\Components\TextInput::make('link')
                            ->label('Link')
                            ->url(fn ($record) => $record->redirectorResource->link) // Add this if it's a database field
                            ->suffixAction(
                                Forms\Components\Actions\Action::make('openLink')
                                    ->label('Open')
                                    ->url(fn ($get) => $get('link')) // Access the TextInput's value
                                    ->icon('heroicon-o-arrow-top-right-on-square')
                                    ->openUrlInNewTab() // Ensures the link opens in a new tab
                            )
                            ->formatStateUsing(fn ($record) => $record->redirectorResource->link)
                            ->disabled(),
                        Forms\Components\Textarea::make('text')
                            ->rows(20)
//                            ->suffixAction(
//                                Forms\Components\Actions\Action::make('copy')
//                                    ->icon('heroicon-s-clipboard-document-check')
//                                    ->action(function ($livewire, $state) {
//                                        $livewire->js(
//                                            'window.navigator.clipboard.writeText("'.$state.'");
//                    $tooltip("'.__('Copied to clipboard').'", { timeout: 1500 });'
//                                        );
//                                    })
//                            )
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
