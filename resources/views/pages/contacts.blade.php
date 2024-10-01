@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contacts.css') }}">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')

    <!-- Contact Us Section -->
<div class="content">
    <div class="title_box">
        <div class="contact_title">Contact Us</div>
    </div>

    <p>Have questions or need assistance? Feel free to reach out to us using the contact information below or by filling out the contact form.</p>

    <div class="contact-section">
        <h3>Customer Support:</h3>
        <p>Email: support@dibsonbids.com</p>
    </div>

    <div class="contact-section">
        <h3>Business Inquiries:</h3>
        <p>Email: business@dibsonbids.com</p>
    </div>

    <div class="contact-section">
        <h3>Payment Problems:</h3>
        <p>Email: payments@dibsonbids.com</p>
    </div>

    <p>We value your feedback and look forward to hearing from you. Thank you for choosing DibsOnBids!</p>
    <br><br><br><br><br>

</div>

@yield('bottom-sidebar')
