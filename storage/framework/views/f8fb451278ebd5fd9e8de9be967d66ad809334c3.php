
<?php $__env->startSection('content'); ?>
<!-- Start filter -->
<div class="filter searchForm card" style="display:none;">
    <div class="card-body">
        <span class="fltr-cls-action">
            <span class="cls-ico-hldr" id="cancleSearch"><i class="fas fa-times"></i></span>
        </span>
        <div class="form-container ">
            <form autocomplete="off" method="GET" action="<?php echo e(route('admin.fmr.index')); ?>" id="target" onsubmit="">
                <div class="form-control-wrapper">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="" for="fmr_search_id">Fraud Number </label>
                                <input class="form-control " id="fmr_search_id" placeholder="Fraud Number" value="<?php echo e(request('fmr_search_id')); ?>" name="fmr_search_id">
                            </div>
                           <div class="col-sm-4">
                          </div>
                         </div><br>
                           <div class="row">
                            <div class="col-sm-4">
                         </div>

                        </div>
                    </div>
                    <div id="error_alert" class="alert alert-danger" style="display:none;"></div>
                    <div style="text-align:center">
                        <input type="submit" class="btn btn-primary" value="SUBMIT" id="search" onsubmit="return validateSearch()">
                        <a class="btn btn-secondary  cancleSearch" onclick="" href="<?php echo e(route('admin.fmr.index')); ?>">CANCEL</a>
                    </div>
                </div> <!-- Form control wrapper end -->
            </form>
        </div>
    </div>
</div>
<!-- End filter -->

<!-- End filter -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="card-title m-0">FMR Borrowals details of <?php echo e($fraudNumber); ?></h1>
        <div class="action-right d-flex">
            <span class="atn-item mr-1">
                <!-- <a class="btn btn-primary" href="<?php echo e(route('admin.fmr.create')); ?>">
                    <i class="fas fa-plus mr-1"></i> Add
                </a> -->
            </span>
            <span class="atn-item">
                <a class="back-btn btn btn-light" href="<?php echo e(route('admin.fmr.index')); ?>">
                    <i class="fa fa-angle-double-left" title="Back"></i>
                </a>
            </span>
        </div>
    </div>
    <div class="card-body">
        <?php if($borrowerDetails): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">Name of party / Account</th>
                        <th class="text-center">Borrowal account number</th>
                        <th class="text-center">Nature of Account</th>
                        <th class="text-center">Date of Sanction</th>
                        <th class="text-center">Sanctioned limit</th>
                        <th class="text-center">Disbursed amount</th>
                        <th class="text-center">Balance Outstanding</th>
                        <!-- <th width="140px">Borrower Group</th> -->

                        <th width="150px" class="text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count =  1;  ?>
                    <?php $__currentLoopData = $borrowerDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowerDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                         <td>
                            <?php echo e($count++); ?>

                        </td>
                        
                        <td>
                            <?php echo e($borrowerDetail->account_name); ?>

                        </td>
                        <td>
                            <?php echo e($borrowerDetail->lan); ?>

                        </td>
                        <td class="text-center">
                            <?php echo e($borrowerDetail->nature_of_account); ?>

                        </td>
                        <td>
                            <?php echo e(\Carbon\Carbon::parse($borrowerDetail->disbursement_date)->format('d-m-y')); ?>

                        </td>
                        <td class="text-right">
                            <?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $borrowerDetail->sanction_limit, 'true')); ?>

                        </td>
                        <td class="text-right">
                            <?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $borrowerDetail->disburse_amount, 'true')); ?>

                        </td>
                        <td class="text-right">
                            <?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $borrowerDetail->balance_outstanding, 'true')); ?>

                        </td>

                        <td class="text-center">

                            <a class="fas fa-edit align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.fmr.edit',['fmr'=> $borrowerDetail->fmr_detail_id,'source'=>'indexBorrowals'])); ?>" title="Edit"></a>

                            <a class="fas fa-trash-alt align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.destroyRecord',$borrowerDetail->fmr_detail_id)); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');"></a>
                           
                            <a class="fas align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.case-closed',['id'=>$borrowerDetail->fmr_detail_id,'sourcetracker'=>'indexBorrowertracker'])); ?>" title="Tracker">
                            <i class="fas fa-crosshairs fa-lg" style="color: grey;"> </i>
                            </a>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div style="background-color:#d1e6e3;margin:auto;padding:10px" class="card text-center col-12">
            <b>No Records Founds</b>
        </div>
        <?php endif; ?>
        <div class="d-flex justify-content-end">
        
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        var fmr_search_id = $("#fmr_search_id").val();
        if (fmr_search_id != "") {
            $('.searchForm').slideDown();
        }
    });

    $('#cancleSearch').click(function() {
        $('.searchForm').slideUp(200);
    });


    $('.searchButton').click(function() {
        $('.searchForm').slideToggle(function() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
    });

    $('.cancleButton').click(function() {
        $('.searchForm').slideUp();
    });

    function validateSearch() {
        $("#error_alert").html("");
        var facility_id = $("#facility_id").val();
        var facility_name = $("#facility_name").val();
        var borrower = $("#borrower_group").val();
        var workstream = $("#workstream").val();
        var flag = $("#book_type").val();

        if (facility_id == "" && facility_name == "" && borrower == "" && workstream == "" && flag == "") {
            $("#error_alert").html("Atleast one field is required to search").show();
            $("#error_alert").fadeOut(4000);
            console.log("inif");
            return false;
        } else {
            console.log("inelse");
            return true;
        }
    }

    function ClearForm() {
        document.getElementById('facility_id').value = '';
        document.getElementById('facility_name').value = '';
        document.getElementById('borrower_group').value = '';
        document.getElementById('book_type').value = '';
        document.getElementById('workstream').value = '';
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/admin/fmr/indexBorrowal.blade.php ENDPATH**/ ?>