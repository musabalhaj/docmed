<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'name'=>'required|min:4|max:50',
            'bank_id'=>'required|Numeric',
            'branch_id'=>'required|Numeric',
            'account_num'=>'required|Numeric',
            'amount'=>'required|Numeric'
        ];
    }
}
