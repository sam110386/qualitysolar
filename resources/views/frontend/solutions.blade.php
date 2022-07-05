@extends('layouts.newhome')
@section('content')

<section class="page-banner">
    <div class="auto-container">
        <h1>Our Services</h1>
    </div>
</section>

<section class="services-section-four default-theme">

    <div class="auto-container">
        <div class="upper-content">
            <div class="sec-title centered">
                <h2>A smarter way of solving the challenges</h2>
                <div class="subtitle">And For Controling Your Energy Production Worldwide</div>
                <div class="bottom-dots clearfix">
                    <span class="dot line-dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
            <div class="text">Residential, Commercial, Battery Storage - We can do the all. And right from the first
                time around. Each project is built directly exactly for your needs. No two solar installations are the
                same and we make sure you get the service you deserve.</div>
        </div>

        <div class="row clearfix">
            <!--Service Block-->
            <div class="service-block-five col-lg-6 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="0ms"
                data-wow-duration="2000ms"
                style="visibility: visible; animation-duration: 2000ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="/QualitySolar/program-image-1.jpg" alt=""></figure>
                        <div class="hover-box">
                            <div class="hover-inner">
                                <div class="content">

                                    <div class="link-box">
                                        <a href="#"><span class="txt">Read More</span> <span
                                                class="icon flaticon-arrows-11"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="title-box">
                        <div class="title-inner">
                            <div class="icon"><span class="flaticon-settings"></span></div>
                            <h3><a href="#">Residential Services</a></h3>
                        </div>
                    </div>
                </div>
            </div>

            <!--Service Block-->
            <div class="service-block-five col-lg-6 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="300ms"
                data-wow-duration="2000ms"
                style="visibility: visible; animation-duration: 2000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="/QualitySolar/program-image-2.jpg" alt=""></figure>
                        <div class="hover-box">
                            <div class="hover-inner">
                                <div class="content">
                                    <div class="link-box">
                                        <a href="#">
                                            <span class="txt">Read More</span>
                                            <span class="icon flaticon-arrows-11"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="title-box">
                        <div class="title-inner">
                            <div class="icon"><span class="flaticon-honeycomb"></span></div>
                            <h3><a href="#">Commercial Services</a></h3>
                        </div>
                    </div>
                </div>
            </div>

            <!--Service Block-->
            <div class="service-block-five col-lg-6 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="600ms"
                data-wow-duration="2000ms"
                style="visibility: visible; animation-duration: 2000ms; animation-delay: 600ms; animation-name: fadeInUp;">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="/QualitySolar/batter-solution.jpeg" alt=""></figure>
                        <div class="hover-box">
                            <div class="hover-inner">
                                <div class="content">
                                    <div class="link-box">
                                        <a href="#"><span class="txt">Read More</span> <span
                                                class="icon flaticon-arrows-11"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="title-box">
                        <div class="title-inner">
                            <div class="icon"><span class="flaticon-solar-energy-4"></span></div>
                            <h3><a href="#">Batteries</a></h3>
                        </div>
                    </div>
                </div>
            </div>

            <!--Service Block-->
            <div class="service-block-five col-lg-6 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="0ms"
                data-wow-duration="2000ms"
                style="visibility: visible; animation-duration: 2000ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="/QualitySolar/roof-top.jpg" alt=""></figure>
                        <div class="hover-box">
                            <div class="hover-inner">
                                <div class="content">

                                    <div class="link-box">
                                        <a href="#"><span class="txt">Read More</span> <span
                                                class="icon flaticon-arrows-11"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="title-box">
                        <div class="title-inner">
                            <div class="icon"><span class="flaticon-water-drop"></span></div>
                            <h3><a href="#">Detach/Reattach (Roof
                                    Replacement)</a></h3>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</section>
<!--Enquiry Section-->
@include('partials.newfrontend.enquiry')

@endsection
@section('scripts')
@parent

@endsection