
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <h5>Case Management</h5>
    </div>

    <div class="card-body">

        <form autocomplete="off" id="createForm" method="POST" action="<?php echo e(route('admin.frm.update',$frmDetails->id)); ?>" enctype="multipart/form-data" onsubmit="">
            <!-- s_return validateForm()  return validateForm() -->            
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <!-- Details of branch -->
            <h5> Case Management Deatils </h5>
            <hr>
            <div class="row">
                <div class="form-group col-sm-3">
                    <label class="required" for="CaseLogInDate">Case log in Date</label>
                    <input class="form-control " name="CaseLogInDate" id="CaseLogInDate" placeholder="" value="<?php echo e($frmDetails->log_in_date); ?>" type="date">
                    <?php if($errors->has('nameOfBranch')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('nameOfBranch')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="CaseLogInDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="CaseRefToFrm">When was case referred to FRM</label>
                    <input class="form-control  <?php echo e($errors->has('CaseRefToFrm') ? 'is-invalid' : ''); ?>" name="CaseRefToFrm" id="CaseRefToFrm" placeholder="" value="<?php echo e($frmDetails->case_referred_to_frm); ?>" type="date">
                    <?php if($errors->has('CaseRefToFrm')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('CaseRefToFrm')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="CaseRefToFrm-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="CaseRefBy">Case ref by </label>
                    <input class="form-control  <?php echo e($errors->has('CaseRefBy') ? 'is-invalid' : ''); ?>" name="CaseRefBy" id="CaseRefBy" placeholder="Case Ref By" value="<?php echo e($frmDetails->case_ref_by); ?>">
                    <?php if($errors->has('CaseRefBy')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('CaseRefBy')); ?>

                    </div>
                    <?php endif; ?>.
                    <span class="error" id="CaseRefBy-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="CaseRefByFCU">Case referred by FCU</label>
                    <select class="form-control <?php echo e($errors->has('CaseRefByFCU') ? 'is-invalid' : ''); ?>" name="CaseRefByFCU" id="CaseRefByFCU">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($frmDetails->case_ref_by_fcu == 'Y' ? 'selected': ''); ?>>Yes</option>
                        <option value="N" <?php echo e($frmDetails->case_ref_by_fcu == 'N' ? 'selected': ''); ?>>No</option>
                    </select>
                    <?php if($errors->has('CaseRefByFCU')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('CaseRefByFCU')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="CaseRefByFCU-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="IfYesReason">If yes, Case ref to FCU </label>
                    <input class="form-control  <?php echo e($errors->has('IfYesReason') ? 'is-invalid' : ''); ?>" name="IfYesReason" id="IfYesReason" placeholder="" value="<?php echo e($frmDetails->case_ref_to_fcu); ?>" type="date">
                    <?php if($errors->has('IfYesReason')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('IfYesReason')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="IfYesReason-error"></span>
                </div>

                <div class="form-group col-sm-3">
                    <label class="required" for="FCUInvestigationRpt">If yes, FCU investigation report date </label>
                    <input class="form-control  <?php echo e($errors->has('FCUInvestigationRpt') ? 'is-invalid' : ''); ?>" name="FCUInvestigationRpt" id="FCUInvestigationRpt" placeholder="FCUInvestigationRpt" value="<?php echo e($frmDetails->fcu_investigation_report_date); ?>" type="date">
                    <?php if($errors->has('FCUInvestigationRpt')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('FCUInvestigationRpt')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="FCUInvestigationRpt-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="FCUPersonnelName">If yes, sent by FCU personnel name </label>
                    <input class="form-control  <?php echo e($errors->has('FCUPersonnelName') ? 'is-invalid' : ''); ?>" name="FCUPersonnelName" id="FCUPersonnelName" placeholder="FCU Personnel Name" value="<?php echo e($frmDetails->sent_by_fcu); ?>">
                    <?php if($errors->has('FCUPersonnelName')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('FCUPersonnelName')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="FCUPersonnelName-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="CaseReferredBy">Case referred by </label>
                    <select class="form-control <?php echo e($errors->has('CaseReferredBy') ? 'is-invalid' : ''); ?>" name="CaseReferredBy" id="CaseReferredBy">
                        <option value="">Select</option>
                        <option value="Internal" <?php echo e($frmDetails->case_referred_by == 'Internal' ? 'selected':''); ?>>Internal</option>
                        <option value="Customer complaint" <?php echo e($frmDetails->case_referred_by == 'Customer complaint' ? 'selected':''); ?>>Customer complaint</option>
                        <option value="Market intelligence"<?php echo e($frmDetails->case_ref_to_fcu == 'Market intelligence' ? 'selected':''); ?>>Market intelligence</option>
                    </select>
                    <?php if($errors->has('CaseReferredBy')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('CaseReferredBy')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="CaseReferredBy-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="LoanID">Loan ID </label>
                    <input class="form-control  <?php echo e($errors->has('LoanID') ? 'is-invalid' : ''); ?>" name="LoanID" id="LoanID" placeholder="Loan ID" value="<?php echo e($frmDetails->loan_id); ?>">
                    <?php if($errors->has('LoanID')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('LoanID')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="LoanID-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="DisbursedLoanAmount">Disbursed Loan amount </label>
                    <input class="form-control  <?php echo e($errors->has('DisbursedLoanAmount') ? 'is-invalid' : ''); ?>" name="DisbursedLoanAmount" id="DisbursedLoanAmount" placeholder="Disbursed Loan Amount" value="<?php echo e($frmDetails->disbursed_loan_amount); ?>">
                    <?php if($errors->has('DisbursedLoanAmount')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('DisbursedLoanAmount')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="DisbursedLoanAmount-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="DisbursementDate">Disbursement date </label>
                    <input class="form-control  <?php echo e($errors->has('DisbursementDate') ? 'is-invalid' : ''); ?>" name="DisbursementDate" id="DisbursementDate" placeholder="Disbursement Date" value="<?php echo e($frmDetails->disbursement_date); ?>" type="date">
                    <?php if($errors->has('DisbursementDate')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('DisbursementDate')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="DisbursementDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="Product">Product</label>
                    <input class="form-control  <?php echo e($errors->has('Product') ? 'is-invalid' : ''); ?>" name="Product" id="Product" placeholder="Product" value="<?php echo e($frmDetails->product); ?>">
                    <?php if($errors->has('Product')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('Product')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="Product-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="BorrowalName">Borrowal Name</label>
                    <input class="form-control  <?php echo e($errors->has('BorrowalName') ? 'is-invalid' : ''); ?>" name="BorrowalName" id="BorrowalName" placeholder="Borrowal Name" value="<?php echo e($frmDetails->borrower_name); ?>">
                    <?php if($errors->has('BorrowalName')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('BorrowalName')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="BorrowalName-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="PennantBranch">Pennant branch</label>
                    <input class="form-control  <?php echo e($errors->has('PennantBranch') ? 'is-invalid' : ''); ?>" name="PennantBranch" id="PennantBranch" placeholder="Pennant Branch" value="<?php echo e($frmDetails->pennant_branch); ?>">
                    <?php if($errors->has('PennantBranch')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('PennantBranch')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="PennantBranch-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="CaseRefByFCU">Region</label>
                    <select class="form-control <?php echo e($errors->has('Region') ? 'is-invalid' : ''); ?>" name="Region" id="Region">
                        <option value="">Select</option>
                        <option value="East"<?php echo e($frmDetails->region == 'East' ? 'selected':''); ?>>East</option>
                        <option value="West" <?php echo e($frmDetails->region == 'West' ? 'selected':''); ?>>West</option>
                        <option value="South" <?php echo e($frmDetails->region == 'South' ? 'selected':''); ?>>South</option>
                        <option value="North" <?php echo e($frmDetails->region == 'North' ? 'selected':''); ?>>North</option>
                    </select>
                    <?php if($errors->has('Region')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('Region')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="Region-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="BriefModusOperandi">Brief Modus Operandi </label>
                    <input class="form-control  <?php echo e($errors->has('BriefModusOperandi') ? 'is-invalid' : ''); ?>" name="BriefModusOperandi" id="BriefModusOperandi" placeholder="Brief Modus Operandi" value="<?php echo e($frmDetails->brief_modus_operandi); ?>">
                    <?php if($errors->has('BriefModusOperandi')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('BriefModusOperandi')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="BriefModusOperandi-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="OneLineModusOperandi">One Line Modus Operandi </label>
                    <input class="form-control  <?php echo e($errors->has('BriefModusOperandi') ? 'is-invalid' : ''); ?>" name="OneLineModusOperandi" id="OneLineModusOperandi" placeholder="One Line Modus Operandi" value="<?php echo e($frmDetails->one_line_modus_operandi); ?>">
                    <?php if($errors->has('BriefModusOperandi')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('BriefModusOperandi')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="BriefModusOperandi-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="CaseTaggedToFRMC">After Checker OK, the case will be tagged as to be presented to FRMC </label>
                    <select class="form-control <?php echo e($errors->has('CaseTaggedToFRMC') ? 'is-invalid' : ''); ?>" name="CaseTaggedToFRMC" id="CaseTaggedToFRMC">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($frmDetails->case_tagged_for_frmc = 'Y' ? 'selected':''); ?>>Yes</option>
                        <option value="N" <?php echo e($frmDetails->case_tagged_for_frmc = 'N' ? 'selected':''); ?>>No</option>
                    </select>
                    <?php if($errors->has('CaseTaggedToFRMC')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('CaseTaggedToFRMC')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="CaseTaggedToFRMC-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="CaseClosedAboveByChecker">Case closed above by checker </label>
                    <input class="form-control  <?php echo e($errors->has('CaseClosedAboveByChecker') ? 'is-invalid' : ''); ?>" name="CaseClosedAboveByChecker" id="CaseClosedAboveByChecker" placeholder="Case Closed Above By Checker" value="<?php echo e($frmDetails->case_closed_by_checker); ?>">
                    <?php if($errors->has('CaseClosedAboveByChecker')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('CaseClosedAboveByChecker')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="CaseClosedAboveByChecker-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="PresentingToFRMC">Below would be after presenting to FRMC </label>
                    <input class="form-control  <?php echo e($errors->has('PresentingToFRMC') ? 'is-invalid' : ''); ?>" name="PresentingToFRMC" id="PresentingToFRMC" placeholder="Case Closed Above By Checker" value="<?php echo e($frmDetails->after_presenting_frmc); ?>">
                    <?php if($errors->has('PresentingToFRMC')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('PresentingToFRMC')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="PresentingToFRMC-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="fillFRMCDate">After presenting to FRMC, fill FRMC date </label>
                    <input class="form-control  <?php echo e($errors->has('fillFRMCDate') ? 'is-invalid' : ''); ?>" name="fillFRMCDate" id="fillFRMCDate" placeholder="Case Closed Above By Checker" value="<?php echo e($frmDetails->frmc_date); ?>" type="date">
                    <?php if($errors->has('fillFRMCDate')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('fillFRMCDate')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="fillFRMCDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="FraudByFRMC">Fraud by FRMC </label>
                    <select class="form-control <?php echo e($errors->has('FraudByFRMC') ? 'is-invalid' : ''); ?>" name="FraudByFRMC" id="FraudByFRMC">
                        <option value="">Select</option>
                        <option value="Y"<?php echo e($frmDetails->fraud_by_frmc == 'Y' ? 'selected':''); ?>>Yes</option>
                        <option value="N" <?php echo e($frmDetails->fraud_by_frmc == 'N' ? 'selected':''); ?>>No</option>
                        <option value="R" <?php echo e($frmDetails->fraud_by_frmc == 'R' ? 'selected':''); ?>>Rework</option>
                    </select>
                    <?php if($errors->has('FraudByFRMC')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('FraudByFRMC')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="FraudByFRMC-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="FRMCActionable">FRMC actionable </label>
                    <input class="form-control  <?php echo e($errors->has('FRMCActionable') ? 'is-invalid' : ''); ?>" name="FRMCActionable" id="FRMCActionable" placeholder="FRMC Actionable" value="<?php echo e($frmDetails->frmc_action); ?>" >
                    <?php if($errors->has('fillFRMCDate')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('fillFRMCDate')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="fillFRMCDate-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="FRMCActionableStatus">FRMC actionable status </label>
                    <select class="form-control <?php echo e($errors->has('FRMCActionableStatus') ? 'is-invalid' : ''); ?>" name="FRMCActionableStatus" id="FRMCActionableStatus">
                        <option value="">Select</option>
                        <option value="WIP" <?php echo e($frmDetails->status == 'WIP' ? 'selected':''); ?>>WIP</option>
                        <option value="Closed"<?php echo e($frmDetails->fraud_by_frmc == 'Closed' ? 'selected':''); ?>>Closed</option>
                    </select>
                    <?php if($errors->has('FRMCActionableStatus')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('FRMCActionableStatus')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="FRMCActionableStatus-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="FRMCActionableStaDescri">FRMC actionable status description </label>
                    <input class="form-control  <?php echo e($errors->has('FRMCActionableStaDescri') ? 'is-invalid' : ''); ?>" name="FRMCActionableStaDescri" id="FRMCActionableStaDescri" placeholder="FRMC actionable status description" value="<?php echo e($frmDetails->frmc_status_description); ?>" >
                    <?php if($errors->has('FRMCActionableStaDescri')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('FRMCActionableStaDescri')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="FRMCActionableStaDescri-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="FRMCActionableDetails">FRMC actionable status becomes closed after status is shown as closed by maker and approved by checker  </label>
                    <input class="form-control  <?php echo e($errors->has('FRMCActionableDetails') ? 'is-invalid' : ''); ?>" name="FRMCActionableDetails" id="FRMCActionableDetails" placeholder="FRMC actionable status description" value="<?php echo e($frmDetails->frmc_actionable_closed_status); ?>" >
                    <?php if($errors->has('FRMCActionableDetails')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('FRMCActionableDetails')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="FRMCActionableDetails-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="IfFraudByFRMC">If Fraud by FRMC  </label>
                    <input class="form-control  <?php echo e($errors->has('IfFraudByFRMC') ? 'is-invalid' : ''); ?>" name="IfFraudByFRMC" id="IfFraudByFRMC" placeholder="If fraud by frmc" value="<?php echo e($frmDetails->if_fraud_by_frmc); ?>" >
                    <!-- <select class="form-control <?php echo e($errors->has('FraudByFRMC') ? 'is-invalid' : ''); ?>" name="FraudByFRMC" id="FraudByFRMC">
                        <option value="">Select</option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select> -->
                    <?php if($errors->has('FraudByFRMC')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('FraudByFRMC')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="FraudByFRMC-error"></span>
                </div>
            
                <div class="form-group col-sm-3">
                    <label class="required" for="DateForPrincipalOutstanding">Select date for Principal Outstanding  </label>
                    <input class="form-control  <?php echo e($errors->has('DateForPrincipalOutstanding') ? 'is-invalid' : ''); ?>" name="DateForPrincipalOutstanding" id="DateForPrincipalOutstanding" placeholder="Select date for Principal Outstanding" value="<?php echo e($frmDetails->principal_outstanding_date); ?>" type="date">
                    <?php if($errors->has('DateForPrincipalOutstanding')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('DateForPrincipalOutstanding')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="DateForPrincipalOutstanding-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="ToFillFMR1">To fill FMR 1 from FMR automation system</label>
                    <input class="form-control  <?php echo e($errors->has('ToFillFMR1') ? 'is-invalid' : ''); ?>" name="ToFillFMR1" id="ToFillFMR1" placeholder="To fill FMR 1 from FMR automation system" value="" type="date">
                    <?php if($errors->has('ToFillFMR1')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('ToFillFMR1')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="ToFillFMR1-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="DateOfClosure">Estimated date of closure (not part of FMR 1)</label>
                    <input class="form-control  <?php echo e($errors->has('DateOfClosure') ? 'is-invalid' : ''); ?>" name="DateOfClosure" id="DateOfClosure" placeholder="Estimated date of closure (not part of FMR 1)" value="<?php echo e($frmDetails->estimated_date_of_closure); ?>" >
                    <?php if($errors->has('DateOfClosure')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('DateOfClosure')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="DateOfClosure-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="DateOfPoliceComplaint">Date of police complaint can be filled anytime </label>
                    <input class="form-control  <?php echo e($errors->has('DateOfPoliceComplaint') ? 'is-invalid' : ''); ?>" name="DateOfPoliceComplaint" id="DateOfPoliceComplaint" placeholder="" value="<?php echo e($frmDetails->date_of_police_complaint); ?>" type="date">
                    <?php if($errors->has('DateOfPoliceComplaint')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('DateOfPoliceComplaint')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="DateOfPoliceComplaint-error"></span>
                </div>
                <div class="form-group col-sm-3">
                    <label class="required" for="DetailsOfPoliceComplaint">Whether details of police complaint reported in FMR 1,2,3 </label>
                    <select class="form-control <?php echo e($errors->has('DetailsOfPoliceComplaint') ? 'is-invalid' : ''); ?>" name="DetailsOfPoliceComplaint" id="DetailsOfPoliceComplaint">
                        <option value="">Select</option>
                        <option value="Y" <?php echo e($frmDetails->details_of_police_complaints == 'Y' ? 'selected':''); ?>>Yes</option>
                        <option value="N" <?php echo e($frmDetails->details_of_police_complaints == 'N' ? 'selected':''); ?>>No</option>
                    </select>
                    <?php if($errors->has('DetailsOfPoliceComplaint')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('DetailsOfPoliceComplaint')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="error" id="DetailsOfPoliceComplaint-error"></span>
                </div>




            </div>

          
            <div class="form-group text-center" style="margin:auto;padding-top:20px">
                <button class="btn btn-primary" type="submit">
                    SUBMIT
                </button>
                <a class="btn btn-dark" href="<?php echo e(route('admin.frm.index')); ?>">
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




        return true;
    }

    $(document).ready(function() {
        $('#LoanID').on('change', function() {
            var loanID = $(this).val();

            $.ajax({
                url: `/admin/loans/${loanID}`,
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#DisbursedLoanAmount').val(data.disburse_amount);
                        $('#Product').val(data.product);
                        $('#BorrowalName').val(data.borro_name);
                        $('#DisbursementDate').val(data.disb_date);
                        $('#PennantBranch').val(data.branch);
                    } else {
                        alert('Loan ID not found.');
                        $('#DisbursedLoanAmount').val('');
                        $('#Product').val('');
                        $('#BorrowalName').val('');
                        $('#DisbursementDate').val('');
                        $('#PennantBranch').val('');
                    }
                }, 
               
                // error: function(xhr) {
                //     alert('An error occurred while fetching loan details.');
                //     $('#disburse_amount').val('');
                //     $('#principal_outstanding').val('');
                // }
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/admin/frm/edit.blade.php ENDPATH**/ ?>