<?php

namespace App\Http\Resources;

use http\Env\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TweetCollection extends ResourceCollection
{

    public $collects = TweetResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'data' => $this->collection,
        ];
    }

    public function with($request)
    {

        return [
            'meta' =>  [
                    'likes' => $this->getLikes($request),
                    'retweets' =>$this->getRetweets($request),
                    'replies' => $this->getReplies($request)
            ]
        ];
    }

    protected function getLikes($request) {
        if (!auth()->user() == $request->user()){
            return [];
        }


        return  $request->user()->likes->whereIn('tweet_id',$this->collection->pluck('id'))->pluck('tweet_id')->toArray();

    }

    protected function getRetweets ($request) {

//            dd($request->user()->retweets->whereIn('original_tweet_id',$this->collection->pluck('id'))->pluck('original_tweet_id')->toArray());
        if (!auth()->user() == $request->user()){
            return [];
        }
        return  $request->user()->retweets->whereIn('original_tweet_id',$this->collection->pluck('id'))->pluck('original_tweet_id')->toArray();


    }

    protected function getReplies ( $request)
    {
//        if (!auth()->user() == $request->user()){
//            return [];
//        }
        return $request->user()->relpies
            ->pluck('parent_id')
            ->toArray();
    }
}
