@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')

<div id="auctions">
    @foreach ($auctions as $auction)
        <div class='auction-box'>
            <p><strong>{{ $auction->item->item_name }}</strong></p>
            <p>Current Bid: ${{ $auction->current_bid }}</p>
            <p>Final Date: {{ $auction->final_date }}</p>
            <p>Status: <span style="color:green;">Active</span></p>
            <a href="{{ url("/auction/" . $auction->auction_id) }}"><button>Place Bid</button></a>
        </div>
    @endforeach
</div>

<!-- Trending Products Section -->
<div id="trending-section">
    <h2>Explore Popular Categories</h2>
    <div class="trending-categories">
        @foreach ($categories as $category)
        <a href="{{ route('category.show', $category) }}" class="category-item">{{ ucfirst($category) }}</a>
        @endforeach
    </div>
</div>

<!-- Status -->
<div id="trending-section">
    <h2>Auction Status</h2>
    <div class="trending-categories">
        @foreach (["active", "completed", "cancelled"] as $statu)
            <a href="{{ route('status', ['status' => $statu]) }}" class="category-item">{{ ucfirst($statu) }}</a>
        @endforeach
    </div>
</div>


@yield('bottom-sidebar')
