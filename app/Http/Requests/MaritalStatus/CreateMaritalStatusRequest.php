<?php

namespace App\Http\Requests\MaritalStatus;

use Illuminate\Foundation\Http\FormRequest;

class CreateMaritalStatusRequest extends FormRequest
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
            'name'=>'required|unique:marital_statuses|min:4|max:25'
        ];
    }
}
