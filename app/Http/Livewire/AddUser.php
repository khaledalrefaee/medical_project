<?php

namespace App\Http\Livewire;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class AddUser extends Component
{


    public $name,$email,$password,$phone,$gender_id,
    $address,$birthday,$role_id;









    public function render()
    {
        return view('livewire.add-user',[

        'gender' =>Gender::all(),
        'role'=>Role::all(),
            ]);
    }
    public function toArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'address' => $this->address,
            'birthday' => $this->birthday,
            'gender_id' => $this->gender_id,
            'role_id' => $this->role_id,
        ];
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'phone' => ['required', 'string', 'max:20', Rule::unique('users')],
            'password' => 'required|string|min:8',
            'gender_id' => ['required', Rule::in(gender::pluck('id')->toArray())],
            'role_id' => ['required', Rule::in(Role::pluck('id')->toArray())],
            'address' => 'required|string|max:255',
            'birthday'=>'required',
        ]);

        // Create the user in the database
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => bcrypt($this->password),
            'gender_id' => $this->gender_id,
            'role_id' => $this->role_id,
            'address' => $this->address,
            'birthday'=>$this->birthday,
        ]);

        session()->flash('message', 'User registered successfully.');

        return redirect()->route('home');


    }



}
