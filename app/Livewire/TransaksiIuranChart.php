<?php

namespace App\Livewire;

use App\Models\TransaksiIuranDetail;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class TransaksiIuranChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $bulan = $this->filters['bulan'] ?? now()->format('m');
        $tahun = $this->filters['tahun'] ?: now()->format('Y');

        // 4. Total uang masuk (hanya dari transaksi lunas)
        $totalMasuk = TransaksiIuranDetail::whereHas('transaksiIuran', function ($q) use ($tahun, $bulan) {
            $q->whereMonth('tanggal_bayar', $bulan)
                ->whereYear('tanggal_bayar', $tahun)
                ->where('status_bayar', 'lunas');
        })->sum('jumlah');

        // 5. Total tagihan = jumlah semua detail iuran dari semua warga
        $totalTagihan = TransaksiIuranDetail::whereHas('transaksiIuran', function ($q) use ($tahun, $bulan) {
            $q->whereMonth('tanggal_bayar', $bulan)
                ->whereYear('tanggal_bayar', $tahun);
        })->sum('jumlah');

        // 7. Persentase uang masuk
        $persenMasuk = $totalTagihan > 0
            ? round(($totalMasuk / $totalTagihan) * 100, 2)
            : 0;

        // 8. Persentase tunggakan
        $persenTunggakan = $totalTagihan > 0 ? 100 - $persenMasuk : 0;

        return [
            'datasets' => [
                [
                    'label' => 'Perbandingan Pendapatan',
                    'data' => [$persenMasuk, $persenTunggakan],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                ],
            ],
            'labels' => ['Sudah Bayar', 'Belum Bayar'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'display' => false,
                    'grid' => [
                        'display' => false,
                    ],
                    'ticks' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'display' => false,
                    'grid' => [
                        'display' => false,
                    ],
                    'ticks' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }
}
