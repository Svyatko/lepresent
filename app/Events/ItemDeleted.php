<?php

namespace App\Events;

use App\Models\Item;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ItemDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $item;
    /**
     * Create a new event instance.
     *
     * @param Item $item
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }
}
