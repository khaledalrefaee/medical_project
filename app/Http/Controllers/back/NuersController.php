<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Nurses;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
            'name'          =>   'required',
            'phone'         =>      'required',
            'description'   => 'required',
            'image'         => 'required|mimes:jpeg,jpg,png|unique:Nurses',
        ]);
        $file = $request->file('image') ;
        $name_gen=hexdec(uniqid()).'.'. $file->getClientOriginalExtension();
        Image::make ($file)->resize(100,100)->save('uploads/nuers_images'.$name_gen);
        $save_url = 'uploads/nuers_images'.$name_gen;

        Nurses::insertGetId([
            'name'              => $request->name,
            'phone'             =>$request ->phone,
            'description'      => $request->description,
            'image'            =>  $save_url
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
            'name'           =>   'required',
            'phone'          =>      'required',
            'description'    => 'required',
            'image'          => 'required|mimes:jpeg,jpg,png|unique:Nurses',
        ]);
        $file = $request->file('image') ;
        $name_gen=hexdec(uniqid()).'.'. $file->getClientOriginalExtension();
        Image::make ($file)->resize(100,100)->save('uploads/nuers_images'.$name_gen);
        $save_url = 'uploads/nuers_images'.$name_gen;

        $nuers->update([
            'name'              =>      $request->name,
            'phone'             =>      $request ->phone,
            'description'       =>      $request->description,
            'image'             =>      $save_url,
        ]);

        toastr()->warning('You are edit nuers');
        return redirect()->route('all.nuers');
    }




    public function destroy(Request $request)
    {
        $nuer = Nurses::findOrfail($request->id);
        $nuer->delete();
        toastr()->error('you are delete nuers');
        return redirect()->route('all.nuers');
    }


}
