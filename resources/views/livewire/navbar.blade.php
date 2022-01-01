<div>
<nav class="navbar navbar-expand-md navbar-light bg-blue shadow-sm" id="nav">
            <div class="container">
                @if($role == 'admin')
                <a class="navbar-brand" style="color:black" href="{{ url('/admin/home') }}">
                    <strong>Gadget</strong>Noh
                </a>
                @else
                <a class="navbar-brand" style="color:black" href="{{ url('/') }}">
                    <strong>Gadget</strong>Noh
                </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if($role != 'admin')
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              List Product
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($brands as $brand)
                                <a class="dropdown-item" href="{{route('products.brand',$brand->id)}}">{{$brand->nama}}</a>
                                @endforeach
                              <a class="dropdown-item" href="{{ url('products') }}">All Product</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('history')}}" class="nav-link">History</a>
                        </li>
                    </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" style="color:black" href="{{route('keranjang')}}">
                                keranjang <i class="fas fa-shopping-cart"></i>
                            @if($jumlah_pesanan !==0)
                            <span class="badge badge-danger">{{$jumlah_pesanan}}</span>
                            @endif
                        </a>
                        </li>
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" style="color:black" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="color:black" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="color:black" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
</div>
