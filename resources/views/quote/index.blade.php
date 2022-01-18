@extends('layouts.default')
@section('content')
<!-- Register page Html start here -->
<section class="signup-step-container">
	<div class="wizard">
		<div class="wizard-inner text-center">
			<img src="/img/user_img.png" alt="" />
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Step 1</i></a>
				</li>
			</ul>
		</div>

		<form role="form" action="{{route('quotestart')}}" method="post">
			@csrf
			<div class="tab-content" id="main_form">
				<div class="tab-pane active" role="tabpanel" id="step1">
					<div class="text-center head_box">
						<h2>Hi. I’m Hermela with <img class="logo_step" src="/img/logo.png" alt="" />.</h2>
						<p>I’m here to make your EV charger installation easy. Please tell me the type of EV charger installation.</p>
					</div>
					<div class="radio_box">
						<div class="custom-control custom-radio custm_radio">
						  <input type="radio" id="customRadio1" name="quote" class="custom-control-input" value="Commercial">
						  <label class="custom-control-label" for="customRadio1">Commercial</label>
						</div>
						<div class="custom-control custom-radio custm_radio">
						  <input type="radio" id="customRadio2" name="quote" class="custom-control-input" value="Residential">
						  <label class="custom-control-label" for="customRadio2">Residential</label>
						</div>
					</div>
					<ul class="list-inline">
						<li><button type="submit" class="default-btn next-step">Next</button></li>
					</ul>
				</div>
				
				<div class="clearfix"></div>
			</div>
			
		</form>
	</div>
</section>
@endsection
@section('scripts')
<script>
// ------------step-wizard-------------
$(document).ready(function () {
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
});

</script>
@parent

@endsection