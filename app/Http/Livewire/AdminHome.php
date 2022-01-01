<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class AdminHome extends Component
{
    public function destroy($Id){
        $p = Product::find($Id);
        $p->delete();
        session()->flash('message', 'Barang berhasil dihapus');
        return redirect()->back();
    }
    public function render()
    {
       
        
        return view('livewire.admin-home',[
            'products' => Product::all(),
        ])->extends('layouts.app')->section('content');
    }
}
