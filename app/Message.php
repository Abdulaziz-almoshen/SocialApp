<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'user_id',
        'body'
    ];

    public function getPublishedAttribute(){

        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $appends = ['selfOwned',"published"];

    public function getSelfOwnedAttribute()
    {
        return $this->user_id === auth()->id();

    }
    public function isOwn()
    {
        return $this->user_id === auth()->id();
    }




}
