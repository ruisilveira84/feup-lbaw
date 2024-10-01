<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DibsOnBids') }}</title>
    
    <link href="{{ url('css/milligram.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/categories.css') }}" rel="stylesheet">
    
    @stack('styles') 
</head>
<body>
    <main class="{{ $hideHeader ?? '' ? 'header-hidden' : '' }}">
        @unless(isset($hideHeader))
            <header>
                @if (Auth::check())
                    <a class="button" href="{{ url('/logout') }}"> Logout </a> <span>{{ Auth::user()->name }}</span>
                @endif
            </header>
        @endunless

        <section id="content">
            @yield('content') 
        </section>
    </main>
</body>
</html>
