<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\messages;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class ChatController extends Controller
{


  public function index()
  {
      $users = User::whereHas('roles', function ($query) {
          $query->where('name', 'Admin')
              ->orWhere('name', 'employee');
      })->where('id', '<>', auth()->id())->get();

      return view('backend.Chating.index', compact('users'));
  }

    public function showMessages($senderId, $receiverId)
    {
        $sender = User::findOrFail($senderId);
        $receiver = User::findOrFail($receiverId);


        $messages = messages::where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $senderId);
        })->orderBy('created_at', 'asc')->get();

        return view('backend.Chating.show', compact('sender', 'receiver', 'messages'));
    }


        public function sendMessage(Request $request)
    {
    // التحقق من الصحة والتحقق من الصلاحية هنا

    // إنشاء الرسالة الجديدة
    $message = new messages();
    $message->sender_id = auth()->id();
    $message->receiver_id = $request->input('receiver_id');
    $message->message = $request->input('message');
    $message->save();

    // إرسال حدث بواسطة Pusher لإعلام المستلم بالرسالة الجديدة

    return response()->json('Message sent successfully');
}

}
