<?php

namespace App\Http\Livewire\Conversations;

use App\Message;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConversationMessages extends Component
{
    /** @var array messages */
    public $messages;

    public function mount(Collection $messages)
    {
        $this->messages = $messages;
    }

    public function render()
    {
        return view('livewire.conversations.conversation-messages');
    }

    protected function getListeners()
    {
        return [
            'message.created' => 'prependMessage',
        ];
    }

    public function prependMessage($id)
    {
        $this->messages->prepend(Message::findOrFail($id));
    }
}
