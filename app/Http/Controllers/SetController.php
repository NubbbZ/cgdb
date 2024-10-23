<?php

namespace App\Http\Controllers;

use App\Http\Resources\SetResource;
use App\Models\Set;
use Illuminate\Http\Request;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SetResource::collection(Set::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Set $set)
    {
        return new SetResource($set);
    }
}
