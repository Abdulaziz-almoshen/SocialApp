<?php

namespace App\Http\Resources;

use App\Http\Requests\TweetMediaRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TweetMediaCollection extends ResourceCollection
{

    public $collects = TweetMediaResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
        'data' => $this->collection,
    ];
    }
}
