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
                            <input type="radio" id="questions_{{$question['name']}}" name="questions[{{$question['name']}}]" value="{{$key}}" class="formcontrol"   /> {{$lab}}
                        </div>
                        @endforeach
                        </div>
                    @endif
                    @if($question['type']=='checkbox')
                        <div class="checkbox-group">
                        @foreach($question['options'] as $key=>$lab )
                        <div class="col-sm-4">
                            <input type="checkbox" id="questions_{{$key}}" name="questions[{{$question['name']}}][]" value="{{$key}}" class="formcontrol"   /> {{$lab}}
                        </div>
                        @endforeach
                        </div>
                    @endif
                    @if($question['type']=='input')
                        <input type="input" id="questions_{{$key}}" name="questions[{{$key}}]" class="form-control"   /> 
                     @endif
                    
                </div>
                @endforeach
            </div>
            

            
            <div class="form-group {{ $errors->has('attachments') ? 'has-error' : '' }}">
                <label for="attachments">{{ trans('cruds.lead.fields.attachments') }}</label>
                <div class="needsclick dropzone" id="attachments-dropzone">

                </div>
                @if($errors->has('attachments'))
                    <em class="invalid-feedback">
                        {{ $errors->first('attachments') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lead.fields.attachments_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.lead.fields.status') }}*</label>
                <select name="status_id" id="status" class="form-control select2" required>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (isset($lead) && $lead->status ? $lead->status->id : old('status_id')) == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status_id') }}
                    </em>
                @endif
            </div>
            
            
            @if(auth()->user()->isAdmin())
                <div class="form-group {{ $errors->has('assigned_to_user_id') ? 'has-error' : '' }}">
                    <label for="assigned_to_user">{{ trans('Dealer') }}</label>
                    <select name="assigned_to_user_id" id="assigned_to_user" class="form-control select2">
                        @foreach($assigned_to_users as $id => $assigned_to_user)
                            <option value="{{ $id }}" {{ (isset($lead) && $lead->assigned_to_user ? $lead->assigned_to_user->id : old('assigned_to_user_id')) == $id ? 'selected' : '' }}>{{ $assigned_to_user }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('assigned_to_user_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('assigned_to_user_id') }}
                        </em>
                    @endif
                </div>
            @endif
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.leads.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($lead) && $lead->attachments)
          var files =
            {!! json_encode($lead->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop