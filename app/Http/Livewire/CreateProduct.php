<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\Brand;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    public $nama,$harga,$harga_le,$jenis,$gambar,$brand,$stok;
    public function render()
    {
        return view('livewire.create-product',[
            'brands' => Brand::all()])
        ->extends('layouts.app')->section('content');
    }

    public function store(Request $request)
    {
        if($request->file('gambar')){
            $file = $request->file('gambar');
            $nama_file = str_replace(" ","", $file->getClientOriginalName());
            $file->move('asset\product',$nama_file);
            $request->gambar = $nama_file;
        }

        Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'harga_limitededition' => $request->harga_le,
            'is_ready' => $request->stok,
            'jenis' => $request->jenis,
            'gambar' => $request->gambar,
            'brand_id' => $request->brand
        ]);
        
        session()->flash('message', 'Sukses masuk Database');
        return redirect()->route('admin.product');
    }
}
