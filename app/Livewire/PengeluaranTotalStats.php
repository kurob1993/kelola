<?php

namespace App\Livewire;

use App\Filament\Resources\TransaksiIuranResource;
use App\Models\TransaksiIuranDetail;
use App\Models\TransaksiPengeluaranDetail;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class PengeluaranTotalStats extends BaseWidget
{
    use InteractsWithPageFilters;

    public function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        $pengeluaran = TransaksiPengeluaranDetail::all()
            ->sum(fn($item) => $item->jumlah * $item->qty);
        $pengeluaranUpdateDate = TransaksiPengeluaranDetail::orderBy('created_at', 'desc')->first();

        if($pengeluaran > 20_000_000) {
            $pengeluarnStatus = 'tinggi';
            $pengeluarnColor = 'danger';
            $pengeluarnIcon = 'heroicon-m-arrow-trending-up';
        } else if($pengeluaran >= 5_000_000 && $pengeluaran <= 10_000_000) {
            $pengeluarnStatus = 'perlu perhatian';
            $pengeluarnColor = 'warning';
            $pengeluarnIcon = 'heroicon-m-arrow-path';
        } else {
            $pengeluarnStatus = 'rendah';
            $pengeluarnColor = 'success';
            $pengeluarnIcon = 'heroicon-m-arrow-trending-down';
        }

        $iuran = TransaksiIuranDetail::whereHas(
            'transaksiIuran',
            fn($query) => $query->where('status_bayar','lunas')
        )->sum('jumlah');
        $iuranUpdateDate = TransaksiIuranDetail::orderBy('created_at', 'desc')->first();

        $saldo = $iuran-$pengeluaran;
        $saldoAbbre = number_abbr_id($saldo);

        if($saldo > 10_000_000) {
            $saldoStatus = 'sehat';
            $saldoColor = 'success';
            $saldoIcon = 'heroicon-m-arrow-trending-up';
        } else if($saldo >= 5_000_000 && $saldo <= 10_000_000) {
            $saldoStatus = 'perlu perhatian';
            $saldoColor = 'warning';
            $saldoIcon = 'heroicon-m-arrow-path';
        } else {
            $saldoStatus = 'kritis';
            $saldoColor = 'danger';
            $saldoIcon = 'heroicon-m-arrow-trending-down';
        }

        return [
            Stat::make('Total Pengeluaran (Diperbarui '.$pengeluaranUpdateDate?->created_at->format('d M Y').')', Number::currency(
                number: $pengeluaran,
                in: 'Rp.',
                precision: 0,
            ))
                ->description(number_abbr_id($pengeluaran).' pengeluaran '.$pengeluarnStatus)
                ->descriptionIcon($pengeluarnIcon)
                ->color($pengeluarnColor)
                ->icon('heroicon-o-banknotes'),

            Stat::make('Saldo Saat Ini (Diperbarui '.$iuranUpdateDate?->created_at->format('d M Y').')', Number::currency(
                number: $saldo,
                in: 'Rp.',
                precision: 0,
            ))
                ->description($saldoAbbre.' saldo '.$saldoStatus)
                ->descriptionIcon($saldoIcon)
                ->color($saldoColor)
                ->icon('heroicon-o-credit-card'),
        ];
    }
}
