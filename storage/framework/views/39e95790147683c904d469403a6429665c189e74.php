
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <h5>Edit Product</h5>
    </div>

    <div class="card-body">
        <form autocomplete="off" id="editForm" method="GET" action="<?php echo e(route('admin.updateProduct',$productDetails->id)); ?>" enctype="multipart/form-data" onsubmit="">
            <?php echo csrf_field(); ?>
            <h5>A. Product</h5>
            <hr>

            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="required" for="clientName">Client Name</label>
                    <input class="form-control  <?php echo e($errors->has('clientName') ? 'is-invalid' : ''); ?>" name="clientName" id="clientName" placeholder="Client name" value="<?php echo e($productDetails->client_name); ?>">
                    <?php if($errors->has('clientName')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('clientName')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="clientName-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="phoneNumber">Phone number </label>
                    <input class="form-control  <?php echo e($errors->has('phoneNumber') ? 'is-invalid' : ''); ?>" name="phoneNumber" id="phoneNumber" placeholder="phone nubmer" value="<?php echo e($productDetails->phone_number); ?>" type="number">
                    <?php if($errors->has('phoneNumber')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('phoneNumber')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="phoneNumber-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="margin">Margin</label>
                    <select class="form-control  <?php echo e($errors->has('margin') ? 'is-invalid' : ''); ?>" name="margin" id="nameOfBranch" placeholder="margin">
                        <option value="Y" <?php echo e($productDetails->margin == 'Y' ? 'selected' : ''); ?>>Yes</option>
                        <option value="N" <?php echo e($productDetails->margin == 'N' ? 'selected' : ''); ?>>No </option>
                    </select>
                    <?php if($errors->has('margin')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('margin')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="margin-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="marginAmount">Margin amount </label>
                    <input class="form-control  <?php echo e($errors->has('marginAmount') ? 'is-invalid' : ''); ?>" name="marginAmount" id="marginAmount" placeholder="Margin Amount" value="<?php echo e($productDetails->margin_amount); ?>" type="number">
                    <?php if($errors->has('marginAmount')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('marginAmount')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="marginAmount-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="product">Product</label>
                    <select class="form-control  <?php echo e($errors->has('product') ? 'is-invalid' : ''); ?>" name="product" id="product" placeholder="product" value="">
                        <option value="IP" <?php echo e($productDetails->product == 'IP' ? 'selected' : ''); ?>>IP</option>
                        <option value="IAP" <?php echo e($productDetails->product == 'IAP' ? 'selected' : ''); ?>>IAP </option>
                        <option value="TGS" <?php echo e($productDetails->product == 'TGS' ? 'selected' : ''); ?>>TGS </option>
                        <option value="TejiMandi" <?php echo e($productDetails->product == 'TejiMandi' ? 'selected' : ''); ?>>TejiMandi </option>
                        <option value="SSP" <?php echo e($productDetails->product == 'SSP' ? 'selected' : ''); ?>>SSP </option>
                        <option value="Loan" <?php echo e($productDetails->product == 'Loan' ? 'selected' : ''); ?>>Loan </option>

                    </select>
                    <?php if($errors->has('product')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('product')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="product-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="userTeam">User Team</label>
                    <select class="form-control  <?php echo e($errors->has('userTeam') ? 'is-invalid' : ''); ?>" name="userTeam" id="userTeam" placeholder="userTeam" value="">
                        <option value="Malad" <?php echo e($productDetails->user_team == 'Malad' ? 'selected' : ''); ?>>Malad</option>
                        <option value="Thane" <?php echo e($productDetails->user_team == 'Thane' ? 'selected' : ''); ?>>Thane </option>
                        <option value="Hyderabad" <?php echo e($productDetails->user_team == 'Hyderabad' ? 'selected' : ''); ?>>Hyderabad </option>

                    </select>
                    <?php if($errors->has('product')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('product')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="product-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="clientCode">Client code </label>
                    <input class="form-control  <?php echo e($errors->has('clientCode') ? 'is-invalid' : ''); ?>" name="clientCode" id="clientCode" placeholder="Client code" value="<?php echo e($productDetails->client_code); ?>">
                    <?php if($errors->has('clientCode')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('clientCode')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="clientCode-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="empCode">Emp code </label>
                    <input class="form-control  <?php echo e($errors->has('empCode') ? 'is-invalid' : ''); ?>" name="empCode" id="clientCode" placeholder="EMP code" value="<?php echo e($productDetails->emp_code); ?>">
                    <?php if($errors->has('empCode')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('empCode')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="empCode-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="managerCode">Manager Code</label>
                    <select class="form-control  <?php echo e($errors->has('managerCode') ? 'is-invalid' : ''); ?>" name="managerCode" id="managerCode" placeholder="managerCode">
                        <option value="M001" <?php echo e($productDetails->manager_code == 'M001' ? 'selected' : ''); ?>>M001</option>
                        <option value="M002" <?php echo e($productDetails->manager_code == 'M002' ? 'selected' : ''); ?>>M002 </option>
                        <option value="M003" <?php echo e($productDetails->manager_code == 'M003' ? 'selected' : ''); ?>>M003 </option>

                    </select>
                    <?php if($errors->has('managerCode')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('managerCode')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="managerCode-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="remarks">Remarks </label>
                    <input class="form-control  <?php echo e($errors->has('remarks') ? 'is-invalid' : ''); ?>" name="remarks" id="remarks" placeholder="Remarks" value="<?php echo e($productDetails->remark); ?>" type="text">
                    <?php if($errors->has('remarks')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('remarks')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="remarks-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="status">Status </label>
                    <select class="form-control  <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status" id="managerCode" placeholder="status" value="">
                        <option value="H" <?php echo e($productDetails->status == 'H' ? 'selected' : ''); ?>>Hot</option>
                        <option value="W" <?php echo e($productDetails->status == 'W' ? 'selected' : ''); ?>>Warm </option>

                    </select>
                    <?php if($errors->has('managerCode')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('managerCode')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="managerCode-error"></span>
                </div>

            </div>
            <h5>B. Margin</h5>
            <hr>
            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="" for="clientCodeMargin">Client code </label>
                    <input class="form-control  <?php echo e($errors->has('clientCodeMargin') ? 'is-invalid' : ''); ?>" name="clientCodeMargin" id="clientCodeMargin" placeholder="Client code" value="<?php echo e($productDetails->client_code_margin); ?>">
                    <?php if($errors->has('clientCodeMargin')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('clientCodeMargin')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="clientCodeMargin-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="customerName">Customer Name </label>
                    <input class="form-control  <?php echo e($errors->has('customerName') ? 'is-invalid' : ''); ?>" name="customerName" id="customerName" placeholder="Client name" value="<?php echo e($productDetails->customer_name_margin); ?>">
                    <?php if($errors->has('customerName')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('customerName')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="customerName-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="marginPayoutAmount">Margin payout amount </label>
                    <input class="form-control  <?php echo e($errors->has('marginPayoutAmount') ? 'is-invalid' : ''); ?>" name="marginPayoutAmount" id="marginPayoutAmount" placeholder="phone nubmer" value="<?php echo e($productDetails->margin_payout_amount_margin); ?>" type="number">
                    <?php if($errors->has('marginPayoutAmount')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('marginPayoutAmount')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="marginPayoutAmount-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="accountAcivationDate">Account Activation Date </label>
                    <input class="form-control  <?php echo e($errors->has('accountAcivationDate') ? 'is-invalid' : ''); ?>" name="accountAcivationDate" id="accountAcivationDate" placeholder="phone nubmer" value="<?php echo e($productDetails->account_acitivation_date_margin); ?>" type="date">
                    <?php if($errors->has('accountAcivationDate')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('accountAcivationDate')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="accountAcivationDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="marginPayoutDate">Margin Payout Date </label>
                    <input class="form-control  <?php echo e($errors->has('marginPayoutDate') ? 'is-invalid' : ''); ?>" name="marginPayoutDate" id="marginPayoutDate" placeholder="Phone Nubmer" value="<?php echo e($productDetails->margin_payout_date_margin); ?>" type="date">
                    <?php if($errors->has('marginPayoutDate')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('marginPayoutDate')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="marginPayoutDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="userTeamMargin">User Team</label>
                    <input class="form-control  <?php echo e($errors->has('userTeamMargin') ? 'is-invalid' : ''); ?>" name="userTeamMargin" id="userTeamMargin" placeholder="User Team" value="<?php echo e($productDetails->user_team_margin); ?>" type="text">
                      
                    <?php if($errors->has('userTeamMargin')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('userTeamMargin')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="userTeamMargin-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="empCodeMargin">Emp code </label>
                    <input class="form-control  <?php echo e($errors->has('empCodeMargin') ? 'is-invalid' : ''); ?>" name="empCodeMargin" id="clientCode" placeholder="EMP code" value="<?php echo e($productDetails->emp_code_margin); ?>" type="number">
                    <?php if($errors->has('empCodeMargin')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('empCodeMargin')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="empCodeMargin-error"></span>
                </div>



            </div>
            <div class="form-group text-center" style="margin:auto;padding-top:20px">
                <button class="btn btn-primary" type="submit">
                    SUBMIT
                </button>
                <a class="btn btn-dark" href="<?php echo e(url()->previous()); ?>">
                    CANCEL
                </a>
            </div>
        </form>

    </div>
</div>
<script>


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Product Margin\pel_am\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>