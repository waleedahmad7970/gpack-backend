<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait UploadImageTrait
{
    /**
     * Upload image.
     *
     * @param object $image
     * @return string $image_url
     */
    public function uploadImage($image, $path, $imageName)
    {
        // get image extension and create new name
        $extension = $image->getClientOriginalExtension();

        // get image name
        $newImageName =  $imageName . '.' . $extension;

        // set destination path 
        $destinationPath = public_path($path);

        // save image
        $imageFile = Image::make($image->getRealPath());
        $imageFile->save($destinationPath . '/' . $newImageName);

        // image URL (relative path)
        $imageUrl = $path . '/' . $newImageName;

        return $imageUrl;
    }
    
    /**
     * Delete image.
     *
     * @param string $image_urk
     * @return bool 
     */
    public function deleteImage($imageUrl)
    {
        $isDeleted = false;

        if (File::exists($imageUrl)) {
            // delete image from storage
            File::delete($imageUrl);

            $isDeleted = true;
        }

        return $isDeleted;
    }
}
