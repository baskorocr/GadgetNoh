<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{$title}}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="best-product container mt-5">
        <div class="uni row mt-5">
           <div class="judul container">
               <div class="row">
                   <div class="col">
                    <strong><h5>All Product</h5></strong>
                   </div>
                   <div class="col text-right z">
                    <form class="form-inline my-2 my-lg-0 d-flex justify-content-end" action='/products' method="GET">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Cari disini..." aria-label="Search">
                        
                      </form>
                   </div>
                   <div>
                       
                   </div>
               </div>
              
           </div>
           @foreach($products as $product)
           <div class="col-3">
              <div class="card mt-3 mb-3">
                 <div class="card-body text-center">
                    <img src="{{ url('asset/product')}}/{{$product->gambar}}" alt="" class="img-fluid">
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                       <center>
                          <p class="des">{{$product->nama}}</p>
                          <p class="harga">Rp. {{number_format($product->harga)}}</p>
                       </center>
                    </div>
                 </div>
                 <div class="row mt-2 mb-3">
                    <div class="col-md-12">
                    <center><a href="{{ route('products.detail', $product->id) }}" class="detail btn btn-primary btn-block">Detail</a></center>
                    </div>
                 </div>
              </div>
           </div>
           @endforeach
         
        </div>
     </div>
   
</div>
