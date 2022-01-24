@extends('layouts.default')
@section('content')
<!-- Register page Html start here -->
<section class="signup-step-container">
    <div class="wizard">
        <div class="wizard-inner text-center">
            <img src="/img/user_img.png" alt="" />
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active">
                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Step 2</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Step 3</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Step 4</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>Step 5</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i>Step 6</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step7" data-toggle="tab" aria-controls="step7" role="tab"><span class="round-tab">7</span> <i>Step 7</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step8" data-toggle="tab" aria-controls="step8" role="tab"><span class="round-tab">8</span> <i>Step 8</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step9" data-toggle="tab" aria-controls="step9" role="tab"><span class="round-tab">9</span> <i>Step 9</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step10" data-toggle="tab" aria-controls="step10" role="tab"><span class="round-tab">10</span> <i>Step 10</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step11" data-toggle="tab" aria-controls="step11" role="tab"><span class="round-tab">11</span> <i>Step 11</i></a>
                </li>
                <!--li role="presentation" class="disabled">
                    <a href="#step12" data-toggle="tab" aria-controls="step12" role="tab"><span class="round-tab">12</span> <i>Step 12</i></a>
                </li-->

                <li role="presentation" class="disabled">
                    <a href="#step14" data-toggle="tab" aria-controls="step14" role="tab"><span class="round-tab">14</span> <i>Step 14</i></a>
                </li>
                <!--li role="presentation" class="disabled">
                    <a href="#step15" data-toggle="tab" aria-controls="step15" role="tab"><span class="round-tab">15</span> <i>Step 15</i></a>
                </li-->

            </ul>
        </div>

        <form action="{{route('commercial')}}" id="commercial_form" method="post">
            <div class="tab-content" id="main_form">
                @csrf
                <div class="tab-pane active" role="tabpanel" id="step2">
                    <div class="text-center head_box">
                        <h2>Let’s start with some basic info. <br />What type of EV do you have?</h2>
                        <p class="font_12">Please select all that apply</p>
                    </div>
                    <div class="radio_box ev_box">
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="customRadio3" name="some_basic_info" class="custom-control-input" value="Level 2" required>
                            <label class="custom-control-label" for="customRadio3">Level 2</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="customRadio4" name="some_basic_info" class="custom-control-input" value="Level 3">
                            <label class="custom-control-label" for="customRadio4">Level 3</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="customRadio5" name="some_basic_info" class="custom-control-input" value="I have my own charger">
                            <label class="custom-control-label" for="customRadio5">I have my own charger</label>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step3">
                    <div class="text-center head_box">
                        <h2 class="mw_100">Could multiple vehicles be charging at once?</h2>
                    </div>
                    <div class="radio_box ev_box">
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="evRadio1" name="vehicles_be_charging_at_once" class="custom-control-input" value="Yes" required>
                            <label class="custom-control-label" for="evRadio1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="evRadio2" name="vehicles_be_charging_at_once" class="custom-control-input" value="No">
                            <label class="custom-control-label" for="evRadio2">No</label>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step4">
                    <div class="text-center head_box">
                        <h2>Are you thinking of providing <br />EV charging as a paid service?</h2>
                    </div>
                    <div class="radio_box ev_box">
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="evRadio3" name="providing_EV_charging_as_a_paid_service" class="custom-control-input" value="Yes" required>
                            <label class="custom-control-label" for="evRadio3">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="evRadio4" name="providing_EV_charging_as_a_paid_service" class="custom-control-input" value="No">
                            <label class="custom-control-label" for="evRadio4">No</label>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step5">
                    <div class="text-center head_box">
                        <h2>We’ll need some contact information</h2>
                    </div>
                    <div class="form_box brand_modal">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="contact_info_first_name" class="form-control" placeholder="First name" required>
                            </div>
                            <div class="col">
                                <input type="text" name="contact_info_last_name" class="form-control" placeholder="Last name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="email" name="contact_info_email" class="form-control" placeholder="E-mail" required>
                            </div>
                            <div class="col">
                                <input type="text" name="contact_info_phone" class="form-control" placeholder="Phone" required>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                    <div class="text-center by_click">
                        <p>By clicking on Submit, you are agreeing to our <a href="/terms-of-use" target="_blank">Terms</a> and <a href="/privacy-policy" target="_blank">Privacy</a></p>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="step6">
                    <div class="text-center head_box">
                        <h2 class="mw_100">Great! Where will the EV chargers be installed?</h2>
                    </div>
                    <div class="text-center install_img"><img src="/img/commercial-store.png" alt="" /></div>
                    <div class="form_box install_box">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                                <input type="hidden" name="taxstate" id="taxstate" value="">
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step7">
                    <div class="text-center head_box">
                        <h2>Ownership type</h2>
                        <p class="font_12">Choose One</p>
                    </div>
                    <div class="form_box home_box owner_ship charger_box">
                        <div class="d-flex justify-content-between align-items-end text-center form-row">
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="home" name="property_type" value="Land" required>
                                <label class="form-check-label" for="home"><img class="home_img" src="/img/owner_icon.png" alt="" /></label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="home2" name="property_type" value="Commercial">
                                <label class="form-check-label" for="home2"><img class="home_img2" src="/img/owner_icon2.png" alt="" /></label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="home3" name="property_type" value="Mutli-Unit">
                                <label class="form-check-label" for="home3"><img class="home_img3" src="/img/owner_icon3.png" alt="" /></label>
                            </div>
                        </div>
                        <h3 class="text-center own_head">Ownership Type</h3>
                        <div class="form-row own_radio">
                            <div class="col">
                                <div class="custom-control custom-radio custm_radio">
                                    <input type="radio" id="own" name="Ownership_Type" class="custom-control-input" value="Rent" required />
                                    <label class="custom-control-label" for="own">Rent</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-radio custm_radio">
                                    <input type="radio" id="own2" name="Ownership_Type" class="custom-control-input" value="Owner" />
                                    <label class="custom-control-label" for="own2">Owner</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-radio custm_radio">
                                    <input type="radio" id="own3" name="Ownership_Type" class="custom-control-input" value="Other" />
                                    <label class="custom-control-label" for="own3">Other</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step8">
                    <div class="text-center head_box">
                        <h2>Will you need permission from anyone to install this EV charger?</h2>
                    </div>
                    <div class="radio_box ev_box">
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="installRadio1" name="anyone_to_install_this_EV_charger" class="custom-control-input" value="Yes" required>
                            <label class="custom-control-label" for="installRadio1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="installRadio2" name="anyone_to_install_this_EV_charger" class="custom-control-input" value="No">
                            <label class="custom-control-label" for="installRadio2">No</label>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step9">
                    <div class="text-center head_box">
                        <h2>What is your type of industry?</h2>
                        <p class="font_12">Choose all that apply</p>
                    </div>
                    <div class="form_box check_boxs commercial_bx">
                        <div class="d-flex justify-content-between align-items-end text-center item_box">
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item" name="type_of_industry[]" value="Automotive" />
                                <label class="form-check-label" for="item"><img class="itm_img" src="/img/commercial_icon.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item2" name="type_of_industry[]" value="Hotel" />
                                <label class="form-check-label" for="item2"><img class="itm_img" src="/img/commercial_icon2.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item3" name="type_of_industry[]" value="Municiple" />
                                <label class="form-check-label" for="item3"><img class="itm_img" src="/img/commercial_icon3.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item4" name="type_of_industry[]" value="Office" />
                                <label class="form-check-label" for="item4"><img class="itm_img" src="/img/commercial_icon4.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item5" name="type_of_industry[]" value="Parking" />
                                <label class="form-check-label" for="item5"><img class="itm_img" src="/img/commercial_icon5.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item6" name="type_of_industry[]" value="Residential" />
                                <label class="form-check-label" for="item6"><img class="itm_img" src="/img/commercial_icon6.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item7" name="type_of_industry[]" value="Retail" />
                                <label class="form-check-label" for="item7"><img class="itm_img" src="/img/commercial_icon7.png" alt="" /></label>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step10">
                    <div class="text-center head_box">
                        <h2 class="mw_100">We’ll wrap this quote up for you.</h2>
                    </div>
                    <div class="text-center quote_img"><img src="/img/quote_img.png" alt="" /></div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step11">
                    <div class="text-center head_box">
                        <h2>When are you looking to install your EV charger?</h2>
                        <p class="font_12">Please select one that apply</p>
                    </div>
                    <div class="radio_box ev_box">
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="evCharger" name="looking_to_install_your_EV_charger" class="custom-control-input" value="1-3 Weeks" required>
                            <label class="custom-control-label" for="evCharger">1-3 Weeks</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="evCharger2" name="looking_to_install_your_EV_charger" class="custom-control-input" value="1 Month">
                            <label class="custom-control-label" for="evCharger2">1 Month</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="evCharger3" name="looking_to_install_your_EV_charger" class="custom-control-input" value="1 Month+">
                            <label class="custom-control-label" for="evCharger3">1 Month+</label>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <!-- div class="tab-pane" role="tabpanel" id="step12">
                    <div class="text-center head_box lbl_head">
                        <h2>Based on the Vehya Online Assessment here’s your quote.</h2>
                        <p>Total Cost: $1515</p>
                        <div class="lbl_box">
                            <label>ChargePoint Charger: $650</label>
                            <label>Installation: $700</label>
                            <label>Permit: $100</label>
                            <label>Service Fee: $65</label>
                        </div>
                    </div>
                    <div class="form_box inline_form">
                        <div class="form-row align-items-center">
                            <div class="col-8">
                                <label>Place your state and see federal and state rebates and credits (check all tax <a href="/save-tax" target="_blank">here</a>)</label>
                            </div>
                            <div class="col">
                                <select class="form-control" name="taxstate" placeholder="State" required>

                                    <option value="">Select</option>
                                    @php
                                    foreach($usstates as $state):
                                    @endphp
                                    <option value="{{$state}}">{{$state}}</option>
                                    @php
                                    endforeach;
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div -->

                <div class="tab-pane" role="tabpanel" id="step14">
                    <div class="text-center head_box">
                        <h2 class="mw_100">When is a good date and time to call and get the remaining details for your EV charger installation?</h2>
                        <p class="note_txt mw_100"><img src="/img/note.png" alt="" /> PLEASE NOTE: You should have access to your breaker panel when scheduling a date and time</p>
                    </div>
                    <div class="text-center quote_img">
                        <!-- Calendly inline widget begin -->
                        <div class="calendly-inline-widget" data-url="https://calendly.com/vish-15/15min" style="min-width:320px;height:630px;"></div>
                        <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                        <!-- Calendly inline widget end -->
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="submit" class="default-btn next-step">Submit</button></li>
                    </ul>
                </div>
                <!--div class="tab-pane" role="tabpanel" id="step15">
                    <div class="text-center head_box thnku_box">
                        <h2>Thank you for choosing Vehya, EV charger install & service made easy.</h2>
                    </div>
                    <div class="text-center quote_img"><img src="/img/thanku.png" alt="" /></div>
                    <p class="text-center thnku_txt">We look forward to working with you. <br />One of our representatives will contact you for the remaining details! </p>
                </div-->
                <div class="clearfix"></div>
            </div>

        </form>
    </div>
</section>
@endsection
@section('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAuGkxTIibaR_uVyYVlEqzKYJEDs1GVSQo"></script>
<script>
    $(document).ready(function() {

        var navListItems = $('ul.nav-tabs li a'),
            allWells = $('.main_form'),
            allNextBtn = $('.next-step');

        allWells.hide();

        /*navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });*/

        allNextBtn.click(function() {
            var active = $('.wizard .nav-tabs li.active');
            var curStep = $(this).closest(".tab-pane");
            console.log(curStep.attr('class'));
            var curStepBtn = curStep.attr("id"),
                nextStepWizard = $('ul.nav-tabs li a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='radio'],input[type='checkbox'],input[type='select'],input[type='email'],select"),
                isValid = true;

            $(".form-row .col,.ev_box .custom-radio").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-row .col,.ev_box .custom-radio").addClass("has-error");
                }
            }

            if (isValid) {
                nextTab(active);
            }
        });
        $('ul.nav-tabs li.active a').trigger('click');
    });
</script>
<script>
    $(document).ready(function() {
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

            var target = $(e.target);

            if (target.parent().hasClass('disabled')) {
                return false;
            }
        });

        /*$(".next-step").click(function(e) {
            var active = $('.wizard .nav-tabs li.active');
            //active.next().removeClass('disabled');
            nextTab(active);
        });*/
        $(".prev-step").click(function(e) {
            var active = $('.wizard .nav-tabs li.active');
            prevTab(active);

        });
    });

    function nextTab(elem) {
        $(elem).removeClass('active').addClass('disabled').next('li').removeClass('disabled').addClass('active').find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).removeClass('active').addClass('disabled').prev('li').removeClass('disabled').addClass('active').find('a[data-toggle="tab"]').click();
    }


    $('.nav-tabs').on('click', 'li', function() {
        $('.nav-tabs li.active').removeClass('active');
        $(this).addClass('active');
    });
    var makemodel = @json($makemodel);

    //console.log(makemodel)

    function buildmodel() {
        let brand = $("#Brand");
        console.log(brand.val());
        console.log(makemodel[brand.val()]);
        if (typeof makemodel[brand.val()] !== 'undefined') {
            var models = makemodel[brand.val()];
            $('#Modal').html('');
            $.each(models, function(i, v) {
                $('#Modal').append($('<option>', {
                    value: v,
                    text: v
                }));
            });
        }
    }
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        var input = document.getElementById('address');
        var options = {
            fields: ["address_components", "geometry"],
            types: ["address"],
            componentRestrictions: {
                country: "us"
            },
        };
        autocomplete = new google.maps.places.Autocomplete(input, options);
        google.maps.event.addListener(autocomplete, 'place_changed', fillInAddress);
        $.ajaxSetup({
            cache: false
        });
    });

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        //https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
        const place = autocomplete.getPlace();
        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        // place.address_components are google.maps.GeocoderAddressComponent objects
        // which are documented at http://goo.gle/3l5i5Mr
        for (const component of place.address_components) {
            const componentType = component.types[0];
            switch (componentType) {
                case "administrative_area_level_1": {
                    document.querySelector("#taxstate").value = component.short_name;
                    break;
                }
            }
        }
    }
</script>
@parent

@endsection