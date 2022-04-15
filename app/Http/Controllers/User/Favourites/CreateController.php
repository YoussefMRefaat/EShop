<?php

namespace App\Http\Controllers\User\Favourites;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CreateController extends Controller
{

    /**
     * Like or unlike a product
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Product $product): \Illuminate\Http\JsonResponse
    {
        $result = $product->favourites()->toggle(auth()->id());
        return (count($result['attached']) > 0)
            ? response()->json(status: 201)
            : response()->json(status: 200);
    }

}
