@push('styles')
    <link rel="stylesheet" href="{{ asset('css/tos.css' )}} ">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')
    
<!-- Terms of Service Section -->
<div class="content">
    <div class="title_box">
        <div class="terms_title">Terms of Service</div>
    </div>

    <div class="terms-section">
        <h3>1. User Accounts</h3>
        <p>Users must be 18 years or older to create an account. You are responsible for maintaining the security of your account and password. DibsOnBids cannot and will not be liable for any loss or damage from your failure to comply with this security obligation.</p>
    </div>

    <div class="terms-section">
        <h3>2. Auctions</h3>
        <p>All auctions are subject to a starting minimum bid. Each bid placed must follow the minimum increment as set out for the auction. Winning bidders are expected to pay the full amount bid for the item purchased.</p>
    </div>

    <div class="terms-section">
        <h3>3. Payment</h3>
        <p>Payment for won auctions must be made within a set period. Failure to complete payment may result in account suspension and other penalties.</p>
    </div>

    <div class="terms-section">
        <h3>4. Prohibited Use</h3>
        <p>You may not use the site to conduct illegal activities or violate any laws in your jurisdiction.</p>
    </div>

    <div class="terms-section">
        <h3>5. Limitation of Liability</h3>
        <p>DibsOnBids is not responsible for any damages that may arise from using the site. This includes but is not limited to direct, indirect, incidental, punitive, and consequential damages.</p>
    </div>

    <div class="terms-section">
        <h3>6. Changes to Terms</h3>
        <p>We reserve the right to modify these terms at any time. Your decision to continue to visit and make use of the site after such changes have been made constitutes your formal acceptance of the new Terms of Service.</p>
    </div>

    <p>If you require any more information or have any questions about our Terms of Service, please feel free to contact us by email at support@dibsonbids.com.</p>

    <p>By using this website, you agree to the terms mentioned above.</p>
    <br><br><br><br><br>
</div>

@yield('bottom-sidebar')
