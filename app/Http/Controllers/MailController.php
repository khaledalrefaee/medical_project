<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Mailnotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.Mail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>   'required|email',
            'text'      =>   'required',
        ]);
        $mail = Mail::create([
            'name' => $request->name,
            'text' => $request->text,
        ]);

        $name = $request->input('name');

        $user = User::where('email', $name)->first();
        $user_created = auth()->user()->name;
        if ($user) {
            $notification = new Mailnotification($user_created ,$mail->text,$mail->id );
            $user->notify($notification);

            toastr()->success('success send mail','success');
            return redirect()->route('home');
        } else {
            return back()->withInput()->withErrors(['name' => 'Invalid email address']);
        }

    }



    public function show($id)
    {
        $mail =Mail::findOrfail($id);
        $getid = DB::table('notifications')->where('data->mail_id',$id)->pluck('id');
        DB ::table('notifications')->where('id', $getid)->update(['read_at'=>now()]);
        return view('backend.Mail.show',compact('mail'));
    }


    public function see_All(){
        $user = User::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification ){
            $notification->markAsRead();

            // $notification->delete();

        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
