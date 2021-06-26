<?php

namespace App\Http\Requests\BloodSymbol;

use Illuminate\Foundation\Http\FormRequest;

class CreateBloodSymbolRequest extends FormRequest
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
            'name'=>'required|unique:blood_symbols|min:4|max:25'
        ];
    }
}
