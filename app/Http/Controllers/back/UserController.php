<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Models\Clinics;
use App\Models\Doctor;
use App\Models\Gender;
use App\Models\Nurses;
use App\Models\Pharmise;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Encryption\Encrypter;


class UserController extends Controller
{

    protected $User;

    public function __construct(UserRepositoryInterface $User)
    {
        $this->User = $User;

        $this->middleware('permission:user employee all', ['only' => ['index']]);
        $this->middleware('permission:user employee create', ['only' => ['create','store']]);
        $this->middleware('permission:user employee edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user employee delete', ['only' => ['destroy']]);

        $this->middleware('permission:Show chart', ['only' => ['chart']]);
    }


    public function index(){
        return $this->User->getAllUser();
    }


    public function create(){
       return $this->User->createUser();
    }

    public  function store(StoreUser $request){
        return $this->User->StoreUser($request);
    }
    public function show($id, ){
       return $this->User->showUser($id);
    }

    public function Retreat(){
        return redirect()->route('all_user');
    }

    public function edit($id){
        return $this->User->editUser($id);
    }

    public function update(Request $request ,$id ){

        return $this->User->UpdateUser($request ,$id);
    }


    public function destroy(Request $request)
    {
        $user = User::findOrfail($request->id);
        $user->delete();
        toastr()->error('you are delete user');
        return redirect()->route('all_user');
    }


}
