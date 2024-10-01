@push('styles')
    <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')

<!-- About Us Section -->
<div class="content">
    <div class="title_box">
        <div class="aboutus_title">About Us</div>
    </div>

    <p>Welcome to DibsOnBids, the online auction platform where the thrill of bidding meets a diverse array of unique items. At the core of DibsOnBids, we are dedicated to providing a unique and engaging auction experience for enthusiasts, collectors, and lovers of exclusive products.</p>

    <div class="aboutus-section">
        <h3>Who We Are:</h3>
        <p>We are a team passionate about connecting people to extraordinary items. At DibsOnBids, we believe that each object has a story to tell, and each bid is an opportunity to become a part of that narrative. Whether you are a seasoned auction veteran or someone exploring this exciting world for the first time, DibsOnBids is your destination to discover exclusive treasures.</p>
    </div>

    <div class="aboutus-section">
        <h3>What We Offer:</h3>
        <p>With a wide range of categories, from art and collectibles to vintage relics and modern rarities, DibsOnBids is your gateway to a world of discoveries. Our platform is designed to be intuitive and accessible, ensuring that all our users can participate in auctions with ease, whether through their computers or mobile devices.</p>
    </div>

    <div class="aboutus-section">
        <h3>Commitment to Quality:</h3>
        <p>At DibsOnBids, quality is our priority. We work tirelessly to ensure the authenticity and provenance of each listed item. Our sellers are carefully verified, providing our buyers with the confidence that they are acquiring quality and valuable products.</p>
    </div>

    <div class="aboutus-section">
        <h3>DibsOnBids Community:</h3>
        <p>Beyond the thrilling auctions, DibsOnBids is a vibrant community of enthusiasts who share common interests. Connect with other auction lovers, discuss fascinating items, and build bonds that go beyond the bids. We believe that a shared passion for unique items brings people together, and our community space reflects that spirit.</p>
    </div>

    <div class="aboutus-section">
        <h3>Commitment to Transparency:</h3>
        <p>At DibsOnBids, we value transparency in every transaction. Clear details about each item, bidding history, and payment policies are provided to ensure a fair and reliable experience for all users.</p>
    </div>

    <p>Explore, discover, and join the excitement of auctions at DibsOnBids. Whether you're a seller eager to find a new home for your special pieces or a buyer in search of something unique, we're here to make each auction an unforgettable experience. Join us at DibsOnBids - where every bid tells a story!</p>
    <br><br><br><br><br>

</div>

@yield('bottom-sidebar')
