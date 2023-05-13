<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUser()
    {
        // نستخدم الدالة whereDoesntHave للتحقق مما إذا كان المستخدم ليس لديه الدور
        $Users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Admin');
        })->orderBy('id','DESC')->paginate(5);

///نستخدم طريقة الخريطة للتكرار على كل مستخدم في المجموعة وحساب عمره باستخدام فئة الكربون. نقوم بعد ذلك بدمج خاصية العمر في كائن المستخدم
///  وإعادة مجموعة جديدة من المستخدمين مع تضمين أعمارهم. أخيرًا ، نقوم بتمرير هذه المجموعة الجديدة إلى العرض.
        $usersWithAge = $Users->map(function ($user) {
            $age = Carbon::parse($user->birthday)->age;
            return collect($user)->merge(['age' => $age]);
        });
        return view('backend.users.all_users',compact('Users'));
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        $reservation = $user->reservation()->get();
        toastr()->info('You are show User');
        return view('backend.users.show',compact('user','reservation'));
    }

    public function createUser()
    {

        $gender=Gender::all();
        $roles = Role::pluck('name','name')->all();
        return view('backend.users.create',compact('gender','roles'));
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
            $User->birthday = Carbon::parse($request->birthday . '-01');
            $User->latitude = $request->latitude;
            $User->longitude = $request->longitude;
            $User->role_name = ['user'];
            $User->status = 'active';

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
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('backend.users.edit', compact('user','gender','roles','userRole'));
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
            $User->latitude = $request->latitude;
            $User->longitude = $request->longitude;
            $User->save();

            toastr()->warning('You are edit User','Update');
            return redirect()->route('all_user');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'Error deleting doctor and details: '.$e->getMessage());
        }
    }

}
