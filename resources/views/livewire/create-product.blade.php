<div class="create container mt-4" style="width: 40%">
    <div class="row">
       <div class="judul container" >
           <center><strong><h5 style="padding-top: 3px">Tambah Barang</h5></strong></center>
       </div>
       <div class="col">
            <form action="{{url('addproduct')}}" method="post">
            @csrf
            <div class="form-group mt-3">
                <label>Nama Product</label>
                <input class="form-control" type="text" placeholder="Enter email" name="nama">
            </div>
            <div class="form-group mt-3">
                <label>Harga</label>
                <input class="form-control" type="text" placeholder="Enter email" name="harga">
            </div>
            <div class="form-group mt-3">
                <label>Harga Limited Edition</label>
                <input class="form-control" type="text" placeholder="Enter email" name="harga_le">
            </div>
            <div class="form-group mt-3">
                <label>Jenis</label>
                <input class="form-control" type="text" placeholder="Enter email" name="jenis">
            </div>
            <div class="form-group mt-3">
                <label>Berat</label>
                <input class="form-control" type="text" placeholder="Enter email" name="berat">
            </div>
            <div class="form-group mt-3">
                <label>Nama Gambar</label>
                <input class="form-control" type="text" placeholder="Enter email" name="gambar">
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