<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiIuranResource\Pages;
use App\Filament\Resources\TransaksiIuranResource\RelationManagers;
use App\Models\Iuran;
use App\Models\TransaksiIuran;
use App\Models\Warga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiIuranResource extends Resource
{
    protected static ?string $model = TransaksiIuran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Iuran Warga';

    protected static ?string $navigationGroup = 'Transaksi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('warga_id')
                ->label('Warga')
                ->options(Warga::all()->pluck('nama', 'id'))
                ->required(),
            Forms\Components\Select::make('iuran_id')
                ->label('Iuran')
                ->options(Iuran::all()->pluck('nama_iuran', 'id'))
                ->required(),
            Forms\Components\DatePicker::make('tanggal_bayar')->label('Tanggal Bayar'),
            Forms\Components\Select::make('status_bayar')
                ->options(['lunas' => 'Lunas', 'belum lunas' => 'Belum Lunas', 'tertunda' => 'Tertunda'])
                ->required()
                ->label('Status Bayar'),
            Forms\Components\TextInput::make('bukti_bayar')->label('Bukti Bayar'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('warga.nama')->label('Warga')->sortable(),
                Tables\Columns\TextColumn::make('iuran.nama_iuran')->label('Iuran'),
                Tables\Columns\TextColumn::make('tanggal_bayar')->label('Tanggal Bayar'),
                Tables\Columns\TextColumn::make('status_bayar')->label('Status Bayar'),
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
            'index' => Pages\ListTransaksiIurans::route('/'),
            'create' => Pages\CreateTransaksiIuran::route('/create'),
            'edit' => Pages\EditTransaksiIuran::route('/{record}/edit'),
        ];
    }
}
