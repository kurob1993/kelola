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
        $rataRata = $total/($pengeluaran->count() < 1 ?: 1);

        // Mencari transaksi dengan nilai terbesar
        $terbanyak = $pengeluaran->sortByDesc(fn($item) => $item->jumlah * $item->qty)->first();
        // Atau jika hanya ingin nominalnya saja
        $nominalTerbanyak = $pengeluaran->max(fn($item) => $item->jumlah * $item->qty) ?? 0;
        $tanggalTerbanyak = $terbanyak?->transaksi ? Carbon::make($terbanyak?->transaksi->tanggal)
            ->translatedFormat('d F Y') : null;

        $jumlah = $pengeluaran->count();

        return [
            Stat::make('Total Pengeluaran (Rp)', Number::format(
                number: $total,
                precision: 0,
            ))
                ->icon('heroicon-o-banknotes'),

            Stat::make('Rata-rata Harian (Rp)', Number::format(
                number: $rataRata,
                precision: 0,
            ))
                ->icon('heroicon-o-chart-bar'),

            Stat::make('Terbanyak (Rp) - '. $tanggalTerbanyak, Number::format(
                number: $nominalTerbanyak,
                precision: 0,
            ))
                ->icon('heroicon-o-fire'),

            Stat::make('Jumlah Transaksi', $jumlah . ' transaksi')
                ->icon('heroicon-o-clipboard-document-list'),
        ];
    }
}
