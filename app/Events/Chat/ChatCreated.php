<?php

namespace App\Events\Chat;

use App\Http\Resources\TweetResource;
use App\Message;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $message;
    public $user;

    public function __construct( User $user ,Message $message)
    {
        $this->message = $message;
        $this->user = $user;
    }

    public function broadcastWith (){
        return [
            'message' => array_merge($this->message->oldest()->load('user')->toArray(),[

            'selfOwned' => false
            ])
        ];
    }
//    public function broadcastAs()
//    {
//        return 'chat.created';
//    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn ()
    {
        return new PresenceChannel('chat');
    }
}
