<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctoer extends FormRequest
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
            'clinic_id'      =>     'required',
            'name'           =>     'required',
            'email_1'         =>      'required||unique:doctors,email,'.$this->id,
            'password'         =>      'required',
            'email'         =>      'required||unique:details,email,'.$this->id,
            'phone'         =>      'required||regex:/^9\d{8}$/',
            'specialization'  =>'required',
        ];
    }
}
