@push('styles')
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')

<!-- FAQ Section -->
<div class="content">
    <div class="title_box">
        <div class="faq_title">FAQ</div>
    </div>

    <?php
    // Array of FAQ items (replace with your own questions and answers)
    // $faqList = [
    //     ['question' => 'How do I participate in an auction?', 'answer' => 'To participate in an auction, just click on the "Place Bid" button on the desired auction and follow the instructions to place your bid.'],
    //     ['question' => 'Can I cancel my bid in an auction?', 'answer' => 'Unfortunately, once a bid is made, it cannot be canceled. Make sure to review your decisions before placing a bid.'],
    //     ['question' => 'How can I check the status of my winning bid?', 'answer' => 'You will receive an email notification as soon as an auction is completed, informing you if you are the winner. Additionally, you can check the status in your user area.'],
    // ];

    // Loop through FAQ items and display them
    foreach ($faqList as $index => $faq) { ?>
        <div class="faq_box" onclick="toggleAnswer(<?=$index?>)">
            <div class="faq_item">
                <h3><?=$faq->question?></h3>
                <p class="faq_answer"><?=$faq->answer?></p>
            </div>
        </div>
    <?php } ?>
</div><br><br><br><br><br>

<script>
    function toggleAnswer(index) {
        var answer = document.getElementsByClassName("faq_answer")[index];
        answer.style.display = (answer.style.display === "block") ? "none" : "block";
    }
</script>

@yield('bottom-sidebar')