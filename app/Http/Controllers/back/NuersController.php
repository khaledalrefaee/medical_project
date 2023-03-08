<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNuerse;
use App\Models\Nurses;
use App\Repository\NuerseRepositoryInterface;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;


class NuersController extends Controller
{

    protected $Nuerse;

    public function __construct(NuerseRepositoryInterface $Nuerse)
    {
        $this->Nuerse = $Nuerse;
    }

    public function index(){
        return $this->Nuerse->index();
    }

    public function create(){
       return $this->Nuerse->cretae();
    }

    public function store(StoreNuerse $request){
        return $this->Nuerse->store($request);
    }

    public function show($id){
       return $this->Nuerse->show($id);
    }

    public function Retreat(){
        return redirect()->route('all.nuers');
    }

    public function edit($id){
        return $this->Nuerse->edit($id);
    }


    public function update(Request $request,$id){
        return $this->Nuerse->update($request,$id);
    }




    public function destroy(Request $request , $id)
    {
        return $this->Nuerse->Delete($id);
    }


}
