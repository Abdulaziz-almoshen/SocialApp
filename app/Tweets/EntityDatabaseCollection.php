<?php


namespace App\Tweets;


use App\User;
use Illuminate\Database\Eloquent\Collection;

class EntityDatabaseCollection extends Collection
{

    public function users()
    {
        return User::whereIn('nickname', $this->pluck('body_plain'))->get();
    }

}
