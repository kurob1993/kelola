<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerumahanResource\Pages;
use App\Filament\Resources\PerumahanResource\RelationManagers;
use App\Models\Perumahan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerumahanResource extends Resource
{
    protected static ?string $model = Perumahan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Perumahan';

    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_perumahan')->required()->label('Nama Perumahan'),
            Forms\Components\Textarea::make('alamat')->required()->label('Alamat'),
            Forms\Components\TextInput::make('kota')->required()->label('Kota'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_perumahan')->label('Nama Perumahan')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->label('Alamat')->limit(50),
                Tables\Columns\TextColumn::make('kota')->label('Kota'),
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
            'index' => Pages\ListPerumahans::route('/'),
            'create' => Pages\CreatePerumahan::route('/create'),
            'edit' => Pages\EditPerumahan::route('/{record}/edit'),
        ];
    }
}
