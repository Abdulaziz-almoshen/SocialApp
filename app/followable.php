<?php


namespace App;


trait followable
{

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function noFollowers()
    {
            return $this->follows->isEmpty();
    }
}
