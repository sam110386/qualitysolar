@extends('layouts.newhome')
@section('content')

<section class="page-banner">
    <div class="auto-container">
        <h1>Get In Touch</h1>
    </div>
</section>
<section class="contact-section contact-page about-section-four">
    <div class="pattern-image-left"><img src="/QualitySolar/pattern-image-1.png" alt=""></div>
    <div class="pattern-image-right"><img src="/QualitySolar/pattern-image-2.png" alt=""></div>

    <div class="auto-container">
        <?php /*
        <div class="info-blocks">
            <div class="row clearfix">
                <!--Info Block-->
                <div class="info-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="0ms"
                    data-wow-duration="2000ms"
                    style="visibility: visible; animation-duration: 2000ms; animation-delay: 0ms; animation-name: fadeInUp;">
                    <div class="inner">
                        <div class="icon"><span class="fa fa-comment-dots fa-2x "></span></div>
                        <strong>Visit The Office</strong>
                        <ul class="info">
                            <li>102 Taily End Road, NY <br>Newyork 33034</li>
                        </ul>
                    </div>
                </div>
                <!--Info Block-->
                <div class="info-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="300ms"
                    data-wow-duration="2000ms"
                    style="visibility: visible; animation-duration: 2000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="inner">
                        <div class="icon"><span class="fa fa-phone fa-2x phone-icon-transform"></span></div>
                        <strong>Phone Inquiry</strong>
                        <ul class="info">
                            <li><a href="tel:+1-(222)-303-4500">+1 (222) 303 4500</a></li>
                            <li><a href="tel:0800-12345">0800 12345</a></li>
                        </ul>
                    </div>
                </div>
                <!--Info Block-->
                <div class="info-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="600ms"
                    data-wow-duration="2000ms"
                    style="visibility: visible; animation-duration: 2000ms; animation-delay: 600ms; animation-name: fadeInUp;">
                    <div class="inner">
                        <div class="icon"><span class="fa fa-envelope fa-2x "></span></div>
                        <strong>Send Email</strong>
                        <ul class="info">
                            <li><a href="mailto:info@qualitysolor.com">info@qualitysolor.com</a></li>
                            <li><a href="mailto:Support@qualitysolor.com">Support@qualitysolor.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        */ ?>
        <div class="content-box clearfix wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="2000ms"
            style="visibility: visible; animation-duration: 2000ms; animation-delay: 0ms; animation-name: fadeInUp;">
            <div class="form-box clearfix">
                <div class="sec-title title">
                    <h2>Don’t Hesitate To <br>Contact Us</h2>
                    <div class="bottom-dots clearfix">
                        <span class="dot line-dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                </div>
                <div class="default-form contact-form">
                    <form method="post" action="{{route('contact')}}" id="contact-form" novalidate="novalidate">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="name" placeholder="Your Name" required="">
                                @if($errors->has('name'))
                                <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email" required="">
                                @if($errors->has('email'))
                                <span class="help-block text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="subject" placeholder="Subject" required="">
                                @if($errors->has('subject'))
                                <span class="help-block text-danger">{{$errors->first('subject')}}</span>
                                @endif
                            </div>

                            <div class="col-md-12 col-sm-12 form-group">
                                <textarea name="message" placeholder="Message"></textarea>
                                @if($errors->has('message'))
                                <span class="help-block text-danger">{{$errors->first('message')}}</span>
                                @endif
                            </div>

                            <div class="col-md-12 col-sm-12 form-group">
                                <button type="submit" class="theme-btn btn-style-one">
                                    <div class="btn-title"><span class="btn-txt">Send Request</span><span
                                            class="btn-icon"><span class="icon flaticon-arrows-11"></span> </span></div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="image-layer">
                <div class="info-blocks">
                    <div class="row clearfix">

                        <!--Info Block-->
                        <div class="info-block col-sm-12 wow fadeInUp animated" data-wow-delay="300ms"
                            data-wow-duration="2000ms"
                            style="visibility: visible; animation-duration: 2000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                            <div class="inner">
                                <div class="icon"><span class="fa fa-phone fa-2x phone-icon-transform"></span></div>
                                <strong>Phone Inquiry</strong>
                                <ul class="info">
                                    <li><a href="tel:+1-(214) 682-0660">+1 (214) 682-0660</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--Info Block-->
                        <div class="info-block col-sm-12 wow fadeInUp animated" data-wow-delay="600ms"
                            data-wow-duration="2000ms"
                            style="visibility: visible; animation-duration: 2000ms; animation-delay: 600ms; animation-name: fadeInUp;">
                            <div class="inner">
                                <div class="icon"><span class="fa fa-envelope fa-2x "></span></div>
                                <strong>Send Email</strong>
                                <ul class="info">
                                    <li><a href="mailto:info@qulitysolar.net">info@qulitysolar.net</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
@parent

@endsection