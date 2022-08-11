<!--Enquiry Section-->
<section class="enquiry-section">
    <div class="image-layer" style="background-image: url(/QualitySolar/bg-image-2.jpg);"></div>
    <div class="auto-container">
        <div class="sec-title light-title centered wow fadeInDown animated" data-wow-delay="0ms"
            data-wow-duration="1000ms"
            style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInDown;">
            <div class="upper-text">Contact Us <span class="icon flaticon-flash"></span></div>
            <h2>Get Free Consultation</h2>
            <div class="subtitle">For Controling Your Energy Production</div>
            <div class="bottom-dots clearfix">
                <span class="dot line-dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>

        <div class="content-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="2000ms"
            style="visibility: visible; animation-duration: 2000ms; animation-delay: 0ms; animation-name: fadeInUp;">
            <div class="default-form contact-form">
                <form method="post" action="{{route('enquiry')}}">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <input type="text" name="name" placeholder="Your Name" required="">
                            @if($errors->has('name'))
                            <span class="help-block text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Email" required="">
                            @if($errors->has('email'))
                            <span class="help-block text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                            <input type="text" name="phone" placeholder="Phone" required="">
                            @if($errors->has('phone'))
                            <span class="help-block text-danger">{{$errors->first('phone')}}</span>
                            @endif
                        </div>

                        <div class="col-md-12 col-sm-12 form-group">
                            <select class="custom-select-box" name="regarding" id="ui-id-1" style="display: none;">
                                <option value="">Subject / Discuss About Service</option>
                                <option value="Installation">Installation</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Replacement">Replacement</option>
                                <option value="EV Charger">EV Charger</option>
                                <option value="Battery">Battery</option>
                            </select>
                            @if($errors->has('regarding'))
                            <span class="help-block text-danger">{{$errors->first('regarding')}}</span>
                            @endif
                        </div>

                        <div class="col-md-12 col-sm-12 form-group">
                            <button type="submit" class="theme-btn btn-style-one"><span class="btn-title"><span
                                        class="btn-txt">Send Request</span><span class="btn-icon"><span
                                            class="icon flaticon-arrows-11"></span> </span></span></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="lower-text">
                <div class="sub-title">
                    <span class="txt">Or if you need quick assistance</span>
                </div>
                <div class="info">Call Us 24/7 For Customer Support At <span
                        class="fa fa-phone phone-icon-transform"></span> <a href="tel:+1 (214) 682-0660">+1 (214)
                        682-0660</a>
                </div>
            </div>
        </div>

    </div>
</section>