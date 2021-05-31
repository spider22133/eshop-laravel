<?php
use Intervention\Image\Facades\Image as ImgInv;

if(! function_exists('saveImages')) {
    function saveImages($imageInput, $product_id) {
        $image = ImgInv::make($imageInput);
        $width = $image->width();
        $height = $image->height();

        // save resized images at /images/products/
        ImgInv::make($imageInput)->resize(1920, 1080, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path() . '/images/products/' . $product_id . '_full.jpg');

        ImgInv::make($imageInput)->resize(1024, 768, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path() . '/images/products/' . $product_id . '_medium.jpg');

        ImgInv::make($imageInput)->resize(640, 480, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path() . '/images/products/' . $product_id . '_small.jpg');

        ImgInv::make($imageInput)->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path() . '/images/products/' . $product_id . '_thumb.jpg');

        // save image pfad to image table
        // DB::table('images')->insert([

        // ]);
    }
}

if(! function_exists('deleteImages')) {
    function deleteImages($product_id){
        if (file_exists(public_path() . '/images/products/' . $product_id . '_thumb.jpg'))
        unlink(public_path() . '/images/products/' . $product_id . '_thumb.jpg');
        if (file_exists(public_path() . '/images/products/' . $product_id . '_full.jpg'))
        unlink(public_path() . '/images/products/' . $product_id . '_full.jpg');
        if (file_exists(public_path() . '/images/products/' . $product_id . '_medium.jpg'))
        unlink(public_path() . '/images/products/' . $product_id . '_full.jpg');
        if (file_exists(public_path() . '/images/products/' . $product_id . '_small.jpg'))
        unlink(public_path() . '/images/products/' . $product_id . '_full.jpg');

        return back();
    }
}
