<?php

namespace App\Http\Requests\Salary;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalaryRequest extends FormRequest
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
            'user_id'=>'required',
            'salary'=>'required|Numeric',
            'allowance'=>'required|Numeric',
            'incentive'=>'required|Numeric',
            'deduction'=>'required|Numeric',
        ];
    }
}
