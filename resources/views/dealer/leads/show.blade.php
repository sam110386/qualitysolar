@extends('layouts.dashboard')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lead.title') }}
    </div>

    <div class="card-body">
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="mb-2 row">
            <div class="col-sm-6">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.lead.fields.id') }}
                            </th>
                            <td>
                                {{ $lead->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lead.fields.created_at') }}
                            </th>
                            <td>
                                {{ $lead->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lead.fields.status') }}
                            </th>
                            <td>
                                {{ $lead->status->name ?? '' }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                {{ trans('cruds.lead.fields.category') }}
                            </th>
                            <td>
                                {{ $lead->category->name ?? '' }}
                            </td>
                        </tr>


                        @foreach($questions as $key=>$question)
                        @php if(!isset($defindQuestions[$key])) continue;
                        @endphp
                        <tr>
                            <th>
                                {{$defindQuestions[$key]['title']}}
                            </th>
                            <td>
                                {{ (is_array($question)?implode(', ',$question):$question) }}
                            </td>
                        </tr>
                        @endforeach
                        <?php /*
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($lead->attachments as $attachment)
                            <a href="{{ $attachment->getUrl() }}" target="_blank">{{ $attachment->file_name }}</a>
                            @endforeach
                        </td>
                    </tr>
                    */ ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                @if($lead->status_id==5)
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                Agent
                            </th>
                            <td>
                                <select name="assigned_to_agent_id" id="assigned_to_agent_id" class="form-control">
                                    <option value="">Select..</option>
                                    @foreach($agents as $id => $name)
                                    <option value="{{ $id }}" {{ (isset($lead) && $lead->assigned_to_agent_id==$id) ?'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif


                @if(($lead->status_id==5) && $lead->assigned_to_user_id==auth()->user()->id)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('cruds.lead.fields.comments') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @forelse ($lead->comments as $comment)
                                <div class="row">
                                    <div class="col">
                                        <p class="font-weight-bold"><a href="mailto:{{ $comment->author_email }}">{{ $comment->author_name }}</a> ({{ $comment->created_at }})</p>
                                        <p>{{ $comment->comment_text }}</p>
                                    </div>
                                </div>
                                <hr />
                                @empty

                                @endforelse
                                <form action="{{ route('dealer.leads.storeComment', $lead->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="comment_text">Leave a comment</label>
                                        <textarea class="form-control" id="comment_text" name="comment_text" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">@lang('global.submit')</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif
                <!-- Permit Upload From start here -->
                @if($lead->status_id==5)
                <form action="{{ route("dealer.leads.permitupdate", [$lead->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">Permit Upload (upload photocopy)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    Customer Name*
                                </th>
                                <td>
                                    <input type="text" id="customer_name" name="customer_name" class="form-control required" value="{{ old('customer_name', isset($lead->survey) ? $lead->survey->customer_name : ($lead->fname.' '.$lead->lname)) }}">
                                    @if($errors->has('customer_name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('customer_name') }}
                                    </em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Full Address*
                                </th>
                                <td>
                                    <input type="text" id="address" name="address" class="form-control required" value="{{ old('address', isset($lead->survey) ? $lead->survey->address : $lead->address) }}">
                                    @if($errors->has('address'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('address') }}
                                    </em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Permit #*
                                </th>
                                <td>
                                    <input type="text" id="permit_no" name="permit_no" class="form-control required" value="{{ old('permit_no', isset($lead->survey) ? $lead->survey->permit_no : '') }}">
                                    @if($errors->has('permit_no'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('permit_no') }}
                                    </em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Inspection Date*
                                </th>
                                <td class="form-group">
                                    <input type=" text" id="inspection_date" name="inspection_date" class="form-control date required" value="{{ old('inspection_date', isset($lead->survey) ? $lead->survey->inspection_date : '') }}">
                                    @if($errors->has('inspection_date'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('inspection_date') }}
                                    </em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Inspection Complete?*
                                </th>
                                <td class="form-group">
                                    <select name="inspection_completed" id="inspection_completed " class="form-control select2 required">
                                        <option value="0" {{ (isset($lead->survey) && $lead->survey->inspection_completed==0) ?'selected' : '' }}>No</option>

                                        <option value="1" {{ (isset($lead->survey) && $lead->survey->inspection_completed==1) ?'selected' : '' }}>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Inspector Name*
                                </th>
                                <td class="form-group">
                                    <input type=" text" id="inspector_name" name="inspector_name" class="form-control required" value="{{ old('inspector_name', isset($lead->survey) ? $lead->survey->inspector_name : '') }}">
                                    @if($errors->has('inspector_name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('inspector_name') }}
                                    </em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                @endif
                <!-- Survey From start here -->
                @if($lead->status_id==5)
                <form id="surveyupdate" action="{{ route("dealer.leads.surveyupdate", [$lead->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">Survey</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    Was the EV charger functioning at the completion of installation?
                                </th>
                                <td class="form-group">
                                    <select name="charger_completion_of_installation" id="charger_completion_of_installation required" class="form-control w-100 ">
                                        <option value="0" {{ (isset($lead->survey) && $lead->survey->charger_completion_of_installation==0) ?'selected' : '' }}>No</option>
                                        <option value="1" {{ (isset($lead->survey) && $lead->survey->charger_completion_of_installation==1) ?'selected' : '' }}>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Did the Vehya rep show you how to use the EV charger?
                                </th>
                                <td class="form-group">
                                    <select name="how_use_charger" id="how_use_charger required" class="form-control w-100 ">
                                        <option value="0" {{ (isset($lead->survey) && $lead->survey->how_use_charger==0) ?'selected' : '' }}>No</option>
                                        <option value="1" {{ (isset($lead->survey) && $lead->survey->how_use_charger==1) ?'selected' : '' }}>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Was there a vehicle to demonstrate the EV charger?
                                </th>
                                <td class="form-group">
                                    <select name="demonstrate_charger" id="demonstrate_charger required" class="form-control w-100 ">
                                        <option value="0" {{ (isset($lead->survey) && $lead->survey->demonstrate_charger==0) ?'selected' : '' }}>No</option>
                                        <option value="1" {{ (isset($lead->survey) && $lead->survey->demonstrate_charger==1) ?'selected' : '' }}>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Are you interested in a service contract for your EV charger(s)?
                                </th>
                                <td class="form-group">
                                    <select name="interested_service_contract" id="interested_service_contract required" class="form-control w-100 ">
                                        <option value="0" {{ (isset($lead->survey) && $lead->survey->interested_service_contract==0) ?'selected' : '' }}>No</option>
                                        <option value="1" {{ (isset($lead->survey) && $lead->survey->interested_service_contract==1) ?'selected' : '' }}>Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Surveyed Name*
                                </th>
                                <td>
                                    <input type="text" id="surveyed_name" name="surveyed_name" class="form-control required" value="{{ old('surveyed_name', isset($lead->survey) ? $lead->survey->surveyed_name : '') }}">
                                    @if($errors->has('surveyed_name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('surveyed_name') }}
                                    </em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Phone Number*
                                </th>
                                <td>
                                    <input type="text" id="phone" name="phone" class="form-control required" value="{{ old('phone', isset($lead->survey) ? $lead->survey->phone : '') }}">
                                    @if($errors->has('phone'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('phone') }}
                                    </em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Email Address*
                                </th>
                                <td class="form-group">
                                    <input type="email" id="email" name="email" class="form-control email required" value="{{ old('email', isset($lead->survey) ? $lead->survey->email : '') }}">
                                    @if($errors->has('email'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="form-group">
                                    Pic of Charger Installed
                                    <input id="charger_installed_image" type="file" class="form-control @error('charger_installed_image') is-invalid @enderror" name="charger_installed_image">

                                    @error('charger_installed_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <p class="helper-block">
                                        @if(isset($lead->survey) && !empty($lead->survey->charger_installed_image))
                                        <a class="show-img" href="#" src="{{asset('storage/uploads/leads/'.$lead->survey->charger_installed_image)}}">{{$lead->survey->charger_installed_image}}</a>
                                        @endif
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="form-group">
                                    Electrical Panel Image
                                    <input id="electrical_panel_image" type="file" class="form-control @error('electrical_panel_image') is-invalid @enderror" name="electrical_panel_image">

                                    @error('electrical_panel_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <p class="helper-block">
                                        @if(isset($lead->survey) && !empty($lead->survey->electrical_panel_image))
                                        <a class="show-img" href="#" src="{{asset('storage/uploads/leads/'.$lead->survey->electrical_panel_image)}}">{{$lead->survey->electrical_panel_image}}</a>
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="form-group">
                                    Property Exterior Image
                                    <input id="exterior_property_image" type="file" class="form-control @error('exterior_property_image') is-invalid @enderror" name="exterior_property_image">

                                    @error('exterior_property_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <p class="helper-block">
                                        @if(isset($lead->survey) && !empty($lead->survey->exterior_property_image))
                                        <a class="show-img" href="#" src="{{asset('storage/uploads/leads/'.$lead->survey->exterior_property_image)}}">{{$lead->survey->exterior_property_image}}</a>
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="form-group">
                                    <textarea id="detail" name="detail" class="form-control required" placeholder="Description">{{ old('detail', isset($lead->survey) ? $lead->survey->detail : '') }}</textarea>
                                    @if($errors->has('detail'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('detail') }}
                                    </em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                @endif
            </div>
        </div>
        <a class="btn btn-default my-2" href="{{ url()->previous() }}">
            {{ trans('global.back_to_list') }}
        </a>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
    </div>
</div>
<div id="my-modal" class="modal fade" aria-labelledby="my-modalLabel" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog" data-dismiss="modal">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <iframe src="" class="gallery" width="400" height="400"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(".show-img").click(function(e) {
        e.preventDefault();
        $('.gallery').attr('src', $(this).attr('src'));
        $('#my-modal').modal('show');
    });
</script>
<script>
    $(function() {
        $("#surveyupdate").validate();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var agentVal;
        $("#assigned_to_agent_id").change(function(e) {
            var newAgentVal = $(this).val();
            var con = confirm("Are you sure you want to update agent for this record?");
            if (!con) {
                $(this).val(agentVal);
                return false;
            }
            agentVal = newAgentVal;
            $.ajax({
                url: "{{ route('dealer.leads.assignagent') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    _token: _token,
                    leadid: '{{$leadid}}',
                    agentid: $(this).val()
                },
                success: function(data) {
                    alert(data.message);
                }
            });
        });
    });
</script>
@stop