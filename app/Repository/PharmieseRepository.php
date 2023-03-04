<?php

namespace App\Repository;


use App\Models\Pharmise;

class PharmieseRepository implements PharmieseRepositoryInterface{

    public function getAllPharmiese(){
       $phamiese = Pharmise::all();
        return view('backend.pharmiese.index',compact('phamiese'));
    }

    public function StorePharmiese($request)
    {
        try {
            $Pharmiese = new Pharmise();
            $Pharmiese->name = $request->name;
            $Pharmiese->prise = $request->prise;
            $Pharmiese->description = $request->description;
            $Pharmiese->save();
            toastr()->success('success');
            return redirect()->route('all.pharmese');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function editPharmiese($id)
    {
        $phamies = Pharmise::findOrFail($id);
        return view('backend.pharmiese.edit',compact('phamies'));
    }

    public function updatePharmiese($request)
    {
        try {
            $Pharmiese = Pharmise::findOrFail($request->id);
            $Pharmiese->name = $request->name;
            $Pharmiese->prise = $request->prise;
            $Pharmiese->description = $request->description;
            $Pharmiese->save();
            toastr()->warning('messages.Update','Update');
            return redirect()->route('all.pharmese');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeletePharmiese($request){
        $phamies = Pharmise::findOrFail($request->id);
        $phamies->delete();
        toastr()->error('messages.Delete');
        return redirect()->route('all.pharmese');

    }
}
