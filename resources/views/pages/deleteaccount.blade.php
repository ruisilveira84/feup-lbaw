@push('styles')
    <link rel="stylesheet" href="{{ asset('css/deleteaccount.css') }}">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')

<div class="container">
    <p>This action cannot be undone. Are you sure you want to delete your account?</p>
    <form action="{{ route('delete.account') }}" method="POST">
        @csrf
        <button type="submit" class="btn-delete">Delete Account</button>
    </form>
</div>

@yield('bottom-sidebar')
