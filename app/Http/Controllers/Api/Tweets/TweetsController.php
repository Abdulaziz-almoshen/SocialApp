<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\RetweetWasCreated;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\TweetsStoreRequest;
use App\Http\Resources\TweetCollection;
use App\Http\Resources\TweetResource;
use App\Notifications\TweetLiked;
use App\Notifications\TweetMention;
use App\Tweet;
use App\TweetMedia;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class TweetsController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth')->only('store');
    }

    public function index(Request $request)
    {

        $tweets = Tweet::with([
            'user', 'likes','retweets','media.BaseMedia',
            'OriginalTweet.user', 'OriginalTweet.likes','OriginalTweet.retweets','OriginalTweet.media.BaseMedia',
        ])
            ->find(explode(',',$request->ids));
             return new TweetCollection($tweets);
    }


    public function store (TweetsStoreRequest $request)
    {

        $tweet = $request->user()->tweets()->create(array_merge($request->only('body'),
            ['type' => TweetType::TWEET]
            ));
        foreach( $request->media as $id) {
            $tweet->media()->save(TweetMedia::find($id));
        };
        broadcast(new TweetWasCreated($tweet));
        $tweet->mentions->users()->each->notify(new TweetMention($tweet,$request->user()));


    }
    public function show(Tweet $tweet){
        return new TweetCollection(collect([$tweet])->merge($tweet->parents()));
    }
}
