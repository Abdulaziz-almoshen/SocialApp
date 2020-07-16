<?php

namespace App\Events\Tweets;

use App\Tweet;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RepliesCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels ;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $tweet;
    public $user;

    public function __construct(Tweet $tweet, User $user)
    {
        $this->tweet = $tweet;
        $this->user = $user;

    }

    public function broadcastAs () {
        return 'reply.created';
    }

    public function broadcastWith () {
        return [
            'id' => $this->tweet->id,
            'user_id' => $this->user->id,
            'count' => $this->tweet->replies->count()
            ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('tweets');
    }
}
