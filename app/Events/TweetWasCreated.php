<?php

namespace App\Events\Tweets;

use App\Http\Resources\TweetResource;
use App\Tweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TweetWasCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
public $tweet;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    public function broadcastAs(){
        return 'tweet.created';
    }

    public function broadcastWith (){
        return (new TweetResource($this->tweet))->jsonSerialize();
    }

    public function broadcastOn()
    {
        if( $this->tweet->user->noFollowers()) {
            return new PrivateChannel('timeline.' .$this->tweet->user->id);
        } else {
            return $this->tweet->user->follows->map(function ($user){
            return new PrivateChannel('timeline.' .$user->id);
        })
            ->toArray();

        }


    }
}
