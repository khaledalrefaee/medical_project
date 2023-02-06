<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function index(){

        $Users = User::paginate(10);
        return view('backend.users.all_users',compact('Users'));

    }
    public function create(){
        $role=Role::all();
        return view('backend.users.create',compact('role'));
    }

    public  function store(Request $request){

            $request->validate([
                'name'               =>  'required',
                'email'              =>  'required|string|unique:Users',
                'password'           =>  'required',
                'phone'              =>  'required',
                'gender'             =>  'required|in:Male,female',
                'address'            =>  'required',
                'birthday'           =>  'required',
                'role_id'            =>  'required',
            ]);
        User::create([
            'name'              =>  $request->name,
            'email'             =>  $request->email,
            'password'          => bcrypt( $request->password),
            'phone'             =>  $request->phone,
            'gender'            =>  $request->gender,
            'address'           =>  $request->address,
            'birthday'          =>  $request->birthday,
            'role_id'           =>  $request->role_id,
        ]);
        toastr()->success('success');
        return redirect()->route('all_user');

    }
    public function show($id){
        $user = User::findOrFail($id);

        toastr()->info('You are show User');
        return view('backend.users.show',compact('user'));
    }




    public function Retreat(){
        return redirect()->route('all_user');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $role=Role::all();
        return view('backend.users.edit', compact('user','role'));

    }

    public function update(Request $request , $id){
        $user =User::findOrFail($id);
        $validatedData =$request->validate([
            'name'               =>  'required',
            'email'              =>  'required|string|unique:Users',
            'password'           =>  'required',
            'phone'              =>  'required',
            'gender'             =>  'required|in:Male,female',
            'address'            =>  'required',
            'age'                =>  'required',
            'role_id'          =>  'required',
        ]);
        $user->update( $validatedData
//            'name'              =>  $request->name,
//            'email'             =>  $request->email,
//            'password'          => bcrypt( $request->password),
//            'phone'             =>  $request->phone,
//            'gender'            =>  $request->gender,
//            'address'           =>  $request->address,
//            'age'               =>  $request->age,
//            'role_name'         =>  $request->role_name,
        );
        toastr()->warning('You are edit User');
        return redirect()->route('all_user');
    }


    public function destroy(Request $request)
    {
        $user = User::findOrfail($request->id);
        $user->delete();
        toastr()->error('you are delete user');
        return redirect()->route('all_user');
    }
}
