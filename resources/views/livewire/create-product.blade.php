<div class="create container mt-4" style="width: 40%">

    <div class="row">
       <div class="judul container" >
           <center><strong><h5 style="padding-top: 3px">Tambah Barang</h5></strong></center>
       </div>
       
       <div class="col">
            <form action="{{url('addproduct')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label>Nama Product</label>
                <input class="form-control" type="text" placeholder="Enter Name" name="nama">
            </div>
            <div class="form-group mt-3">
                <label>Harga</label>
                <input class="form-control" type="text" placeholder="" name="harga">
            </div>
            <div class="form-group mt-3">
                <label>Harga Limited Edition</label>
                <input class="form-control" type="text" placeholder="" name="harga_le">
            </div>
            <div class="form-group mt-3">
                <label>Stok Barang</label>
                <input class="form-control" type="text" placeholder="" name="stok">
            </div>
            <div class="form-group mt-3">
                <label>Jenis</label>
                <input class="form-control" type="text" placeholder="" name="jenis">
            </div>
            <div class="form-group mt-3">
                <label>Berat</label>
                <input class="form-control" type="text" placeholder="" name="berat">
            </div>
            <div class="form-group mt-3">
                <label>Upload Gambar</label>
                <input class="form-control" type="file" placeholder="" name="gambar">
            </div>
            <div class="form-group mt-3">
                <label>Merk</label>
                <select class="form-control" name="brand">
                    <option>--Pilih Merk--</option>
                    @foreach ($brands as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                    @endforeach
                  </select>
            </div>
            <center><button type="submit" class="btn btn-primary mb-3" style="background-color: rgb(105, 214, 203); text-color:white">SIMPAN</button></center>
            </form>
       </div>
    </div>
 </div>
 
 <div class="container">
    <div class="d-flex flex-row-reverse">
            <div class="p-2" style="float: right; margin-right:18%;">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message')}}
                </div>
                @endif
            </div>
        </div>
    </div> 
</div> 

 