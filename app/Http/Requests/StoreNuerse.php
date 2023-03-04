<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNuerse extends FormRequest
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
            'name'          =>'required',
            'phone'         =>'regex:/^([0-9\s\-\+\(\)]*)$/|required|min:2|max:8|',
            'description'   =>'required',
            'image'         => 'required|mimes:jpeg,png,jpg,gif|unique:Nurses',
        ];
    }
}