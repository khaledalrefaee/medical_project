<?php

namespace App\Repository;

use App\Models\Nurses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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

    public function update($request,$id){


        $nurse = Nurses::findOrFail($id);
        $nurse->name = $request->name;
        $nurse->phone = $request->phone;
        $nurse->description = $request->description;

        $nurse->save();
        toastr()->warning('warning');
        return redirect()->route('all.nuers');

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

        // Delete the nurse from the database
        $nuers->delete();
        toastr ()->error('messages Delete Nurses','success');
        return redirect()->route('all.nuers');
    }

}
