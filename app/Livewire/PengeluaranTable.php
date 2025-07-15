<?php

namespace App\Livewire;

use App\Models\TransaksiPengeluaranDetail;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget as BaseWidget;

class PengeluaranTable extends BaseWidget
{
    use InteractsWithPageFilters;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $bulan = $this->filters['bulan'] ?: now()->format('m');
        $tahun = $this->filters['tahun'] ?: now()->format('Y');

        return $table->query(
            TransaksiPengeluaranDetail::whereHas('transaksi', function ($query) use ($bulan, $tahun) {
                return $query->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun);
            })
        )->columns([
            Tables\Columns\TextColumn::make('kategoriTransaksi.nama'),
            Tables\Columns\TextColumn::make('deskripsi')->limit(40),
            Tables\Columns\TextColumn::make('jumlah')
                ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 2)),
        ]);
    }
}
