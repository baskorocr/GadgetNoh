<div class="container">
<div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('products') }}">List Products</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Brands Detail
                    </li>
                </ol>
            </nav>
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
            <div class="col-md-6">
                <div class="card gambar-product">
                    <div class="card-body">
                        <img src="{{ url('asset/product')}}/{{$product->gambar}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2>
                    <strong>{{ $product->nama }}</strong>
                </h2> 
                <h4>Rp. {{ number_format ($product->harga) }} 
                    @if($product->is_ready == 1)
                        <span class="badge badge-success"> <i class="fas fa-check"></i>Ready Stock</span>
                        @else
                        <span class="badge badge-danger"> <i class="fas fa-times"></i>Stock Habis</span>
                        @endif
                </h4>
                <hr>
                <div class="row">
                    <div class="col">
                        <form wire:submit.prevent="masukkanKeranjang">
                        <table class="table" style="border-top : hidden">
                            <tr>
                                <td>Brand</td>
                                <td>:</td>
                                <td>
                                    <img src="{{ url('asset/brand')}}/{{$product->brand->gambar}}" alt="" class="img-fluid" width="50">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>{{ $product->jenis }}</td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td>:</td>
                                <td>{{ $product->berat }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>
                                <input id="jumlah_pesanan" 
                                    type="number" 
                                    class="form-control @error('jumlah_pesanan') is-invalid @enderror" 
                                    wire:model="jumlah_pesanan" 
                                    value="{{ old('jumlah_pesanan') }}" 
                                    required autocomplete="jumlah_pesanan"
                                    autofocus>
                                        @error('jumlah_pesanan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </td>
                            </tr>
                            @if($jumlah_pesanan > 1)
                            @else
                            <tr>
                                <td colspan="3"><strong>Limited Edition</td>
                            </tr>
                            <tr>
                                <td>Harga Limited Edition</td>
                                <td>:</td>
                                <td>Rp.{{ number_format($product->harga_limitededition) }}</td>
                            </tr>
                            <tr>
                            <td>Model</td>
                                <td>:</td>
                                <td>
                                <input id="model" 
                                    type="text" 
                                    class="form-control @error('model') is-invalid @enderror" 
                                    wire:model="model" 
                                    value="{{ old('model') }}" 
                                    autocomplete="model"
                                    autofocus>
                                        @error('model')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </td>
                            </tr>
                            <tr>
                            <td>Warna</td>
                                <td>:</td>
                                <td>
                                <input id="warna" 
                                    type="text" 
                                    class="form-control @error('warna') is-invalid @enderror" 
                                    wire:model="warna" 
                                    value="{{ old('warna') }}" 
                                    autocomplete="warna"
                                    autofocus>
                                        @error('warna')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </td>
                            </tr>
                            @endif
                            
                            
                            <tr>
                                <td colspan="3">
                                    <button class="btn btn-dark btn-block" @if($product->is_ready !== 1) disabled @endif type="submit"><i class="fas fa-shopping-cart"></i>Masukkan Keranjang</button>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
