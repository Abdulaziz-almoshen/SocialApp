<?php

namespace App\Http\Controllers;

use App\Http\Resources\TweetCollection;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('home');
    }
}
