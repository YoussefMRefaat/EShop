<?php

namespace App\Http\Controllers\User\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateCartRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class EditController extends Controller
{

    /**
     * Update the quantity of a product in the cart
     *
     * @param UpdateCartRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function update(UpdateCartRequest $request):\Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        $product = Product::findOrFail($validated['product_id']);
        $product->carts()->updateExistingPivot(session()->get('cartId') , ['quantity' => $validated['quantity']]);
        return redirect(route('cart'));
    }

    /**
     * Delete a product from the cart
     *
     * @param UpdateCartRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function destroy(UpdateCartRequest $request):\Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($request->validated()['product_id']);
        $product->carts()->detach(session()->get('cartId'));
        return redirect(route('cart'));
    }

}
