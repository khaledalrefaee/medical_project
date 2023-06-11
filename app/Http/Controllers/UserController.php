<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(4);
        return view('users.index',compact('data'));
    }


    public function create()
    {
        $gender =Gender::all();
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles','gender'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name'               => 'required',
            'email'              => 'required|email|unique:users,email',
            'password'           => 'required',
            'phone'              =>  'required||regex:/^9\d{8}$/',
            'gender_id'          =>  'required',
            'address'            =>  'required',
            'birthday'           =>  'required',
            'role_name'          => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['status'] ='active';

        $user = User::create($input);
        $user->assignRole($request->input('role_name'));

        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }


    public function show($id)
    {
        $user = User::find($id);
        $reservation = $user->reservation()->get();
        return view('users.show',compact('user','reservation'));
    }


    public function edit($id)
    {
        $gender =Gender::all();
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole','gender'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone'              =>  'required||regex:/^9\d{8}$/',
            'gender_id'          =>  'required',
            'address'            =>  'required',
            'birthday'           =>  'required',
            'status'            =>     'required',

        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password','role_name[]'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('role_name'));

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}
