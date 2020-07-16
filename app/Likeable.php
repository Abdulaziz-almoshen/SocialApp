<?php


namespace App;


trait Likeable
{

    public function dislikesCount()
    {
        if (isset($this->reaction_summary['dislike'])) {
            return $this->reaction_summary['dislike'];
        } else
            return null;
    }

    public function isDislike($user)
    {
        if ($this->isReactBy($user)) {
            return $this->reacted($user)->type == "dislike";
        }
    }

    public function isLike($user)
    {
        if ($this->isReactBy($user)) {
            return $this->reacted($user)->type == "like";
        }
    }

    public function likesCount()
    {
        if (isset($this->reaction_summary['like'])) {
            return $this->reaction_summary['like'];
        } else
            return null;
    }

    public function hasDisliked(Tweet $tweet)
    {
        return $this->likes->contains('tweet_id', $tweet->id);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislike($tweet)
    {

        $this->toggleReactionOn($tweet, 'dislike');
    }

    public function like($tweet)
    {

        $this->toggleReactionOn($tweet, 'like');
    }

    public function hasLiked(Tweet $tweet)
    {
        return $this->likes->contains('tweet_id', $tweet->id);
    }


}
