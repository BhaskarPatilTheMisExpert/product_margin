@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <strong>Add/Edit Key Updates</strong>
    </div>

    @if(!empty($currentMonthCycle))
    <div class="card-body">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>

        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <div>
                &nbsp; Once the workstream/borrower is selected, it can be changed through clicking on submit/cancel button only. 
            </div>
        </div>

        <form method="POST" action="{{ url('admin/key-updates/save-update') }}" id="arpDownForm" onsubmit="return validateForm()">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label class="required" for="workstream">{{ trans('cruds.user_workstream.fields.workstream') }}</label>
                        <select class="form-control select2 disDropdown {{ $errors->has('workstream') ? 'is-invalid' : '' }}" name="workstreamId" id="workstream" onchange="getKeyUpdatesForWorkstream(this.value)">
                            <option value="">Select</option>
                            @foreach($workstreams as $id => $workstream)
                            <option value="{{ $id }}" {{ $id == old('workstream') ? 'selected' : '' }}>{{ $workstream }}</option>
                            @endforeach
                        </select>
                        <div class="validationAlert" id="workstream_div">
                        </div>
                        @if($errors->has('workstream'))
                            <div class="invalid-feedback">
                                {{ $errors->first('workstream') }}
                            </div>
                        @endif
                        <span class="help-block" id="help-block-workstream">{{ trans('cruds.user_workstream.fields.title_helper') }}</span>
                    </div>
                    <div class="col-sm-3">
                        <label class="" for="date">Date</label>
                        <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', date('d-M-Y')) }}" required readonly>
                        @if($errors->has('date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('date') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-3">
                        <label class="" for="monthWindow">Month-Window</label>
                        <input class="form-control {{ $errors->has('monthWindow') ? 'is-invalid' : '' }}" type="text" name="monthWindow" id="monthWindow" value="{{ old('monthWindow', date('M').'-Window-0'.$currentMonthCycle) }}" required readonly>
                        @if($errors->has('facility'))
                            <div class="invalid-feedback">
                                {{ $errors->first('facility') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-3" style="display: none;" id="update-available-div">
                        <label class="" for="facility">Update Available</label>
                        <select class="form-control disDropdown {{ $errors->has('updateAvailable') ? 'is-invalid' : '' }}" name="updateAvailable" id="updateAvailable" onchange="getBorrowersForWorkstream(this.value)"  required>
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <div class="validationAlert" id="updateAvailable_div">
                        </div>
                        @if($errors->has('updateAvailable'))
                            <div class="invalid-feedback">
                                {{ $errors->first('updateAvailable') }}
                            </div>
                        @endif
                        <span class="help-block" id="help-block-update">{{ trans('cruds.user_workstream.fields.title_helper') }}</span>
                    </div>
                </div>
            </div>
            <div id="key-update-detail-div" style="display: none;">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="required" for="borrowerGroup">Borrower Group</label>
                            <select class="form-control select2 disDropdown {{ $errors->has('borrowerGroup') ? 'is-invalid' : '' }}" name="borrowerGroup" id="borrowerGroup" onchange="getKeyUpdatesForBorrower(this.value)">
                                <option value="">Select</option>
                            </select>
                            <div class="validationAlert" id="borrowerGroup_div">
                            </div>
                            @if($errors->has('borrowerGroup'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('borrowerGroup') }}
                                </div>
                            @endif
                            <span class="help-block" id="help-block-borrower">{{ trans('cruds.user_workstream.fields.title_helper') }}</span>
                        </div>
                        <div class="col-sm-3">
                            <label class="" for="npa">NPA</label>
                            <input class="form-control {{ $errors->has('npa') ? 'is-invalid' : '' }}" type="text" name="npa" id="npa" value="{{ old('npa', '') }}" required readonly>

                            <input class="form-control" type="hidden" name="recordId" id="recordId" value="" required readonly>

                            @if($errors->has('npa'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('npa') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            <label class="" for="overdue">Overdue (No. of days)</label>
                            <input class="form-control {{ $errors->has('overdue') ? 'is-invalid' : '' }}" type="text" name="overdue" id="overdue" value="{{ old('overdue', '') }}" required readonly>
                            @if($errors->has('overdue'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('overdue') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group shadow-textarea">
                    <label for="keyUpdate">Key Updates</label>
                    <textarea class="form-control z-depth-1" id="keyUpdate" name="keyUpdate" rows="3" placeholder="Enter update..."></textarea>
                    <div class="validationAlert" id="keyUpdate_div"></div>
                    @if($errors->has('keyUpdate'))
                        <div class="invalid-feedback">
                            {{ $errors->first('keyUpdate') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="card" id="last-key-updates-div" style="display: none;">
                <div class="card-header">
                    <strong>Last Key updates</strong> 
                </div>
                <div class="card-body">            
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="" for="monthWindow">Month-Window</label>
                                <input class="form-control" type="text" value="" id="preMonthWindow" name="preMonthWindow" readonly>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group shadow-textarea">
                        <label for="preKeyUpdate">Key Updates</label>
                        <textarea class="form-control z-depth-1" id="preKeyUpdate" rows="3" placeholder="" readonly id="preKeyUpdate" name="preKeyUpdate"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-action text-center">
                <button class="btn btn-primary px-4" type="submit" >Submit</button>
                <button class="btn btn-danger px-4" type="button" onclick="resetDownloadForm()">Cancel</button>
            </div>
        </form>
    </div>
    @else
    <div class="card-body">
        <div class="alert alert-info">
            Addition or updation for key updates are not allowed. Window is closed.
        </div>
    </div>
    @endif
</div>
@endsection

@section('scripts')
@parent
<script>
    function getKeyUpdatesForWorkstream(workstream) {
        $(".validationAlert").hide();
        if(workstream != ''){
            $.ajax({
                url : '{{ url("admin/key-updates/workstream-data") }}',
                method : 'post',
                dataType: 'json',
                data : { workstreamId : workstream },
                beforeSend : function () {
                    $("#help-block-workstream").html("Fetching data....");
                },
                success : function(data){
                    if(data.success == '1'){
                        $("#update-available-div").show();
                        let updateAvailable = data.data.updateAvailable;
                        if(updateAvailable == 'Y'){
                            $('#updateAvailable').replaceWith('<input type="text" class="form-control disDropdown" name="updateAvailable" id="updateAvailable" value="Yes" readonly>');
                            getBorrowersForWorkstream('Yes');
                        }else if(updateAvailable == 'N'){
                            $("#updateAvailable").val('No');
                        }else{
                            $("#updateAvailable").val('');
                        }
                    }else{
                        alert(data.data);
                    }
        
                },
                complete : function(){
                    $("#workstream").prop('disabled',true);
                    $("#help-block-workstream").html("");
                }
            });
        }else{
            
        }
    }

    function getBorrowersForWorkstream(selectedValue) {
        if(selectedValue == 'Yes'){
            $.ajax({
                url : '{{ url("admin/get-borrower-group") }}',
                method : 'post',
                dataType: 'json',
                data : { workstreamId : $("#workstream").val() },
                beforeSend : function () {
                    $("#help-block-update").html("Loading borrowers .....");
                },
                success : function(data){
                    if(data.success == '1'){
                        var options = $("#borrowerGroup");
                        options.empty();
                        options.append(new Option("Select", ""));
                        $.each(data.data, function (index,value) {
                            options.append(new Option(value, value));
                        });
                        $("#key-update-detail-div").show(); 
                    }else{
                        alert(data.data);
                    }
        
                },
                complete : function(){
                    $("#updateAvailable").prop('disabled',true);
                    $("#help-block-update").html("");
                }
            });
        }else if(selectedValue == 'No' || selectedValue == ""){
            $("#key-update-detail-div").hide(); 
            // empty all values here
        }
        /* 
            var options = $("#facility");
            options.empty();
            options.append(new Option("Select", ""))
        */
    }

    function resetDownloadForm() {
        window.location.href = '{{ url("admin/key-updates/create") }}'
    }

    function validateForm() {
        $(".validationAlert").hide();
        if($("#workstream").val() == ''){
            $("#workstream_div").html("Please select workstream").show();
            return false;
        }
        if($("#updateAvailable").val() == ""){
            $("#updateAvailable_div").html("Please select update available").show();
            return false;
        }
        if($("#updateAvailable").val() == "Yes"){
            if(jQuery.trim($("#keyUpdate").val()).length <= 0){
                $("#keyUpdate_div").html("Please enter update.").show();
                return false;
            }
            if(jQuery.trim($("#keyUpdate").val()).length > 1000){
                $("#keyUpdate_div").html("Upto 1000 characters are allowed.").show();
                return false;
            }
        }
        $('.disDropdown').prop("disabled", false);
        return true;
    }

    function getKeyUpdatesForBorrower(borrower) {
        if(borrower != ''){
            $.ajax({
                url : '{{ url("admin/key-updates/borrower-data") }}',
                method : 'post',
                dataType: 'json',
                data : { workstreamId : $("#workstream").val() , borrower, currentWondow : $("#monthWindow").val()},
                beforeSend : function () {
                    $("#help-block-borrower").html("Fetching data .....");
                },
                success : function(data){
                    if(data.success == '1'){
                        console.log(data.data.preKeyUpdate);
                        $("#npa").val(data.data.npa);
                        $("#overdue").val(data.data.overdueDays);
                        $("#keyUpdate").val(data.data.keyUpdate);
                        $("#preMonthWindow").val(data.data.preMonthWindow);
                        $("#preKeyUpdate").val(data.data.preKeyUpdate);
                        $("#recordId").val(data.data.recordId);
                    }else{
                        alert(data.data);
                    }
        
                },
                complete : function(){
                    $("#help-block-borrower").html("");
                    $("#borrowerGroup").prop('disabled',true);
                    $("#last-key-updates-div").show();
                }
            });
        }
    }

</script>
@endsection