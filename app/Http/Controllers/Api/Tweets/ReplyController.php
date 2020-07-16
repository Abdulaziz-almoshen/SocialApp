<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\RepliesCreated;
use App\Events\Tweets\RetweetWasCreated;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use App\Notifications\TweetLiked;
use App\Notifications\TweetReplied;
use App\Tweet;
use App\TweetMedia;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

    public function show (Tweet $tweet)
    {

        return new TweetCollection($tweet->replies);
    }

    public function store(Tweet $tweet, Request $request){
        $reply = $request->user()->tweets()->create(array_merge($request->only('body'),['parent_id'=> $tweet->id],
            ['type' => TweetType::TWEET]
        ));

        foreach( $request->media as $id) {
            $tweet->media()->save(TweetMedia::find($id));
        };
        $request->user()->notify(new TweetReplied( $tweet,$request->user()));
        broadcast(new RepliesCreated ($tweet, $request->user() ));
    }
}
