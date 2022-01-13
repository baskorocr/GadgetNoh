<div class="container mt-2">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        History
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


    <div class="row mt-4">
        <div class="col">
        <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal Pesan</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Status</td>
                            <td><strong>Total Harga</strong></td>
                            <td></td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse($pesanans as $pesanan)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$pesanan->created_at}}</td>
                            <td>{{$pesanan->kode_pesanan}}</td>
                            <td>
                                <?php $pesanans_details = \App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->get();?>
                                @foreach($pesanans_details as $pesanan_detail)
                                     

                                        @if(empty($pesanan_detail->product->gambar))
                                            <img src="{{ url('asset/product/images.jpeg')}}" alt="" class="img-fluid" width="60">
                                            <p>Product Sudah tidak tersedia</p>
                                            <br> 
                                        @else
                                        <img src="{{ url('asset/product')}}/{{$pesanan_detail->product->gambar}}" alt="" class="img-fluid" width="60"> 
                                        {{$pesanan_detail->product->nama}}
                                        <br> 
                                        @endif
                                                                
                                @endforeach
                            </td>
                            <td>
                                @if($pesanan->status == 1)
                                Belum Lunas
                                @else
                                Lunas
                                @endif
                            </td>
                            <td> <Strong>Rp. {{number_format($pesanan->total_harga)}}</Strong> </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini :</p>
                    <div class="media">
                        <img class="mr-3" src="{{ url('asset/logo bank/bri.png') }}" alt="Bank BRI" width="120">
                        <div class="media-body">
                            <h6><strong>BANK BRI</strong></h6>
                            No. Rekening 1234-6742-3525-667 Atas Nama <strong>GadgetNoh</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>