<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePharmiese;
use App\Models\Pharmise;
use App\Repository\PharmieseRepositoryInterface;
use Illuminate\Http\Request;

class PharmieseController extends Controller
{
    protected $Pharmese;

    public function __construct(PharmieseRepositoryInterface $Pharmese)
    {
        $this->Pharmese = $Pharmese;
    }


    public  function index(){
        $phamiese =$this->Pharmese->getAllPharmiese();
        return view('backend.pharmiese.index',compact('phamiese'));

    }

    public function create(){
        return view('backend.pharmiese.create');
    }


    public function store(StorePharmiese $request){
        return $this->Pharmese->StorePharmiese($request);
    }

    public function edit($id){
        $phamies =$this->Pharmese->editPharmiese($id);
        return view('backend.pharmiese.edit',compact('phamies'));
    }

    public function update(StorePharmiese $request){
        return $this->Pharmese->updatePharmiese($request);
    }

    public function destroy(Request $request){
        return $this->Pharmese->DeletePharmiese($request);
    }

}
