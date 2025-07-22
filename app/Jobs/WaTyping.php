<?php

namespace App\Jobs;

use App\Services\WhatsappService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class WaTyping implements ShouldQueue
{
    use Queueable;
    private $phone;

    /**
     * Create a new job instance.
     */
    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $wa = new WhatsappService();
        $wa->sendChatPresence($this->phone . '@s.whatsapp.net','start');
    }
}
