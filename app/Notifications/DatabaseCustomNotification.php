<?php


namespace App\Notifications;


use Illuminate\Notifications\Notification;
use Reflection;
use ReflectionClass;

class DatabaseCustomNotification
{
    public function send( $notifiable, Notification $notification)
    {

        $data = $notification->toArray($notifiable);

        return $notifiable->RouteNotificationFor('database')->create([
            'id' => $notification->id,
            'type' => (new ReflectionClass($notification))->getShortName(),
            'data' => $data,
            'read_at' => null,

        ]);
    }
}
