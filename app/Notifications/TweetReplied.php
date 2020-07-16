<?php

namespace App\Notifications;

use App\Http\Resources\TweetResource;
use App\Http\Resources\UserResource;
use App\Tweet;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TweetReplied extends Notification
{
    use Queueable;

    protected $tweet;
    protected $user;
    public function __construct(Tweet $tweet, User $user)
    {
        $this->user = $user;
        $this->tweet = $tweet;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [DatabaseCustomNotification::class] ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user' => new UserResource($this->user),
            'tweet' => new TweetResource($this->tweet)
        ];
    }
}

