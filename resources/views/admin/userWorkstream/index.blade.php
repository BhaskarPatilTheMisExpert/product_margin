@extends('layouts.admin')
@section('content')
@can('user_workstream_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.user-workstream.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.user_workstream.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.user_workstream.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user_workstream.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.user_workstream.fields.workstream') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workstreamData as $key => $workstream)
                        <tr data-entry-id="{{ $workstream->user_id }}">
                            <td>

                            </td>
                            <td>
                                {{ $workstream->users->name ?? '' }}
                            </td>
                            <td>
                                @foreach(explode(",",$workstream->workstreamdata) as $key => $item)
                                    <span class="badge badge-info">{{ $item }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('user_workstream_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.user-workstream.edit', $workstream->user_id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_workstream_delete')
                                    <form action="{{ route('admin.user-workstream.destroy', $workstream->user_id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Role:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection