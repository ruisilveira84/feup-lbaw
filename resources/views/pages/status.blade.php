@push('styles')
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')

<div class="container">
    <h1>{{ ucfirst($status) }} Auctions</h1>
    <div class="auctions-grid">
        @forelse($auctions as $auction)
            <div class='auction-box'>
                <h3><strong>{{ $auction->item->item_name }}</strong></h3>
                <p>Current Bid: ${{ number_format($auction->current_bid, 2) }}</p>
                <p>Initial Date: {{ $auction->initial_date }}</p>
                <p>Final Date: {{ $auction->final_date }}</p>
                <p>Status: <span class="{{ 'status-' . $auction->status }}">{{ ucfirst($auction->status) }}</span></p>
                <a class="btn btn-primary" href="{{ route('showauction', $auction->auction_id) }}">Place Bid</a>
            </div>
        @empty
            <p>No {{ $status }} auctions available at the moment.</p>
        @endforelse
    </div>
</div>

@yield('bottom-sidebar')
