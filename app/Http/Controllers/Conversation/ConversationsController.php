<?php

namespace App\Http\Controllers\Conversation;

use App\Conversation;
use App\Http\Controllers\Controller;
use App\Http\Requests\chat\StoreMessageRequest;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\Conversations;
use App\Http\Resources\ConversationsCollection;
use App\Message;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
     public function __construct()
     {
         $this->middleware(['auth']);
     }

    public function index(Request $request)
   {

        return view('conversations.index',[
            'conversations' => $request->user()->conversations,
            'user' => $request->user()
            ]);
   }

   public function show(Request $request,Conversation $conversation)
   {
       ;
//        return response()->json($messages,200);

        return  view('conversations.show',[
            'conversations' => $request->user()->conversations,
            'conversation' => $conversation->users,
            'messages' => $conversation->messages()->with(['user'])->latest()->limit(100)->get(),
            'uuid' => $conversation

//            'messages' => $messages = Message::with(['user'])->latest()->limit(100)->get()
        ]);
   }

    public function store(StoreMessageRequest $request)
    {
        $conversation = Conversation::where('uuid',$request->uuid)->firstOrFail();
        $message = $conversation->messages()->create([
            'user_id' => user()->id,
            'body' => $request->body,
        ]);
    }

}
