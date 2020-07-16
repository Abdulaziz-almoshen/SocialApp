<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/timeline', 'Api\Timeline\TimelineController@index')->middleware('auth');
Route::post('/tweets', 'Api\Tweets\TweetsController@store');
// tweets
Route::get('/tweets', 'Api\Tweets\TweetsController@index');
Route::get('/tweets/{tweet}', 'Api\Tweets\TweetsController@show');


//Like and DisLike
Route::post('/tweets/{tweet}/like', 'Api\Tweets\LikesController@store');
Route::delete('/tweets/{tweet}/dislike', 'Api\Tweets\LikesController@destroy');
//Retweet and Unreteweet and Qoute
Route::delete('/tweets/{tweet}/unretweet', 'Api\Tweets\RetweetController@destroy');
Route::post('/tweets/{tweet}/retweet', 'Api\Tweets\RetweetController@store');
Route::post('/tweets/{tweet}/qoute', 'Api\Tweets\RetweetQouteController@store');

// reply controller
Route::post('/tweets/{tweet}/reply', 'Api\Tweets\ReplyController@store');
Route::get('/tweets/{tweet}/reply', 'Api\Tweets\ReplyController@show');

//media return types and store media
Route::get('/media/types', 'Api\Media\MediaTypesController@index');
Route::post('/media', 'Api\Media\MediaController@store');

// notifications
Route::get('/notificaations', 'Api\Notifications\NotificationsController@index');
