<?php

namespace App\Filament\Resources\TransaksiIuranResource\Pages;

use App\Filament\Resources\TransaksiIuranResource;
use App\Models\Iuran;
use App\Models\Perumahan;
use App\Models\TransaksiIuran;
use App\Models\TransaksiIuranDetail;
use App\Models\Warga;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

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
                    Select::make('perumahan')
                        ->label('Pilih Perumahan')
                        ->options(Perumahan::all()->pluck('nama_perumahan', 'id'))
                        ->required(),
                    DatePicker::make('date')
                        ->label('Pilih Tanggal')
                        ->default(Carbon::now()->endOfMonth()->toDateString())
                        ->required(),
                ])
                ->action(function (array $data) {
                    static::generateData($data);
                })
                ->visible(auth()->user()->can('generate_transaksi::iuran'))
                ->requiresConfirmation()
                ->color('primary')
                ->closeModalByClickingAway(false),
        ];
    }

    public function generateData($data)
    {
        // Logika untuk menghasilkan data
        // Misalnya, memanggil service atau job untuk mengenerate data
        $pilihTanggal = Carbon::parse($data['date']);
        $TransIuran = TransaksiIuran::whereMonth('tanggal_bayar', $pilihTanggal->month)
            ->whereYear('tanggal_bayar', $pilihTanggal->year)
            ->get();

        if (count($TransIuran) === 0) {
            $wargas = Warga::where('perumahan_id', $data['perumahan'])->get();
            foreach ($wargas as $warga) {
                $transaskiIuran = new TransaksiIuran();
                $transaskiIuran->warga_id = $warga->id;
                $transaskiIuran->tanggal_bayar = $data['date'];
                $transaskiIuran->status_bayar = 'belum lunas';
                $transaskiIuran->save();

                // Logika untuk menghasilkan data transaksi iuran
                $iurans = Iuran::all();

                foreach ($iurans as $iuran) {
                    if($iuran->gang_id === null) {
                        $transaskiIuranDetail = new TransaksiIuranDetail();
                        $transaskiIuranDetail->transaksi_iuran_id = $transaskiIuran->id;
                        $transaskiIuranDetail->iuran_id = $iuran->id;
                        $transaskiIuranDetail->jumlah = $iuran->nominal;
                        $transaskiIuranDetail->save();
                    }

                    if($warga->gang_id === $iuran->gang_id) {
                        $transaskiIuranDetail = new TransaksiIuranDetail();
                        $transaskiIuranDetail->transaksi_iuran_id = $transaskiIuran->id;
                        $transaskiIuranDetail->iuran_id = $iuran->id;
                        $transaskiIuranDetail->jumlah = $iuran->nominal;
                        $transaskiIuranDetail->save();
                    }
                }
            }

            // Contoh notifikasi sukses
            Notification::make()
                ->title('Data berhasil dihasilkan')
                ->success()
                ->send();
        }  else {
            // Contoh notifikasi gagal
            Notification::make()
                ->title('Data sudah pernah dihasilkan')
                ->warning()
                ->send();
        }

    }
}
