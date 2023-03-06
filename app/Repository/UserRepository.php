<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUser()
    {
        $Users = User::paginate(5);
        return view('backend.users.all_users',compact('Users'));
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        toastr()->info('You are show User');
        return view('backend.users.show',compact('user'));
    }

    public function createUser()
    {
        $role=Role::all();
        $gender=Gender::all();
        return view('backend.users.create',compact('role','gender'));
    }

    public function StoreUser($request)
    {
        try {
            $User = new User();
            $User->name = $request->name;
            $User->email = $request->email;
            $User->password = Hash::make($request->password);
            $User->phone = $request->phone;
            $User->gender_id = $request->gender_id;
            $User->address = $request->address;
            $User->birthday = $request->birthday;
            $User->role_id = $request->role_id;

            $User->save();

            toastr()->success('success');
            return redirect()->route('all_user');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'Error deleting doctor and details: '.$e->getMessage());
        }
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $role=Role::all();
        $gender=Gender::all();
        return view('backend.users.edit', compact('user','role','gender'));
    }

    public function UpdateUser($request)
    {
        try {
            $User = User::findOrFail($request->id);
            $User->name = $request->name;
            $User->email = $request->email;
            $User->password = Hash::make($request->password);
            $User->phone = $request->phone;
            $User->gender_id = $request->gender_id;
            $User->address = $request->address;
            $User->birthday = $request->birthday;
            $User->role_id = $request->role_id;

            $User->save();

            toastr()->warning('You are edit User','Update');
            return redirect()->route('all_user');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'Error deleting doctor and details: '.$e->getMessage());
        }
    }

}
