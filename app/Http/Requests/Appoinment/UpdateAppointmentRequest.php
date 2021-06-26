<?php

namespace App\Http\Requests\Appoinment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:4',
            'address'=>'required|min:4',
            'email'=>'required|email',
            'phone'=>'required|Numeric',
            'date'=>'required|Date'
        ];
    }
}
