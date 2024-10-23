<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Set;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->query('type')) {
            $productTypeId = ProductType::where('name', $request->get('type'))->firstOrFail();
            $products = Product::where('product_type_id', $productTypeId->id)->get();
        }
        else if ($request->query('set')) {
            $set = Set::where('name', $request->get('set'))->firstOrFail();
            $products = Product::where('set_id', $set->id)->get();
        }
        else $products = Product::all();

        return ProductResource::collection($products);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
