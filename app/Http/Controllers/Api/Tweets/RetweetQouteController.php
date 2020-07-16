<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\RetweetWasCreated;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Tweet;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class RetweetQouteController extends Controller
{
    public function store (Tweet $tweet, Request $request) {

        if ($request->user()->hasRetweeted($tweet)){

            return response(null,409);

        }
        $retweet = $request->user()->tweets()->create([
            'type' => TweetType::QOUTE,
            'user_id' => $request->user()->id,
            'original_tweet_id' => $tweet->id,
            'body' => $request->body
        ]);
        broadcast(new TweetWasCreated($retweet ));

        broadcast(new RetweetWasCreated($request->user(),$tweet ));

    }
}
