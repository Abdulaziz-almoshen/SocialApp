<?php

use App\Events\CreateEventTask;
use App\Events\TaskCreated;
use App\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/timeline', 'Api\Timeline\TimelineController@index')->middleware('auth');

Route::get('/notifications', 'notifications\NotificationsController@index')->middleware('auth');
Route::get('/api/notifications', 'Api\Notifications\NotificationsController@index');
Route::get('/tweets/{tweet}/reply', 'Tweet\TweetController@show');

// conversations
Route::get('/conversations', 'Conversation\ConversationsController@index')->name('converations.index');
Route::get('/conversations/{conversation}', 'Conversation\ConversationsController@show')->name('converations.show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/tasks', function (){
   return Task::latest()->pluck('body');
});


Route::post('/tasks', function (){
    $task = Task::forceCreate(request(['body']));
     broadcast(new CreateEventTask($task));
//    TaskCreated::dispatch($task);
});

