<?php

use Intervention\Image\Facades\Image as ImgInv;
use Illuminate\Support\Facades\DB;
use App\Models\Image;

if (!function_exists('saveImage')) {
    function saveImage($imageInput, $product_id, $variable = false)
    {



        foreach ($imageInput as $key => $image) {

            $image = ImgInv::make($image->getRealPath());
            $width = $image->width();
            $height = $image->height();
            $path = public_path() . '/images/products/' . $product_id . '_' . $key;

            if ($width > $height) {
                $image->orientate()->widen(1920)->save($path . '_full.jpg')
                    ->orientate()->widen(1024)->save($path . '_medium.jpg')
                    ->orientate()->widen(640)->save($path . '_small.jpg')
                    ->orientate()->widen(100)->save($path . '_thumb.jpg');
            } else {
                $image->orientate()->heighten(1080)->save($path . '_full.jpg')
                    ->orientate()->heighten(768)->save($path . '_medium.jpg')
                    ->orientate()->heighten(480)->save($path . '_small.jpg')
                    ->orientate()->heighten(100)->save($path . '_thumb.jpg');
            }

            if ($variable) {
                // save product variables image
                $image = Image::create([
                    'src' => [
                        'small' => '/images/products/' . $product_id . '_' . $key . '_full.jpg',
                        'medium' => '/images/products/' . $product_id . '_' . $key . '_medium.jpg',
                        'full' => '/images/products/' . $product_id . '_' . $key . '_small.jpg',
                        'thumb' => '/images/products/' . $product_id . '_' . $key . '_thumb.jpg'
                    ]
                ]);

                DB::table('product_attribute_images')->insert([
                    'product_attribute_id' => $product_id,
                    'image_id' => $image->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else {
                // save main product image
                DB::table('images')->insert([
                    'product_id' => $product_id,
                    'src' => json_encode([
                        'small' => '/images/products/' . $product_id . '_' . $key . '_full.jpg',
                        'medium' => '/images/products/' . $product_id . '_' . $key . '_medium.jpg',
                        'full' => '/images/products/' . $product_id . '_' . $key . '_small.jpg',
                        'thumb' => '/images/products/' . $product_id . '_' . $key . '_thumb.jpg'
                    ]),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}

if (!function_exists('deleteImages')) {
    function deleteImages($product_id)
    {
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
