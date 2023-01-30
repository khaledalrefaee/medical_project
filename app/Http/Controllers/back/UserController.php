<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function index(){
        $Users = User::all();
        return view('backend.users.all_users',compact('Users'));

    }
    public function create(){
        return view('backend.users.create');
    }

    public  function store(Request $request){

            $request->validate([
                'name'               =>  'required',
                'email'              =>  'required|string|unique:Users',
                'password'           =>  'required',
                'phone'              =>  'required',
                'gender'             =>  'required',
                'address'            =>  'required',
                'age'                =>  'required',
                'role_name'          =>  'required',
            ]);
        User::create([
            'name'              =>  $request->name,
            'email'             =>  $request->email,
            'password'          => bcrypt( $request->password),
            'phone'             =>  $request->phone,
            'gender'            =>  $request->gender,
            'address'           =>  $request->address,
            'age'               =>  $request->age,
            'role_name'         =>  $request->role_name,
        ]);
        toastr()->success('success');
        return redirect()->route('all_user');

//        return redirect()->route('all_user')
    }
}
