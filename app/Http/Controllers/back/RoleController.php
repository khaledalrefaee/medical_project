<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index(){
        $roles = Role::all();
        return view('backend.Role.All_Role',compact('roles'));
    }

    public function create(){
        return view('backend.Role.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'      =>   'required',
        ]);
        Role::create([
            'name'              => $request->name,
        ]);

        toastr()->success('success');
        return redirect()->route('all.role');
    }

    public function show($id){
        $role = Role::findOrFail($id);
        toastr()->info('You are show User');
        return view('backend.Role.show',compact('role'));
    }

    public function Retreat(){
        return redirect()->route('all.role');
    }

    public function edit($id){

        $role = Role::findorFail($id);
        return view('backend.Role.edit',compact('role'));
    }


    public function update(Request $request,$id){
        $role =Role::findOrFail($id);
        $request->validate([
            'name'      =>   'required',
        ]);
        $role->update([
            'name'              =>  $request->name,
        ]);

        toastr()->warning('You are edit Clinics');
        return redirect()->route('all.role');
    }


    public function destroy(Request $request)
    {
        $MyUser_id = User::where('role_id', $request->id)->pluck('role_id');

        if ($MyUser_id->count() == 0) {

            $role = Role::findOrFail($request->id)->delete();
            toastr()->error('messages Delete role');
            return redirect()->route('all.role');
        } else {

            toastr()->error('There is a relationship with another table User');
            return redirect()->route('all.role');

        }
    }
}
