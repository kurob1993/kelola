<?php

namespace App\Services;

use App\Jobs\WaSendMessage;
use App\Jobs\WaTyping;
use Date;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Number;
use PhpParser\Node\Expr\Cast\Double;
use Ramsey\Uuid\Type\Integer;

class SendNotifWhatsapp
{
    public function sendNotifIuranBaru( string $phone, string $name, string | Date $jatuhTempoDate, Double | int $totalIuran): void
    {
        if (strlen($phone) >= 10) {
            $totalIuran = Number::format($totalIuran, 2);
            $jatuhTempo = Carbon::parse($jatuhTempoDate)->translatedFormat('F Y');

            $text = "Halo Bapak/Ibu 👋 " . $name;
            $text .= "\n\nPengingat iuran warga bulan " . $jatuhTempo . " sebesar Rp " . $totalIuran . ",- 🙏";
            $text .= "\nMohon dibayarkan ke koordinator masing-masing paling lambat:";
            $text .= "\n\n📆 07 " . $jatuhTempo;
            $text .= "\n📌 Mohon konfirmasi setelah pembayaran ya.";
            $text .= "\n\nTerima kasih atas perhatian & kerjasamanya! 🤝";
            $text .= "\nPengurus RT";

            $apiWa = new WhatsappService();
            $noWa = $apiWa->formatToWhatsapp($phone);

            Bus::chain([
                new WaTyping($noWa),
                new WaSendMessage($noWa, $text)
            ])->dispatch();
        }
    }
}
