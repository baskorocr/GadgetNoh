<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', \App\Http\Livewire\Home::class)->name('home');
Route::get('/products', \App\Http\Livewire\ProductIndex::class)->name('products');
Route::get('/products/brand/{brandsId}', \App\Http\Livewire\ProductBrand::class)->name('products.brand');
Route::get('/products/{Id}', \App\Http\Livewire\ProductDetail::class)->name('products.detail');
Route::get('keranjang', \App\Http\Livewire\Keranjang::class)->name('keranjang');
Route::get('hapus/{Id}', [\App\Http\Livewire\Keranjang::class, 'destroy']);
Route::get('checkout', \App\Http\Livewire\Checkout::class)->name('checkout');
Route::get('history', \App\Http\Livewire\History::class)->name('history');

