<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\messages;

use Livewire\Component;

class ChatSingle extends Component
{
    public $senderId;
    public $receiverId;
    public $message;

    public function mount($senderId, $receiverId)
    {
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
    }

    public function render()
    {
        $sender = User::findOrFail($this->senderId);
        $receiver = User::findOrFail($this->receiverId);

        $messages = messages::where(function ($query) {
            $query->where('sender_id', $this->senderId)
                ->where('receiver_id', $this->receiverId);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiverId)
                ->where('receiver_id', $this->senderId);
        })->orderBy('created_at', 'asc')->get();

        return view('livewire.chat-single', compact('sender', 'receiver', 'messages'));
    }

    public function sendMessage()
    {
        // التحقق من الصحة والتحقق من الصلاحية هنا

        // إنشاء الرسالة الجديدة
        $message = new messages();
        $message->sender_id = auth()->id();
        $message->receiver_id = $this->receiverId;
        $message->message = $this->message;
        $message->save();

        // مسح الحقل بعد إرسال الرسالة
        $this->message = '';

        // إعادة تحميل الرسائل بعد إرسال الرسالة
        $this->emit('messageSent');
    }

    public function scrollDown()
    {
        $this->dispatchBrowserEvent('scrollToBottom');
    }



}
