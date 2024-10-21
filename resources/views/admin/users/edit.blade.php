@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data" autocomplete="off" onsubmit="return validateForm()">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-sm-4">
                    <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" placeholder="Name" value="{{ old('name', $user->name) }}" autocomplete="off">
                    @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                </div>
                <div class="form-group col-sm-4">
                    <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="Email" autocomplete="off">
                    @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                </div>
                <div class="form-group col-sm-4">
                    <label class="required" for="name">Employee ID</label>
                    <input class="form-control {{ $errors->has('emp_id') ? 'is-invalid' : '' }}" type="text" name="emp_id" id="emp_id" value="{{ old('emp_id', $user->emp_id) }}" placeholder="Employee ID" autocomplete="off">
                    @if($errors->has('emp_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('emp_id') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                </div>
                <div class="form-group col-sm-4">
                    <label class="required" for="ldap">LDAP Username</label>
                    <input class="form-control {{ $errors->has('') ? 'is-invalid' : '' }}" type="text" name="ldap_username" id="ldap" value="{{ old('ldap_username', $user->ldap_username) }}" placeholder="LDAP Username" autocomplete="off">
                    @if($errors->has('ldap_username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ldap_username') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                </div>
                <div class="form-group col-sm-4">
                    <label class="" for="password">{{ trans('cruds.user.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" minlength="8" placeholder="Password" autocomplete="off">
                    @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                </div>

                <div class="form-group col-sm-4">
                    <label class="required" for="email">Mobile No.</label>
                    <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="number" name="mobile" maxlength="10" id="mobile" value="{{ old('mobile', $user->mobile) }}" placeholder="Mobile No" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off">
                    @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                </div>
                @can('user_status_change')
                <div class="form-group col-sm-4">
                    <label class="required" for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="" selected>Select</option>
                        <option value="A" {{ (in_array("A", old('status', [])) || $user->status == "A" ) ? 'selected' : '' }}>
                            Active</option>
                        <option value="I" {{ (in_array("I", old('status', [])) || $user->status == "I" ) ? 'selected' : '' }}>
                            Inactive</option>
                        <option value="D" {{ (in_array("D", old('status', [])) || $user->status == "D" ) ? 'selected' : '' }}>
                            Dormant</option>
                        <option value="L" {{ (in_array("L", old('status', [])) || $user->status == "L" ) ? 'selected' : '' }}>
                            Locked</option>
                    </select>
                    @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                    @endif
                </div>
                @endcan
                <!-- <div class="form-group col-sm-4">
                    <label class="required" for="user_type">Type</label>
                    <select class="form-control" name="user_type" id="user_type">
                        <option value="" selected>Select</option>
                        <option value="I" {{ (in_array("I", old('user_type', [])) || $user->user_type == "I" ) ? 'selected' : '' }}>
                            Internal</option>
                        <option value="E" {{ (in_array("E", old('user_type', [])) || $user->user_type == "E" ) ? 'selected' : '' }}>
                            External</option>
                    </select>
                    @if($errors->has('user_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_type') }}
                    </div>
                    @endif
                </div>-->
                <div class="form-group fc-tag-input col-sm-4">
                    <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                    <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" size="5" name="roles[]" id="roles" multiple>
                        @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', $user->roles->pluck('id')->toArray())) ? 'selected' : '') }}>
                            {{ $role }}
                        </option>
                        @endforeach
                    </select>
                    <div id="select" style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-secondary " href="{{ route('admin.users.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@section('styles')
<style>
    .error {
        color: red;
    }

    input::-webkit-outer-spin-button,

    input::-webkit-inner-spin-button {

        -webkit-appearance: none;

        margin: 0;

    }

    input[type=number] {

        -moz-appearance: textfield;


    }
</style>
@endsection
<script>
    $(document).ready(function() {
        document.getElementById("name").focus();
    });

    function validateForm() {
        var name = $('#name').val();
        var email = $('#email').val();
        var empid = $('#emp_id').val();
        var ldap = $('#ldap').val();
        var mobile = $('#mobile').val();
        var status = $('#status').val();
        var type = $('#user_type').val();
        var roles = $('#roles > option:selected');
        var em = /[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}/;

        $(".error").remove();
        if (name == "") {
            document.getElementById("name").focus();
            $('#name').after('<span class="error">*Name is required.</span>');
            return false;
        } else if (email == "") {
            document.getElementById("email").focus();
            $('#email').after('<span class="error">*Email is required</span>');
            return false;

        } else if (!email.match(em)) {
            document.getElementById("email").focus();
            $('#email').after('<span class="error">*Invalid email format</span>');
            return false;
        } else
        if (empid == "") {
            document.getElementById("emp_id").focus();
            $('#emp_id').after('<span class="error">*Employee ID is required.</span>');
            return false;

        } else if (ldap == "") {
            document.getElementById("ldap").focus();
            $('#ldap').after('<span class="error">*LDAP username is required.</span>');
            return false;

        } else if (mobile == "") {
            document.getElementById("mobile").focus();
            $('#mobile').after('<span class="error">*Mobile No is required.</span>');
            return false;

        } else if (mobile.length < 10) {
            document.getElementById("mobile").focus();
            $('#mobile').after('<span class="error">*Invalid mobile no.</span>');
            return false;

        } else if (status == "") {
            document.getElementById("status").focus();
            $('#status').after('<span class="error">*Employee status is required.</span>');
            return false;

        }
        // else if (type == "") {
        //     document.getElementById("user_type").focus();
        //     $('#user_type').after('<span class="error">*User type is required.</span>');
        //     return false;

        // } 
        else if (roles.length < 1) {
            document.getElementById("roles").focus();
            $('#select').after('<span class="error">*Role is required.</span>');
            return false;

        } else {
            return true;
        }
    }
</script>



@endsection