
<?php $__env->startSection('content'); ?>
<!-- Start filter -->
<div class="filter searchForm card" style="display:none;">
    <div class="card-body">
        <span class="fltr-cls-action">
            <span class="cls-ico-hldr" id="cancleSearch"><i class="fas fa-times"></i></span>
        </span>
        <div class="form-container ">
            <form autocomplete="off" method="GET" action="<?php echo e(request()->is('admin/reverse-feed')  ? 'reverse-feed' : 'reverse-feed-odv'); ?>" id="target" onsubmit="return validateSearch()">
                <div class="form-control-wrapper">
                    <div class="form-group">
                        <div class="row">

                            <div class="col-sm-4">
                                <label class="" for="fileName">File Name</label>
                                <input class="form-control" id="fileName" type="text" value="<?php echo e(request('fileName')); ?>" name="fileName" placeholder="File Name">
                            </div>
                            <div class="col-sm-4">
                                <label class="" for="process">ETL Processed</label>
                                <select class="form-control" id="process" name="process">
                                    <option value="" selected>Select</option>
                                    <option value="1" <?php echo e(request('process')=='1' ? 'selected':''); ?>>Yes</option>
                                    <option value="0" <?php echo e(request('process')=='0' ? 'selected':''); ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label class="" for="folderName">Folder Name</label>
                                <select class="form-control" id="folderName" name="folderName">
                                    <option value="" selected>Select</option>
                                    <?php $__currentLoopData = $folderNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folderName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($folderName->folder_name); ?>" <?php echo e(request('folderName')== $folderName->folder_name ? 'selected':''); ?>><?php echo e($folderName->folder_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-6">

                            </div>
                        </div>

                    </div>
                    <div id="error_alert" class="alert alert-danger" style="display:none;"></div>
                    <div style="text-align:center">
                        <input type="submit" class="btn btn-primary" value="SUBMIT" id="search" onsubmit="return validateSearch()">
                        <a class="btn btn-secondary  cancleSearch" onclick="ClearForm();" href="<?php echo e(request()->is('admin/reverse-feed')  ? 'reverse-feed' : 'reverse-feed-odv'); ?>">CANCEL</a>
                    </div>
                </div> <!-- Form control wrapper end -->
            </form>
        </div>
    </div>
</div>
<!-- End filter -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="card-title m-0"><?php echo e($pageHead); ?></h1>
        <div class="action-right d-flex">
            <span class="atn-item mr-1">

            </span>
            <span class="atn-item">
                <a class="filter-btn searchButton btn btn-secondary" href="javascript:void(0)">
                    <i class="fas fa-filter"></i>
                </a>
            </span>
        </div>
    </div>
    <?php if($getFeedData->count()): ?>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover tablesorter" id="myTable">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>File Name</th>
                        <th width="150px">File Size (KB)</th>
                        <th width="200px">Last Modified</th>
                        <th width="150px">ETL Processed</th>
                        <th width="150px" class="text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    $count = ($getFeedData->currentPage() * 20 - 20) + 1; ?>
                    <?php $__currentLoopData = $getFeedData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td class="text-center"><?php echo e($count++); ?>

                        </td>
                        <td><?php echo e($data->file_name); ?>

                        </td>
                        <td class="text-right"><?php echo e(number_format($data->file_size / 1024,1)); ?>

                        </td>
                        <td class="text-left">
                            <?php echo e(\Carbon\Carbon::parse($data->last_modified)->format('d-m-Y g:i A')); ?>

                        </td>
                        <td class="text-left"><?php echo e($data->etl_processed == 0 ? 'No': 'Yes'); ?>

                        </td>
                        <td class="text-center">
                            <a title="Download" href="<?php echo e(route('admin.download-file',['file_name'=>$data->file_name,'file_path'=>$data->full_path])); ?>"><i class="fa fa-file-text text-dark"></i></a>
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
        <div class="d-flex justify-content-end"><?php echo $getFeedData->appends(Request::except('page'))->links('pagination::bootstrap-4'); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        let process = $("#process").val();
        let fileName = $("#fileName").val();
        let folderName = $("#folderName").val();

        if (process != "" || fileName != "" || folderName != "") {
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
        let fileName = $("#fileName").val();
        let process = $("#process").val();
        let folderName = $("#folderName").val();
        console.log(fileName, process, folderName);

        if (process == "" && fileName == "" && folderName == "") {
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
        document.getElementById('fileName').value = '';
        document.getElementById('process').value = '';
        document.getElementById('folderName').value = '';
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/admin/reverseFeed/index.blade.php ENDPATH**/ ?>