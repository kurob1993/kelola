<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GangResource\Pages;
use App\Filament\Resources\GangResource\RelationManagers;
use App\Models\Gang;
use App\Models\Perumahan;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GangResource extends Resource
{
    protected static ?string $model = Gang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralLabel = 'Gang';

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make([
                    'sm' => 1,
                    'md' => 2,
                ])->schema([
                    Forms\Components\Select::make('perumahan_id')
                        ->label('Perumahan')
                        ->options(Perumahan::all()->pluck('nama_perumahan', 'id'))
                        ->required(),
                    Forms\Components\TextInput::make('nama')->required()->label('Nama Gang'),
                ])
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('perumahan.nama_perumahan')->label('Perumahan')->sortable(),
                Tables\Columns\TextColumn::make('nama')->label('Nama Gang')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGangs::route('/'),
            'create' => Pages\CreateGang::route('/create'),
            'edit' => Pages\EditGang::route('/{record}/edit'),
        ];
    }
}
