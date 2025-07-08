<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RedirectorPostResource\Pages;
use App\Models\RedirectorPost;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RedirectorPostResource extends Resource
{
    protected static ?string $model = RedirectorPost::class;

    protected static ?string $slug = 'redirector-posts';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                MarkdownEditor::make('text')
                    ->required(),

                Select::make('redirector_campaign_id')
                    ->relationship('redirectorCampaign', 'name')
                    ->searchable()
                    ->required(),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?RedirectorPost $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?RedirectorPost $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('redirectorCampaign.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('text')
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRedirectorPosts::route('/'),
            'create' => Pages\CreateRedirectorPost::route('/create'),
            'edit' => Pages\EditRedirectorPost::route('/{record}/edit'),
            'variations' => Pages\VariationRedirectorPost::route('/{record}/variations'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['redirectorCampaign']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['redirectorCampaign.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->redirectorCampaign) {
            $details['RedirectorCampaign'] = $record->redirectorCampaign->name;
        }

        return $details;
    }

    public static function getRelations(): array
    {
        return [
            RedirectorPostResource\RelationManagers\RedirectorPostVariationsRelationManager::class,
        ];
    }
}
