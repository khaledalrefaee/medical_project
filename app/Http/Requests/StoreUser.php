<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'               =>  'required',
            'email'              =>  'required||unique:users,email,'.$this->id,
            'password'           =>  'required',
            'phone'              =>  'required||regex:/^9\d{8}$/',
            'gender_id'          =>  'required',
            'address'            =>  'required',
            'birthday'           =>  'required',
        ];
    }
}
