<?php

namespace App\Livewire;

use App\Models\TransaksiPengeluaranDetail;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class PengeluaranStats extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $bulan = $this->filters['bulan'] ?: now()->format('m');
        $tahun = $this->filters['tahun'] ?: now()->format('Y');

        // $bulanNama = Carbon::createFromDate(null, $bulan, 1)->translatedFormat('F');

        $pengeluaran = TransaksiPengeluaranDetail::whereHas('transaksi', function ($query) use ($bulan, $tahun) {
            return $query->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun);
        })->get();

        $total = $pengeluaran->sum(fn($item) => $item->jumlah * $item->qty);
        $rataRata = $total/$pengeluaran->count();

        // Mencari transaksi dengan nilai terbesar
        $terbanyak = $pengeluaran->sortByDesc(fn($item) => $item->jumlah * $item->qty)->first();
        // Atau jika hanya ingin nominalnya saja
        $nominalTerbanyak = $pengeluaran->max(fn($item) => $item->jumlah * $item->qty);
        $tanggalTerbanyak = $terbanyak?->transaksi ? Carbon::make($terbanyak?->transaksi->tanggal)->format('d F Y') : null;

        $jumlah = $pengeluaran->count();



        return [
            Stat::make('Total Pengeluaran', Number::currency(
                number: $total,
                in: 'Rp.',
                precision: 0,
            ))
                ->color('danger')
                ->icon('heroicon-o-banknotes'),

            Stat::make('Rata-rata Harian', Number::currency(
                number: $rataRata,
                in: 'Rp.',
                precision: 0,
            ))
                ->color('danger')
                ->icon('heroicon-o-chart-bar'),

            Stat::make('Terbanyak ('.$tanggalTerbanyak.')', Number::currency(
                number: $nominalTerbanyak,
                in: 'Rp.',
                precision: 0,
            ))
                ->color('danger')
                ->icon('heroicon-o-fire'),

            Stat::make('Jumlah Transaksi', $jumlah . ' transaksi')
                ->color('danger')
                ->icon('heroicon-o-clipboard-document-list'),
        ];
    }
}
