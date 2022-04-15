<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageHandler{

    /**
     * Save an image and return the path
     *
     * @param UploadedFile $image
     * @param string $file
     * @return string
     */
    protected function saveImage(UploadedFile $image , string $file): string
    {
        $path = $image->store('public/images/' . $file);
        return str_replace('public/' , 'storage/' , $path);
    }

    /**
     * Delete an image
     *
     * @param string $path
     */
    protected function deleteImage(string $path){
        $oldPath = str_replace('storage' , 'public' , $path);
        Storage::delete($oldPath);
    }

}
