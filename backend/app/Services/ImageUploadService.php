<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageUploadService
{

    function uploadImage($folder, $file)
    {
        $filenamewithextension = $file->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $file->getClientOriginalExtension();

        //filename to store
        $filenametostore = $folder . "/" . uniqid() . '.' . $extension;

        //Upload File to s3
        $storeImage = Storage::disk('s3')->put($filenametostore, fopen($file, 'r+'), 'public');

        if ($storeImage) {
            return [
                'success' => true,
                'message' => 'Failed to upload the image',
                'url' => $filenametostore
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to upload the image',
                'url' => ''
            ];
        }
    }
}
