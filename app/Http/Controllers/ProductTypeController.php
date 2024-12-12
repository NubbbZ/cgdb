<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductTypeResource;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    /**
     * Get all product types
     * 
     * @group Products
     */
    public function index()
    {
        return ProductTypeResource::collection(ProductType::all());
    }
}
