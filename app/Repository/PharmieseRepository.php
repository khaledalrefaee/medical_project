<?php

namespace App\Repository;


use App\Models\Pharmise;

class PharmieseRepository implements PharmieseRepositoryInterface{

    public function getAllPharmiese(){
        return Pharmise::all();
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
        return Pharmise::findOrFail($id);
    }

    public function updatePharmiese($request)
    {
        try {
            $Pharmiese = Pharmise::findOrFail($request->id);
            $Pharmiese->name = $request->name;
            $Pharmiese->prise = $request->prise;
            $Pharmiese->description = $request->description;
            $Pharmiese->save();
            toastr()->success(trans('messages.Update'));
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
