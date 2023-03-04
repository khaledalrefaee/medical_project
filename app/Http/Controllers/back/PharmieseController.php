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
       return  $this->Pharmese->getAllPharmiese();
    }

    public function create(){
        return view('backend.pharmiese.create');
    }


    public function store(StorePharmiese $request){
        return $this->Pharmese->StorePharmiese($request);
    }

    public function edit($id){
        return $this->Pharmese->editPharmiese($id);
    }

    public function update(StorePharmiese $request){
        return $this->Pharmese->updatePharmiese($request);
    }

    public function destroy(Request $request){
        return $this->Pharmese->DeletePharmiese($request);
    }

}
