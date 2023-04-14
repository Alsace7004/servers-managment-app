<?php

namespace App\Events;

use App\Models\Staff;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CallUser implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public int $staff;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $staff)
    {
        //
        $this->staff = $staff;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('staffCall-notification'.$this->staff);

        return new Channel('staffCallNotification.'.$this->staff);
    }
}
