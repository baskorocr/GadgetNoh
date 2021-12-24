<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;

class Keranjang extends Component
{
    protected $pesanan;
    protected $pesanan_detail = [];

    public function cek(){
        if(!Auth::user()) {
            return redirect()->route('login');
        }
        else{
            $this->pesanan =  Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($this->pesanan){
            $this->pesanan_detail = PesananDetail::where('pesanan_id',$this->pesanan->id)->get();
            
        }
            
        }
    }
   
    public function render()
    {
       $this->cek();  
        
        return view('livewire.keranjang',[
            'pesanan'=> $this->pesanan,
            'pesanan_detail'=>$this->pesanan_detail]) ->extends('layouts.app')->section('content');
        
    }
}
