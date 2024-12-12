<?php

namespace App\Http\Controllers;

use App\Http\Resources\SetResource;
use App\Models\Set;
use Illuminate\Http\Request;

/**
 * @group Sets
 *
 * APIs for Sets 
 */
class SetController extends Controller
{
    /**
     * Get all sets
     */
    public function index()
    {
        return SetResource::collection(Set::all());
    }

    /**
     * Get the specified set
     */
    public function show(Set $set)
    {
        return new SetResource($set);
    }
}
