<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('sets', App\Http\Controllers\SetController::class);
Route::apiResource('cards', App\Http\Controllers\CardController::class);
Route::apiResource('products', App\Http\Controllers\ProductController::class);