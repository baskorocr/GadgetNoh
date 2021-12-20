<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;

class ProductIndex extends Component
{
   public $search;
   protected $updateQueryString = ['search'];
   public function updatingSearch(){
    $this->reset();
    }

    public function render()
     {
        if($this->search){
            $products = Product::where('nama','like', '%'.$this->search.'%')->paginate(8);
        return view('livewire.product-index',[
            'products' => $products,
            'title' => 'All Product'
        ])
        ->extends('layouts.app')
        ->section('content');
        }
        else{
            $products = Product::paginate(8);
        return view('livewire.product-index',[
            'products' => $products,
            'title' => 'All Product'
        ])
        ->extends('layouts.app')
        ->section('content');
        }
        
    }
}
