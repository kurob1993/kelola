<?php

namespace App\Filament\Resources\TransaksiPengeluaranResource\RelationManagers;

use App\Models\KategoriTransaksi;
use App\Models\TransaksiPengeluaranDetail;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Console\Events\ScheduledTaskFailed;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiPengeluaranDetailRelationManager extends RelationManager
{
    protected static string $relationship = 'transaksiPengeluaranDetails';
    protected static ?string $title = 'Rincian Pengeluaran';

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('kategori_transaksi_id')
                ->relationship('kategoriTransaksi', 'nama')
                ->searchable()
                ->preload()
                ->required()
                ->columnSpan(2)
                ->createOptionForm([
                    TextInput::make('nama')
                        ->required()
                        ->maxLength(100),
                ])->createOptionModalHeading('Tambah Kategori Transaksi'),
            TextInput::make('qty')
                ->numeric()
                ->required(),
            TextInput::make('jumlah')
                ->mask(RawJs::make('$money($input)'))
                ->dehydrateStateUsing(fn($state) => (int)str_replace(['.', ',', 'Rp', ' '], '', $state))
                ->formatStateUsing(function ($state) {
                    \Log::debug((int)$state);
                    // Hilangkan .00 saat edit
                    return (int)$state;
                })
                ->required(),

            Textarea::make('deskripsi')
                ->columnSpan(2)
                ->rows(2)
                ->maxLength(255),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('kategoriTransaksi.nama'),
                Tables\Columns\TextColumn::make('deskripsi')->limit(40),
                Tables\Columns\TextColumn::make('qty')->numeric(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2)),
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
