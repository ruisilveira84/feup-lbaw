@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auctions.css')}}">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')

<div class="container">
    <h1>Auction Details</h1>
    <div class="auction-details">
        <p><strong>Item Name:</strong> {{ $item->item_name }}</p>
        <p><strong>Item Type:</strong> {{ ucfirst($item->kind) }}</p>
        <p><strong>Description:</strong> {{ $item->description }}</p>
        <p><strong>Status:</strong>
            <span class="{{ 'status-' . $auction->status }}">{{ ucfirst($auction->status) }}</span>
        </p><br>

        <p><strong>Initial Bid:</strong> ${{ number_format($auction->initial_bid, 2) }}</p>
        <p><strong>Current Bid:</strong> ${{ number_format($auction->current_bid, 2) }}</p><br>

        <p><strong>Seller:</strong> {{ $seller->username }}</p>
        <p><strong>Shipping:</strong> {{ $item->shipping }}</p><br>

        <p><strong>Initial Date:</strong> {{ $auction->initial_date }}</p>
        <p><strong>Final Date:</strong> {{ $auction->final_date }}</p><br><br>

        @auth
        @if (!auth()->user()->isAdmin() && auth()->user()->user_id != $auction->bidder_seller_id)  
        <form method="post" action="{{ route('bid', ['id' => $auction->auction_id]) }}">
            @csrf
            <label for="amount"><strong>Bid Amount:</strong></label>
            <input id="amount" type="number" step="0.01" required="required" min="{{ $auction->current_bid + 0.01 }}" name="amount"><br><br>
            <!-- Checkbox to use credit -->
            <div class="use-credit-section">
                <label for="use_credit">Use Credit (Available: ${{ number_format(auth()->user()->credit, 2) }}):</label>
                <input id="use_credit" type="checkbox" name="use_credit">
            </div><br>
            @error('amount')
            <a style="text-decoration:none" href="{{ url('/profile') }}"><p style="color:red"><strong>{{ $message }}</strong></p></a>
            @enderror
            @error('ownauction')
            <p style="color:red"><strong>{{ $message }}</strong></p>
            @enderror
            @if (session('bid_success'))
            <p style="color:green"><strong>{{ session('bid_success') }}</strong></p>
            @endif
            <input type="submit" value="Place Bid" class="btn-place-bid">
        </form>
        @endif
        @endauth

    </div>
</div>

@yield('bottom-sidebar')