<?php

namespace App\Http\Livewire;

use Livewire\Component;

class History extends Component
{
    public function render()
    {
        return view('livewire.history')->extends('layouts.app')->section('content');
    }
}
