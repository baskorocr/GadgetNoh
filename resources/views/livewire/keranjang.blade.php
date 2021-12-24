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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Gambar</td>
                            <td>Nama</td>
                            <td>Limited Edition</td>
                            <td>Jumlah</td>
                            <td>Warna</td>
                            <td>Model</td>
                            <td><strong>Total Harga</strong></td>
                          
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse($pesanan_detail as $pesanan_details)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>
                                <img src="{{ url('asset/product')}}/{{$pesanan_details->product->gambar}}" alt="" class="img-fluid" width="200">
                            </td>
                            <td>
                                {{$pesanan_details->product->nama}}
                                <br>

                                <a href="{{url('hapus')}}/{{$pesanan_details->id}}" type="button" class="btn btn-danger">hapus</a>
                            </td>
                            <td>
                               <?php 
                            
                                if(!$pesanan_details->limitededition)
                                {
                                    echo "NO";
                                }
                                else {
                                    echo "YES";
                                }
                               
                               ?>
                            </td>
                            <td>
                                {{$pesanan_details->jumlah_pesanan}}
                            </td>
                            <td>
                                {{$pesanan_details->warna}}
                            </td>
                            <td>
                                {{$pesanan_details->model}}
                            </td>
                            <td><strong>
                                Rp.  {{number_format($pesanan_details->total_harga)}}
                            </strong>
                             
                            </td>
                            
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse
                        @if($pesanan != null)
                        <tr>
                            <td colspan="7" align="right">
                               <strong>Total Harga :
                               </strong>
                            </td>
                            <td colspan="7">
                                <strong>Rp. {{number_format($pesanan->total_harga)}} 
                                </strong>
                             </td>

                         </tr>
                         <tr>
                            <td colspan="7" align="right">
                               <strong>Kode Unik :
                               </strong>
                            </td>
                            <td colspan="7">
                                <strong>Rp. {{number_format($pesanan->kode_unik)}} 
                                </strong>
                             </td>

                         </tr>
                         <tr>
                            <td colspan="7" align="right">
                               <strong>Total Bayar :
                               </strong>
                            </td>
                            <td colspan="7">
                                <strong>Rp. {{number_format($pesanan->kode_unik+$pesanan->total_harga)}} 
                                </strong>
                             </td>

                         </tr>
                         <tr>
                            <td colspan="6">
                                 
                             </td>
                            <td colspan="6" align="right" class="">
                                <a href="{{ route ('checkout') }}" type="button" class="btn button1">Check Out</a>
                            </td>
                           
                         </tr>
                         @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

