<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctoer;
use App\Models\Clinics;
use App\Models\Detail;
use App\Models\Doctor;
use App\Repository\DoctoerRepositoryInterface;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    protected $Doctoer;

    public function __construct(DoctoerRepositoryInterface $Doctoer)
    {
        $this->Doctoer = $Doctoer;
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


}
