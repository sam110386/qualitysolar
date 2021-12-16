@extends('layouts.admin')
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
                            {{ trans('cruds.lead.fields.title') }}
                        </th>
                        <td>
                            {{ $lead->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.content') }}
                        </th>
                        <td>
                            {!! $lead->content !!}
                        </td>
                    </tr>
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
                            {{ trans('cruds.lead.fields.priority') }}
                        </th>
                        <td>
                            {{ $lead->priority->name ?? '' }}
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
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.author_name') }}
                        </th>
                        <td>
                            {{ $lead->author_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.author_email') }}
                        </th>
                        <td>
                            {{ $lead->author_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.assigned_to_user') }}
                        </th>
                        <td>
                            {{ $lead->assigned_to_user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.comments') }}
                        </th>
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
                                <div class="row">
                                    <div class="col">
                                        <p>There are no comments.</p>
                                    </div>
                                </div>
                                <hr />
                            @endforelse
                            <form action="{{ route('admin.leads.storeComment', $lead->id) }}" method="POST">
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
        </div>
        <a class="btn btn-default my-2" href="{{ route('admin.leads.index') }}">
            {{ trans('global.back_to_list') }}
        </a>

        <a href="{{ route('admin.leads.edit', $lead->id) }}" class="btn btn-primary">
            @lang('global.edit') @lang('cruds.lead.title_singular')
        </a>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
    </div>
</div>
@endsection