<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;

class ProductBrand extends Component
{
   public $search,$brands;
   protected $updateQueryString = ['search'];
   
  

   public function mount($brandsId){
       $brandsDetail = Brand::find($brandsId);
       if($brandsDetail){
           $this->brands = $brandsDetail;
       }
   }

    public function render()
     {
        if($this->search){
            $products = Product::where('brand_id',$this->brands->id)->where('nama','like', '%'.$this->search.'%')->paginate(8);
        return view('livewire.product-index',[
            'products' => $products,
            'title' => 'List Product '.$this->brands->nama
        ])
        ->extends('layouts.app')
        ->section('content');
        }
        else{
            $products = Product::where('brand_id',$this->brands->id)->paginate(8);
        return view('livewire.product-index',[
            'products' => $products,
            'title' => 'List Product '.$this->brands->nama
        ])
        ->extends('layouts.app')
        ->section('content');
        }
        
    }
}
