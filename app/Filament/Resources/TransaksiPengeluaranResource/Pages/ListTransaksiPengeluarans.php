<?php

namespace App\Filament\Resources\TransaksiPengeluaranResource\Pages;

use App\Filament\Resources\TransaksiPengeluaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransaksiPengeluarans extends ListRecords
{
    protected static string $resource = TransaksiPengeluaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
