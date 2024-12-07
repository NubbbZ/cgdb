<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('pages.homepage'); })->name('homepage');

Route::get('/products', function () { return view('pages.products', ['products' => App\Models\Product::all()]); })->name('products');
Route::get('/products/{product_id}', function (int $product_id) { return view('pages.product', ['product' => App\Models\Product::findorfail($product_id)]); })->name('product');

Route::get('/sets', function () { return view('pages.sets', ['sets' => App\Models\Set::all()]); })->name('sets');
Route::get('/sets/{set_id}', function (int $set_id) { return view('pages.set', ['set' => App\Models\Set::findorfail($set_id)]); })->name('set');

Route::get('/cards', function () { return view('pages.cards', ['cards' => App\Models\Card::all()]); })->name('cards');
Route::get('/cards/{card_id}', function (int $card_id) { return view('pages.card', ['card' => App\Models\Card::findorfail($card_id)]); })->name('card');