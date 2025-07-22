<?php

namespace App\Filament\Resources\TransaksiIuranResource\Pages;

use App\Filament\Resources\TransaksiIuranResource;
use App\Jobs\WaSendMessage;
use App\Jobs\WaTyping;
use App\Models\Iuran;
use App\Models\Pengurus;
use App\Models\Perumahan;
use App\Models\TransaksiIuran;
use App\Models\TransaksiIuranDetail;
use App\Models\Warga;
use App\Services\WhatsappService;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Number;

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
                        ->options(self::getPerumahan())
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

                if (strlen($warga->no_telepon) >= 10) {
                    $totalIuran = $transaskiIuran->total_iuran;
                    $totalIuran = Number::format($totalIuran, 2);
                    $jatuhTempo = Carbon::parse($data['date'])->translatedFormat('F Y');

                    $text = "Halo Bapak/Ibu 👋, \n\nPengingat iuran warga bulan ".$jatuhTempo." sebesar Rp ".$totalIuran.",- 🙏";
                    $text .= "\nMohon dibayarkan ke koordinator masing-masing paling lambat:";
                    $text .= "\n\n📆 07 ".$jatuhTempo;
                    $text .= "\n📌 Mohon konfirmasi setelah pembayaran ya.";
                    $text .= "\n\nTerima kasih atas perhatian & kerjasamanya! 🤝";
                    $text .= "\nPengurus RT";

                    $apiWa = new WhatsappService();
                    $noWa = $apiWa->formatToWhatsapp($warga->no_telepon);

                    Bus::chain([
                        new WaTyping($noWa),
                        new WaSendMessage($noWa, $text)
                    ])->dispatch();
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

    private function getPerumahan()
    {
        $user = auth()->user();

        if ($user->hasRole('super_admin')) {
            return Perumahan::all()->pluck('nama_perumahan', 'id');
        }

        if ($user->hasRole('admin')) {
            return Perumahan::where('id', $user->warga->perumahan_id)->get()->pluck('nama_perumahan', 'id');
        }

        // Default fallback: no data
        return [];
    }
}
