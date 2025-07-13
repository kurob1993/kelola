<?php

namespace App\Livewire;

use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class PengeluaranStats extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Pengeluaran', Number::currency(
                number: 200000,
                in: 'Rp.',
                precision: 0,
            ))
                ->color('danger')
                ->icon('heroicon-o-chart-pie'),

            Stat::make('Rata-rata Harian', Number::currency(
                number: 50000000,
                in: 'Rp.',
                precision: 0,
            ))
                ->color('danger')
                ->icon('heroicon-o-chart-pie'),

            Stat::make('Pengeluaran Terbanyak', Number::currency(
                number: 50000000,
                in: 'Rp.',
                precision: 0,
            ))
                ->color('danger')
                ->icon('heroicon-o-chart-pie'),

            Stat::make('Jumlah Transaksi', Number::currency(
                number: 50000000,
                in: 'Rp.',
                precision: 0,
            ))
                ->color('danger')
                ->icon('heroicon-o-chart-pie'),
        ];
    }
}
