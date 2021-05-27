<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::orderBy('created_at', 'DESC')->simplePaginate(10);

        return view('backend.product.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|min:3',
            'article_num' => 'required',
            'description' => 'min:10',
            'image' => 'mimes:jpg,jpeg,bmp,png,gif'
        ]);

        $product = new Product([
            'name' => $request['name'],
            'article_number' => $request['article_num'],
            'description' => $request['description'],
        ]);

        $product->save();

         if ($request->image) {
            $this->saveImages($request->image, $product->id);
        }

        return redirect('/admin/products/' . $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.product.single', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function saveImages($imageInput, $product_id) {
        $image = Image::make($imageInput);
        $width = $image->width();
        $height = $image->height();

        // save resized images at /images/products/
        Image::make($imageInput)->resize(1920, 1080, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path() . '/images/products/' . $product_id . '_full.jpg');

        Image::make($imageInput)->resize(1024, 768, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path() . '/images/products/' . $product_id . '_medium.jpg');

        Image::make($imageInput)->resize(640, 480, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path() . '/images/products/' . $product_id . '_small.jpg');

        Image::make($imageInput)->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path() . '/images/products/' . $product_id . '_thumb.jpg');

        // save image pfad to image table
        DB::table('images')->insert([
            
        ]);
    }

    public function deleteImages($product_id){
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
