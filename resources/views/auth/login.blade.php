<!DOCTYPE html>
<html lang="en">
<head>
<title>DibsOnBids - Login</title>
</head>
</html>


@extends('layouts.app')

@section('content')


<style>

    .slidebar-auth {
        background-color: #007BFF;
        color: white;
        padding: 10px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        position: relative; 
        top: 0; 
    }

    .logo-button {
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
        outline: none;
        position: relative; 
    }

    .body {
        font-family: Arial, sans-serif;
        background-color: #007BFF; 
        margin: 0;
        padding: 0;
    }

</style>


<div class="slidebar-auth">
    <a href="{{ url('/') }}">
        <button class="logo-button">
            <img src="{{url('logo.png')}}" alt="DibsOnBids Logo" class="logo" style="max-width: 150px;">
        </button>
    </a>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action=""> 
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-login">{{ __('Login') }}</button>
                            <button type="button" class="btn btn-register" onclick="window.location='{{ route('register') }}'">{{ __('Register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
