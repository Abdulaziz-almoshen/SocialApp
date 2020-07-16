<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use App\Http\Resources\TweetResource;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function index()
    {
//        dd(auth()->user());
        $tweets = auth()->user()->timeline();

        return new TweetCollection($tweets);


    }
}
