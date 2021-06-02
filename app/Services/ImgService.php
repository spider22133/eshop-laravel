<?php
use Intervention\Image\Facades\Image as ImgInv;
use Illuminate\Support\Facades\DB;

if(! function_exists('saveImages')) {
    function saveImages($imageInput, $product_id) {
        $image = ImgInv::make($imageInput);

        $width = $image->width();
        $height = $image->height();

        if($width > $height){
            ImgInv::make($imageInput)
            ->orientate()->widen(1920)->save(public_path() . '/images/products/' . $product_id . '_full.jpg')
            ->orientate()->widen(1024)->save(public_path() . '/images/products/' . $product_id . '_medium.jpg')
            ->orientate()->widen(640)->save(public_path() . '/images/products/' . $product_id . '_small.jpg')
            ->orientate()->widen(100)->save(public_path() . '/images/products/' . $product_id . '_thumb.jpg');
        } else {
            ImgInv::make($imageInput)
            ->orientate()->heighten(1080)->save(public_path() . '/images/products/' . $product_id . '_full.jpg')
            ->orientate()->heighten(768)->save(public_path() . '/images/products/' . $product_id . '_medium.jpg')
            ->orientate()->heighten(480)->save(public_path() . '/images/products/' . $product_id . '_small.jpg')
            ->orientate()->heighten(100)->save(public_path() . '/images/products/' . $product_id . '_thumb.jpg');
        }

        // save image pfad to image table
        DB::table('images')->insert([
            'product_id' => $product_id,
            'src' => json_encode([
                'small' => '/images/products/' . $product_id . '_full.jpg',
                'medium' => '/images/products/' . $product_id . '_medium.jpg',
                'full' => '/images/products/' . $product_id . '_small.jpg',
                'thumb' => '/images/products/' . $product_id . '_thumb.jpg'
            ]),
            'created_at' => now(),
            'updated_at' => now()
        ]);
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
