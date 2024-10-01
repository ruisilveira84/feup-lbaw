@push('styles')
    <link rel="stylesheet" href="{{ asset('css/addcredit.css') }}">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')

<div class="container">
    <h2>Add Credit</h2>
    
    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add credit form --}}
    <form action="{{ route('user.add.credit') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="credit_amount">Amount to Add:</label>
            <input type="number" id="credit_amount" name="credit_amount" min="1" required><br>
            <button type="submit" class="btn btn-primary">Add Credit</button>
        </div>
    </form>
</div>

@yield('bottom-sidebar')