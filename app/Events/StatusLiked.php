<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StatusLiked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
           
    public function __construct($message)
    {
        $this->message = $message;
    }


    public function broadcastOn()
    {
        return ['my-channel'];
        // return new PrivateChannel('my-channel');
        // return ['private-pizza-tracker.'.time() , 'my-channel'];
    }
    
    public function broadcastWith()
    {
        $extra = [            
            'time' => date('Y-m-d H:i:s a'),
        ];

        return array_merge($this->message, $extra);
    }

    // public function broadcastOn()
    // {
    //     return ['my-channel'];
    // }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
