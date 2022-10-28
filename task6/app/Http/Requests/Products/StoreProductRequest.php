<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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

            'name_en'=>['required','string','between:3,512'],
            'name_ar'=>['required','string','between:3,512'],
            'price'  =>['required','numeric','between:1,999999,99'],
            'details_en'=>['required','string'],
            'details_ar'=>['nullable','string'],
            'quantity'=> ['nullable','numeric','between:1,9999'],
            'status'=>['nullable','in:1,0'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'brand_id'=>['required','integer','exists:brands,id'],
            'image'=>['required','mimes:jpeg,jpg,png','max:2048']

        ];
    }
}
