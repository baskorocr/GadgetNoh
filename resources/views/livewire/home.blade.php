<div class="container">
   {{--banner--}}
   <div class="banner">
      <img src="{{ url('asset/slider/3.jpg')}}" alt="">
   </div>
   
   {{--Best Brand--}}
   <div class="best-brand container">
      <div class="uni row mt-5">
         <div class="judul container">
            <strong><h5>Best Brand</h5></strong>
         </div>
         @foreach($brands as $brand)
         <div class="col">
            <div class="card mt-3 mb-3">
               <div class="card-body text-center">
                  <img src="{{ url('asset/brand')}}/{{$brand->gambar}}" alt="" class="img-fluid">
               </div>
            </div>
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
                     <center><a href="#" class="detail btn btn-primary btn-block">Detail</a></center>
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
         <center><a href="#" class="more">More Product...</a></center>
         </div>
      </div>
   </div>
</div>

