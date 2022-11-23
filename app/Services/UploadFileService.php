<?php

namespace App\Services;

class UploadFileService
{
    /**
     * storage_image
     *
     * @param  mixed $request_img
     * @return string
     */
    public static function storage_image($request_img): string
    {
        $img_name = $request_img->hashName();
        $image = $request_img->storeAs('/images', $img_name);
        return $image;
    }
}
