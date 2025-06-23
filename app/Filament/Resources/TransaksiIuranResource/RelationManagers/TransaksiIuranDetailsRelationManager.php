<?php

namespace App\Filament\Resources\TransaksiIuranResource\RelationManagers;

use App\Models\Iuran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiIuranDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'transaksiIuranDetails';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('iuran_id')
                    ->columnSpan(2)
                    ->label('Iuran')
                    ->options(function () {
                        $transaksiIuran = $this->ownerRecord;

                        $gangId = $transaksiIuran->warga?->gang_id;

                        return Iuran::where(function ($query) use ($gangId) {
                            $query->where('gang_id', $gangId)
                                ->orWhereNull('gang_id');
                        })
                            ->get()
                            ->mapWithKeys(function ($iuran) {
                                return [
                                    $iuran->id => $iuran->nama_iuran . ' - Rp ' . number_format($iuran->nominal, 0, ',', '.')
                                ];
                            });
                    })
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        $iuran = Iuran::find($state);
                        $set('jumlah', $iuran?->nominal ?? 0);
                    })
                    ->required(),

                Forms\Components\Hidden::make('jumlah')
                    ->default(0)
                    ->dehydrated()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('iuran.nama_iuran')->label('Iuran'),
                Tables\Columns\TextColumn::make('jumlah')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2))
                    ->label('Jumlah Bayar'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modalHeading('Edit Transaksi Iuran'),
                Tables\Actions\DeleteAction::make()->modalHeading('Hapus Transaksi Iuran'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
