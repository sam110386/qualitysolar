@extends('layouts.dealer')
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


		<div class="tab-content" id="main_form">
			<div class="tab-pane active" role="tabpanel" id="step15">
				<div class="text-center head_box thnku_box">
					<h2>Thank you for choosing Vehya.</h2>
				</div>
				<p class="text-center thnku_txt">We look forward to working with you. <br />We will check your application and will update you after approval! </p>
			</div>
			<div class="clearfix"></div>
		</div>


	</div>
</section>
@endsection
@section('scripts')
@parent
@endsection