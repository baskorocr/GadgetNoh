<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class ProductDetail extends Component
{

    public $product, $model, $jumlah_pesanan, $warna;
    public function mount($Id){
        $productDetail = Product::find($Id);
        if($productDetail){
            $this->product = $productDetail;
        }
    }

    public function store(Request $request)
    {
       
       
        $product = Product::find($request->id);

        if(!Auth::user()){
            return redirect()->route('login');
        }

        $request->validate([
            'jumlah_pesanan' => 'required'
        ]);
        if($request->jumlah_pesanan>1)
        {
            
            $total_harga = $request->jumlah_pesanan*$product->harga;
        }
        else{
            $total_harga = $request->jumlah_pesanan*($product->harga+$product->harga_limitededition);
        }
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($pesanan)){
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100,999)
            ]);
            $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
            $pesanan->kode_pesanan = 'GN-'.$pesanan->id;
            $pesanan->update();
        }
        else{
            $pesanan->total_harga = $pesanan->total_harga+$total_harga;
            $pesanan->update();
        }
        PesananDetail::create([
            'product_id' => $product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'limitededition' => $request->jumlah_pesanan <= 1 ? true : false,
            'model' => $request->model,
            'warna' => $request->warna,
            'total_harga' => $total_harga
        ]);
        
   
        session()->flash('message', 'Sukses masuk keranjang');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.product-detail')
        ->extends('layouts.app')
        ->section('content');
    }
}
