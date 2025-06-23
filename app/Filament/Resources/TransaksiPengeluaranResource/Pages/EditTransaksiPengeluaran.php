<?php

namespace App\Filament\Resources\TransaksiPengeluaranResource\Pages;

use App\Filament\Resources\TransaksiPengeluaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransaksiPengeluaran extends EditRecord
{
    protected static string $resource = TransaksiPengeluaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function beforeSave(): void
    {
        $this->record->transaksiPengeluaranDetails->jumlah = str_replace(',', '', $this->record->transaksiPengeluaranDetails->jumlah);
    }
}
