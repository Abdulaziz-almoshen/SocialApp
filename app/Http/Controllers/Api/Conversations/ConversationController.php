<?php

namespace App\Http\Controllers\Api\Conversations;

use App\Conversation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConversationController extends Controller
{


        public function show(Request $request,Conversation $conversation)
    {
        dd($request);
        return  response()->json([
            'conversations' => $request->user()->conversations,
            'conversation' => $conversation
        ]);

    }
}
