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

        return view('backend.Chating.show', compact('sender', 'receiver'));
    }




}
