<?php

namespace App\Http\Livewire;

use App\Models\GroupMasseg;
use Livewire\Component;

class ChatGroup extends Component
{


    public $messageText;

    public function render()
    {
        $messages = GroupMasseg::with('user')->latest()->take(10)->get()->sortBy('id');

        return view('livewire.chat-group', compact('messages'));
    }

    public function sendMessage()
    {
        GroupMasseg::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }

}
