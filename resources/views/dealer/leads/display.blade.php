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
        <div class="mb-2">
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
@endsection