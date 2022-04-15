<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCartRequest extends FormRequest
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
    public function rules(): array
    {
        return (request()->isMethod('PATCH'))
            ? $this->update()
            : $this->delete();
    }

    /**
     * Validation rules to be applied if the request is updating the model
     *
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    private function update(): array
    {
        return [
            'product_id' => ['required' , 'integer' , Rule::exists('cart_product' , 'product_id')
                ->where('cart_id' , session()->get('cartId')) ],
            'quantity' => ['required' , 'integer' , 'min:1' , 'max:15'],
        ];
    }

    /**
     * Validation rules to be applied if the request is deleting the model
     *
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    private function delete(): array
    {
        return [
            'product_id' => ['required' , 'integer' , Rule::exists('cart_product' , 'product_id')
                ->where('cart_id' , session()->get('cartId')) ],
        ];
    }
}
