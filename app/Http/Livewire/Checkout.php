<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Checkout extends Component
{
    public $total_harga, $nohp, $alamat;
    public function mount()
    {
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        $this->nohp = Auth::user()->nohp;
        $this->alamat = Auth::user()->alamat;

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesananDetail = PesananDetail::where('pesanan_id',$pesanan->id)->get();
        $user = User::where('id', Auth::user()->id)->first();

        if(!empty($pesanan))
        {
            $this->jumlah = $pesananDetail->count();
            $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik;
            
        }
        else {
            return redirect()->route('home');
        }
    }

    public function addcheckout(Request $request)
    {
        
            $request->validate([
            'nohp' => 'required',
            'alamat' => 'required'
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        $user->update();

        
        
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesananDetail = PesananDetail::where('pesanan_id',$pesanan->id)->get();
        foreach($pesananDetail as $pesananD){
            $product = Product::where('id',$pesananD->product_id)->first();
            $product->is_ready =  $product->is_ready -$pesananD->jumlah_pesanan;
            $product->update();

        }

            $this->jumlah = $pesananDetail->count();
            $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik;
            $response = Http::post('https://blast.phpku.dev/api/send.php?key=61a4f2f3dd20c5636b3cb83a287511dc45097c1a', [
                'nomor' => $user->nohp,
                'msg' => 
                'Hallo '.$user->name.'.

kamu memiliki '.$pesananDetail->count().' Pesanan yang harus dibayarkan segera, dengan total harga Rp.'.number_format($this->total_harga).'.

apabila sudah melakukan tranfer pembayaran, silakan konfirmasi dengan mengirim bukti transfer melalui nomer whatsapp ini.',
            ]);

       
      
     
       
        $pesanan->status = 1;
        $pesanan->update();


        session()->flash('message', "Sukses Checkout");

        return redirect()->route('history');
        
    }

    public function render()
    {
        return view('livewire.checkout')->extends('layouts.app')->section('content');
        
    }
}
