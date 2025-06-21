<?php

namespace App\Livewire;

use App\Models\TransaksiIuran;
use App\Models\TransaksiIuranDetail;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $bulan = $this->filters['bulan'] ?? now()->format('m');
        $tahun = $this->filters['tahun'] ?: now()->format('Y');

        // 1. Total warga yang memiliki iuran (baik sudah atau belum bayar)
        $totalWarga = TransaksiIuran::whereMonth('tanggal_bayar', $bulan)
            ->whereYear('tanggal_bayar', $tahun)
            ->count('warga_id');

        // 2. Jumlah warga yang sudah membayar (status lunas)
        $wargaSudahBayar = TransaksiIuran::whereMonth('tanggal_bayar', $bulan)
            ->whereYear('tanggal_bayar', $tahun)
            ->where('status_bayar', 'lunas')
            ->distinct('warga_id')
            ->count('warga_id');

        // 3. Jumlah warga yang belum membayar
        $wargaBelumBayar = $totalWarga - $wargaSudahBayar;

        // 4. Total uang masuk (hanya dari transaksi lunas)
        $totalMasuk = TransaksiIuranDetail::whereHas('transaksiIuran', function ($q) use ($tahun, $bulan) {
            $q->whereMonth('tanggal_bayar', $bulan)
                ->whereYear('tanggal_bayar', $tahun)
                ->where('status_bayar', 'lunas');
        })->sum('jumlah');

        // 5. Total tagihan = jumlah semua detail iuran dari semua warga
        $totalTagihan = TransaksiIuranDetail::whereHas('transaksiIuran', function ($q) use ($tahun, $bulan) {
            $q->whereMonth('tanggal_bayar', $bulan)->whereYear('tanggal_bayar', $tahun);
        })->sum('jumlah');

        // 6. Tunggakan = tagihan - total masuk
        $totalTunggakan = max($totalTagihan - $totalMasuk, 0);


        $chartLunas = TransaksiIuran::selectRaw('DATE(updated_at) AS bulan, COUNT(DISTINCT warga_id) AS jumlah')
            ->whereMonth('tanggal_bayar', $bulan)
            ->whereYear('tanggal_bayar', $tahun)
            ->where('status_bayar', 'lunas')
            ->groupByRaw('DATE(updated_at)')
            ->orderByRaw('DATE(updated_at)')
            ->pluck('jumlah')
            ->toArray();

        return [
            Stat::make('Sudah Bayar', $wargaSudahBayar)
                ->color('success')
                ->chart($chartLunas),
            Stat::make('Belum Bayar', $wargaBelumBayar)
                ->color('danger')
                ->chart($wargaBelumBayar > 0 ? [0, $wargaBelumBayar] : []),
            Stat::make('Total Masuk', Number::currency(
                number: $totalMasuk,
                in: 'Rp.',
                precision: 0,
            ))
                ->color('success')
                ->chart($chartLunas),
            Stat::make('Tunggakan', Number::currency(
                number: $totalTunggakan,
                in: 'Rp.',
                precision: 0,
            ))
                ->color('warning')
                ->chart($wargaBelumBayar > 0 ? [0, $wargaBelumBayar] : []),
        ];
    }
}
