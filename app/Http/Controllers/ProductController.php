<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Set;
use Illuminate\Http\Request;

/**
 * @group Products
 *
 * APIs for products 
 */
class ProductController extends Controller
{
    /**
     * Get all products
     * 
     * Retrieve all products from the database.
     * 
     * If you include the `type` or `set` query parameter, it will return all products linked to the provided `type` or `set` query parameter.
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
     * Get the specified product
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
