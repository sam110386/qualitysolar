@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ $action }} {{ trans('cruds.lead.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.leads.saveresidential") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('contact_info_first_name') ? 'has-error' : '' }}">
                <label for="contact_info_first_name">{{ trans('cruds.lead.fields.fname') }}*</label>
                <input type="text" id="contact_info_first_name" name="contact_info_first_name" class="form-control" value="{{ old('fname', isset($lead) ? $lead->fname : '') }}" required>
                @if($errors->has('contact_info_first_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('contact_info_first_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lead.fields.fname_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('lname') ? 'has-error' : '' }}">
                <label for="contact_info_last_name">{{ trans('cruds.lead.fields.lname') }}*</label>
                <input type="text" id="contact_info_last_name" name="contact_info_last_name" class="form-control" value="{{ old('lname', isset($lead) ? $lead->lname : '') }}" required>
                @if($errors->has('lname'))
                <em class="invalid-feedback">
                    {{ $errors->first('lname') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lead.fields.lname_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="contact_info_email">{{ trans('cruds.lead.fields.email') }}*</label>
                <input type="email" id="contact_info_email" name="contact_info_email" class="form-control" value="{{ old('email', isset($lead) ? $lead->email : '') }}" required>
                @if($errors->has('email'))
                <em class="invalid-feedback">
                    {{ $errors->first('email') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lead.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="contact_info_phone">{{ trans('cruds.lead.fields.phone') }}*</label>
                <input type="text" id="contact_info_phone" name="contact_info_phone" class="form-control" value="{{ old('phone', isset($lead) ? $lead->phone : '') }}" required>
                @if($errors->has('phone'))
                <em class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lead.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">Address*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($lead) ? $lead->address : '') }}" required>
                @if($errors->has('address'))
                <em class="invalid-feedback">
                    {{ $errors->first('address') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                <label for="address">State*</label>
                <select class="form-control select2" name="state" placeholder="State" required>
                    <option value="">Select</option>
                    @php
                    foreach($usstates as $state):
                    @endphp
                    <option value="{{$state}}" {{(isset($lead) && $lead->state==$state)?"selected" : ''}}>{{$state}}</option>
                    @php
                    endforeach;
                    @endphp
                </select>
            </div>
            <div class="form-group {{ $errors->has('Brand') ? 'has-error' : '' }}">
                <label for="Brand">Brand*</label>
                <select name="Brand" id="Brand" class="form-control required" required="required" placeholder="Brand" onchange="buildmodel()">
                    <option value="" {{(isset($lead) && $lead->make=='')?"selected=selected" : ''}}>Select Brand</option>
                    @php
                    foreach($make as $mk):
                    @endphp
                    <option value="{{$mk}}" {{(isset($lead) && $lead->make==$mk)?"selected=selected" : ''}}>{{$mk}}</option>
                    @php
                    endforeach;
                    @endphp
                </select>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="Modal">Modal*</label>
                <select type="text" id="Modal" name="Modal" class="form-control required" required="required" placeholder="Modal">
                    @if(isset($lead) && $lead->model)
                    <option value="{{$lead->model}}" selected>{{$lead->model}}</option>
                    @endif
                </select>
            </div>
            @foreach($residentialquestions as $key=>$question)
            @php
            if(!isset($question['type']))
            continue
            @endphp
            <div class="form-group {{ $errors->has($key) ? 'has-error' : '' }}">
                <label for="{{$key}}">{{ $question['title'] }}*</label>
                @if($question['type']=='radio')
                <div class="radio-group">
                    @foreach($question['values'] as $lab )
                    <div class="col-sm-4">
                        <input type="radio" id="{{$key}}" name="{{$key}}" value="{{$lab}}" class="formcontrol" {{(isset($quesns) && isset($quesns[$key]) && $quesns[$key]==$lab)?"checked":'' }} /> {{$lab}}
                    </div>
                    @endforeach
                </div>
                @endif
                @if($question['type']=='checkbox')
                <div class="checkbox-group">
                    @foreach($question['values'] as $lab )
                    <div class="col-sm-4">
                        <input type="checkbox" id="{{$key}}" name="{{$key}}[]" value="{{$lab}}" class="formcontrol" {{(isset($quesns) && isset($quesns[$key]) && in_array($lab,$quesns[$key]))?"checked":'' }} /> {{$lab}}
                    </div>
                    @endforeach
                </div>
                @endif
                @if($question['type']=='input')
                <input type="input" id="{{$key}}" name="{{$key}}" class="form-control" value="{{(isset($quesns) && isset($quesns[$key]))?$quesns[$key]:'' }}" />
                @endif

            </div>
            @endforeach
            <div class="form-group {{ $errors->has('quote') ? 'has-error' : '' }}">
                <label for="quote">Quote*</label>
                <input type="text" id="quote" name="quote" class="form-control" value="{{ old('quote', isset($lead) ? $lead->quote : '') }}" required>
                @if($errors->has('quote'))
                <em class="invalid-feedback">
                    {{ $errors->first('quote') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('installation_date') ? 'has-error' : '' }}">
                <label for="installation_date">Installation Date*</label>
                <input type="text" id="installation_date" name="installation_date" class="form-control date" value="{{ old('installation_date', isset($lead) ? $lead->installation_date : '') }}">
                @if($errors->has('installation_date'))
                <em class="invalid-feedback">
                    {{ $errors->first('installation_date') }}
                </em>
                @endif
            </div>
            <div>
                <input type="hidden" name="id" value="{{ isset($lead) ? $lead->id : '' }}">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAuGkxTIibaR_uVyYVlEqzKYJEDs1GVSQo"></script>
<script>
    var makemodel = @json($makemodel);

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
                    document.querySelector("#state").value = component.short_name;
                    break;
                }
            }
        }
    }
</script>
@stop