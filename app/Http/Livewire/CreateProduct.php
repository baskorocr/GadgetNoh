<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\Brand;
use Livewire\Component;
use Livewire\Request;

class CreateProduct extends Component
{
    public $nama,$harga,$harga_le,$jenis,$gambar,$brand;
    public function render()
    {
        return view('livewire.create-product',[
            'brands' => Brand::all()])
        ->extends('layouts.app')->section('content');
    }

    public function store(Request $request)
    {
        Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'harga_limitededition' => $request->harga_le,
            'is_ready' => 1,
            'jenis' => $request->jenis,
            'gambar' => $request->gambar,
            'brand_id' => $request->brand
        ]);
        
        session()->flash('message', 'Sukses masuk Database');
        return redirect()->back();
    }
}
