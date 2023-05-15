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

class EndUserCallEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $staff;
    public $email;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Staff $staff,$email)
    {
        //
        $this->staff = $staff;
        $this->email = $email;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('channel-name');
        return new Channel('endUserCall.'.$this->staff->id);
    }
    public function broadcastWith(): array
    {
        return [
            'id'    => $this->staff->id,
            'email' => $this->email,
        ];
    }
}
