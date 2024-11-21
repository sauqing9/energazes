<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MonitoringDataUpdated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $type; // Type: 'distance' or 'battery'
    public $data; // The payload

    public function __construct($type, $data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    public function broadcastOn()
    {
        return new Channel('monitoring-data');
    }
}
