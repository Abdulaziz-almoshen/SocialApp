<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetLikesUpdated;
use App\Http\Controllers\Controller;
use App\Notifications\TweetLiked;
use App\Tweet;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store(Tweet $tweet ,Request $request)
{

    if ($request->user()->hasLiked($tweet)){

        return response(null,409);

     } else {
        $request->user()->likes()->create([
             'tweet_id' =>
            $tweet->id]);
    }
    $request->user()->notify(new TweetLiked( $tweet,$request->user() ));

    broadcast(new TweetLikesUpdated($request->user(), $tweet));

}

    public function  destroy (Tweet $tweet ,Request $request)
    {
            $request->user()->likes()->where(
                'tweet_id',
                $tweet->id)->first()->delete();
        broadcast(new TweetLikesUpdated($request->user(), $tweet));


    }
}


