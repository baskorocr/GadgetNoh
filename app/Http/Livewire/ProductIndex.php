<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductIndex extends Component
{
   public $search;
   protected $updateQueryString = ['search'];
    public function render()
     {
        if($this->search){
            $products = Product::where('nama','like', '%'.$this->search.'%')->paginate(8);
        return view('livewire.product-index',[
            'products' => $products
        ])
        ->extends('layouts.app')
        ->section('content');
        }
        else{
            $products = Product::paginate(8);
        return view('livewire.product-index',[
            'products' => $products
        ])
        ->extends('layouts.app')
        ->section('content');
        }
        
    }
}
