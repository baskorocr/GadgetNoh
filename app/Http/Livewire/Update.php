<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;
use File;

class Update extends Component
{
    protected $product;

    public function mount($Id){
        $productDetail = Product::find($Id);
        if($productDetail){
            $this->product = $productDetail;
        }
    }

    public function update(Request $request){
        $product = Product::find($request->id);
        if($request->harga != null && $request->harga_le != null && $request->stok && $request->file('gambar') != null  ){
            $product->harga = $request->harga;
            $product->harga_limitededition = $request->harga_le;
            $product->is_ready = $request->stok;
            File::delete('asset/product/'.$product->gambar);
            $file = $request->file('gambar');
            $nama_file = str_replace(" ","", $file->getClientOriginalName());
            $file->move('asset\product',$nama_file);
            $request->gambar = $nama_file;
            $product->gambar = $request->gambar;
            $product->update();
        }
        elseif($request->harga_le != null){
            $product->harga_limitededition = $request->harga_le;
            $product->update();
        }
        elseif($request->stok != null){
            $product->is_ready = $request->stok;
            $product->update();
        }
        elseif($request->file('gambar') != null){
            File::delete('asset/product/'.$product->gambar);
            $file = $request->file('gambar');
            $nama_file = str_replace(" ","", $file->getClientOriginalName());
            $file->move('asset\product',$nama_file);
            $request->gambar = $nama_file;
            $product->gambar = $request->gambar;
            $product->update();
        }
        elseif($request->harga != null){
            $product->harga = $request->harga;
            $product->update();
        }

        session()->flash('message', 'Data Berhasil dirubah');
        return redirect()->route('admin.product');
       
    }
    public function render()
    {
        return view('livewire.update',[
            'product'=>$this->product
        ])->extends('layouts.app')
        ->section('content');;
    }
}
