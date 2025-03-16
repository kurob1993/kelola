<?php

namespace App\Filament\Resources\TransaksiIuranResource\Pages;

use App\Filament\Resources\TransaksiIuranResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Carbon;

class ListTransaksiIurans extends ListRecords
{
    protected static string $resource = TransaksiIuranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('generateData')
                ->label('Generate Data')
                ->form([
                    DatePicker::make('date')
                        ->label('Pilih Tanggal')
                        ->default(Carbon::now())
                        ->required(),
                ])
                ->action(function (array $data) {
                    static::generateData($data['date']);
                })
                ->visible(auth()->user()->can('generate_transaksi::iuran'))
                ->requiresConfirmation()
                ->color('primary'),
        ];
    }

    public function generateData($data)
    {
        // Logika untuk menghasilkan data
        // Misalnya, memanggil service atau job untuk mengenerate data

        // Contoh notifikasi sukses
        Notification::make()
            ->title('Data berhasil dihasilkan')
            ->success()
            ->send();
    }
}
