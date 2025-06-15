<?php

namespace App\Filament\Resources\TransaksiIuranResource\Pages;

use App\Filament\Resources\TransaksiIuranResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditTransaksiIuran extends EditRecord
{
    protected static string $resource = TransaksiIuranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('filament-panels::resources/pages/create-record.form.actions.cancel.label'))
            ->url(route('filament.admin.resources.transaksi-iurans.index'))
            ->color('gray');
    }
}
