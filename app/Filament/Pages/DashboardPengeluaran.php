<?php

namespace App\Filament\Pages;

use App\Livewire\PengeluaranStats;
use App\Livewire\PengeluaranTotalStats;
use App\Livewire\StatsOverview;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard as BaseDashboard;

class DashboardPengeluaran extends BaseDashboard
{
    use HasFiltersForm;

    protected static ?string $title = 'Pengeluaran';
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

//    protected static string $view = 'filament.pages.dashboard-pengeluaran';

    public static function getNavigationGroup(): ?string
    {
        return 'Dashboard'; // Ambil dari file lang
    }

    public static function getRoutePath(): string
    {
        return 'dashboard-pengeluaran';
    }

    public function filtersForm(Form $form): Form
    {
        $years = collect(range(2020, date('Y')))
            ->mapWithKeys(fn($year) => [$year => $year])
            ->toArray();
        return $form->schema([
            Section::make()->columns(2)->schema([
                Select::make('bulan')->options([
                    '1' => 'Januari',
                    '2' => 'Februari',
                    '3' => 'Maret',
                    '4' => 'April',
                    '5' => 'Mei',
                    '6' => 'Juni',
                    '7' => 'Juli',
                    '8' => 'Agustus',
                    '9' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
                ]),
                Select::make('tahun')->options($years),
            ])
        ]);
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PengeluaranTotalStats::class,
        ];
    }

    public function getWidgets(): array
    {
        return [
            PengeluaranStats::class,
        ];
    }
}
