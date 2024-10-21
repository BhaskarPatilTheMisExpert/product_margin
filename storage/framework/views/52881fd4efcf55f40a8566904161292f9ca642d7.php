
<?php $__env->startSection('content'); ?>
<!-- Start filter -->
<div class="filter searchForm card" style="display:none;">
    <div class="card-body">
        <span class="fltr-cls-action">
            <span class="cls-ico-hldr" id="cancleSearch"><i class="fas fa-times"></i></span>
        </span>
        <div class="form-container ">
            <form autocomplete="off" method="GET" action="<?php echo e(route('admin.frm.index')); ?>" id="target" onsubmit="return validateSearch()">
                <div class="form-control-wrapper">
                    <div class="form-group">
                        <div class="row">

                            <div class="col-sm-3">
                                <label class="" for="frmLoanId">Loan Id </label>
                                <input class="form-control " id="frmLoanId" placeholder="Loan Id" value="<?php echo e(request('frmLoanId')); ?>" name="frmLoanId">
                            </div>
                            <div class="col-sm-3" hidden>
                                <label class="" for="caseRefBy">Case Referred by</label>
                                <select class="form-control" id="caseRefBy" name="fmrCustomer">
                                    <option value="" selected>Select</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div class="col-sm-3" hidden>
                                <label class="" for="caseRefBy">Case Referred by</label>
                                <select class="form-control" id="caseRefBy" name="caseRefBy">
                                    <option value="" selected>Select</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="error_alert" class="alert alert-danger" style="display:none;"></div>
                    <div style="text-align:center">
                        <input type="submit" class="btn btn-primary" value="SUBMIT" id="search" onsubmit="return validateSearch()">
                        <a class="btn btn-secondary  cancleSearch" onclick="" href="<?php echo e(route('admin.frm.index')); ?>">CANCEL</a>
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
        <h1 class="card-title m-0">Case Management</h1>
        <div class="action-right d-flex">

            <span class="atn-item mr-1">
                <a class="btn btn-primary" href="<?php echo e(route('admin.frm.create')); ?>">
                    <i class="fas fa-plus mr-1"></i> Add
                </a>
            </span>
            <span class="atn-item">
                <a class="filter-btn searchButton btn btn-secondary" href="javascript:void(0)">
                    <i class="fas fa-filter"></i>
                </a>
            </span>

        </div>
    </div>
    <div class="card-body">
        <?php if(!empty($frmDetails)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Login date</th>
                        <th>Loan Id</th>
                        <th class="text-center"> Disbursement Date</th>
                        <th class="text-center">Disbursement Amount</th>

                        <th width="250px" class="text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = ($frmDetails->currentPage() * 10 - 10) + 1;  ?>
                    <?php $__currentLoopData = $frmDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frmDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="">
                        <td>
                            <?php echo e($count++); ?>

                        </td>
                        <td>
                            <?php echo e(\Carbon\Carbon::parse($frmDetail->log_in_date)->format('d/m/Y')); ?>

                        </td>
                        <td>
                            <?php echo e($frmDetail->loan_id); ?>

                        </td>

                        <td class="text-center">
                            <?php echo e(\Carbon\Carbon::parse($frmDetail->disbursement_date)->format('d/m/Y')); ?>

                        </td>
                        <td class="text-right">
                            <?php echo e($frmDetail->disbursed_loan_amount); ?>

                        </td>

                        <td class="text-center">
                            <div class="row ">
                                <div class="col-sm-6  justify-content-end">
                                    <a class="fas fa-edit align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.frm.edit',$frmDetail->id)); ?>" title="edit"></a>

                                </div>
                                <div class="col-sm-6 justify-content-left">
                                    <form autocomplete="off" id="createForm" method="POST" action="<?php echo e(route('admin.frm.destroy', $frmDetail->id)); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <a class="fas fa-trash-alt align-middle text-dark" style="font-size:small;color: grey;" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');"></a>
                                    </form>
                                </div>
                            </div>



                            <!-- <a class="fas fa-download align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.download-in-excel')); ?>" title="Download"></a> -->

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
            <?php echo $frmDetails->appends(Request::except('page'))->links('pagination::bootstrap-4'); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        var frmLoanId = $("#frmLoanId").val();
        // var fmrStaff = $("#fmrStaff").val();
        // var fmrCustomer = $("#fmrCustomer").val();
        // var fmrOutsider = $("#fmrOutsider").val();
        // var fmrSearchLan = $("#fmrSearchLan").val();
        // || fmrStaff != "" || fmrCustomer != "" || fmrOutsider != "" || fmrSearchLan != ""
        if (frmLoanId != "") {
            $('.searchForm').slideDown();
        } else {
            $('.searchForm').slideUp();
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
        var frmLoanId = $("#frmLoanId").val();
        // var fmrStaff = $("#fmrStaff").val();
        // var fmrCustomer = $("#fmrCustomer").val();
        // var fmrOutsider = $("#fmrOutsider").val();
        // var fmrSearchLan = $("#fmrSearchLan").val();
        // && fmrStaff == "" && fmrCustomer == "" && fmrOutsider == "" && fmrSearchLan == ""
        if (frmLoanId == "") {
            $("#error_alert").html("Atleast one field is required to search").show();
            $("#error_alert").fadeOut(4000);
            return false;
        } else {
            console.log("inelse");
            return true;
        }
    }

    function ClearForm() {
        document.getElementById('fmr_search_id').value = '';
        document.getElementById('fmrStaff').value = '';
        document.getElementById('fmrCustomer').value = '';
        document.getElementById('fmrOutsider').value = '';
        document.getElementById('fmrSearchLan').value = '';
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/admin/frm/index.blade.php ENDPATH**/ ?>