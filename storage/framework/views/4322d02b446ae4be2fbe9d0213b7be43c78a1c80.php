
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <h5>Edit FMR</h5>
    </div>

    <div class="card-body">

        <form autocomplete="off" id="createForm" method="POST" action="<?php echo e(route('admin.fmr.update', $fmrDetails->id)); ?>" enctype="multipart/form-data" onsubmit="">
            <!-- s_return validateForm() -->
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" name="source" value="<?php echo e($source); ?>">

            <h4>Part A. Fraud Report</h4>
            <hr size="20">
            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="required" for="entity">Entity</label>
                    <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($entity->id == @$fmrDetails->entity): ?>
                    <input class="form-control  <?php echo e($errors->has('entity') ? 'is-invalid' : ''); ?>" name="entity" id="entity" placeholder="" value="<?php echo e($entity->id); ?>" hidden>
                    <input class="form-control  <?php echo e($errors->has('entityA') ? 'is-invalid' : ''); ?>" name="entityA" id="entityA" placeholder="" value="<?php echo e($entity->short_code); ?>" readonly>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="FraudNumber">Fraud Number</label>
                    <input class="form-control  <?php echo e($errors->has('FraudNumber') ? 'is-invalid' : ''); ?>" name="FraudNumber" id="FraudNumber" placeholder="" value="<?php echo e($fmrDetails->fraud_number); ?>" readonly>
                    <?php if($errors->has('FraudNumber')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('FraudNumber')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="FraudNumber-error"></span>
                </div>
                <!-- <div class="form-group col-sm-3  form-inline">
                    <label class="required" for="FraudNumber">Loan Account Number</label>
                    <input class="form-control  <?php echo e($errors->has('FraudNumber') ? 'is-invalid' : ''); ?>" name="lan" id="lan" placeholder="" value="<?php echo e($fmrDetails->borrowerDetails->lan); ?>">
                    <button type="button" class="btn btn-default btn-md" onclick="getLanDetails()" id="refBtn">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </button>
 </div>  -->
                <div class="form-group col-sm-3 form-inline">
                    <label class="required" for="FraudNumber">Loan Account Number</label>
                    <div class="input-group">
                        <input class="form-control <?php echo e($errors->has('FraudNumber') ? 'is-invalid' : ''); ?>" name="lan" id="lan" placeholder="" value="<?php echo e($fmrDetails->borrowerDetails->lan); ?>">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default btn-md" onclick="getLanDetails()" id="refBtn">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                    <?php if($errors->has('lan')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('lan')); ?>

                    </div>
                    <?php endif; ?>
                    <!-- <--<span class="error" id="lan-error"></span> --> 
                </div>



            </div>

            <!-- Details of branch -->
            <h5> Branch Details </h5>
            <hr>
            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="required" for="nameOfBranch">Name of branch</label>
                    <input class="form-control  <?php echo e($errors->has('nameOfBranch') ? 'is-invalid' : ''); ?>" name="nameOfBranch" id="nameOfBranch" placeholder="Name of branch" value="<?php echo e($fmrDetails->branch_name); ?>">
                    <?php if($errors->has('nameOfBranch')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('nameOfBranch')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="nameOfBranch-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="BranchType">Branch type</label>
                    <input class="form-control  <?php echo e($errors->has('BranchType') ? 'is-invalid' : ''); ?>" name="BranchType" id="BranchType" placeholder="Branch Type" value="<?php echo e($fmrDetails->branch_type); ?>">
                    <?php if($errors->has('BranchType')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('BranchType')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="BranchType-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="branchPlace">Place</label>
                    <input class="form-control  <?php echo e($errors->has('place') ? 'is-invalid' : ''); ?>" name="branchPlace" id="branchPlace" placeholder="Branch Place" value="<?php echo e($fmrDetails->branch_place); ?>">
                    <?php if($errors->has('branchPlace')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('branchPlace')); ?>

                    </div>
                    <?php endif; ?>.
                    <span class="error" id="branchPlace-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="district">District</label>
                    <input class="form-control  <?php echo e($errors->has('district') ? 'is-invalid' : ''); ?>" name="district" id="district" placeholder="District" value="<?php echo e($fmrDetails->branch_district); ?>">
                    <?php if($errors->has('district')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('district')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="district-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="state">State</label>
                    <input class="form-control  <?php echo e($errors->has('state') ? 'is-invalid' : ''); ?>" name="state" id="state" placeholder="State" value="<?php echo e($fmrDetails->branch_state); ?>">
                    <?php if($errors->has('state')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('state')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="state-error"></span>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="required" for="principalAc">Name of the principal party/account</label>
                    <input class="form-control  <?php echo e($errors->has('principalAc') ? 'is-invalid' : ''); ?>" name="principalAc" id="principalAc" placeholder="Name of the principal party/account" value="<?php echo e($fmrDetails->account_name); ?>">
                    <?php if($errors->has('principalAc')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('principalAc')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="principalAc-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="area">Area</label>
                    <input class="form-control  <?php echo e($errors->has('area') ? 'is-invalid' : ''); ?>" name="area" id="area" placeholder="Area of operation where the fraud has occurred?" value="<?php echo e($fmrDetails->fraud_area); ?>">
                    <?php if($errors->has('area')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('area')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="area-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="fraudBAc">Fraud has occurred in borrower account?</label>
                    <select class="form-control <?php echo e($errors->has('fraudBAc') ? 'is-invalid' : ''); ?>" name="fraudBAc" id="fraudBAc">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($fmrDetails->fraud_borrower_account == 'Y' ? 'selected' : ''); ?>>Yes</option>
                        <option value="N" <?php echo e($fmrDetails->fraud_borrower_account == 'N' ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php if($errors->has('fraudBAc')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('fraudBAc')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="fraudBAc-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="natureOfFraud">Nature of Fraud</label>
                    <select class="form-control <?php echo e($errors->has('natureOfFraud') ? 'is-invalid' : ''); ?>" name="natureOfFraud" id="natureOfFraud">
                        <option value="">Select</option>
                        <option value="Misappropriation and criminal breach of trust" <?php echo e($fmrDetails->fraud_nature == 'Misappropriation and criminal breach of trust' ? 'selected' : ''); ?>>Misappropriation and criminal breach of trust</option>
                        <option value="Fraudulent encashment through forged instruments, manipulation of books of account or through fictitious accounts and conversion of property" <?php echo e($fmrDetails->fraud_nature == 'Fraudulent encashment through forged instruments, manipulation of books of account or through fictitious accounts and conversion of property' ? 'selected' : ''); ?>>Fraudulent encashment through forged instruments, manipulation of books of account or through fictitious accounts and conversion of property</option>
                        <option value="Unauthorised credit facilities extended for reward or for illegal gratification" <?php echo e($fmrDetails->fraud_nature == 'Unauthorised credit facilities extended for reward or for illegal gratification' ? 'selected' : ''); ?>>Unauthorised credit facilities extended for reward or for illegal gratification</option>
                        <option value="Negligence and cash shortages" <?php echo e($fmrDetails->fraud_nature == 'Negligence and cash shortages' ? 'selected' : ''); ?>>Negligence and cash shortages</option>
                        <option value="Cheating and forgery" <?php echo e($fmrDetails->fraud_nature == 'Cheating and forgery' ? 'selected' : ''); ?>>Cheating and forgery</option>
                        <option value="Irregularities in foreign exchange transactions">Irregularities in foreign exchange transactions</option>
                        <option value="Any other type of fraud not coming under the specific heads as above." <?php echo e($fmrDetails->fraud_nature == 'Any other type of fraud not coming under the specific heads as above.' ? 'selected' : ''); ?>>Any other type of fraud not coming under the specific heads as above.</option>
                    </select>
                    <?php if($errors->has('natureOfFraud')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('natureOfFraud')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="natureOfFraud-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="compUse"><?php echo e($fmrDetails->is_computer_used == 'Y' ? 'selected' : ''); ?>Computer used in fraud</label>
                    <select class="form-control <?php echo e($errors->has('compUse') ? 'is-invalid' : ''); ?>" name="compUse" id="compUse">
                        <option value="">Select</option>
                        <option value="Y">Yes</option>
                        <option value="N" <?php echo e($fmrDetails->is_computer_used == 'N' ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php if($errors->has('compUse')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('compUse')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="compUse-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="description">Computer Fraud Description</label>
                    <textarea class="form-control  <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>" name="description" id="description" placeholder="Description" value="<?php echo e($fmrDetails->computer_description); ?>"><?php echo e($fmrDetails->computer_description); ?></textarea>
                    <?php if($errors->has('description')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('description')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="description-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="totalAmt">Total amount</label>
                    <input class="form-control  <?php echo e($errors->has('totalAmt') ? 'is-invalid' : ''); ?>" name="totalAmt" id="totalAmt" placeholder="Total amount involved (₹ in lakh)" value="<?php echo e($fmrDetails->fraud_amount); ?>" type="number"> <!-- disburse_amount -->

                    <?php if($errors->has('totalAmt')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('totalAmt')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="totalAmt-error"></span>
                </div>
                 <!-- added the principal outstanding date -->
                 <div class="form-group col-sm-3">
                    <label class="required" for="principalOutstanding">Principal Outstanding Date</label> 
                     <!-- principal_outstanding -->
                    <input class="form-control  <?php echo e($errors->has('principalOutstandingDate') ? 'is-invalid' : ''); ?>" name="principalOutstandingDate" id="principalOutstandingDate" placeholder="Principal outstanding date" value="<?php echo e($fmrDetails->principal_outstanding_date); ?>" type="date">
                    <?php if($errors->has('principalOutstandingDate')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('principalOutstandingDate')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="principalOutstandingDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="principalOutstanding">Principal Outstanding</label>
                    <!-- principal_outstanding -->
                    <input class="form-control  <?php echo e($errors->has('principalOutstanding') ? 'is-invalid' : ''); ?>" name="principalOutstanding" id="principalOutstanding" placeholder="Principal outstanding (₹ in lakh)" value="<?php echo e($fmrDetails->principal_outstanding); ?>" type="number">
                    <?php if($errors->has('principalOutstanding')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('principalOutstanding')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="principalOutstanding-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="dateOfOccu">Date of Occurrence</label>
                    <input class="form-control  <?php echo e($errors->has('dateOfOccu') ? 'is-invalid' : ''); ?>" name="dateOfOccu" id="dateOfOccu" placeholder="" value="<?php echo e($fmrDetails->borrowerDetails->disbursement_date); ?>" type="date">
                    <?php if($errors->has('dateOfOccu')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dateOfOccu')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dateOfOccu-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="dateOfDetect">Date of Detection</label>
                    <input class="form-control  <?php echo e($errors->has('dateOfOccu') ? 'is-invalid' : ''); ?>" name="dateOfDetect" id="dateOfDetect" placeholder="" value="<?php echo e($fmrDetails->detection_date); ?>" type="date">
                    <?php if($errors->has('dateOfDetect')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dateOfDetect')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dateOfDetect-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="reasonDelay">Reason for delay</label>
                    <input class="form-control  <?php echo e($errors->has('area') ? 'is-invalid' : ''); ?>" name="reasonDelay" id="reasonDelay" placeholder="If any, in detecting the fraud " value="<?php echo e($fmrDetails->fraud_delay_reason); ?>">
                    <?php if($errors->has('reasonDelay')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('reasonDelay')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="help-block">(if any, in detecting in fraud)</span>
                    <span class="error" id="reasonDelay-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="dateOfRptRbi">Date on which reported to RBI?</label>
                    <input class="form-control  <?php echo e($errors->has('dateOfOccu') ? 'is-invalid' : ''); ?>" name="dateOfRptRbi" id="dateOfRptRbi" placeholder="" value="<?php echo e($fmrDetails->rbi_date); ?>" type="date">
                    <?php if($errors->has('dateOfOccu')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dateOfOccu')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dateOfRptRbi-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="reasonDelayRbi">Reason for delay(RBI)</label>
                    <input class="form-control  <?php echo e($errors->has('area') ? 'is-invalid' : ''); ?>" name="reasonDelayRbi" id="reasonDelayRbi" placeholder="If any in reporting the fraud to RBI " value="<?php echo e($fmrDetails->rbi_delay_reason); ?>">
                    <?php if($errors->has('reasonDelayRbi')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('reasonDelayRbi')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="reasonDelayRbi-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="brifHistory">Brief history</label>
                    <input class="form-control  <?php echo e($errors->has('brifHistory') ? 'is-invalid' : ''); ?>" name="brifHistory" id="brifHistory" placeholder="Brief History" value="<?php echo e($fmrDetails->fraud_brief_history); ?>">
                    <?php if($errors->has('brifHistory')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('brifHistory')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="brifHistory-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="modusOperandi">Modus operandi</label>
                    <textarea class="form-control  <?php echo e($errors->has('modusOperandi') ? 'is-invalid' : ''); ?>" name="modusOperandi" id="modusOperandi" placeholder="Enter modus operandi" value="" rows="2"><?php echo e($fmrDetails->modus_operandi); ?>

                    </textarea>
                    <?php if($errors->has('modusOperandi')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('modusOperandi')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="modusOperandi-error"></span>
                </div>
            </div>
            <hr>

            <!-- Fraud committed by<br> -->
            <h5> Fraud commited by </h5>
            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="required" for="staff">Staff</label>
                    <select class="form-control <?php echo e($errors->has('compUse') ? 'is-invalid' : ''); ?>" name="staff" id="staff">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($fmrDetails->fraud_staff == 'Y' ? 'selected' : ''); ?>>Yes</option>
                        <option value="N" <?php echo e($fmrDetails->fraud_staff == 'N' ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php if($errors->has('staff')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('staff')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="staff-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="customer">Customer</label>
                    <select class="form-control <?php echo e($errors->has('customer') ? 'is-invalid' : ''); ?>" name="customer" id="customer">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($fmrDetails->fraud_customer == 'Y' ? 'selected' : ''); ?>>Yes</option>
                        <option value="N" <?php echo e($fmrDetails->fraud_customer == 'N' ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php if($errors->has('customer')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('customer')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="customer-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="outsider">Outsider</label>
                    <select class="form-control <?php echo e($errors->has('outsider') ? 'is-invalid' : ''); ?>" name="outsider" id="outsider">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($fmrDetails->fraud_outsider == 'Y' ? 'selected' : ''); ?>>Yes</option>
                        <option value="N" <?php echo e($fmrDetails->fraud_customer == 'N' ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php if($errors->has('outsider')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('outsider')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="outsider-error"></span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="required" for="officeDetect">Controlling office detected</label>
                    <select class="form-control <?php echo e($errors->has('officeDetect') ? 'is-invalid' : ''); ?>" name="officeDetect" id="officeDetect">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($fmrDetails->regional_office_detect == 'Y' ? 'selected' : ''); ?>>Yes</option>
                        <option value="N" <?php echo e($fmrDetails->regional_office_detect == 'N' ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php if($errors->has('officeDetect')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('officeDetect')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="officeDetect-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="needToImpro">Need to improve</label>
                    <select class="form-control <?php echo e($errors->has('needToImpro') ? 'is-invalid' : ''); ?>" name="needToImpro" id="needToImpro">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($fmrDetails->system_improvement == 'Y' ? 'selected' : ''); ?>>Yes</option>
                        <option value="N" <?php echo e($fmrDetails->system_improvement == 'N' ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php if($errors->has('needToImpro')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('needToImpro')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="needToImpro-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="intInsAudit">Internal inspection/audit</label>
                    <textarea class="form-control  <?php echo e($errors->has('intInsAudit') ? 'is-invalid' : ''); ?>" name="intInsAudit" id="intInsAudit" placeholder="Whether internal inspection/audit (including concurrent audit(es) during the period between the date of first occurrence of fraud and its detections?" value="" rows="2"><?php echo e($fmrDetails->internal_detection); ?></textarea>
                    <?php if($errors->has('intInsAudit')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('intInsAudit')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="intInsAudit-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="yFraud">Why the fraud</label>
                    <textarea class="form-control  <?php echo e($errors->has('yFraud') ? 'is-invalid' : ''); ?>" name="yFraud" id="yFraud" placeholder="If yes, why the fraud could not have   been detected during such inspection/audit." value="" rows="2"><?php echo e($fmrDetails->internal_detection_reason); ?></textarea>
                    <?php if($errors->has('yFraud')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('yFraud')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="yFraud-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="actionTaken">Action taken</label>
                    <textarea class="form-control  <?php echo e($errors->has('actionTaken') ? 'is-invalid' : ''); ?>" name="actionTaken" id="actionTaken" placeholder="What action has been taken for non-detection of fraud during such inspection/audit" value="" rows="2"><?php echo e($fmrDetails->non_detection_action); ?></textarea>
                    <?php if($errors->has('actionTaken')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('actionTaken')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="actionTaken-error"></span>
                </div>
            </div>
            <hr>
            <h5>Action taken/propose to be taken</h5>
            <h6>(a) Complaint with police</h6>
            <div class="row">

                <!-- Complaint with police -->
                <div class="form-group col-sm-3">
                    <label class="required" for="policeComp">Police complaint lodged?</label>

                    <select class="form-control <?php echo e($errors->has('officeDetect') ? 'is-invalid' : ''); ?>" name="policeComp" id="policeComp">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($fmrDetails->police_complaint === 'Y' ? 'selected' : ''); ?>>Yes</option>
                        <option value="N" <?php echo e($fmrDetails->police_complaint === 'N' ? 'selected' : ''); ?>>No</option>
                        <option value="U" <?php echo e($fmrDetails->police_complaint === 'U' ? 'selected' : ''); ?>>In Progress</option>
                    </select>
                    <?php if($errors->has('policeComp')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('policeComp')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="policeComp-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="policeStationName">If yes, name of the Police Station.</label>
                    <input class="form-control  <?php echo e($errors->has('policeStationName') ? 'is-invalid' : ''); ?>" name="policeStationName" id="policeStationName" placeholder="If yes, name of the Police Station or NA
" value="<?php echo e($fmrDetails->police_station); ?>" type="">
                    <?php if($errors->has('policeStationName')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('policeStationName')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="policeStationName-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="dateOfRef">Date of reference</label>
                    <input class="form-control  <?php echo e($errors->has('dateOfRef') ? 'is-invalid' : ''); ?>" name="dateOfRef" id="dateOfRef" placeholder="Date of reference or NA" value="<?php echo e($fmrDetails->complaint_date); ?>" type="">
                    <?php if($errors->has('dateOfRef')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dateOfRef')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dateOfRef-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="presentPos">Present position of the case</label>
                    <input class="form-control  <?php echo e($errors->has('presentPos') ? 'is-invalid' : ''); ?>" name="presentPos" id="presentPos" placeholder="Present postion of the case or NA" value="<?php echo e($fmrDetails->complaint_status); ?>" type="">
                    <!-- <select class="form-control <?php echo e($errors->has('presentPos') ? 'is-invalid' : ''); ?>" name="presentPos" id="presentPos">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($fmrDetails->complaint_status == 'Y' ? 'selected' : ''); ?>>Completed Investigation</option>
                        <option value="N" <?php echo e($fmrDetails->complaint_status == 'N' ? 'selected' : ''); ?>>Under Investigation</option>
                    </select> -->
                    <?php if($errors->has('presentPos')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('presentPos')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="presentPos-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="dateOfCPI">Date of completion of Police investigation</label>
                    <input class="form-control  <?php echo e($errors->has('dateOfCPI') ? 'is-invalid' : ''); ?>" name="dateOfCPI" id="dateOfCPI" placeholder="Yet to complete or Date of completion" value="<?php echo e($fmrDetails->investigation_completion_date); ?>" type="">
                    <?php if($errors->has('dateOfCPI')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dateOfCPI')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dateOfCPI-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="dateOfSubInvReport">Date of submission of investigation report</label>
                    <input class="form-control  <?php echo e($errors->has('dateOfSubInvReport') ? 'is-invalid' : ''); ?>" name="dateOfSubInvReport" id="dateOfSubInvReport" placeholder="Yet to complete or Date of completion" value="<?php echo e($fmrDetails->investiagation_report_date); ?>" type="">
                    <?php if($errors->has('dateOfSubInvReport')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dateOfSubInvReport')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dateOfSubInvReport-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="notRptPo">If not reported to Police, reason</label>
                    <input class="form-control  <?php echo e($errors->has('notRptPo') ? 'is-invalid' : ''); ?>" name="notRptPo" id="notRptPo" placeholder="Reported to Police or NA" value="<?php echo e($fmrDetails->not_reported_reason); ?>" type="">
                    <?php if($errors->has('notRptPo')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('notRptPo')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="notRptPo-error"></span>
                </div>
            </div>
            <br>
            <h6>(b) Recovery suit with concerned court</h6>
            <div class="row">
                <!-- Recovery suit with concerned court -->
                <div class="form-group col-sm-3">
                    <label class="required" for="DofFilling">Date of filling</label>
                    <input class="form-control  <?php echo e($errors->has('DofFilling') ? 'is-invalid' : ''); ?>" name="DofFilling" id="DofFilling" placeholder="NA or date of filing" value="<?php echo e($fmrDetails->court_filling_date); ?>" type="">
                    <?php if($errors->has('DofFilling')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('DofFilling')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="DofFilling-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="position">Present position</label>
                    <input class="form-control  <?php echo e($errors->has('position') ? 'is-invalid' : ''); ?>" name="position" id="position" placeholder="NA or details" value="<?php echo e($fmrDetails->court_status); ?>" type="">
                    <?php if($errors->has('position')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('position')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="position-error"></span>
                </div>
            </div>

            <br>
            <h6>(c) Insurance Claim</h6>
            <div class="row">
                <!-- Insurance claim -->

                <div class="form-group col-sm-3">
                    <label class="required" for="clainLodge">Insurance claim lodged?</label>
                    <input class="form-control  <?php echo e($errors->has('dateOfOccu') ? 'is-invalid' : ''); ?>" name="clainLodge" id="clainLodge" placeholder="NA or details" value="<?php echo e($fmrDetails->insurance_claim_lodged); ?>" type="">
                    <?php if($errors->has('clainLodge')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('clainLodge')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="clainLodge-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="clainLodgeReason">If not, reason therefore</label>
                    <input class="form-control  <?php echo e($errors->has('dateOfOccu') ? 'is-invalid' : ''); ?>" name="clainLodgeReason" id="clainLodgeReason" placeholder="NA or details" value="<?php echo e($fmrDetails->insurance_claim_reason); ?>" type="">
                    <?php if($errors->has('clainLodgeReason')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('clainLodgeReason')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="clainLodgeReason-error"></span>
                </div>
            </div>
            <br>
            <h6>(d)(i) Details of staff side action</h6>
            <div class="row">
                <!-- Details of staff side action -->
                <div class="form-group col-sm-3">
                    <label class="required" for="intInvestigation">Any internal investigation</label>
                    <select class="form-control <?php echo e($errors->has('intInvestigation') ? 'is-invalid' : ''); ?>" name="intInvestigation" id="intInvestigation">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($fmrDetails->internal_investigation == 'Y' ? 'selected' : ''); ?>>Yes</option>
                        <option value="N" <?php echo e($fmrDetails->internal_investigation == 'N' ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php if($errors->has('intInvestigation')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('intInvestigation')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="intInvestigation-error"></span>
                </div>
                <!-- add here fields of Internal investigation field -->
                <div class="form-group col-sm-3">
                    <label class="" for="dateOfComple">If yes, date of completion</label>
                    <input class="form-control  <?php echo e($errors->has('dateOfComple') ? 'is-invalid' : ''); ?>" name="dateOfComple" id="dateOfComple" placeholder="NA or date of detection" value="<?php echo e($fmrDetails->internal_detection_date); ?>" type="">
                    <?php if($errors->has('dateOfComple')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dateOfOccu')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dateOfComple-error"></span>
                </div>
            </div>

            <h6>(d)(ii) Departmental Inquiry details</h6>
            <div class="row">
                <!--  <div class="form-group col-sm-3">
                    <label class="" for="internalDetectDate">Internal Detection Date</label>
                    <input class="form-control  <?php echo e($errors->has('internalDetectDate') ? 'is-invalid' : ''); ?>" name="internalDetectDate" id="internalDetectDate" placeholder="NA or date of detection" value="" type="date">
                    <?php if($errors->has('internalDetectDate')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('internalDetectDate')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="internalDetectDate-error"></span>
                </div> -->
                <div class="form-group col-sm-6">
                    <label class="required" for="deptInquiry">Whether any departmental enquiry has been/is proposed to be conducted </label>
                    <input class="form-control  <?php echo e($errors->has('deptInquiry') ? 'is-invalid' : ''); ?>" name="deptInquiry" id="deptInquiry" placeholder="NA or details" value="<?php echo e($fmrDetails->dept_inquiry); ?>" type="">
                    <?php if($errors->has('deptInquiry')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('deptInquiry')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="deptInquiry-error"></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-3" style="display: none;">
                    <label class="required" for="deptInquiryNum">Department Enquiry Number</label>
                    <input class="form-control  <?php echo e($errors->has('deptInquiryNum') ? 'is-invalid' : ''); ?>" name="deptInquiryNum" id="deptInquiry" placeholder="NA or details" value="<?php echo e($fmrDetails->dept_inquiry_no); ?>" type="hidden">
                    <?php if($errors->has('deptInquiryNum')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('deptInquiryNum')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="deptInquiryNum-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="deptInqEmpName">Employee Name</label>
                    <input class="form-control  <?php echo e($errors->has('deptInqEmpName') ? 'is-invalid' : ''); ?>" name="deptInqEmpName" id="deptInquiry" placeholder="Name of employee" value="<?php echo e($fmrDetails->dept_inq_emp_name); ?>" type="">
                    <?php if($errors->has('deptInqEmpName')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('deptInqEmpName')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="deptInqEmpName-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="deptInqEmpDesignation">Employee Designation</label>
                    <input class="form-control  <?php echo e($errors->has('deptInqEmpDesignation') ? 'is-invalid' : ''); ?>" name="deptInqEmpDesignation" id="deptInqEmpDesignation" placeholder="Employee Designation" value="<?php echo e($fmrDetails->dept_inq_emp_designation); ?>" type="">
                    <?php if($errors->has('deptInqEmpDesignation')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('deptInqEmpDesignation')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="deptInqEmpDesignation-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="suspended">Whether suspended/Dt. of suspension</label>
                    <select class="form-control <?php echo e($errors->has('suspended') ? 'is-invalid' : ''); ?>" name="suspended" id="suspended">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($fmrDetails->dept_suspension == 'Y' ? 'selected' : ''); ?>>Yes</option>
                        <option value="N" <?php echo e($fmrDetails->dept_suspension == 'N' ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php if($errors->has('presentPos')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('presentPos')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="presentPos-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="dateChargeSheet">Date of issue of charge sheet</label>
                    <input class="form-control  <?php echo e($errors->has('dateChargeSheet') ? 'is-invalid' : ''); ?>" name="dateChargeSheet" id="dateChargeSheet" placeholder="NA or date of detection" value="<?php echo e($fmrDetails->charge_sheet_date); ?>" type="">
                    <?php if($errors->has('dateChargeSheet')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dateChargeSheet')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dateChargeSheet-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="domesticEnq">Date of commencement of domestic inquiry</label>
                    <input class="form-control  <?php echo e($errors->has('domesticEnq') ? 'is-invalid' : ''); ?>" name="domesticEnq" id="domesticEnq" placeholder="NA or Date of domestic inquiry" value="<?php echo e($fmrDetails->domestic_inquiry_date); ?>" type="">
                    <?php if($errors->has('domesticEnq')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('domesticEnq')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="domesticEnq-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="dateComptEnq">Date of completion of inquiry</label>
                    <input class="form-control  <?php echo e($errors->has('dateComptEnq') ? 'is-invalid' : ''); ?>" name="dateComptEnq" id="dateComptEnq" placeholder="" value="<?php echo e($fmrDetails->frmc_date); ?>" type="date">
                    <?php if($errors->has('dateComptEnq')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dateComptEnq')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dateComptEnq-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="" for="dateOfIssueFO">Date of issue of final orders</label>
                    <input class="form-control  <?php echo e($errors->has('dateOfIssueFO') ? 'is-invalid' : ''); ?>" name="dateOfIssueFO" id="dateOfIssueFO" placeholder="Date of issue final orders or NA" value="<?php echo e($fmrDetails->final_order_date); ?>" type="">
                    <?php if($errors->has('dateOfIssueFO')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dateOfIssueFO')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dateOfIssueFO-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="punishAward">Punishment awarded</label>
                    <input class="form-control  <?php echo e($errors->has('punishAward') ? 'is-invalid' : ''); ?>" name="punishAward" id="punishAward" placeholder="Punishment awarded" value="<?php echo e($fmrDetails->punishment); ?>" type="">
                    <?php if($errors->has('punishAward')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('punishAward')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="punishAward-error"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label class="required" for="detailsPCA">Details of prosecution</label>
                    <input class="form-control  <?php echo e($errors->has('detailsPCA') ? 'is-invalid' : ''); ?>" name="detailsPCA" id="detailsPCA" placeholder="Details of prosecution/ conviction/ acquittal, etc." value="<?php echo e($fmrDetails->conviction_details); ?>" type="">
                    <?php if($errors->has('detailsPCA')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('detailsPCA')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="detailsPCA-error"></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="required" for="resonOfDetails">Department Inquiry not conducted then reason</label>
                    <input class="form-control  <?php echo e($errors->has('resonOfDetails') ? 'is-invalid' : ''); ?>" name="resonOfDetails" id="resonOfDetails" placeholder="If departmental Inquiry is not conducted then reason" value="<?php echo e($fmrDetails->dept_enquiry_reason); ?>" type="">
                    <?php if($errors->has('resonOfDetails')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('resonOfDetails')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="resonOfDetails-error"></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="required" for="steps">Steps Taken to aviod such incident</label>
                    <input class="form-control  <?php echo e($errors->has('detailsPCA') ? 'is-invalid' : ''); ?>" name="steps" id="steps" placeholder="Steps taken/proposed to be taken to avoid such incidents " value="<?php echo e($fmrDetails->setps_to_avoid); ?>" type="">
                    <?php if($errors->has('steps')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('steps')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="steps-error"></span>
                </div>
            </div>
            <hr>
            <h5>Total Amount Recovered</h5>
            <div class="row">
                <!-- Total amount recovered -->

                <div class="form-group col-sm-3">
                    <label class="required" for="amtRecover">From party/parties</label>
                    <input class="form-control  <?php echo e($errors->has('amtRecover') ? 'is-invalid' : ''); ?>" name="amtRecover" id="amtRecover" placeholder=" " value="<?php echo e($fmrDetails->recovery_amount); ?>" type="number" step="0.001">
                    <?php if($errors->has('amtRecover')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('amtRecover')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="amtRecover-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="frmInsurance">From Insurance</label>
                    <input class="form-control  <?php echo e($errors->has('frmInsurance') ? 'is-invalid' : ''); ?>" name="frmInsurance" id="frmInsurance" placeholder=" " value="<?php echo e($fmrDetails->insurance_amount); ?>" type="number" step="0.001">
                    <?php if($errors->has('frmInsurance')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('frmInsurance')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="frmInsurance-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="otherSrc">From other sources</label>
                    <input class="form-control  <?php echo e($errors->has('otherSrc') ? 'is-invalid' : ''); ?>" name="otherSrc" id="otherSrc" placeholder=" " value="<?php echo e($fmrDetails->other_amount); ?>" type="number" step="0.001">
                    <?php if($errors->has('otherSrc')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('otherSrc')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="otherSrc-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="extentLoss">Extent of loss to HFC</label>
                    <input class="form-control  <?php echo e($errors->has('extentLoss') ? 'is-invalid' : ''); ?>" name="extentLoss" id="extentLoss" placeholder=" " value="<?php echo e($fmrDetails->loss_to_hfc); ?>" type="number" step="0.001">
                    <?php if($errors->has('extentLoss')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('extentLoss')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="extentLoss-error"></span>
                </div>
                <!-- <div class="form-group col-sm-3">
                        <label class="" for="extentLoss">Extent of loss to HFC</label>   
                    <input class="form-control  <?php echo e($errors->has('extentLoss') ? 'is-invalid' : ''); ?>" name="extentLoss" id="extentLoss" placeholder=" " value="" type="">
                    <?php if($errors->has('extentLoss')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('extentLoss')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="extentLoss-error"></span>
                </div> -->

                <div class="form-group col-sm-3">
                    <label class="required" for="provisionheld">Provision held</label>
                    <input class="form-control  <?php echo e($errors->has('provisionheld') ? 'is-invalid' : ''); ?>" name="provisionheld" id="provisionheld" placeholder=" " value="<?php echo e($fmrDetails->provision_amount); ?>" type="number" step="0.001">
                    <?php if($errors->has('provisionheld')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('provisionheld')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="provisionheld-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="amtWrittenOff">Amount written off</label>
                    <input class="form-control  <?php echo e($errors->has('amtWrittenOff') ? 'is-invalid' : ''); ?>" name="amtWrittenOff" id="amtWrittenOff" placeholder=" " value="<?php echo e($fmrDetails->return_of_amount); ?>" type="number" step="0.001">
                    <?php if($errors->has('amtWrittenOff')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('amtWrittenOff')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="amtWrittenOff-error"></span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="" for="suggestions">Suggestions for consideration of RBI</label>
                    <input class="form-control  <?php echo e($errors->has('suggestions') ? 'is-invalid' : ''); ?>" name="suggestions" id="suggestions" placeholder="NA or suggestions " value="<?php echo e($fmrDetails->rbi_suggestions); ?>" type="">
                    <?php if($errors->has('suggestions')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('suggestions')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="suggestions-error"></span>
                </div>
            </div>
            <hr>
            <h4>Part B. Additional Information on Frauds in Borrowal Account</h4>
            <hr>
            <h5>a. (This part is required to be completed in respect of frauds in all borrowal accounts involving an amount of ₹5 lakh and above)</h5>
            <?php if($fmrDetails->borrowerDetails): ?>
            <div class="row">
                <!-- <div class="form-group col-sm-3">
                    <input class="form-control  <?php echo e($errors->has('suggestions') ? 'is-invalid' : ''); ?>" name="typeOfParty" id="typeOfParty" placeholder="Type Of Party " value="<?php echo e($fmrDetails->borrowerDetails->id); ?>" type="">
                </div> -->
                <div class="form-group col-sm-3">
                    <label class="required" for="typeOfParty">Type of party</label>
                    <input class="form-control  <?php echo e($errors->has('suggestions') ? 'is-invalid' : ''); ?>" name="typeOfParty" id="typeOfParty" placeholder="Type Of Party " value="<?php echo e($fmrDetails->borrowerDetails->type_of_party); ?>" type="">
                    <?php if($errors->has('typeOfParty')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('typeOfParty')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="typeOfParty-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="nameOfParty">Name of party/account</label>
                    <input class="form-control  <?php echo e($errors->has('nameOfParty') ? 'is-invalid' : ''); ?>" name="nameOfParty" id="nameOfParty" placeholder="Name Of Party" value="<?php echo e($fmrDetails->borrowerDetails->account_name); ?>" type="">
                    <?php if($errors->has('nameOfParty')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('nameOfParty')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="nameOfParty-error"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label class="required" for="partyAddress">Party Address</label>
                    <input class="form-control  <?php echo e($errors->has('partyAddress') ? 'is-invalid' : ''); ?>" name="partyAddress" id="partyAddress" placeholder="Party Address " value="<?php echo e($fmrDetails->borrowerDetails->party_address); ?>" type="">
                    <?php if($errors->has('partyAddress')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('partyAddress')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="partyAddress-error"></span>
                </div>
            </div>
            <h5>b. Borrower account details</h5>
            <div class="row">
                <!-- Borrowal accounts details -->
                <div class="form-group col-sm-3">
                    <label class="required" for="borroPartyNam">Name of party/account </label>
                    <input class="form-control  <?php echo e($errors->has('borroPartyNam') ? 'is-invalid' : ''); ?>" name="borroPartyNam" id="borroPartyNam" placeholder=" Name of party/account" value="<?php echo e($fmrDetails->borrowerDetails->account_name); ?>" type="">
                    <?php if($errors->has('borroPartyNam')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('borroPartyNam')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="borroPartyNam-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="borrSrNum">Borrowal account Sr. No.(LAN) </label>
                    <input class="form-control  <?php echo e($errors->has('borrSrNum') ? 'is-invalid' : ''); ?>" name="borrSrNum" id="borrSrNum" placeholder=" " value="<?php echo e($fmrDetails->borrowerDetails->lan); ?>" type="">
                    <?php if($errors->has('borrSrNum')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('borrSrNum')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="borrSrNum-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="natureOfAc">Nature of Account</label>
                    <input class="form-control  <?php echo e($errors->has('natureOfAc') ? 'is-invalid' : ''); ?>" name="natureOfAc" id="natureOfAc" placeholder="Nature of Account " value="<?php echo e($fmrDetails->borrowerDetails->nature_of_account); ?>" type="">
                    <?php if($errors->has('natureOfAc')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('natureOfAc')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="natureOfAc-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="borroDateSanction">Date of Sanction</label>
                    <input class="form-control  <?php echo e($errors->has('borroDateSanction') ? 'is-invalid' : ''); ?>" name="borroDateSanction" id="borroDateSanction" placeholder=" " value="<?php echo e($fmrDetails->borrowerDetails->disbursement_date); ?>" type="date">
                    <?php if($errors->has('borroDateSanction')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('borroDateSanction')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="borroDateSanction-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="sanctionedLimit">Sanctioned limit</label>
                    <input class="form-control  <?php echo e($errors->has('sanctionedLimit') ? 'is-invalid' : ''); ?>" name="sanctionedLimit" id="sanctionedLimit" placeholder="Sanctioned limit " value="<?php echo e($fmrDetails->borrowerDetails->sanction_limit); ?>" type="number">
                    <?php if($errors->has('sanctionedLimit')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('sanctionedLimit')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="sanctionedLimit-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="disbursedAmount">Disbursed amount</label>
                    <input class="form-control  <?php echo e($errors->has('disbursedAmount') ? 'is-invalid' : ''); ?>" name="disbursedAmount" id="disbursedAmount" placeholder="Disbursed amount " value="<?php echo e($fmrDetails->borrowerDetails->disburse_amount); ?>" type="number">
                    <?php if($errors->has('disbursedAmount')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('disbursedAmount')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="disbursedAmount-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="balanceOutstanding">Balance outstanding</label>
                    <input class="form-control  <?php echo e($errors->has('balanceOutstanding') ? 'is-invalid' : ''); ?>" name="balanceOutstanding" id="balanceOutstanding" placeholder="Balance Outstanding" value="<?php echo e($fmrDetails->borrowerDetails->balance_outstanding); ?>" type="number">
                    <?php if($errors->has('balanceOutstanding')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('balanceOutstanding')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="balanceOutstanding-error"></span>
                </div>
            </div>
            <?php endif; ?>
            <h5>c. Director/ Proprietor Details</h5>
            <div class="row">
                <!-- Borrowal account Director/proprietor details -->
                <div class="form-group col-sm-3">
                    <label class="required" for="account_name_dir">Name of party/account </label>
                    <input class="form-control  <?php echo e($errors->has('account_name_dir') ? 'is-invalid' : ''); ?>" name="account_name_dir" id="account_name_dir" placeholder="Name of party/account " value="<?php echo e(@$fmrDetails->borrowerDetails->borrowerDirDetails[0]->account_name); ?>" type="">
                    <?php if($errors->has('account_name_dir')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('account_name_dir')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="account_name_dir-error"></span>
                </div>
                <!-- <div class="form-group col-sm-3">
                    <label class="required" for="partySrNum">Party Sr.No.</label>
                    <input class="form-control  <?php echo e($errors->has('partySrNum') ? 'is-invalid' : ''); ?>" name="partySrNum" id="partySrNum" placeholder="Party Serial No." value="" type="number">
                    <?php if($errors->has('partySrNum')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('partySrNum')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="partySrNum-error"></span>
                </div> -->
                <div class="form-group col-sm-3">
                    <label class="required" for="nameOfDirector">Name of Director/Proprietor </label>
                    <input class="form-control  <?php echo e($errors->has('nameOfDirector') ? 'is-invalid' : ''); ?>" name="nameOfDirector" id="nameOfDirector" placeholder="Name of Director/Proprietor " value="<?php echo e(@$fmrDetails->borrowerDetails->borrowerDirDetails[0]->director_name); ?>" type="">
                    <?php if($errors->has('nameOfDirector')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('nameOfDirector')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="nameOfDirector-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="dir_address">Director/Proprietor Address</label>
                    <input class="form-control  <?php echo e($errors->has('dir_address') ? 'is-invalid' : ''); ?>" name="address" id="dir_address" placeholder="Director/Proprietor Address" value="<?php echo e(@$fmrDetails->borrowerDetails->borrowerDirDetails[0]->director_address); ?>" type="">
                    <?php if($errors->has('dir_address')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('dir_address')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="dir_address-error"></span>
                </div>
            </div>
            <h5>d. Associate Concerns</h5>
            <div class="row">
                <!-- Associate Concerns: -->

                <div class="form-group col-sm-3">
                    <label class="required" for="account_name_asso">Name of party/account </label>
                    <input class="form-control  <?php echo e($errors->has('account_name_asso') ? 'is-invalid' : ''); ?>" name="account_name_asso" id="account_name_asso" placeholder=" Name of party/account" value="<?php echo e(@$fmrDetails->borrowerDetails->borrowerAssoDetails[0]->account_name); ?>" type="">
                    <?php if($errors->has('account_name_asso')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('account_name_asso')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="account_name_asso-error"></span>
                </div>
                <!-- <div class="form-group col-sm-3">
                    <label class="required" for="srNumAssCon">Sr. No. Associate Concern</label>
                    <input class="form-control  <?php echo e($errors->has('srNumAssCon') ? 'is-invalid' : ''); ?>" name="srNumAssCon" id="srNumAssCon" placeholder="Sr. No. Associate Concern" value="" type="number">
                    <?php if($errors->has('srNumAssCon')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('srNumAssCon')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="srNumAssCon-error"></span>
                </div> -->
                <div class="form-group col-sm-3">
                    <label class="required" for="nameOfAssoCornDir">Name of Associate Concern </label>
                    <input class="form-control  <?php echo e($errors->has('nameOfAssoCornDir') ? 'is-invalid' : ''); ?>" name="nameOfAssoCornDir" id="nameOfAssoCornDir" placeholder="Name of Associate Concern " value="<?php echo e(@$fmrDetails->borrowerDetails->borrowerAssoDetails[0]->associate_name); ?>" type="">
                    <?php if($errors->has('nameOfAssoCornDir')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('nameOfAssoCornDir')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="nameOfAssoCornDir-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="addressDir">Associate Address</label>
                    <input class="form-control  <?php echo e($errors->has('addressDir') ? 'is-invalid' : ''); ?>" name="addressDir" id="addressDir" placeholder="Associate Address" value="<?php echo e(@$fmrDetails->borrowerDetails->borrowerAssoDetails[0]->address); ?>" type="">
                    <?php if($errors->has('addressDir')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('addressDir')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="addressDir-error"></span>
                </div>
                <div class="form-group col-sm-3">

                </div>

            </div>
            <h5>e. Associate Director</h5>
            <div class="row">
                <!-- Associate Concerns: -->

                <div class="form-group col-sm-3">
                    <label class="required" for="accountNameAssoDir">Name of party/account </label>
                    <input class="form-control  <?php echo e($errors->has('accountNameAssoDir') ? 'is-invalid' : ''); ?>" name="accountNameAssoDir" id="accountNameAssoDir" placeholder=" Name of party/account" value="<?php echo e($fmrDetails->borrowerDetails->borrowerAssoDirDetails[0]->account_name ?? ''); ?>" type="">
                    <?php if($errors->has('account_name_asso')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('account_name_asso')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="account_name_asso-error"></span>
                </div>
                <!-- <div class="form-group col-sm-3">
                    <label class="required" for="srNumAssCon">Sr. No. Associate Concern</label>
                    <input class="form-control  <?php echo e($errors->has('srNumAssCon') ? 'is-invalid' : ''); ?>" name="srNumAssCon" id="srNumAssCon" placeholder="Sr. No. Associate Concern" value="" type="number">
                    <?php if($errors->has('srNumAssCon')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('srNumAssCon')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="srNumAssCon-error"></span>
                </div> -->
                <div class="form-group col-sm-3">
                    <label class="required" for="nameOfAssoDir">Name of Associate Director/Proprietor </label>
                    <input class="form-control  <?php echo e($errors->has('nameOfAssoCornDir') ? 'is-invalid' : ''); ?>" name="nameOfAssoDir" id="nameOfAssoDir" placeholder="Name of Associate Director" value="<?php echo e($fmrDetails->borrowerDetails->borrowerAssoDirDetails[0]->director_name ?? ''); ?>" type="">
                    <?php if($errors->has('nameOfAssoCornDir')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('nameOfAssoCornDir')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="nameOfAssoCornDir-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="addressAssoDir">Director/ Proprietor Address </label>
                    <input class="form-control  <?php echo e($errors->has('addressDir') ? 'is-invalid' : ''); ?>" name="addressAssoDir" id="addressAssoDir" placeholder="Associate Director Address" value="<?php echo e($fmrDetails->borrowerDetails->borrowerAssoDirDetails[0]->director_address ?? ''); ?>" type="">
                    <?php if($errors->has('addressAssoDir')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('addressAssoDir')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="addressAssoDir-error"></span>
                </div>
                <div class="form-group col-sm-3">

                </div>

            </div>
            <div class="row">



                <!-- Rest of the form inputs -->
            </div>



            <div class="form-group text-center" style="margin:auto;padding-top:20px">
                <button class="btn btn-primary" type="submit">
                    SUBMIT
                </button>
                <!-- <a class="btn btn-dark" href="<?php echo e($source === 'indexBorrowals' ? route('admin.indexBorrowals', ['id' => $fmrDetails->id]) : route('admin.fmr.index')); ?>">
                    CANCEL
                </a> -->
                <a class="btn btn-dark" href="<?php echo e($source === 'indexBorrowals' ? route('admin.indexBorrowals', ['id' => $fmrDetails->id]) : route('admin.fmr.index')); ?>">
                    CANCEL
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .error {
        color: red;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Focus on the Loan Account Number field
        document.getElementById("lan").focus();
    });

    function validateForm() {
        var nameHFC = $('#nameHFC').val();
        var FraudNumber = $('#FraudNumber').val();
        var NameOfBranch = $('#nameOfBranch').val();
        var BranchType = $('#BranchType').val();
        var branchPlace = $('#branchPlace').val();
        var district = $('#district').val();
        var state = $('#state').val();

        var principalAc = $('#principalAc').val();
        var area = $('#area').val();
        var fraudBAc = $('#fraudBAc').val();
        var natureOfFraud = $('#natureOfFraud').val();

        var compUse = $('#compUse').val();
        var description = $('#description').val();
        var totalAmt = $('#totalAmt').val();
        var dateOfOccu = $('#dateOfOccu').val();
        var dateOfDetect = $('#dateOfDetect').val();

        var reasonDelay = $('#reasonDelay').val();
        var dateOfRptRbi = $('#dateOfRptRbi').val();
        var reasonDelayRbi = $('#reasonDelayRbi').val();
        var brifHistory = $('#brifHistory').val();
        var modusOperandi = $('#modusOperandi').val();

        var staff = $('#staff').val();
        var Customer = $('#Customer').val();
        var outsider = $('#outsider').val();
        var officeDetect = $('#officeDetect').val();
        var needToImpro = $('#needToImpro').val();

        var intInsAudit = $('#intInsAudit').val();
        var yFraud = $('#yFraud').val();
        var actionTaken = $('#actionTaken').val();
        var policeComp = $('#policeComp').val();
        var policeStationName = $('#policeStationName').val();

        var dateOfRef = $('#dateOfRef').val();
        var presentPos = $('#presentPos').val();
        var dateChargeSheet = $('#dateChargeSheet').val();
        var domesticEnq = $('#domesticEnq').val();
        var dateComptEnq = $('#dateComptEnq').val();

        var dateOfIssueFO = $('#dateOfIssueFO').val();
        var punishAward = $('#punishAward').val();
        var detailsPCA = $('#detailsPCA').val();
        var resonOfDetails = $('#resonOfDetails').val();
        var steps = $('#steps').val();

        var amtRecover = $('#amtRecover').val();
        var frmInsurance = $('#frmInsurance').val();
        var otherSrc = $('#otherSrc').val();
        var extentLoss = $('#extentLoss').val();
        var provisionheld = $('#provisionheld').val();

        var amtWrittenOff = $('#amtWrittenOff').val();
        var suggestions = $('#suggestions').val();
        var srNumBorr = $('#srNumBorr').val();
        var typeOfParty = $('#typeOfParty').val();
        var nameOfParty = $('#nameOfParty').val();

        var partyAddress = $('#partyAddress').val();
        // var partySrNum = $('#partySrNum').val();
        var borroPartyNam = $('#borroPartyNam').val();
        var borrSrNum = $('#borrSrNum').val();
        var natureOfAc = $('#natureOfAc').val();

        var borroDateSanction = $('#borroDateSanction').val();
        var sanctionedLimit = $('#sanctionedLimit').val();
        var disbursedAmount = $('#disbursedAmount').val();
        var balanceOutstanding = $('#balanceOutstanding').val();
        var borroPartyNam = $('#borroPartyNam').val();

        var account_name_dir = $('#account_name_dir').val();
        var nameOfDirector = $('#nameOfDirector').val();
        var dir_address = $('#dir_address').val();
        var account_name_asso = $('#account_name_asso').val();
        var nameOfAssoCornDir = $('#nameOfAssoCornDir').val();
        var addressDir = $('#addressDir').val();

        // console.log(nameHFC);
        $(".error").remove();

        if (nameHFC == '') {
            $('#nameHFC-error').after('<span class="error">Name of HFC is required</span>');
            return false;
        }
        if (FraudNumber == '') {
            $('#FraudNumber').after('<span class="error">Fraud Number is required</span>');
            return false;
        }

        if ($("#lan").val() == '') {
            $("#lan").focus();
            $('#refBtn').after('<span class="error">LAN is required</span>');
            // $('#lan-error').html('LAN is required').show();
            return false;
        }
        if (NameOfBranch == '') {
            $("#nameOfBranch").focus();
            $('#nameOfBranch').after('<span class="error">Name of branch is required</span>');
            return false;
        }
        if (BranchType == '') {
            $("#BranchType").focus();
            $('#BranchType').after('<span class="error">Branch Type is required</span>');
            return false;
        }
        if (branchPlace == '') {
            $("#branchPlace").focus();
            $('#branchPlace').after('<span class="error">Branch place is required</span>');
            return false;
        }
        if (district == '') {
            $("#district").focus();
            $('#district').after('<span class="error">District is required</span>');
            return false;
        }
        if (state == '') {
            $("#state").focus();
            $('#state').after('<span class="error">State is required</span>');
            return false;
        }
        // return true;
        if (principalAc == '') {
            $("#principalAc").focus();
            $('#principalAc').after('<span class="error">Principal account is required</span>');
            return false;
        }
        if (area == '') {
            $("#area").focus();
            $('#area').after('<span class="error">Area of operation is required</span>');
            return false;
        }
        if (fraudBAc == '') {
            $("#fraudBAc").focus();
            $('#fraudBAc').after('<span class="error">Fraud bank account is required</span>');
            return false;
        }
        if (natureOfFraud == '') {
            $("#natureOfFraud").focus();
            $('#natureOfFraud').after('<span class="error">Nature of fraud is required</span>');
            return false;
        }
        if (compUse == '') {
            $("#compUse").focus();
            $('#compUse').after('<span class="error">Computer used in fraud is required</span>');
            return false;
        }
        if (description == '') {
            $("#description").focus();
            $('#description').after('<span class="error">Discription is required</span>');
            return false;
        }
        if (totalAmt == '') {
            $("#totalAmt").focus();
            $('#totalAmt').after('<span class="error">Total ammount is required</span>');
            return false;
        }
        if (dateOfOccu == '') {
            $("#dateOfOccu").focus();
            $('#dateOfOccu').after('<span class="error">Date of occurance is required</span>');
            return false;
        }
        if (dateOfDetect == '') {
            $("#dateOfDetect").focus();
            $('#dateOfDetect').after('<span class="error">Date of detect is required</span>');
            return false;
        }
        if (reasonDelay == '') {
            $("#reasonDelay").focus();
            $('#reasonDelay-error').after('<span class="error">Reason delay is required</span>');
            return false;
        }
        if (dateOfRptRbi == '') {
            $("#dateOfRptRbi").focus();
            $('#dateOfRptRbi-error').after('<span class="error">Date of report to rbi is required</span>');
            return false;
        }
        if (reasonDelayRbi == '') {
            $("#reasonDelayRbi").focus();
            $('#reasonDelayRbi-error').after('<span class="error">Reason delay to report rbi is required</span>');
            return false;
        }
        if (brifHistory == '') {
            $("#brifHistory").focus();
            $('#brifHistory-error').after('<span class="error">Brief history is required</span>');
            return false;
        }
        if (modusOperandi == '') {
            $("#modusOperandi").focus();
            $('#modusOperandi-error').after('<span class="error">Modus operandi is required</span>');
            return false;
        }
        if (staff == '') {
            $("#staff").focus();
            $('#staff').after('<span class="error">Staff is required</span>');
            return false;
        }
        if (Customer == '') {
            $("#Customer").focus();
            $('#Customer').after('<span class="error">Customer is required</span>');
            return false;
        }
        if (outsider == '') {
            $("#outsider").focus();
            $('#outsider').after('<span class="error">Outsider is required</span>');
            return false;
        }
        if (officeDetect == '') {
            $('#officeDetect').after('<span class="error">Office defect is required</span>');
            return false;
        }
        if (needToImpro == '') {
            $('#needToImpro').after('<span class="error">Need to improve is required</span>');
            return false;
        }
        if (intInsAudit == '') {
            $('#intInsAudit-error').after('<span class="error">Internal inspection audit is required</span>').show();
            return false;
        }
        if (yFraud == '') {
            $('#yFraud-error').after('<span class="error">Why fraud is required</span>').show();
            return false;
        }
        if (actionTaken == '') {
            $('#actionTaken-error').after('<span class="error">Action taken is required</span>').show();
            return false;
        }
        if (policeComp == '') {
            $('#policeComp-error').after('<span class="error">Police complaint is required</span>').show();
            return false;
        }
        if (policeStationName == '') {
            $('#policeStationName-error').after('<span class="error">Police station name is required</span>').show();
            return false;
        }
        if (dateOfRef == '') {
            $('#dateOfRef-error').after('<span class="error">Date of reference is required</span>').show();
            return false;
        }
        if (presentPos == '') {
            $('#presentPos-error').after('<span class="error">Present position is required</span>').show();
            return false;
        }
        if (dateChargeSheet == '') {
            $('#dateChargeSheet-error').after('<span class="error">Date of charge sheet is required</span>').show();
            return false;
        }
        if (domesticEnq == '') {
            $('#domesticEnq-error').after('<span class="error">Domestic enquiry is required</span>').show();
            return false;
        }
        if (dateComptEnq == '') {
            $('#dateComptEnq-error').after('<span class="error">Date of complete enquiry is required</span>').show();
            return false;
        }
        if (dateOfIssueFO == '') {
            $('#dateOfIssueFO').after('<span class="error">Date of issue final order is required</span>');
            return false;
        }
        if (punishAward == '') {
            $('#punishAward').after('<span class="error">Punish award is required</span>');
            return false;
        }
        if (detailsPCA == '') {
            $('#detailsPCA').after('<span class="error">Details is required</span>');
            return false;
        }
        if (resonOfDetails == '') {
            $('#resonOfDetails').after('<span class="error">Reason is required</span>');
            return false;
        }
        if (steps == '') {
            $('#steps').after('<span class="error">Steps are required</span>');
            return false;
        }
        if (amtRecover == '') {
            $('#amtRecover').after('<span class="error">Ammount recover is required</span>');
            return false;
        }
        if (frmInsurance == '') {
            $('#frmInsurance').after('<span class="error">From insurance is required</span>');
            return false;
        }
        if (otherSrc == '') {
            $('#otherSrc').after('<span class="error">Other source is required</span>');
            return false;
        }
        if (extentLoss == '') {
            $('#extentLoss').after('<span class="error">Extent loss is required</span>');
            return false;
        }
        if (provisionheld == '') {
            $('#provisionheld').after('<span class="error">Provision held is required</span>');
            return false;
        }
        if (amtWrittenOff == '') {
            $('#amtWrittenOff').after('<span class="error">Ammount written off is required</span>');
            return false;
        }
        if (suggestions == '') {
            $('#suggestions').after('<span class="error">suggestions are is required</span>');
            return false;
        }
        if (srNumBorr == '') {
            $('#srNumBorr').after('<span class="error">Serial num is required</span>');
            return false;
        }
        if (typeOfParty == '') {
            $('#typeOfParty').after('<span class="error">Type of property is required</span>');
            return false;
        }
        if (nameOfParty == '') {
            $('#nameOfParty').after('<span class="error">Name of party is required</span>');
            return false;
        }
        if (partyAddress == '') {
            $('#partyAddress').after('<span class="error">Party address is required</span>');
            return false;
        }
        // if (partySrNum == '') {
        //     $('#partySrNum').after('<span class="error">Serial number is required</span>');
        //     return false;
        // }
        if (borroPartyNam == '') {
            $('#borroPartyNam').after('<span class="error">Borrower party name is required</span>');
            return false;
        }
        if (borrSrNum == '') {
            $('#borrSrNum').after('<span class="error">Borrower serial number is required</span>');
            return false;
        }
        if (natureOfAc == '') {
            $('#natureOfAc').after('<span class="error">Nature of account is required</span>');
            return false;
        }
        if (FraudNumber == '') {
            $('#FraudNumber').after('<span class="error">Fraud Number is required</span>');
            return false;
        }
        if (FraudNumber == '') {
            $('#FraudNumber').after('<span class="error">Fraud Number is required</span>');
            return false;
        }
        if (FraudNumber == '') {
            $('#FraudNumber').after('<span class="error">Fraud Number is required</span>');
            return false;
        }
        if (FraudNumber == '') {
            $('#FraudNumber').after('<span class="error">Fraud Number is required</span>');
            return false;
        }
        if (FraudNumber == '') {
            $('#FraudNumber').after('<span class="error">Fraud Number is required</span>');
            return false;
        }
        if (partySrNum == '') {
            $('#partySrNum').after('<span class="error">Party sr number is required</span>');
            return false;
        }
        if (nameOfDirector == '') {
            $('#nameOfDirector').after('<span class="error">Name of director is required</span>');
            return false;
        }
        if (address == '') {
            $('#address').after('<span class="error">Address is required</span>');
            return false;
        }
        if (borroPartyNam == '') {
            $('#borroPartyNam').after('<span class="error">Borrower party name is required</span>');
            return false;
        }
        if (srNumAssCon == '') {
            $('#srNumAssCon').after('<span class="error">Serial Number is required</span>');
            return false;
        }
        if (nameOfAssoCorn == '') {
            $('#nameOfAssoCorn').after('<span class="error">Name of associate concern is required</span>');
            return false;
        }
        if (address == '') {
            $('#address').after('<span class="error">Address is required</span>');
            return false;
        }

        if (account_name_dir === '' && nameOfDirector === '' && dir_address === '') {
            if (account_name_asso === '' && nameOfAssoCornDir === '' && addressDir === '') {
                $('#account_name_dir').after('<span class="error">Either Director or Associate details are required</span>');
                return false;
            }
        } else {
            return true;
        }
        return true;
    }
    // Form submission handler
    $('form').submit(function() {
        // Remove any existing error messages
        $('.errorc').remove();

        // Validate the form
        var isDirectorFilled = ($('#account_name_dir').val() !== '' || $('#nameOfDirector').val() !== '' || $('#dir_address').val() !== '');
        var isAssociateFilled = ($('#account_name_asso').val() !== '' || $('#nameOfAssoCornDir').val() !== '' || $('#addressDir').val() !== '');

        // Display error message if both sets of fields are empty
        if (!isDirectorFilled && !isAssociateFilled) {
            $('#account_name_dir').after('<span class="errorc" style="color: red;">Either Director or Associate details are required</span>');
            return false; // Prevent form submission
        }

        // Allow form submission if validation passes
        return true;
    });

    function getLanDetails() {
        let lan = $("#lan").val();
        if (lan != '') {
            $.ajax({
                url: "<?php echo e(url('admin/fmr/lan-details')); ?>",
                type: "GET",
                data: {
                    'lan': lan,
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result.data.lan);
                    console.log(result.data);
                    if (result.success == 1) {
                        $("#nameOfBranch").val(result.data.branch_name).attr('readonly', false);
                        $("#district").val(result.data.district).attr('readonly', false);
                        $("#state").val(result.data.state).attr('readonly', false);
                        $("#principalAc").val(result.data.customer_name).attr('readonly', false);
                        $("#borrSrNum").val(result.data.lan).attr('readonly', false);
                        $("#nameOfParty").val(result.data.customer_name).attr('readonly', false);
                        $("#partyAddress").val(result.data.customer_address).attr('readonly', false);
                        $("#borroPartyNam").val(result.data.customer_name).attr('readonly', false);
                        $("#natureOfAc").val(result.data.product).attr('readonly', false);
                        $("#borroDateSanction").val(result.data.disbursement_date).attr('readonly', false);
                        $("#sanctionedLimit").val(result.data.sanctioned_amount).attr('readonly', false);
                        $("#disbursedAmount").val(result.data.disb_amount).attr('readonly', false);
                        $("#balanceOutstanding").val(result.data.principal_outstanding).attr('readonly', false);

                        $("#totalAmt").val(result.data.disb_amount).attr('readonly', false);
                        $("#dateOfOccu").val(result.data.disbursement_date).attr('readonly', false);
                        $("#area").val(result.data.product).attr('readonly', false);
                        $("#principalOutstanding").val(result.data.principal_outstanding).attr('readonly', false);

                        var disbAmount = result.data.disb_amount;
                        var principalOutstanding = result.data.principal_outstanding;
                        $("#amtRecover").val(disbAmount - principalOutstanding).attr('readonly', false);
                    } else {
                        $("#nameOfBranch").val('').attr('readonly', false);
                        $("#district").val('').attr('readonly', false);
                        $("#state").val('').attr('readonly', false);
                        $("#principalAc").val('').attr('readonly', false);
                        $("#borrSrNum").val(lan).attr('readonly', true);
                        $("#nameOfParty").val('').attr('readonly', false);
                        $("#partyAddress").val('').attr('readonly', false);
                        $("#borroPartyNam").val('').attr('readonly', false);
                        $("#natureOfAc").val('').attr('readonly', false);
                        $("#borroDateSanction").val('').attr('readonly', false);
                        $("#sanctionedLimit").val('').attr('readonly', false);
                        $("#disbursedAmount").val('').attr('readonly', false);
                        $("#balanceOutstanding").val('').attr('readonly', false);

                        $("#totalAmt").val('').attr('readonly', false);
                        $("#dateOfOccu").val('').attr('readonly', false);
                        $("#area").val('').attr('readonly', false);
                        $("#principalOutstanding").val('').attr('readonly', false);
                        alert("No details found related to LAN - " + lan);
                    }
                    /* $('#projectName').val(result.project)
                    $('#projectName').attr('readonly', true); */
                }

            });
        } else {
            alert("Please enter loan account number first.")
        }
    }

$(document).ready(function() {
    $('#principalOutstandingDate').change(function() {
        var selectedDate = $(this).val();
        var lan = $("#lan").val();
        if (!lan) {
            alert("Please enter a value for LAN.");
            $('#principalOutstandingDate').val('');
            return;
        }
        
        console.log(selectedDate,lan);
        $.ajax({
            url: "<?php echo e(url('admin/fmr/principal-outstanding-sum/')); ?>",
            type: 'GET',
            data: {
                date: selectedDate,
                lan: lan,
            },
            success: function(response) {
                $('#principalOutstanding').val(response.principal_outstanding); // Update the principal outstanding input
                $('#provisionheld').val(response.principal_outstanding);
                $('#balanceOutstanding').val(response.principal_outstanding);
                // console.log(response[0].FIN_REFERENCE);
                console.log(response);
            },
            // error: function(xhr) {
            //     console.log(xhr.responseText); // Handle errors
            // }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/admin/fmr/edit.blade.php ENDPATH**/ ?>