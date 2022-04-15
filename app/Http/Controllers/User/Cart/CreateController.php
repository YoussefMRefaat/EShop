<?php

namespace App\Http\Controllers\User\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreCartRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class CreateController extends Controller
{

    /**
     * Add a new product into the cart
     *
     * @param StoreCartRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function store(StoreCartRequest $request) :\Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($request->validated()['product_id']);
        $product->carts()->attach(session()->get('cartId'));
        return redirect(route('cart'));
    }

}
