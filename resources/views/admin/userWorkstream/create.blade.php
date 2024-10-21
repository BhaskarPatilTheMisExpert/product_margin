@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user_workstream.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-workstream.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user">{{ trans('cruds.user_workstream.fields.title') }}</label>
                <select class="form-control select2 {{ $errors->has('workstreams') ? 'is-invalid' : '' }}" name="user" id="user" required>
                    <option value="">Select</option>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ $id == old('user') ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user_workstream.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="workstreams">{{ trans('cruds.user_workstream.fields.workstream') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('workstreams') ? 'is-invalid' : '' }}" name="workstreams[]" id="workstreams" multiple required>
                    @foreach($workstreams as $id => $workstream)
                        <option value="{{ $id }}" {{ in_array($id, old('workstreams', [])) ? 'selected' : '' }}>{{ $workstream }}</option>
                    @endforeach
                </select>
                @if($errors->has('workstreams'))
                    <div class="invalid-feedback">
                        {{ $errors->first('workstreams') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{route('admin.user-workstream.index')}}" class="btn btn-secondary">Cancel</a>

            </div>
        </form>
    </div>
</div>



@endsection