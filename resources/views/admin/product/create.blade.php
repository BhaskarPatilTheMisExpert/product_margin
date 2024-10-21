@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Create Product-Margin </h5>
    </div>

    <div class="card-body">
        <form autocomplete="off" id="createForm" method="GET" action="{{ route('admin.store-product')}}" enctype="multipart/form-data" onsubmit="">
            @csrf
            <h5>A. Product</h5>
            <hr>
            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="" for="clientName">Client Name</label>
                    <input class="form-control  {{ $errors->has('clientName') ? 'is-invalid' : '' }}" name="clientName" id="clientName" placeholder="Client name" value="">
                    @if($errors->has('clientName'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clientName') }}
                    </div>
                    @endif
                    <span class="error" id="clientName-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="phoneNumber">Phone number </label>
                    <input class="form-control  {{ $errors->has('phoneNumber') ? 'is-invalid' : '' }}" name="phoneNumber" id="phoneNumber" placeholder="phone nubmer" value="" type="number">
                    @if($errors->has('phoneNumber'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phoneNumber') }}
                    </div>
                    @endif
                    <span class="error" id="phoneNumber-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="margin">Margin</label>
                    <select class="form-control  {{ $errors->has('margin') ? 'is-invalid' : '' }}" name="margin" id="nameOfBranch" placeholder="margin" value="">
                        <option value="Y">Yes</option>
                        <option value="N">No </option>
                    </select>
                    @if($errors->has('margin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('margin') }}
                    </div>
                    @endif
                    <span class="error" id="margin-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="marginAmount">Margin amount </label>
                    <input class="form-control  {{ $errors->has('marginAmount') ? 'is-invalid' : '' }}" name="marginAmount" id="marginAmount" placeholder="phone nubmer" value="" type="number">
                    @if($errors->has('marginAmount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marginAmount') }}
                    </div>
                    @endif
                    <span class="error" id="marginAmount-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="product">Product</label>
                    <select class="form-control  {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product" id="product" placeholder="product" value="">
                        <option value="Y">IP</option>
                        <option value="IAP">IAP </option>
                        <option value="TGS">TGS </option>
                        <option value="TejiMandi">TejiMandi </option>
                        <option value="SSP">SSP </option>
                        <option value="Loan">Loan </option>

                    </select>
                    @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                    @endif
                    <span class="error" id="product-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="userTeam">User Team</label>
                    <select class="form-control  {{ $errors->has('userTeam') ? 'is-invalid' : '' }}" name="userTeam" id="userTeam" placeholder="userTeam" value="">
                        <option value="Malad">Malad</option>
                        <option value="Thane">Thane </option>
                        <option value="Hyderabad">Hyderabad </option>

                    </select>
                    @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                    @endif
                    <span class="error" id="product-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="clientCode">Client code </label>
                    <input class="form-control  {{ $errors->has('clientCode') ? 'is-invalid' : '' }}" name="clientCode" id="clientCode" placeholder="Client code" value="">
                    @if($errors->has('clientCode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clientCode') }}
                    </div>
                    @endif
                    <span class="error" id="clientCode-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="empCode">Emp code </label>
                    <input class="form-control  {{ $errors->has('empCode') ? 'is-invalid' : '' }}" name="empCode" id="clientCode" placeholder="EMP code" value="">
                    @if($errors->has('empCode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('empCode') }}
                    </div>
                    @endif
                    <span class="error" id="empCode-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="managerCode">Manager Code</label>
                    <select class="form-control  {{ $errors->has('managerCode') ? 'is-invalid' : '' }}" name="managerCode" id="managerCode" placeholder="managerCode" value="">
                        <option value="M001">M001</option>
                        <option value="M002">M002 </option>
                        <option value="M003">M003 </option>

                    </select>
                    @if($errors->has('managerCode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('managerCode') }}
                    </div>
                    @endif
                    <span class="error" id="managerCode-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="remarks">Remarks </label>
                    <input class="form-control  {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks" placeholder="Remarks" value="" type="text">
                    @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                    @endif
                    <span class="error" id="remarks-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="status">Status </label>
                    <select class="form-control  {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="managerCode" placeholder="status" value="">
                        <option value="H">Hot</option>
                        <option value="W">Warm </option>

                    </select>
                    @if($errors->has('managerCode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('managerCode') }}
                    </div>
                    @endif
                    <span class="error" id="managerCode-error"></span>
                </div>

            </div>
            <h5>B. Margin</h5>
            <hr>
            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="" for="clientCodeMargin">Client code </label>
                    <input class="form-control  {{ $errors->has('clientCodeMargin') ? 'is-invalid' : '' }}" name="clientCodeMargin" id="clientCodeMargin" placeholder="Client code" value="">
                    @if($errors->has('clientCodeMargin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clientCodeMargin') }}
                    </div>
                    @endif
                    <span class="error" id="clientCodeMargin-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="customerName">Customer Name </label>
                    <input class="form-control  {{ $errors->has('customerName') ? 'is-invalid' : '' }}" name="customerName" id="customerName" placeholder="Client name" value="">
                    @if($errors->has('customerName'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customerName') }}
                    </div>
                    @endif
                    <span class="error" id="customerName-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="marginPayoutAmount">Margin payout amount </label>
                    <input class="form-control  {{ $errors->has('marginPayoutAmount') ? 'is-invalid' : '' }}" name="marginPayoutAmount" id="marginPayoutAmount" placeholder="phone nubmer" value="" type="number">
                    @if($errors->has('marginPayoutAmount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marginPayoutAmount') }}
                    </div>
                    @endif
                    <span class="error" id="marginPayoutAmount-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="accountAcivationDate">Account Activation Date </label>
                    <input class="form-control  {{ $errors->has('accountAcivationDate') ? 'is-invalid' : '' }}" name="accountAcivationDate" id="accountAcivationDate" placeholder="phone nubmer" value="" type="date">
                    @if($errors->has('accountAcivationDate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('accountAcivationDate') }}
                    </div>
                    @endif
                    <span class="error" id="accountAcivationDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="marginPayoutDate">Margin Payout Date </label>
                    <input class="form-control  {{ $errors->has('marginPayoutDate') ? 'is-invalid' : '' }}" name="marginPayoutDate" id="marginPayoutDate" placeholder="Phone Nubmer" value="" type="date">
                    @if($errors->has('marginPayoutDate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marginPayoutDate') }}
                    </div>
                    @endif
                    <span class="error" id="marginPayoutDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="userTeamMargin">User Team</label>
                    <input class="form-control  {{ $errors->has('userTeamMargin') ? 'is-invalid' : '' }}" name="userTeamMargin" id="userTeamMargin" placeholder="User Team" value="" type="text">
                      
                    @if($errors->has('userTeamMargin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('userTeamMargin') }}
                    </div>
                    @endif
                    <span class="error" id="userTeamMargin-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="empCodeMargin">Emp code </label>
                    <input class="form-control  {{ $errors->has('empCodeMargin') ? 'is-invalid' : '' }}" name="empCodeMargin" id="clientCode" placeholder="EMP code" value="" type="number">
                    @if($errors->has('empCodeMargin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('empCodeMargin') }}
                    </div>
                    @endif
                    <span class="error" id="empCodeMargin-error"></span>
                </div>



            </div>
            <div class="form-group text-center" style="margin:auto;padding-top:20px">
                <button class="btn btn-primary" type="submit">
                    SUBMIT
                </button>
                <a class="btn btn-dark" href="{{ url()->previous() }}">
                    CANCEL
                </a>
            </div>
        </form>

    </div>
</div>
<script>


</script>
@endsection