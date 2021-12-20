<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brand;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.navbar',[
            'brands' => Brand::all()
        ]);
    }
}
