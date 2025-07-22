<?php

namespace Tests\Feature;

use App\Services\SendNotifWhatsapp;
use Tests\TestCase;

class NotifWhatsappIuranBaruTest extends TestCase
{
    public function test_kirim_notif_iuran_baru()
    {
        $notif = app(SendNotifWhatsapp::class);
        $notif->sendNotifIuranBaru(
            phone:'087855561244',
            name: 'Kurob',
            jatuhTempoDate: '2025-01-01',
            totalIuran: '1000'
        );

        $this->assertTrue(true); // sebagai dummy assertion
    }
}
