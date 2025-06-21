<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    protected string $judul = 'Dashboard';
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

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
}
