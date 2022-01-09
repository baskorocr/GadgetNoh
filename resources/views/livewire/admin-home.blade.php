
<div class="container mt-2">

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
                                <td>Id Barang</td>
                                <td>Gambar</td>
                                <td>Nama</td>
                                <td>Harga</td>
                                <td>Jumlah barang</td>
                                <td>Update</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                
                                <td>{{$product->id}}</td>
                                <td>
                                    <img src="{{ url('asset/product')}}/{{$product->gambar}}" alt="" class="img-fluid" width="200">
                                </td>
                                <td>
                                    {{$product->nama}}<br>
                                    <a href="{{url('hapusItem')}}/{{$product->id}}" type="button" class="btn btn-danger">hapus</a>
                                </td>
                                <td>Rp.{{number_format($product->harga)}}</td>
                                <td>{{$product->is_ready}}</td>
                                <td><a href="{{url('edit')}}/{{$product->id}}" type="button" class="btn btn-primary">Update</a></td>
                               
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    
</div>
