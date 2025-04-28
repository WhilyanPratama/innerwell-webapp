<?php

namespace App\Events;

use App\Models\Antrian;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AntrianUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $poli_id;
    public $currentAntrian;
    public $nextAntrian;
    public $date;

    public function __construct($poli_id, $currentAntrian, $nextAntrian, $date)
    {
        $this->poli_id = $poli_id;
        $this->currentAntrian = $currentAntrian;
        $this->nextAntrian = $nextAntrian;
        $this->date = $date;
    }

    public function broadcastOn()
    {
        return new Channel('antrian-poli-'.$this->poli_id);
    }
}
