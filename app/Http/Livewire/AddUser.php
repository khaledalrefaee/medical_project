<?php

namespace App\Http\Livewire;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class AddUser extends Component
{


    public $name,$email,$password,$phone,$gender_id,
    $address,$birthday,$role_id;


    public function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone' => 'required|min:9',

        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }




    public function render()
    {
        return view('livewire.add-user',[

        'gender' =>Gender::all(),
        'role'=>Role::all(),
            ]);
    }

    public function saveContact()
    {
        $validatedData = $this->validate([
//            'name' => 'required|min:6',
//            'email' => 'required|email',
//            'password'=>'required|min:6',
//            'phone' => 'required|min:9',
//            'gender_id'=>'required',
//            'address'=>'required',
//            'birthday'=>'required',
//            'role_id'=>'required'
        ]);
            $Add_User =new User();
        $Add_User ->name             =   $this->name;
        $Add_User->email             =   $this->email;
        $Add_User->password          =   Hash::make($this->password);
        $Add_User->gender_id         =   $this->gender_id;
        $Add_User->phone             =   $this->phone;
        $Add_User->address           =   $this->address;
        $Add_User->birthday          =   $this->birthday;
        $Add_User->role_id           =   $this->role_id;


        $Add_User->save();


        $this->successMessage = ('messages.success');
    }

//    public function saveContact()
//    {

//             $this->validate([
//                    'gender_id'=>'required',
//                    'address'=>'required',
//                    'birthday'=>'required',
//                    'role_id'=>'required',
//                    'email' => 'required|unique:users,email',
//                    'password' => 'required',
//                    'name'=>'required',
//                    'phone'=>'required|min:9|max:9',
//                ]);


  //  }

}
