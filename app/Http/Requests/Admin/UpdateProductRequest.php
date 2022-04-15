<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => ['required' , 'string' , 'max:255'],
            'category_id' => ['required' , 'integer' ,'exists:categories,id'],
            'description' => ['required' , 'string'],
            'price' => ['required' , 'numeric'],
            'show' => ['required' , 'integer' , 'min:0' , 'max:1'],
            'stock' => ['required' , 'integer'],
        ];
    }
}
