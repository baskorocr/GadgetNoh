<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductIndex extends Component
{
   

    public function render(Request $request)
     {
        if($request->has('search')){
            $products = Product::where('nama','like', '%'.$request->search.'%')->paginate(8);
        }
        else{
            $products = Product::paginate(8);
        }
        return view('livewire.product-index',[
            'products' => $products,
            'title' => 'All Product'
        ])
        ->extends('layouts.app')
        ->section('content');
        
    }
}
