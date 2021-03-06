@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
    <style>
        .p{font-family: 'Times New Roman', Times, serif;

        font-size: 30px;
        color: rgb(0, 0, 0);
        
    }

        .z{border-radius: 10px; box-shadow: 2px 2px 9px 1px;
         padding: 5px; 
         width:450px;
        }
        .f{width: 400px;
        padding: 30px;}
        .a{text-decoration: none;  color: rgb(0, 0, 0)}
        .t{margin-bottom: 20px;}
        .btn{background-color: rgb(105, 214, 203);
        color: black;}
        .l{
            width: 450px;
        }
    </style>
</head>
<body>
   <div class="container d-flex justify-content-center mt-3">
       <p class="p">GadgetNoh</p>
</div>
@if(session()->has('message'))
<div class="container d-flex justify-content-center mb-2 l">
    <div class="col-md-12">
            <div class="alert alert-danger">
            {{ session('message')}}
        </div>
        
    </div>
</div>
@endif
<div class="container d-flex justify-content-center mt-2 mb-5 z" >
    
    <form class="f" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row align-items-start t">
            <div class="col">
              Masuk
            </div>
            <div class="col text-right">
              <a href="{{ route('register') }}" class="btn-btn-link a">Buat Akun</a> 
            </div>
        </div>
        
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Contoh: email@gmail.com</div>
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        
        <div class="row align-items-start t">
            <div class="col">
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                  </div>
              </div>
              <div class="col text-end"><a href="{{ route('password.request') }}" class="btn-btn-link a">{{ __('Forgot Your Password?') }}</a> </div>
            
        </div class="d-flex justify-content-center">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn"> {{ __('Login') }}</button>
        </div>
        
      </form>
</div>

</html>



@endsection
