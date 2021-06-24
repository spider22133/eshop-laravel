<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Session::get('status');
        $products = Product::orderBy('created_at', 'DESC')->simplePaginate(6);
        $colored_products = $this->getColoredProductVariations($products);

        return view('frontend.product.catalog', [
            'products' => $products,
            'colored_products' => $colored_products,
            'status' => $status
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('frontend.product.single', ['product' => Product::findOrFail($id)]);
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


    public function getVarProductById($id)
    {
        $product = new ProductAttribute();
        return $product::findOrFail($id);
    }


    public function getColoredProductVariations($products) {
        $colored_products = collect([]);
        foreach ($products as $value) {
            $request = DB::table('product_attributes')
                ->join('product_attribute_combination', 'product_attributes.id', '=', 'product_attribute_combination.product_attribute_id')
                ->join('attributes', 'product_attribute_combination.attribute_id', '=', 'attributes.id')
                ->join('attribute_groups', 'attribute_groups.id', '=', 'attributes.id_attribute_group')
                ->where('product_attributes.product_id', $value->id)
                ->where('attribute_groups.is_color_group', 1)
                ->distinct()
                ->get(['product_attribute_combination.product_attribute_id', 'attributes.name', 'product_attributes.product_id', 'attributes.color', 'attributes.id']);


                $arr = [];
                foreach ($request->unique('name') as $item) {
                    $arr[] = $this->getVarProductById($item->product_attribute_id);
                }

                $colored_products->put($value->id, $arr);
        }

        return $colored_products;
    }
}
