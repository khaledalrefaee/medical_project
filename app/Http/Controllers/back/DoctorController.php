<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctoer;
use App\Models\Clinics;
use App\Models\Doctor;
use App\Repository\DoctoerRepositoryInterface;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    protected $Doctoer;

    public function __construct(DoctoerRepositoryInterface $Doctoer)
    {
        $this->Doctoer = $Doctoer;

        $this->middleware('permission:doctor all', ['only' => ['index']]);
        $this->middleware('permission:doctor create', ['only' => ['create','store']]);
        $this->middleware('permission:doctor show', ['only' => ['show']]);
        $this->middleware('permission:doctor edit', ['only' => ['edit','update']]);
        $this->middleware('permission:doctor delete', ['only' => ['destroy']]);
        $this->middleware('permission:doctor show Delete', ['only' => ['show_destroy']]);

    }



    public function index(){
        return $this->Doctoer->get_all_Doctoer();
    }

    public function create(){
     return $this->Doctoer->create_Doctoer();
    }

    public function store(StoreDoctoer $request){
        return $this->Doctoer->store_Doctoer($request);
    }

    public function show($id){
        return $this->Doctoer->show($id);
    }

    public function Retreat(){
        return redirect()->route('all_doctor');
    }

    public function edit($id){
        return $this->Doctoer->edit_doctoer($id);
    }


    public function update(StoreDoctoer $request,$id){
       return $this->Doctoer->update_doctoer($request ,$id);
    }


    public function destroy(Request $request,$id)
    {
        return $this->Doctoer->delete($id);
    }

    public function show_destroy()
    {
        return $this->Doctoer->show_destroy();
    }



    public function Filter_Clinces(Request $request){

      return $this->Doctoer->Filter_Clinces($request);
    }
}
