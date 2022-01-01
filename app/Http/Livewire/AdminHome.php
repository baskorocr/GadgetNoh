<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminHome extends Component
{
    public function render()
    {
        return view('livewire.admin-home',[
            'hello' => 'hello',
        ])->extends('layouts.app')->section('content');
    }
}
