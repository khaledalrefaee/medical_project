<?php

namespace App\Repository;

use App\Models\Nurses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NuerseRepository implements NuerseRepositoryInterface
{
    public function index()
    {
        $nuers = Nurses::all();
        return view('backend.Nuers.all_Nuers',compact('nuers'));
    }

    public function cretae()
    {
        return view('backend.Nuers.create');
    }

    public function store($request)
    {
        try {

            $nurse = new Nurses();
            $nurse->name = $request->name;
            $nurse->phone = $request->phone;
            $nurse->description = $request->description;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('uploads', $filename, 'public');
                $nurse->image = $filename;
            }
            $nurse->save();

            toastr()->success('success');
            return redirect()->route('all.nuers');
        }
        catch (Exception $e) {
             return redirect()->back()->with('error', 'Error deleting doctor and details: '.$e->getMessage());
        }

    }
    public function edit($id)
    {
        $nuer = Nurses::findorFail($id);
        return view('backend.Nuers.edit',compact('nuer'));
    }

    public function update(){
        return 'dsas';
//
//        $nuer = Nurses::findOrFail($request->id);
//        $nuer->update($request->all());
//
//
//
//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $filename = time() . '.' . $image->getClientOriginalExtension();
//            $path = $image->storeAs('uploads', $filename, 'public');
//            $nuer->image = $filename;
//        }
//        $nuer->save();
//
//        toastr()->warning('success');
//        return redirect()->route('all.nuers');

    }

    public function show($id){
        $nuer = Nurses::findOrFail($id);
        toastr()->info('You are show User','Show');
        return view('backend.Nuers.show',compact('nuer'));
    }

    public function Delete($id)
    {
        // Get the nurse
        $nuers = Nurses::findOrFail($id);

        // Delete the nurse's photo from storage
        if ($nuers->image) {
            Storage::delete('public/uploads/' . $nuers->image);
        }

        // Delete the nurse from the database
        $nuers->delete();
        toastr ()->error('messages Delete Nurses','success');
        return redirect()->route('all.nuers');
    }

}
