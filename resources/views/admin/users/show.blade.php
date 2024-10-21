@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        User Details
    </div>

    <div class="card-body">
        <div class="form-group ">
            <a class="btn btn-primary btn-default " href="{{ route('admin.users.index') }}">
                <i class="fas fa-chevron-left"></i> {{ trans('global.back_to_list') }}
            </a>
        </div>
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <!-- <tr> -->
                    <!-- <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td> -->
                    <!-- </tr> -->
                    <tr>
                        <th>
                            Employee ID
                        </th>
                        <td>
                            {{ $user->emp_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            LDAP Username
                        </th>
                        <td>
                            {{ $user->ldap_username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Mobile No.
                        </th>
                        <td>
                            {{ $user->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            User Type
                        </th>
                        <td>
                            @if($user->user_type == 'I')
                            Internal
                            @elseif($user->user_type == 'E')
                            External
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status
                        </th>
                        <td>
                            @if($user->status == 'A')
                            Active
                            @elseif($user->status == 'I')
                            Inactive
                            @elseif($user->status == 'D')
                            Dormant
                            @elseif($user->status == 'E')
                            Locked
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                            <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created At
                        </th>
                        <td>

                            {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Updated At
                        </th>
                        <td>

                            {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') ?? '' }}
                        </td>

                    </tr>
                </tbody>
            </table>

        </div>

    </div>
</div>
@endsection