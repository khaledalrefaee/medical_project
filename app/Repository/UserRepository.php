<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUser()
    {
        $Users = User::orderBy('id','DESC')->paginate(5);
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

        $gender=Gender::all();
        return view('backend.users.create',compact('gender'));
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
            $User->latitude = $request->latitude;
            $User->longitude = $request->longitude;
            $User->role_name = ['user'];
            $User->status = 'Active';

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

        $gender=Gender::all();
        return view('backend.users.edit', compact('user','gender'));
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

            $User->save();

            toastr()->warning('You are edit User','Update');
            return redirect()->route('all_user');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'Error deleting doctor and details: '.$e->getMessage());
        }
    }

}
