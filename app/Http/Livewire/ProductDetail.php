<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Livewire\Component;


class ProductDetail extends Component
{

    public $product, $warna, $jumlah_pesanan, $model;
    public function mount($Id){
        $productDetail = Product::find($Id);
        if($productDetail){
            $this->product = $productDetail;
        }
    }

    public function masukkanKeranjang()
    {
        $this->validate([
            'jumlah_pesanan' => 'required'
        ]);
        
        if(!Auth::user()) {
            return redirect()->route('login');
        }
    }
    public function render()
    {
        return view('livewire.product-detail')
        ->extends('layouts.app')
        ->section('content');
    }
}
