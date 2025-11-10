<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Support\Facades\Log;

class UsulanPemindahtangananUpdated implements ShouldBroadcastNow
{
    use InteractsWithSockets, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function broadcastOn()
    {
        return new Channel('usulan-channel');
    }

    public function broadcastAs()
    {
        return 'usulan.updated';
    }

    public function broadcastWith()
    {
        return [
            'data' => $this->data,
            'timestamp' => now()->toISOString(),
            'total_records' => count($this->data)
        ];
    }
}
