<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $jumlah = 0;
    public $role = '';

    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang'
    ];
    

    public function mount()
    {
        if(Auth::user())
        {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            
            if($pesanan)
            {
                $this->jumlah = PesananDetail::where('pesanan_id',$pesanan->id)->count();
            }
          $roleUser = User::where('role', Auth::user()->role)->first();
          $this->role = $roleUser->role;
           
        }
        else{
            $this->role = 'guest';
        }
        
         
    }

    public function render()
    {

        return view('livewire.navbar',[
            
            'brands' => Brand::all(),
            'jumlah_pesanan' => $this->jumlah,
            'role' => $this->role,
         
        ]);
    }
}
