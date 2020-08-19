<?php

namespace App;

use App\Presenter\UserPresenter;
use App\Tweets\TweetType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable , followable,likeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nickname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }




    public function getImageAttribute($vale)
    {
        return asset('storage/'.$vale);
    }

    public function timeline(){
        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);
        return Tweet::whereIn('user_id',$ids)
            ->parent()
            ->latest()
            ->with([
                'user',
                'likes',
                'retweets',
                'replies',
                'media.BaseMedia',
                'entities',
                'OriginalTweet.user',
                'OriginalTweet.likes',
                'OriginalTweet.retweets',
                'OriginalTweet.media.BaseMedia',
            ])->paginate(3);
        //$owner = $this->tweets()->get();
        // $friends= $this->follows->map->tweets->flatten();
        // return $owner->merge($friends)->sortByDesc('created_at') ;
    }

    public function path()
    {
        return route('profile', $this->name);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function retweets(){
        return $this->hasMany(Tweet::class)
            ->where('type' ,TweetType::RETWEET)
            ->orWhere('type', TweetType::QOUTE);
    }

    public function hasRetweeted(Tweet $tweet)
    {
        return $this->retweets->contains('OriginalTweet.id', $tweet->id);
    }

    public function relpies(){
            return $this->hasMany(Tweet::class)
                ->whereNotNull('parent_id');
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class);
    }

    public function present()
    {

        return new UserPresenter($this);
    }
    public function hasRead(Conversation $conversation)
    {
        return $this->conversations->find($conversation->id)->pivot->read_at;
    }




}
