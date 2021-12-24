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

    public function destroy($Id){
        $p = PesananDetail::find($Id);
        $pesananDetail = $p->total_harga;
        $d = pesanan::find($p->pesanan_id);
        $d -> total_harga = $d ->total_harga - $pesananDetail;
        if($d->total_harga == 0)
        {
            $d->delete();
        }
        $d->update();
        $p->delete();

       
        return redirect(route('keranjang'));
        session()->flash('message','Pesanan Dihapus' );
       
    }

    public function cek(){
        if(!Auth::user()) {
            return redirect()->route('login');
        }
        else{
            $this->pesanan =  Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($this->pesanan != null){
            $this->pesanan_detail = PesananDetail::where('pesanan_id',$this->pesanan->id)->get();
            
        }
            
        }
    }
   
    public function render()
    {
       $this->cek();  
       
        
        return view('livewire.keranjang',[
            'pesanan'=> $this->pesanan,
            'pesanan_detail'=>$this->pesanan_detail,
          ]) ->extends('layouts.app')->section('content');
        
    }
}
