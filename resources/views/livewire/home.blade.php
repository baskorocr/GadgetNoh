<div class="container">
   {{--banner--}}
   <div id="carouselExampleIndicators" class="banner carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img class="d-block w-100" src="{{ url('asset/slider/3.jpg')}}" alt="First slide">
         </div>
         <div class="carousel-item">
            <img class="d-block w-100" src="{{ url('asset/slider/2.jpg')}}" alt="Second slide">
         </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
   
   {{--Best Brand--}}
   <div class="best-brand container">
      <div class="uni row mt-5">
         <div class="judul container">
            <strong><h5>Best Brand</h5></strong>
         </div>
         @foreach($brands as $brand)
         <div class="col">
            <a href="{{route('products.brand',$brand->id)}}">
            <div class="card mt-3 mb-3">
               <div class="card-body text-center">
                  <img src="{{ url('asset/brand')}}/{{$brand->gambar}}" alt="" class="img-fluid">
               </div>
            </div>
            </a>
         </div>
         @endforeach
      </div>
   </div>

   {{--Best Product--}}
   <div class="best-product container mt-5">
      <div class="uni row mt-5">
         <div class="judul container">
            <strong><h5>Best Product</h5></strong>
         </div>
         @foreach($products as $product)
         <div class="col">
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

   <div class="container">
      <div class="row mt-2">
         <div class="col">
         <center><a href="{{ url('products') }}" class="more">More Product...</a></center>
         </div>
      </div>
   </div>
</div>

