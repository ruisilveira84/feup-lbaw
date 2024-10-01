<!DOCTYPE html>
<html lang="en">
<head>
<title>DibsOnBids - Register</title>

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

</style>
</head>

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
                <div class="card-header bg-primary text-white">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-login">{{ __('Register') }}</button>
                            <button type="button" class="btn btn-register" onclick="window.location='{{ route('login') }}'">{{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


</html>
