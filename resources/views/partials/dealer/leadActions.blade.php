@if(isset($acceptGate) && $acceptGate)
<a class="btn btn-xs btn-primary" href="{{ route('dealer.' . $crudRoutePart . '.accept', $row->id) }}">
    Accept
</a>
@endif
@if(isset($rejectGate) && $rejectGate)
<a class="btn btn-xs btn-danger" href="{{ route('dealer.' . $crudRoutePart . '.reject', $row->id) }}">
    Reject
</a>
@endif
@if(isset($viewGate) && $viewGate)
<a class="btn btn-xs btn-primary" href="{{ route('dealer.' . $crudRoutePart . '.show', $row->id) }}">
    {{ trans('global.view') }}
</a>
@endif
@if(isset($activeGate) && $activeGate)
<a class="btn btn-xs btn-info" href="{{ route('dealer.' . $crudRoutePart . '.activate', $row->id) }}">
    Active
</a>
@endif
@if(isset($completeGate) && $completeGate)
<a class="btn btn-xs btn-info" href="{{ route('dealer.' . $crudRoutePart . '.completelead', $row->id) }}">
    Complete
</a>
@endif
@if(isset($editGate) && $editGate)
<a class="btn btn-xs btn-info" href="{{ route('dealer.' . $crudRoutePart . '.edit', $row->id) }}">
    {{ trans('global.edit') }}
</a>
@endif
@if(isset($deleteGate) && $deleteGate)
<form action="{{ route('dealer.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
</form>
@endif