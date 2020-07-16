<?php

namespace App\Http\Livewire\Conversations;

use App\Conversation;
use Livewire\Component;

class ConversationReply extends Component
{

    public $body= "";
    public $conversation;

    public function mount(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    public function reply()
    {
        $this->validate([
            'body' => 'required',
        ]);
        $message = $this->conversation->messages()->create([
            'user_id' => user()->id,
            'body' => $this->body,
        ]);
        $this->emit('message.created',$message->id);
        $this->body = "";
    }
    public function render()
    {
        return view('livewire.conversations.conversation-reply');
    }
}
