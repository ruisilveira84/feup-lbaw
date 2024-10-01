@push('styles')
    <link rel="stylesheet" href="{{ asset('css/createauction.css') }}">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')

<div class="container">
    <h1>Auction Create</h1>
    
    <div class="auction-create">
        <form id="auctionForm" method="POST" action="{{ route('createauction') }}">
            @csrf

            <!-- Campos de entrada -->
            <div class="form-group">
                <label for="item_name"><strong>Item Name:</strong></label>
                <input type="text" id="item_name" name="item_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="item_type"><strong>Item Type:</strong></label>
                <select id="item_type" name="item_type" class="form-control" required>
                <option value="antiques">Antiques</option>
                <option value="art">Art</option>
                <option value="collectibles">Collectibles</option>
                <option value="electronics">Electronics</option>
                <option value="jewelry">Jewelry</option>
                <option value="memorabilia">Memorabilia</option>
                <option value="vehicles">Vehicles</option>
                <option value="clothes">Clothes</option>
                <option value="books">Books</option>
                <option value="other">Other</option>
            </select>

            <div class="form-group">
                <label for="description"><strong>Description:</strong></label>
                <textarea id="description" name="description" class="form-control" rows="4" style="resize: none;" required></textarea>
            </div>

            <div class="form-group">
                <label for="initial_bid"><strong>Initial Bid:</strong></label>
                <input type="number" id="initial_bid" name="initial_bid" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="final_date"><strong>Final Date:</strong></label>
                <input type="datetime-local" id="final_date" name="final_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="shipping"><strong>Shipping:</strong></label>
                <input type="text" id="shipping" name="shipping" class="form-control" required>
            </div>

            <!-- Campos ocultos para armazenar valores específicos -->
            <input type="hidden" id="current_bid" name="current_bid">
            <input type="hidden" id="seller" name="seller">
            <input type="hidden" id="status" name="status">
            <input type="hidden" id="initial_date" name="initial_date">

            <!-- Botões -->
            <button type="submit" class="btn btn-primary">Create Auction</button>
            @error('submit')
            <a style="text-decoration:none" href="{{ url('/profile') }}"><p style="color:red"><strong>{{ $message }}</strong></p></a>
            @enderror
    </div>

</div>

@yield('bottom-sidebar')

