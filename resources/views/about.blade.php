@extends('layouts.default')
@section('content')
<section class="banner_sec about-bnr">
	<div class="container text-center">
		<div class="banner_text ">
			<h2 class="white_text head_h1">At Vehya we are Committed to WorkforceDevelopment, EV Infrastructure,
				and a Carbon Neutral Future."</h2>

		</div>
	</div>
</section>

<section class="fleet_sec">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
			</div>
			<div class="col-md-6">
				<div class="workTxt">
					<h2 class="black_text head_h2 russo_font aboutHeading">EV fleet</h2>
					<p> We plan to maintain 90% EVs across Vehya’s fleet, with 100% EV adoption by no later than 2030.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="carbon_sec text-center">
	<div class="container">
		<h2 class="black_text head_h2 russo_font mb-4 aboutHeading">Carbon-Neutral Future</h2>
	</div>
	<div class="img-100">
		<img src="/img/about5.png" alt="" />
	</div>
	<div class="container">
		<p> Creating a carbon-neutral future is at the heart of Vehya’s purposes.<br /> Here are just a few of the steps we’re taking toward that future:</p>
	</div>
</section>

<section class="workforce_sec">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="workTxt">
					<h2 class="black_text head_h2 russo_font aboutHeading">Workforce Development</h2>
					<p>Vehya is committed to maintaining the current electricalworkforce and building the next generation of electricians. We pledge to creating 100,000 electrical professionals by 2030.</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="workImg">
					<img src="/img/about4.png" alt="" />
					<a href="#" class="btn">SEE DELONTE'S STORY</a>
				</div>
			</div>
		</div>
	</div>
</section>




<section class="meet_sec">
	<div class="container text-center">
		<h2 class="black_text head_h2 russo_font mb-4 aboutHeading">Meet our Team</h2>
	</div>
	<div class="img-100">
		<img src="/img/about7.png" alt="" />
	</div>
	<div class="container text-center">
		<div class="row">
			<div class="col-md-6">
				<div class="meet-box">
					<img src="/img/about8.png" alt="" />
					<div class="meetName">
						<span class="btn">WILLIAM<br /> FOUNDER & CEO</span>
					</div>
					<a href="https://www.linkedin.com/in/williammccoyii/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="meet-box">
					<img src="/img/about9.png" alt="" />
					<div class="meetName">
						<span class="btn">HERMELA <br /> OPERATIONS MANAGER</span>
					</div>
					<a href="https://www.linkedin.com/in/hermela-abraham-1a9507158/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="education_sec">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="workTxt">
					<h2 class="black_text head_h2 russo_font aboutHeading">Education</h2>
					<p> Through the Vehya website, app, and with every install, we educate our customers and workforce on the advantages of a carbon-neutral future.</p>
				</div>
			</div>
			<div class="col-md-6">
			</div>
		</div>
	</div>
</section>
<section class="about-sec padd_b60">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="aboutImg">
					<img src="/img/about2.png" alt="" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="aboutTxt">
					<h1 class="white_text head_h1 aboutHeading">EV Infrastructure </h1>
					<p>Infrastructure is key to mass electric vehicle adoption. With every charger installed Vehya is making it easier to own an EV.</p>
				</div>
			</div>

		</div>
	</div>
</section>
<section class="partner_sec">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			</div>
			<div class="col-md-6">
				<div class="workTxt">
					<h2 class="black_text head_h2 russo_font aboutHeading">Partnerships</h2>
					<p>We value our partners and want work with people who believe in a carbon-neutral future.</p>
					<a href="#" class="btn mt-5">BECOME A PARTNER</a>
				</div>
			</div>

		</div>
	</div>
</section>
@endsection
@section('scripts')
<script>
	$(document).ready(function() {
		$(".see_more").click(function() {

			$(this).siblings('.price_tble').toggleClass("show_table");
			if ($(".price_tble").hasClass("show_table")) {
				$(this).text("See Less");
			} else {
				$(this).text("See More");
			};
		});
	});
</script>
@parent

@endsection