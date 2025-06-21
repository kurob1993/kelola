<?php

namespace App\Livewire;

use App\Models\TransaksiIuran;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget as BaseWidget;

class TransaksiIuranTable extends BaseWidget
{
    use InteractsWithPageFilters;

    public function table(Table $table): Table
    {
        $bulan = $this->filters['bulan'] ?? now()->format('m');
        $tahun = $this->filters['tahun'] ?: now()->format('Y');

        return $table
            ->query(
                TransaksiIuran::whereMonth('tanggal_bayar', $bulan)
                    ->whereYear('tanggal_bayar', $tahun)
                    ->orderBy('status_bayar', 'ASC')
            )
            ->columns([
                Tables\Columns\TextColumn::make('warga.nama')
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('status_bayar')
                    ->formatStateUsing(fn(string $state): string => strtoupper($state))
                    ->badge()
                    ->color(fn(TransaksiIuran $record) => match ($record->status_bayar) {
                        'lunas' => 'success',
                        'belum lunas' => 'danger',
                        'tertunda' => 'warning',
                    })
                    ->label('Status Bayar'),
            ]);
    }
}
