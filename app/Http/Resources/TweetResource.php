<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'user' => new UserResource($this->user),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'type' => $this->type,
            'parent_id' => $this->parent_id,
            'parent_ids' => $this->parents()->pluck('id')->toArray(),
            'original_tweet' => new TweetResource($this->OriginalTweet),
            'likes_count' => $this->likes->count(),
            'retweet_count' => $this->retweets->count(),
            'replies_count' => $this->replies->count(),
            'media' => new MediaCollection($this->media),
            'entites' => new EntityCollection($this->entities),
            'replying_to' => optional(optional($this->parentTweet)->user)->nickname,

        ];
    }
}
