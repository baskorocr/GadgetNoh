<div class="container mt-2">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Keranjang
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Checkout
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message')}}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route ('keranjang') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i>Kembali</a>

        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h4>Informasi Pembayaran</h4>
            <hr>
            <p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini sebesar : <strong> Rp. {{ number_format($total_harga) }}</strong></p>
            <div class="media">
                <img class="mr-3" src="{{ url('asset/logo bank/bri.png') }}" alt="Bank BRI" width="120">
                <div class="media-body">
                    <h6><strong>BANK BRI</strong></h6>
                    No. Rekening 1234-6742-3525-667 Atas Nama <strong>GadgetNoh</strong>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Informasi Pengiriman</h4>
            <hr>
            <form wire:submit.prevent="checkout">

                <div class="form-group">
                    <label for="">No. HP</label>
                    <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp" value="{{ old('nohp') }}" autocomplete="model" autofocus>
                    @error('nohp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea wire:model="alamat" class="form-control @error('nama') is-invalid @enderror"></textarea>

                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout </button>
            </form>
        </div>

    </div>
</div>