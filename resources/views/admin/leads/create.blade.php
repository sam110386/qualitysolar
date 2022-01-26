@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.lead.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.leads.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('fname') ? 'has-error' : '' }}">
                <label for="fname">{{ trans('cruds.lead.fields.fname') }}*</label>
                <input type="text" id="fname" name="fname" class="form-control" value="{{ old('fname', isset($lead) ? $lead->fname : '') }}" required>
                @if($errors->has('fname'))
                <em class="invalid-feedback">
                    {{ $errors->first('fname') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lead.fields.fname_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('lname') ? 'has-error' : '' }}">
                <label for="lname">{{ trans('cruds.lead.fields.lname') }}*</label>
                <input type="text" id="lname" name="lname" class="form-control" value="{{ old('lname', isset($lead) ? $lead->lname : '') }}" required>
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
                <label for="email">{{ trans('cruds.lead.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($lead) ? $lead->email : '') }}" required>
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
                <label for="phone">{{ trans('cruds.lead.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($lead) ? $lead->phone : '') }}" required>
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
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">State*</label>
                <select class="form-control select2" name="state" placeholder="State" required>
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
            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="category">{{ trans('cruds.lead.fields.category') }}*</label>
                <select name="category_id" id="category" class="form-control select2" required>
                    @foreach($categories as $id => $category)
                    <option value="{{ $id }}" {{ (isset($lead) && $lead->category ? $lead->category->id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                <em class="invalid-feedback">
                    {{ $errors->first('category_id') }}
                </em>
                @endif
            </div>
            <div id="regidential">
                <div class="form-group {{ $errors->has('ev_charger_type') ? 'has-error' : '' }}">
                    <label for="category">{{ trans('EV Charger Type') }}*</label>
                    <select name="ev_charger_type" id="ev_charger_type" class="form-control select2" required>
                        @foreach(config('product.regidential_ev_charger_types') as $product)
                        <option value="{{ $product['alias'] }}" {{ (isset($lead) && $lead->ev_charger_type ? $lead->ev_charger_type : old('ev_charger_type')) == $product['alias'] ? 'selected' : '' }}>{{ $product['title'] }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('ev_charger_type'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ev_charger_type') }}
                    </em>
                    @endif
                </div>
                @foreach(config('product.assesment_questions') as $question)
                <div class="form-group {{ $errors->has($question['name']) ? 'has-error' : '' }}">
                    <label for="{{$question['name']}}">{{ $question['title'] }}*</label>
                    @if($question['type']=='radio')
                    <div class="radio-group">
                        @foreach($question['options'] as $key=>$lab )
                        <div class="col-sm-4">
                            <input type="radio" id="questions_{{$question['name']}}" name="questions[{{$question['name']}}]" value="{{$key}}" class="formcontrol" /> {{$lab}}
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if($question['type']=='checkbox')
                    <div class="checkbox-group">
                        @foreach($question['options'] as $key=>$lab )
                        <div class="col-sm-4">
                            <input type="checkbox" id="questions_{{$key}}" name="questions[{{$question['name']}}][]" value="{{$key}}" class="formcontrol" /> {{$lab}}
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if($question['type']=='input')
                    <input type="input" id="questions_{{$key}}" name="questions[{{$key}}]" class="form-control" />
                    @endif

                </div>
                @endforeach
            </div>
            <div>
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
                    document.querySelector("#taxstate").value = component.short_name;
                    break;
                }
            }
        }
    }
</script>
@stop