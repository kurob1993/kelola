<?php

namespace App\Jobs;

use App\Services\WhatsappService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class WaSendMessage implements ShouldQueue
{
    use Queueable;
    private $phone;
    private $message;

    /**
     * Create a new job instance.
     */
    public function __construct($phone, $message)
    {
        $this->phone = $phone;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $wa = new WhatsappService();
        $wa->sendMessage($this->phone . '@s.whatsapp.net', $this->message);
    }
}
