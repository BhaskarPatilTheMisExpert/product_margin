
<?php $__env->startSection('content'); ?>
<!-- Start filter -->
<div class="filter searchForm card" style="display:none;">
    <div class="card-body">
        <span class="fltr-cls-action">
            <span class="cls-ico-hldr" id="cancleSearch"><i class="fas fa-times"></i></span>
        </span>
       
    </div>
</div>
<!-- End filter -->
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="card-title m-0">Product Margin</h1>
        <div class="action-right d-flex">
            <span class="atn-item mr-1">
                <a class="btn btn-primary" href="<?php echo e(route('admin.create-product')); ?>">
                    <i class="fas fa-plus mr-1"></i> Add
                </a>
            </span>
            <!-- <span class="atn-item">
                <a class="filter-btn searchButton btn btn-secondary" href="javascript:void(0)">
                    <i class="fas fa-filter"></i>
                </a>
            </span> -->
        </div>
    </div>
    <div class="card-body">
    <?php if($products->count()): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client Name </th>
                        <th>Margin amount</th>
                        <th>Client code </th>
                        <!-- <th width="200px">Reviewer Required</th>
                        <th width="200px">Status</th> -->
                        <th width="50px" class="text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>
                <?php $count = ($products->currentPage() * 10 - 10) + 1; ?>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                        <?php echo e($count++); ?>

                        </td>
                        <td>
                            <?php echo e($product->client_name); ?>

                        </td>
                        <td>
                        <?php echo e($product->margin_amount); ?>

                        </td>
                        
                        <td>
                        <?php echo e($product->client_code); ?>

                        </td>
                        <!-- <td>
                        </td>
                        <td> -->
                        </td>
                        <td class="text-center">
                        <a class="fas fa-edit align-middle text-success" style="font-size:small;" href="<?php echo e(route('admin.editProduct', $product->id)); ?>"></a>
                         <a class="fas fa-trash-alt align-middle text-dark" style="font-size:small;color: grey;" href="<?php echo e(route('admin.destroyProduct',$product->id)); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');"></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div style="background-color:#d1e6e3;margin:auto;padding:10px" class="card text-center col-12">
            <b>No Records Found</b>
        </div>
        <?php endif; ?>
        <div class="d-flex justify-content-end">
            <?php echo $products->appends(Request::except('page'))->links('pagination::bootstrap-4'); ?>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Product Margin\pel_am\resources\views/admin/product/index.blade.php ENDPATH**/ ?>