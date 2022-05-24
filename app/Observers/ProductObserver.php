<?php

namespace App\Observers;

use App\Models\Product;
use App\Traits\ImageHandler;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    use ImageHandler;

    /**
     * Handle the Product "created" event.
     *
     * @param Product $product
     * @return void
     */
    public function created(Product $product)
    {
        $path = $this->saveImage(request()->file('image') , 'products');
        $product->update(['image' => $path]);
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param Product $product
     * @return void
     */
    public function deleted(Product $product)
    {
        $this->deleteImage($product->image);
    }

}
