
<?php $__env->startSection('content'); ?>
<!-- Start filter -->
<div class="filter searchForm card" style="display:none;">
    <div class="card-body">
        <span class="fltr-cls-action">
            <span class="cls-ico-hldr" id="cancleSearch"> <i class="fas fa-times" aria-hidden="true" style="margin-top: 4px;"></i></span>
        </span> 
        <div class="form-container ">
            <form autocomplete="off" method="GET" action="<?php echo e(route('admin.fmr.index')); ?>" id="target" onsubmit="return validateSearch()">
                <div class="form-control-wrapper">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="" for="fmr_search_id">Fraud Number </label>
                                <input class="form-control " id="fmr_search_id" placeholder="Fraud Number" value="<?php echo e(request('fmr_search_id')); ?>" name="fmr_search_id">
                            </div>
                            <div class="col-sm-3">
                                <label class="" for="fmrStaff">Staff</label>
                                <select class="form-control" id="fmrStaff" name="fmrStaff">
                                    <option value="" selected>Select</option>
                                    <option value="Y" <?php echo e(request('fmrStaff') == 'Y' ? 'selected' : ''); ?>>Yes</option>
                                    <option value="N" <?php echo e(request('fmrStaff') == 'N' ? 'selected' : ''); ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="" for="fmrCustomer">Customer</label>
                                <select class="form-control" id="fmrCustomer" name="fmrCustomer">
                                    <option value="" selected>Select</option>
                                    <option value="Y" <?php echo e(request('fmrCustomer') == 'Y' ? 'selected' : ''); ?>>Yes</option>
                                    <option value="N" <?php echo e(request('fmrCustomer') == 'N' ? 'selected' : ''); ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="" for="fmrOutsider">Outsider</label>
                                <select class="form-control" id="fmrOutsider" name="fmrOutsider">
                                    <option value="" selected>Select</option>
                                    <option value="Y" <?php echo e(request('fmrOutsider') == 'Y' ? 'selected' : ''); ?>>Yes</option>
                                    <option value="N" <?php echo e(request('fmrOutsider') == 'N' ? 'selected' : ''); ?>>No</option>
                                </select>
                            </div>
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="" for="fmrSearchLan">Lan</label>
                            <input class="form-control" id="fmrSearchLan" placeholder="Lan number" value="<?php echo e(request('fmrSearchLan')); ?>" name="fmrSearchLan">
                        </div>
                        <div class="form-group col-sm-3">
                                <label class="required" for="fmr_entity_search">Entity</label>
                                <select class="form-control" id="fmr_entity_search" name="fmr_entity_search">
                                    <option value="">Select</option>
                                    <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($entity->id); ?>"<?php echo e(request('fmr_entity_search') == $entity->id ? 'selected' : ''); ?>><?php echo e($entity->short_code); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                    </div><br>
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
        <h1 class="card-title m-0">FMR</h1>
        <div class="action-right d-flex">

            <span class="atn-item mr-1" hidden>
                <a class="btn btn-primary" href="<?php echo e(route('admin.addExcelFile')); ?>">
                    <i class="fas fa-plus mr-1"></i> Add Records
                </a>
            </span>

            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_lan_details')): ?> -->
            <!-- <?php endif; ?> -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_report2_download')): ?>
            
                <span class="atn-item mr-1">
                    <a class="btn btn-primary" href="javascript:void(0)" data-toggle="modal" data-target="#fmr2_modal">
                        </i> FMR2
                    </a>
                </span>
          
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_report3_download')): ?>
            <span class="atn-item mr-1">
                <a class="btn btn-primary" href="javascript:void(0)" data-toggle="modal" data-target="#fmr3_modal" >
                    </i> FMR3
                </a>
            </span>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_add')): ?>
            <span class="atn-item mr-1">
                <a class="btn btn-primary" href="<?php echo e(route('admin.fmr.create')); ?>">
                    <i class="fas fa-plus mr-1"></i> Add
                </a>
            </span>
            <?php endif; ?>
            <span class="atn-item">
                <a class="filter-btn searchButton btn btn-secondary" href="javascript:void(0)">
                    <i class="fas fa-filter" title="Search"></i>
                </a>
            </span>
        </div>
    </div>
    <div class="card-body">
        <?php if(count($fmrDetails)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>HFC Name</th>
                        <th>Fraud Number</th>
                        <th class="text-center">Total Amount( <i class="fas fa-rupee-sign"></i> in Lakhs)</th>
                        <!-- <th width="140px">Borrower Group</th> -->

                        <th width="250px" class="text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = ($fmrDetails->currentPage() * 10 - 10) + 1;  ?>
                    <?php $__currentLoopData = $fmrDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fmrDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="parentRow" data-row-id="<?php echo e($fmrDetail->fraud_number); ?>">
                        <td>
                            <?php echo e($count ++); ?><span class="expandChildTable" style="cursor:pointer;" hidden>▼</span>
                        </td>

                        <td>
                            <?php echo e($fmrDetail->entity_name); ?> (<?php echo e($fmrDetail->short_code); ?>) 
                        </td> 
                           
                        <td>
                            <?php echo e($fmrDetail->fraud_number); ?> (<?php echo e($fmrDetail->no); ?>)
                        </td>
                        <td class="text-right">
                            <?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $fmrDetail->total_fraud_amount, 'true')); ?>

                        </td>

                        <td class="text-center">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_edit')): ?>
                            <a class="fas fa-edit align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.fmr.edit',$fmrDetail->id,['source'=>'index'])); ?>" title="Edit"></a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_report1')): ?>
                            <a class=" align-middle text-success" style="font-size:small;" href="<?php echo e(url('admin/fmr/donwload-r1/'.$fmrDetail->id)); ?>" title="Download PDF">
                                <i class="fas fa-file-pdf" style="color: grey;"></i>

                            </a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_attach_fraud')): ?>
                            <a class="fas fa-paperclip align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.fmr-attachNewAccount',$fmrDetail->id)); ?>" title="Attach Loan Account"></a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_view_account')): ?>
                            <?php if(($fmrDetail->no) > 1): ?>
                            <a class="fas fa-eye align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.indexBorrowals',$fmrDetail->id)); ?>" title="View Borrowal Details"></a>
                            <?php endif; ?>
                            <?php endif; ?>
                            <!-- old excel export -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_excel_download')): ?>
                            <a class="fas fa-download align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.exportData',$fmrDetail->id)); ?>" title="Download" hidden></a>
                            <?php endif; ?>

                            <a class=" align-middle text-success" style="font-size:small;" href="<?php echo e(url('admin/fmr/donwload-r2')); ?>" title="Download PDF" hidden>
                                <i class="fas fa-file-pdf" style="color: grey;">R2</i>

                            </a>
                            <a class=" align-middle text-success" style="font-size:small;" href="<?php echo e(url('admin/fmr/donwload-r3')); ?>" title="Download PDF" hidden>
                                <i class="fas fa-file-pdf" style="color: grey;">R3</i>
                            </a>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_tracker')): ?>
                            <?php if(($fmrDetail->no) == 1 ): ?>
                            <a class="fas align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.case-closed',['id'=>$fmrDetail->id,'sourcetraker'=>'indextracker'])); ?>" title="Tracker">
                                <i class="fas fa-crosshairs fa-lg" style="color: grey;"> </i>

                            </a>
                           
                            <?php endif; ?>
                            <?php endif; ?>
                            <!-- download new excel format -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_excel_download')): ?>
                            <a class="fas fa-download align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.exportData-new-format',$fmrDetail->id)); ?>" title="Download"></a>
                            <?php endif; ?>

                            <!-- <a class="fas fa-trash-alt align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.destroyRecord',$fmrDetail->id)); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');"></a> -->


                        </td>
                    </tr>

                    <tr class="nestedRow" style="display: none;">
                        <td colspan="5">
                            <table class="nestedTable">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
            <?php echo $fmrDetails->appends(Request::except('page'))->links('pagination::bootstrap-4'); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="fmr2_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fmr2Modal">Select Entity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" action="<?php echo e(url('admin/fmr/donwload-r2')); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body mx-3">
                    <!--<i class="fas fa-envelope prefix grey-text"></i> -->
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="approval" class="required-red" ><b> Status </b> </label>
                        <select id="fmrEntity" name="fmrEntity" class="form-control" required>
                            <option value="">Select</option>
                            <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($entity->id); ?>"><?php echo e($entity->short_code); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>    
                </div>
                <div id="error_alert" class="alert alert-danger" style="display:none">Please fill atleast one field</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="fmr3_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fmr2Modal">Select Entity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" action="<?php echo e(url('admin/fmr/donwload-r3')); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body mx-3">
                    <!--<i class="fas fa-envelope prefix grey-text"></i> -->
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="approval" class="required-red" ><b> Status </b> </label>
                        <select id="fmrEntity" name="fmrEntity" class="form-control" required>
                            <option value="">Select</option>
                            <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($entity->id); ?>"><?php echo e($entity->short_code); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>    
                </div>
                <div id="error_alert" class="alert alert-danger" style="display:none">Please fill atleast one field</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<style>

</style>
<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        var fmr_search_id = $("#fmr_search_id").val();
        var fmrStaff = $("#fmrStaff").val();
        var fmrCustomer = $("#fmrCustomer").val();
        var fmrOutsider = $("#fmrOutsider").val();
        var fmrSearchLan = $("#fmrSearchLan").val();
        var fmrEntitySearch = $("#fmr_entity_search").val();

        if (fmr_search_id != "" || fmrStaff != "" || fmrCustomer != "" || fmrOutsider != "" || fmrSearchLan != "" || fmrEntitySearch != "") {
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
        var fmr_search_id = $("#fmr_search_id").val();
        var fmrStaff = $("#fmrStaff").val();
        var fmrCustomer = $("#fmrCustomer").val();
        var fmrOutsider = $("#fmrOutsider").val();
        var fmrSearchLan = $("#fmrSearchLan").val();
        var fmrEntitySearch = $("#fmr_entity_search").val();

        if (fmr_search_id == "" && fmrStaff == "" && fmrCustomer == "" && fmrOutsider == "" && fmrSearchLan == "" && fmrEntitySearch == "") {
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
        document.getElementById('fmr_search_id').value = '';
        document.getElementById('fmrStaff').value = '';
        document.getElementById('fmrCustomer').value = '';
        document.getElementById('fmrOutsider').value = '';
        document.getElementById('fmrSearchLan').value = '';
    }

    $(function() {
        $('.nestedRow').hide();
        $('.expandChildTable').on('click', function() {

            var parentRow = $(this).closest('.parentRow');
            console.log(parentRow);
            var nestedRow = parentRow.next('.nestedRow');
            var nestedTable = nestedRow.find('.nestedTable');

            nestedRow.toggle();
            $('.nestedRow').not(nestedRow).hide();

            if (nestedRow.is(':visible')) {
                var fmrDetailId = parentRow.attr('data-row-id'); // Get the fraud_number value

                // Make an AJAX request to fetch data for the nested table
                $.ajax({
                    url: "<?php echo e(route('admin.nested-table-data')); ?>",
                    type: "GET",
                    dataType: "json",
                    data: {
                        fmr_detail_id: fmrDetailId
                    },
                    success: function(data) {
                        // Populate the nested table with the received data
                        console.log(data);
                        var tbody = nestedTable.find('tbody');
                        var thead = nestedTable.find('thead');
                        tbody.empty(); // Clear existing rows
                        thead.empty(); // Clear existing headers

                        // Create table headers
                        var headerRow = $('<tr>').appendTo(thead);
                        headerRow.append($('<th>').text('#'));
                        headerRow.append($('<th>').text('Name of party/Account').css('width', '15%'));
                        headerRow.append($('<th>').text('Borrowal account No').css('width', '15%'));
                        headerRow.append($('<th>').text('Nature of Account'));
                        headerRow.append($('<th>').text('Date of Sanction'));
                        headerRow.append($('<th>').text('Sanctioned Limit').css('width', '10%'));
                        headerRow.append($('<th>').text('Disbursed Amount').css('width', '10%'));
                        headerRow.append($('<th>').text('Balance Outstanding').css('width', '10%'));
                        headerRow.append($('<th>').text('Action'));

                        var no = 1;
                        // Iterate over the data and create rows for the nested table
                        $.each(data, function(index, item) {
                            var row = $('<tr>').appendTo(tbody);
                            row.append($('<td>').text(no++));

                            row.append($('<td>').text(item.type_of_party));
                            row.append($('<td>').text(item.lan));
                            row.append($('<td>').text(item.nature_of_account));
                            row.append($('<td>').text(item.disbursement_date));
                            row.append($('<td>').text((item.sanction_limit / 100000).toFixed(2)).css('text-align', 'right'));
                            row.append($('<td>').text((item.disburse_amount / 100000).toFixed(2)).css('text-align', 'right'));
                            row.append($('<td>').text((item.balance_outstanding / 100000).toFixed(2)).css('text-align', 'right'));
                            row.append($('<td>').html(`
                            <a class="fas fa-edit align-middle text-dark" style="font-size:small;color: grey;" href="" title="Edit"></a>
                            <a class="fas fa-trash-alt align-middle text-dark" style="font-size:small;color: grey;" href="" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');"></a>
                            <a class="fas align-middle text-dark" style="font-size:small;color: grey;" href="" title="Tracker">
                                <i class="fas fa-crosshairs fa-lg" style="color: grey;"></i>
                            </a>
                        `));

                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Log any errors
                    }
                });
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        // Add click event listener to each parent row
        document.querySelectorAll('.parentRow').forEach(function(row) {
            row.addEventListener('click', function() {
                var parentId = this.getAttribute('data-row-id');
                console.log("Clicked row ID:", parentId); // Log the ID of the clicked row
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/admin/fmr/index.blade.php ENDPATH**/ ?>