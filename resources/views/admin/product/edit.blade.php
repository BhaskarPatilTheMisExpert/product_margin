@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Product</h5>
    </div>

    <div class="card-body">
        <form autocomplete="off" id="editForm" method="GET" action="{{ route('admin.updateProduct',$productDetails->id)}}" enctype="multipart/form-data" onsubmit="">
            @csrf
            <h5>A. Product</h5>
            <hr>

            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="required" for="clientName">Client Name</label>
                    <input class="form-control  {{ $errors->has('clientName') ? 'is-invalid' : '' }}" name="clientName" id="clientName" placeholder="Client name" value="{{$productDetails->client_name}}">
                    @if($errors->has('clientName'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clientName') }}
                    </div>
                    @endif
                    <span class="error" id="clientName-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="phoneNumber">Phone number </label>
                    <input class="form-control  {{ $errors->has('phoneNumber') ? 'is-invalid' : '' }}" name="phoneNumber" id="phoneNumber" placeholder="phone nubmer" value="{{$productDetails->phone_number}}" type="number">
                    @if($errors->has('phoneNumber'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phoneNumber') }}
                    </div>
                    @endif
                    <span class="error" id="phoneNumber-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="margin">Margin</label>
                    <select class="form-control  {{ $errors->has('margin') ? 'is-invalid' : '' }}" name="margin" id="nameOfBranch" placeholder="margin">
                        <option value="Y" {{ $productDetails->margin == 'Y' ? 'selected' : '' }}>Yes</option>
                        <option value="N" {{ $productDetails->margin == 'N' ? 'selected' : '' }}>No </option>
                    </select>
                    @if($errors->has('margin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('margin') }}
                    </div>
                    @endif
                    <span class="error" id="margin-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="marginAmount">Margin amount </label>
                    <input class="form-control  {{ $errors->has('marginAmount') ? 'is-invalid' : '' }}" name="marginAmount" id="marginAmount" placeholder="Margin Amount" value="{{ $productDetails->margin_amount}}" type="number">
                    @if($errors->has('marginAmount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marginAmount') }}
                    </div>
                    @endif
                    <span class="error" id="marginAmount-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="product">Product</label>
                    <select class="form-control  {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product" id="product" placeholder="product" value="">
                        <option value="IP" {{ $productDetails->product == 'IP' ? 'selected' : '' }}>IP</option>
                        <option value="IAP" {{ $productDetails->product == 'IAP' ? 'selected' : '' }}>IAP </option>
                        <option value="TGS" {{ $productDetails->product == 'TGS' ? 'selected' : '' }}>TGS </option>
                        <option value="TejiMandi" {{ $productDetails->product == 'TejiMandi' ? 'selected' : '' }}>TejiMandi </option>
                        <option value="SSP" {{ $productDetails->product == 'SSP' ? 'selected' : '' }}>SSP </option>
                        <option value="Loan" {{ $productDetails->product == 'Loan' ? 'selected' : '' }}>Loan </option>

                    </select>
                    @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                    @endif
                    <span class="error" id="product-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="userTeam">User Team</label>
                    <select class="form-control  {{ $errors->has('userTeam') ? 'is-invalid' : '' }}" name="userTeam" id="userTeam" placeholder="userTeam" value="">
                        <option value="Malad" {{ $productDetails->user_team == 'Malad' ? 'selected' : '' }}>Malad</option>
                        <option value="Thane" {{ $productDetails->user_team == 'Thane' ? 'selected' : '' }}>Thane </option>
                        <option value="Hyderabad" {{ $productDetails->user_team == 'Hyderabad' ? 'selected' : '' }}>Hyderabad </option>

                    </select>
                    @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                    @endif
                    <span class="error" id="product-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="clientCode">Client code </label>
                    <input class="form-control  {{ $errors->has('clientCode') ? 'is-invalid' : '' }}" name="clientCode" id="clientCode" placeholder="Client code" value="{{ $productDetails->client_code}}">
                    @if($errors->has('clientCode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clientCode') }}
                    </div>
                    @endif
                    <span class="error" id="clientCode-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="empCode">Emp code </label>
                    <input class="form-control  {{ $errors->has('empCode') ? 'is-invalid' : '' }}" name="empCode" id="clientCode" placeholder="EMP code" value="{{ $productDetails->emp_code}}">
                    @if($errors->has('empCode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('empCode') }}
                    </div>
                    @endif
                    <span class="error" id="empCode-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="managerCode">Manager Code</label>
                    <select class="form-control  {{ $errors->has('managerCode') ? 'is-invalid' : '' }}" name="managerCode" id="managerCode" placeholder="managerCode">
                        <option value="M001" {{ $productDetails->manager_code == 'M001' ? 'selected' : '' }}>M001</option>
                        <option value="M002" {{ $productDetails->manager_code == 'M002' ? 'selected' : '' }}>M002 </option>
                        <option value="M003" {{ $productDetails->manager_code == 'M003' ? 'selected' : '' }}>M003 </option>

                    </select>
                    @if($errors->has('managerCode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('managerCode') }}
                    </div>
                    @endif
                    <span class="error" id="managerCode-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="remarks">Remarks </label>
                    <input class="form-control  {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks" placeholder="Remarks" value="{{ $productDetails->remark}}" type="text">
                    @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                    @endif
                    <span class="error" id="remarks-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="status">Status </label>
                    <select class="form-control  {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="managerCode" placeholder="status" value="">
                        <option value="H" {{ $productDetails->status == 'H' ? 'selected' : '' }}>Hot</option>
                        <option value="W" {{ $productDetails->status == 'W' ? 'selected' : '' }}>Warm </option>

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
                    <input class="form-control  {{ $errors->has('clientCodeMargin') ? 'is-invalid' : '' }}" name="clientCodeMargin" id="clientCodeMargin" placeholder="Client code" value="{{$productDetails->client_code_margin}}">
                    @if($errors->has('clientCodeMargin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clientCodeMargin') }}
                    </div>
                    @endif
                    <span class="error" id="clientCodeMargin-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="customerName">Customer Name </label>
                    <input class="form-control  {{ $errors->has('customerName') ? 'is-invalid' : '' }}" name="customerName" id="customerName" placeholder="Client name" value="{{$productDetails->customer_name_margin}}">
                    @if($errors->has('customerName'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customerName') }}
                    </div>
                    @endif
                    <span class="error" id="customerName-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="marginPayoutAmount">Margin payout amount </label>
                    <input class="form-control  {{ $errors->has('marginPayoutAmount') ? 'is-invalid' : '' }}" name="marginPayoutAmount" id="marginPayoutAmount" placeholder="phone nubmer" value="{{$productDetails->margin_payout_amount_margin}}" type="number">
                    @if($errors->has('marginPayoutAmount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marginPayoutAmount') }}
                    </div>
                    @endif
                    <span class="error" id="marginPayoutAmount-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="accountAcivationDate">Account Activation Date </label>
                    <input class="form-control  {{ $errors->has('accountAcivationDate') ? 'is-invalid' : '' }}" name="accountAcivationDate" id="accountAcivationDate" placeholder="phone nubmer" value="{{$productDetails->account_acitivation_date_margin}}" type="date">
                    @if($errors->has('accountAcivationDate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('accountAcivationDate') }}
                    </div>
                    @endif
                    <span class="error" id="accountAcivationDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="marginPayoutDate">Margin Payout Date </label>
                    <input class="form-control  {{ $errors->has('marginPayoutDate') ? 'is-invalid' : '' }}" name="marginPayoutDate" id="marginPayoutDate" placeholder="Phone Nubmer" value="{{$productDetails->margin_payout_date_margin}}" type="date">
                    @if($errors->has('marginPayoutDate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marginPayoutDate') }}
                    </div>
                    @endif
                    <span class="error" id="marginPayoutDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="userTeamMargin">User Team</label>
                    <input class="form-control  {{ $errors->has('userTeamMargin') ? 'is-invalid' : '' }}" name="userTeamMargin" id="userTeamMargin" placeholder="User Team" value="{{$productDetails->user_team_margin}}" type="text">
                      
                    @if($errors->has('userTeamMargin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('userTeamMargin') }}
                    </div>
                    @endif
                    <span class="error" id="userTeamMargin-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="empCodeMargin">Emp code </label>
                    <input class="form-control  {{ $errors->has('empCodeMargin') ? 'is-invalid' : '' }}" name="empCodeMargin" id="clientCode" placeholder="EMP code" value="{{$productDetails->emp_code_margin}}" type="number">
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