<?php


namespace App;


trait actions
{
    public function retweets()
    {
        return $this->hasMany(Tweet::class, 'original_tweet_id');
    }

//    public function likes()
//    {
//        return $this->hasMany(Like::class);
//    }

    public function replies()
    {
        return $this->hasMany(Tweet::class, 'parent_id');
    }

    public function retweetedTweet()
    {
        return $this->hasMany(Tweet::class, 'original_tweet_id', 'id');
    }

}
