<?php

namespace App\Http\Controllers\Conversation;

use App\Conversation;
use App\Http\Controllers\Controller;
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
            'conversations' => $request->user()->conversations
            ]);
   }

   public function show(Request $request,Conversation $conversation)
   {
        return view('conversations.show', [
            'conversations' => $request->user()->conversations,
            'conversation' => $conversation
        ]);
   }
}
