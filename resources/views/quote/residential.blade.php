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
                <li role="presentation" class="disabled">
                    <a href="#step12" data-toggle="tab" aria-controls="step12" role="tab"><span class="round-tab">12</span> <i>Step 12</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step13" data-toggle="tab" aria-controls="step13" role="tab"><span class="round-tab">13</span> <i>Step 13</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step14" data-toggle="tab" aria-controls="step14" role="tab"><span class="round-tab">14</span> <i>Step 14</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step15" data-toggle="tab" aria-controls="step15" role="tab"><span class="round-tab">15</span> <i>Step 15</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step16" data-toggle="tab" aria-controls="step16" role="tab"><span class="round-tab">16</span> <i>Step 16</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step17" data-toggle="tab" aria-controls="step17" role="tab"><span class="round-tab">17</span> <i>Step 17</i></a>
                </li>

                <li role="presentation" class="disabled">
                    <a href="#step19" data-toggle="tab" aria-controls="step19" role="tab"><span class="round-tab">19</span> <i>Step 19</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step20" data-toggle="tab" aria-controls="step20" role="tab"><span class="round-tab">20</span> <i>Step 20</i></a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step21" data-toggle="tab" aria-controls="step21" role="tab"><span class="round-tab">21</span> <i>Step 21</i></a>
                </li>
            </ul>
        </div>

        <form action="{{route('residential')}}" id="residentialform" name="residentialform" method="post">
            @csrf
            <div class="tab-content" id="main_form">

                <div class="tab-pane active" role="tabpanel" id="step2">
                    <div class="text-center head_box">
                        <h2>Let’s start with some basic info. <br />What type of EV do you have?</h2>
                    </div>
                    <div class="form_box brand_modal">
                        <div class="form-row">
                            <div class="col">
                                <select name="Brand" id="Brand" class="form-control required" required="required" placeholder="Brand" onchange="buildmodel()">
                                    <option value="">Select Brand</option>
                                    @php
                                    foreach($make as $mk):
                                    @endphp
                                    <option value="{{$mk}}">{{$mk}}</option>
                                    @php
                                    endforeach;
                                    @endphp
                                </select>
                            </div>
                            <div class="col">
                                <select type="text" id="Modal" name="Modal" class="form-control required" required="required" placeholder="Modal">

                                </select>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step3">
                    <div class="text-center head_box">
                        <h2>Here are the EV chargers we provide based on your vehicle.</h2>
                    </div>
                    <div class="form_box charger_box pricingTbl">
                        <div class="form-row">
                            <div class="col">
                                <input type="radio" class="form-check-input d-none " name="ev_chargers_type" id="ev_chargers_type1" value="Charger Point Homeflex" required checked>
                                <label class="form-check-label" for="ev_chargers_type1">
                                    <div class="pricing-box">
                                        <div class="d-flex align-items-center">
                                            <div class="pri-box-img"><img src="/img/chargepoint-home-flex.png" alt=""></div>
                                            <div class="pri-box-Txt">
                                                <h5>CHARGE POINT HOMEFLEX</h5> <img src="/img/price-bg-shape.png"> <span>$699.99</span>
                                            </div>
                                        </div>
                                        <div class="multi-btn d-flex align-items-center"><span class="icon_btn"><img src="/img/btn-icon1.png" alt=""><span>11.2kW</span></span> <span class="icon_btn"><img src="/img/btn-icon2.png" alt=""><span>25ft Cable</span></span> <span class="icon_btn"><img src="/img/btn-icon3.png" alt=""><span>Power Share</span></span></div>
                                        <div class="price_tble">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td> Max. Charge</td>
                                                        <td> 11.5kW</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Amperage</td>
                                                        <td> 60 amp</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Input Voltage</td>
                                                        <td> 240v</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Connectivity</td>
                                                        <td> Wi-Fi/Smartphone</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Warranty</td>
                                                        <td> 3 years</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Cable Length</td>
                                                        <td> 25ft</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Safety</td>
                                                        <td> UL Listed</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Efficiency </td>
                                                        <td> Energy Star Certified</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="see_more">See More</div>
                                    </div>
                                </label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" name="ev_chargers_type" id="ev_chargers_type2" value="Enelx Juicebox 48">
                                <label class="form-check-label" for="ev_chargers_type2">
                                    <div class="pricing-box">
                                        <div class="d-flex align-items-center">
                                            <div class="pri-box-img"><img src="/img/Enel-X-80-Pro.png" alt="" style="max-width: 90%;"></div>
                                            <div class="pri-box-Txt">
                                                <h5>ENEL X JUICEBOX PRO 80</h5> <img src="/img/price-bg-shape.png"> <span>$1,599.99</span>
                                            </div>
                                        </div>
                                        <div class="multi-btn d-flex align-items-center"><span class="icon_btn"><img src="/img/btn-icon1.png" alt=""><span>19.2kW</span></span> <span class="icon_btn"><img src="/img/btn-icon2.png" alt=""><span>25ft Cable</span></span> <span class="icon_btn"><img src="/img/btn-icon3.png" alt=""><span>Power Share</span></span></div>
                                        <div class="price_tble">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td> Max. Charge</td>
                                                        <td> 19.2kW</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Amperage</td>
                                                        <td> 80 amp</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Input Voltage</td>
                                                        <td> 240v</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Connectivity</td>
                                                        <td> Wi-Fi/Smartphone</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Warranty</td>
                                                        <td> 3 years</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Cable Length</td>
                                                        <td> 25ft</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Safety</td>
                                                        <td> UL Listed</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Efficiency </td>
                                                        <td> Energy Star Certified</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="see_more">
                                            See More
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" name="ev_chargers_type" id="ev_chargers_type3" value="Walbox Pulsar Plus 48">
                                <label class="form-check-label" for="ev_chargers_type3">
                                    <div class="pricing-box">
                                        <div class="d-flex align-items-center">
                                            <div class="pri-box-img"><img src="/img/Blink-IQ-200-Level-2-1.png" alt=""></div>
                                            <div class="pri-box-Txt">
                                                <h5>BLINK IQ 200 LEVEL 2
                                                </h5> <img src="/img/price-bg-shape.png"> <span>$3,499.99
                                                </span>
                                            </div>
                                        </div>
                                        <div class="multi-btn d-flex align-items-center"><span class="icon_btn"><img src="/img/btn-icon1.png" alt=""><span>19.2kW</span></span> <span class="icon_btn"><img src="/img/btn-icon2.png" alt=""><span>25ft Cable</span></span> <span class="icon_btn"><img src="/img/btn-icon3.png" alt=""><span>Power Share</span></span></div>
                                        <div class="price_tble">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td> Max. Charge</td>
                                                        <td>19.2kW</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Amperage</td>
                                                        <td> 100 amp</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Input Voltage</td>
                                                        <td> 240v</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Connectivity</td>
                                                        <td> Wi-Fi/Smartphone</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Warranty</td>
                                                        <td> 3 years</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Cable Length</td>
                                                        <td> 25ft</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Safety</td>
                                                        <td> UL Listed</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Efficiency </td>
                                                        <td> Energy Star Certified</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="see_more">
                                            See More
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" name="ev_chargers_type" id="ev_chargers_type4" class="custom-control-input" value="I have my own charger">
                            <label class="custom-control-label" for="ev_chargers_type4">I have my own charger</label>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step4">
                    <div class="text-center head_box">
                        <h2>Are you considering an additional <br />EV within the next year?</h2>
                    </div>
                    <div class="radio_box ev_box">
                        <div class="custom-control custom-radio custm_radio ">
                            <input type="radio" id="evRadio1" name="considering_an_additional_EV" class="custom-control-input" value="Yes" required>
                            <label class="custom-control-label " for="evRadio1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio ">
                            <input type="radio" id="evRadio2" name="considering_an_additional_EV" class="custom-control-input" value="No">
                            <label class="custom-control-label " for="evRadio2">No</label>
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
                                <input type="text" class="form-control" name="contact_info_first_name" placeholder="First name" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="contact_info_last_name" placeholder="Last name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="email" name="contact_info_email" class="form-control" placeholder="E-mail" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="contact_info_phone" placeholder="Phone" required>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                    <div class="text-center by_click">
                        <p>By clicking on Next, you are agreeing to our <a href="/terms-of-use" target="_blank">Terms</a> and <a href="/privacy-policy" target="_blank">Privacy</a></p>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="step6">
                    <div class="text-center head_box">
                        <h2>Great! What's the address where the EV charger will be installed?</h2>
                    </div>
                    <div class="text-center install_img"><img src="/img/install_img.svg" alt="" /></div>
                    <div class="form_box install_box">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                            </div>

                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step7">
                    <div class="text-center head_box">
                        <h2>What style of home?</h2>
                        <p class="font_12">Choose One</p>
                    </div>
                    <div class="form_box home_box charger_box ">
                        <div class="d-flex justify-content-between align-items-end text-center form-row">
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="home1" name="Style_of_home" value="Detached" required>
                                <label class="form-check-label" for="home1"><img class="home_img" src="/img/home.png" alt="" /></label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="home2" name="Style_of_home" value="Townhome">
                                <label class="form-check-label" for="home2"><img class="home_img2" src="/img/home2.png" alt="" /></label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="home3" name="Style_of_home" value="Mutli-unit">
                                <label class="form-check-label" for="home3"><img class="home_img3" src="/img/home3.png" alt="" /></label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="home4" name="Style_of_home" value="others">
                                <label class="form-check-label" for="home4"><img class="home_img4" src="/img/home4.png" alt="" /></label>
                            </div>
                        </div>
                        <h3 class="text-center own_head">Ownership Type</h3>
                        <div class="form-row own_radio">
                            <div class="col">
                                <div class="custom-control custom-radio custm_radio">
                                    <input type="radio" id="own" name="Ownership_Type" class="custom-control-input" value="Own" required />
                                    <label class="custom-control-label" for="own">Own</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-radio custm_radio">
                                    <input type="radio" id="own2" name="Ownership_Type" class="custom-control-input" value="Rent" />
                                    <label class="custom-control-label" for="own2">Rent</label>
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
                            <input type="radio" id="installRadio1" name="need_permission_from_anyone" class="custom-control-input" value="Yes" required>
                            <label class="custom-control-label" for="installRadio1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="installRadio2" name="need_permission_from_anyone" class="custom-control-input" value="No">
                            <label class="custom-control-label" for="installRadio2">No</label>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step9">
                    <div class="text-center head_box">
                        <h2 class="mw_100">Getting power to your EV charger is key.</h2>
                    </div>
                    <div class="text-center car_img"><img src="/img/car_img.png" alt="" /></div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step10">
                    <div class="text-center head_box">
                        <h2 class="mw_100">Where will the EV charger be installed?</h2>
                    </div>
                    <div class="radio_box ev_box">
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="inRadio1" name="EV_charger_be_installed" class="custom-control-input" value="Interior" required>
                            <label class="custom-control-label" for="inRadio1">Interior</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="inRadio2" name="EV_charger_be_installed" class="custom-control-input" value="Exterior" required>
                            <label class="custom-control-label" for="inRadio2">Exterior</label>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step11">
                    <div class="text-center head_box">
                        <h2>Approximately how far is it from the breaker panel to the EV charger?</h2>
                        <p class="font_12">Choose One</p>
                    </div>
                    <div class="form_box">
                        <div class="text-center car_img mb-0"><img src="/img/ft.png" alt=""></div>
                        <div class="d-flex justify-content-between align-items-end text-center ft_box form-row">
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="ft" name="breaker_panel_to_the_EV_charger" value="5FT" required>
                                <label class="form-check-label" for="ft">5FT</label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="ft2" name="breaker_panel_to_the_EV_charger" value="10FT">
                                <label class="form-check-label" for="ft2">10FT</label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="ft3" name="breaker_panel_to_the_EV_charger" value="15FT">
                                <label class="form-check-label" for="ft3">15FT</label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="ft4" name="breaker_panel_to_the_EV_charger" value="20FT">
                                <label class="form-check-label" for="ft4">20FT</label>
                            </div>
                            <div class="col">
                                <input type="radio" class="form-check-input d-none" id="ft5" name="breaker_panel_to_the_EV_charger" value="20T+">
                                <label class="form-check-label" for="ft5">20FT+</label>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step12">
                    <div class="text-center head_box">
                        <h2>Will the EV charger be located on the same wall as the breaker panel?</h2>
                    </div>
                    <div class="radio_box ev_box">
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="panelRadio1" name="same_wall_as_the_breaker_panel" class=" custom-control-input" value="Yes" required>
                            <label class="custom-control-label" for="panelRadio1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="panelRadio2" name="same_wall_as_the_breaker_panel" class=" custom-control-input" value="No">
                            <label class="custom-control-label" for="panelRadio2">No</label>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step13">
                    <div class="text-center head_box power_head">
                        <h2>Because EV chargers have power requirements, we need to understand the types of electrical items you have at your home. </h2>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step14">
                    <div class="text-center head_box">
                        <h2>Please choose the electrical items at your home.</h2>
                        <p class="font_12">Choose all that apply</p>
                    </div>
                    <div class="form_box check_boxs">
                        <div class="d-flex justify-content-between align-items-end text-center item_box">
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item" name="electrical_items_at_your_home[]" value="Washer" />
                                <label class="form-check-label" for="item"><img class="itm_img" src="/img/item.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item2" name="electrical_items_at_your_home[]" value="Dryer" />
                                <label class="form-check-label" for="item2"><img class="itm_img" src="/img/item2.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item3" name="electrical_items_at_your_home[]" value="Rerigerator" />
                                <label class="form-check-label" for="item3"><img class="itm_img" src="/img/item3.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item4" name="electrical_items_at_your_home[]" value="Stove" />
                                <label class="form-check-label" for="item4"><img class="itm_img" src="/img/item4.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item5" name="electrical_items_at_your_home[]" value="MicroWave" />
                                <label class="form-check-label" for="item5"><img class="itm_img" src="/img/item5.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item6" name="electrical_items_at_your_home[]" value="Freezer" />
                                <label class="form-check-label" for="item6"><img class="itm_img" src="/img/item6.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item7" name="electrical_items_at_your_home[]" value="Heat Pump" />
                                <label class="form-check-label" for="item7"><img class="itm_img" src="/img/item7.png" alt="" /></label>
                            </div>

                        </div>
                        <div class="d-flex justify-content-center align-items-end text-center item_box2">
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item8" name="electrical_items_at_your_home[]" value="AC Unit" />
                                <label class="form-check-label" for="item8"><img class="itm_img" src="/img/item8.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item9" name="electrical_items_at_your_home[]" value="Water Heater" />
                                <label class="form-check-label" for="item9"><img class="itm_img" src="/img/item9.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item10" name="electrical_items_at_your_home[]" value="Tankless Water Heater" />
                                <label class="form-check-label" for="item10"><img class="itm_img" src="/img/item10.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item11" id="item10" name="electrical_items_at_your_home[]" value="Solar Panels" />
                                <label class="form-check-label" for="item11"><img class="itm_img" src="/img/item11.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item12" name="electrical_items_at_your_home[]" value="Battery Storage" />
                                <label class=" form-check-label" for="item12"><img class="itm_img" src="/img/item12.png" alt="" /></label>
                            </div>
                            <div class="">
                                <input type="checkbox" class="form-check-input d-none" id="item13" name="electrical_items_at_your_home[]" value="Generator" />
                                <label class="form-check-label" for="item13"><img class="itm_img" src="/img/item13.png" alt="" /></label>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step15">
                    <div class="text-center head_box">
                        <h2 class="mw_100">We’ll wrap this quote up for you.</h2>
                    </div>
                    <div class="text-center quote_img"><img src="/img/quote_img.png" alt="" /></div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step16">
                    <div class="text-center head_box">
                        <h2>When are you looking to install <br />your EV charger?</h2>
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
                <div class="tab-pane" role="tabpanel" id="step17">
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
                </div>

                <div class="tab-pane" role="tabpanel" id="step19">
                    <div class="text-center head_box">
                        <h2>Are you interested in financing?</h2>
                    </div>
                    <div class="radio_box ev_box">
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="financ" name="interested_in_financing" class="custom-control-input" value="Yes" required>
                            <label class="custom-control-label" for="financ">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custm_radio">
                            <input type="radio" id="financ2" name="interested_in_financing" class="custom-control-input" value="No">
                            <label class="custom-control-label" for="financ2">No</label>
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="button" class="default-btn next-step">Next</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step20">
                    <div class="text-center head_box">
                        <h2 class="mw_100">When is a good date and time to call and get the remaining details for your EV charger installation?</h2>
                        <p class="note_txt mw_100"><img src="/img/note.png" alt="" /> PLEASE NOTE: You should have access to your breaker panel when scheduling a date and time</p>
                    </div>
                    <div class="text-center quote_img">
                        <!-- <img src="/img/calender.png" alt="" /> -->
                        <!-- Calendly inline widget begin -->
                        <div class="calendly-inline-widget" data-url="https://calendly.com/vish-15/15min" style="min-width:320px;height:630px;"></div>
                        <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                        <!-- Calendly inline widget end -->
                    </div>
                    <ul class="list-inline">
                        <li><button type="button" class="default-btn prev-step">Prev</button> <button type="submit" class="default-btn next-step">Submit</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="step21">
                    <div class="text-center head_box thnku_box">
                        <h2>Thank you for choosing Vehya, EV charger install & service made easy.</h2>
                    </div>
                    <div class="text-center quote_img"><img src="/img/thanku.png" alt="" /></div>
                    <p class="text-center thnku_txt">We look forward to working with you. <br />One of our representatives will contact you for the remaining details! </p>
                </div>
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
        // $("#residentialform").validate();
        $('.nav-tabs li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

            var target = $(e.target);

            if (target.parent().hasClass('disabled')) {
                return false;
            }
        });

        /*$(".next-step").click(function(e) {
            $("#residentialform").validate();
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
        $('#Modal').html('');
        if (typeof makemodel[brand.val()] !== 'undefined') {
            var models = makemodel[brand.val()];
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
            types: ['geocode'],
            componentRestrictions: {
                country: "us"
            },
        };
        autocomplete = new google.maps.places.Autocomplete(input, options);
        /*google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var placeorg = autocomplete.getPlace();
            document.getElementById('TextOriginlatlng').value = placeorg.geometry.location.lat() + ',' + placeorg.geometry.location.lng();
        });*/
        $.ajaxSetup({
            cache: false
        });
    });
</script>
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