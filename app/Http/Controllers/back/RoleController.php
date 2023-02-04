<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Role;
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
        $role = Role::findOrfail($request->id);
        $role->delete();
        toastr()->error('you are delete clinic');
        return redirect()->route('all.role');
    }
}
