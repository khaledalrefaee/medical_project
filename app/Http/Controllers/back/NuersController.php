<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Nurses;
use Illuminate\Http\Request;

class NuersController extends Controller
{
    public function index(){
        $nuers = Nurses::all();
        return view('backend.Nuers.all_Nuers',compact('nuers'));
    }

    public function create(){
        return view('backend.Nuers.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'      =>   'required',
            'phone'     =>      'required',
            'description'   => 'required',
        ]);
        Nurses::create([
            'name'              => $request->name,
            'phone'             =>$request ->phone,
            'description'      => $request->description,
        ]);

        toastr()->success('success');
        return redirect()->route('all.nuers');
    }

    public function show($id){
        $nuer = Nurses::findOrFail($id);
        toastr()->info('You are show User');
        return view('backend.Nuers.show',compact('nuer'));
    }

    public function Retreat(){
        return redirect()->route('all.nuers');
    }

    public function edit($id){

        $nuer = Nurses::findorFail($id);
        return view('backend.Nuers.edit',compact('nuer'));
    }


    public function update(Request $request,$id){
        $nuers =Nurses::findOrFail($id);
        $request->validate([
            'name'      =>   'required',
            'phone'     =>      'required',
            'description'   => 'required',
        ]);
        $nuers->update([
            'name'              =>  $request->name,
            'phone'             =>$request ->phone,
            'description'       =>   $request->description,
        ]);

        toastr()->warning('You are edit Clinics');
        return redirect()->route('all.nuers');
    }


    public function destroy(Request $request)
    {
        $nuer = Nurses::findOrfail($request->id);
        $nuer->delete();
        toastr()->error('you are delete clinic');
        return redirect()->route('all.nuers');
    }


}
