<?php

namespace App\Http\Requests\Laboratory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLaboratoryRequest extends FormRequest
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
            'identity_type'=>'required|min:4|max:50',
            'identity_number'=>'required|Numeric',
            'phone'=>'required|Numeric',
            'maritalstatus_id'=>'required|Numeric',
            'bloodsymbol_id'=>'required|Numeric',
            'gender_id'=>'required|Numeric',
        ];
    }
}
