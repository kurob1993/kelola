<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    protected static ?string $title = 'Dashhboard';
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    public static function getNavigationGroup(): ?string
    {
        return 'Dashboard'; // Ambil dari file lang
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
}
