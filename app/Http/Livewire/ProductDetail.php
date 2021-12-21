<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;



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

        if(!empty($this->model)) {
            $total_harga=$this->jumlah_pesanan*$this->product->harga+$this->product->harga_limitededition;
        }
        else {
            $total_harga=$this->jumlah_pesanan*$this->product->harga;
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($pesanan))
        {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999),
            ]);
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            $pesanan->kode_pemesanan = 'GN-'.$pesanan->id;
            $pesanan->update();
        }
        else {
            $pesanan->total_harga = $pesanan->total_harga+$total_harga;
            $pesanan->update();
        }
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'limited_edition' => $this->model ? true : false,
            'model' => $this->model,
            'warna' => $this->warna,
            'total_harga' => $total_harga
        ]);
        $this->emit('masukKeranjang');
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
