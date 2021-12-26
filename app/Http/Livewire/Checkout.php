<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;

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

        if(!empty($pesanan))
        {
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
