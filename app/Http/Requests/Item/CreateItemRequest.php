<?php
 
namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class CreateItemRequest extends FormRequest
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
            'name'=>'required|unique:items|min:4|max:25',
            'description'=>'required|min:4|max:300',
            'price'=>'required|Numeric',
            'qty'=>'required|Numeric',
            'category_id'=>'required'
        ];
    }
}
