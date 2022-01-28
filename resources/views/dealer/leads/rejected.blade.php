@extends('layouts.dashboard')
@section('content')
@can('lead_create')
<div style="margin-bottom: 10px;" class="row">
  <div class="col-lg-12">

  </div>
</div>
@endcan
<div class="card">
  <div class="card-header">
    {{ trans('cruds.lead.title_singular') }} {{ trans('global.list') }}
  </div>

  <div class="card-body">
    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Lead">
      <thead>
        <tr>
          <th>
            {{ trans('cruds.lead.fields.id') }}
          </th>
          <th>
            {{ trans('cruds.lead.fields.status') }}
          </th>
          <th>
            {{ trans('Name') }}
          </th>
          <th>
            {{ trans('Email') }}
          </th>
          <th>
            {{ trans('Phone') }}
          </th>
          <th>
            {{ trans('Category') }}
          </th>
          <th>
            {{ trans('Agent') }}
          </th>
          <th>
            &nbsp;
          </th>
        </tr>
      </thead>
    </table>


  </div>
</div>
@endsection
@section('scripts')
@parent
<script>
  $(function() {
    let filters = `
<form class="d-flex" id="filtersForm">
  
  
  <div class="form-group mx-sm-3 mb-2">
    <select class="form-control" name="category">
      <option value="">All categories</option>
      @foreach($categories as $category)
        <option value="{{ $category->id }}"{{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
      @endforeach
    </select>
  </div>
</form>`;
    $('.card-body').on('change', 'select', function() {
      $('#filtersForm').submit();
    })
    let dtButtons = []

    let searchParams = new URLSearchParams(window.location.search)
    let dtOverrideGlobals = {
      buttons: dtButtons,
      processing: true,
      serverSide: true,
      retrieve: true,
      aaSorting: [],
      ajax: {
        url: "{{ route('dealer.leads.rejected') }}",
        data: {
          'status': searchParams.get('status'),
          'category': searchParams.get('category')
        }
      },
      columns: [

        {
          data: 'id',
          name: 'id'
        },
        {
          data: 'status_name',
          name: 'status.name',
          render: function(data, type, row) {
            return '<span style="color:' + row.status_color + '">' + data + '</span>';
          }
        },
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'email',
          name: 'email'
        },
        {
          data: 'phone',
          name: 'phone'
        },
        {
          data: 'category_name',
          name: 'category.name',
          render: function(data, type, row) {
            return '<span style="color:' + row.category_name + '">' + data + '</span>';
          }
        },
        {
          data: 'assigned_to_agent_name',
          name: 'assigned_to_agent.name'
        },
        {
          data: 'actions',
          name: "{{ trans('global.actions ') }}"
        }
      ],
      order: [
        [1, 'desc']
      ],
      pageLength: 100,
    };
    $(".datatable-Lead").one("preInit.dt", function() {
      $(".dataTables_filter").after(filters);
    });
    $('.datatable-Lead').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
    });
  });
</script>
@endsection