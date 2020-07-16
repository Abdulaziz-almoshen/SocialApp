<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\RetweetWasCreated;
use App\Events\Tweets\TweetWasCreated;
use App\Events\TweetWasDeleted;
use App\Http\Controllers\Controller;
use App\Tweet;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class RetweetController extends Controller
{
    public function store (Tweet $tweet, Request $request) {

        if ($request->user()->hasRetweeted($tweet)){

            return response(null,409);

        }
            $retweet = $request->user()->tweets()->create([
                'type' => TweetType::RETWEET,
                'user_id' => $request->user()->id,
                'original_tweet_id' => $tweet->id,
            ]);
        broadcast(new TweetWasCreated($retweet ));

        broadcast(new RetweetWasCreated($request->user(),$tweet ));

    }

    public function destroy (Tweet $tweet, Request $request) {
//        dd( $tweet->retweetedTweet->first());
        broadcast(new TweetWasDeleted( $tweet->retweetedTweet->first() ));

        $retweet = $request->user()->retweets()->where(
            'original_tweet_id',
            $tweet->id)->first()->delete();
        broadcast(new RetweetWasCreated($request->user(),$tweet ));



    }
}
