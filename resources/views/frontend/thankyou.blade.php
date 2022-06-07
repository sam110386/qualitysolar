@extends('layouts.newhome')
@section('content')
<!-- Register page Html start here -->
<section class="signup-step-container mt-5">
    <div class="wizard">
        <section class="page-banner">
            <div class="auto-container">
                <div class="text-center head_box thnku_box">
                    <h2>Thank you for choosing Quality Solar.</h2>
                </div>
            </div>
        </section>

        <div class="tab-content" id="main_form">
            <div class="tab-pane active" role="tabpanel" id="step15">

                <div class="text-center quote_img"><img src="/img/thanku.png" alt="" /></div>
                <p class="text-center thnku_txt">We look forward to working with you. <br />One of representative will
                    call you shortly </p>
            </div>
            <div class="clearfix"></div>
        </div>


    </div>
</section>
@endsection
@section('scripts')
@parent
@endsection