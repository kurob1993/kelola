<?php

namespace App\Filament\Pages;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected string $judul = 'Dashboard';
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';
}
