<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClince;
use App\Models\Clinics;
use App\Models\Doctor;
use App\Repository\ClinceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClinicsController extends Controller
{
    protected $Clince;

    public function __construct(ClinceRepositoryInterface $Clince)
    {
        $this->Clince = $Clince;
    }


    public function index(){
        return $this->Clince->index();
    }

    public function create(){
        return view('backend.clinics.create');
    }

    public function store(StoreClince $request){
        return $this->Clince->store($request);
    }

    public function show($id){
       return $this->Clince->show($id);
    }

    public function Retreat(){
        return redirect()->route('all.Clincs');
    }

    public function edit($id){
        $clinic = Clinics::findorFail($id);
        return view('backend.clinics.edit',compact('clinic'));
    }


    public function update(StoreClince $request,$id){
        return $this->Clince->update($request);
    }


    public function destroy(Request $request , $id)
    {
        return $this->Clince->delete($id);
    }

    public function show_destroy()
    {
        return $this->Clince->show_delete();
    }



}
