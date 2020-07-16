<?php

namespace App\Http\Controllers\Api\Media;

use App\Http\Controllers\Controller;
use App\Http\Requests\TweetMediaRequest;
use App\Http\Resources\TweetMediaCollection;
use App\TweetMedia;
use App\MeidaType\MeidaTypes;

use Illuminate\Http\Request;

class MediaController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth:sanctum');
    }

    public function store (TweetMediaRequest $request) {

        $result = collect($request->media)->map(function ($media) {
           return $this->addMedia($media);
        });

        return new TweetMediaCollection($result);

    }

    protected function addMedia ($media) {
        // create empty record in TweeMedia db
        $tweetMedia = TweetMedia::create([]);
        // create record in media via relationship in TweetMedia mediaBase belong to media tabel
        $mediaCollection = $tweetMedia->addMedia($media)->toMediaCollection();
        // associate media_id to media created in Media table and save it
        $tweetMedia->BaseMedia()
           ->associate($mediaCollection)
            ->save();
        return $tweetMedia;

    }

}
