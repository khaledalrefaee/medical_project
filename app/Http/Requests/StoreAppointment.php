<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAppointment extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name'  =>  'required',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date_format:Y-m-d|after_or_equal:today',
            'time' => [
                'required',
                'date_format:H:i',
                Rule::unique('reservations')->where(function ($query) {
                    return $query->where('doctor_id', $this->doctor_id)
                        ->where('date', $this->date);
                })
            ],
            'phone'  =>  'required|regex:/^9\d{8}$/',
            'birthday'  =>  'required',

        ];
    }
}
