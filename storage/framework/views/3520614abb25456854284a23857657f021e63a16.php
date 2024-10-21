<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
     <style type="text/css">
          body {
               font-family: "sans-serif";
               font-size: 12.5px;
               box-sizing: border-box;
               margin: 0px 15px 0px 15px;
          }

          @page  {
               margin: 40px 0 80px;
               padding: 0 24px;

               @top-right {
                    content: element(logo)
               }
          }

          .logo {
               /*  display: block; */
               position: running(logo);
               text-align: right;
               width: 100%;
               padding-top: 10px;
          }

          .footer {
               width: 100%;
               text-align: left;
               /*   padding: 12px 30px; */
               /* display: block; */
               position: running(footer);
               margin: 0;
               height: 10px;
          }

          .footer2 {
               width: 100%;
               text-align: right;
               padding: 12px 30px 20px;
               /*  display: block; */
               position: running(footer2);
               margin: 0;
               height: 10px;
          }

          table {
               width: 100%;
               outline: none;
               box-shadow: none;
          }

          table.border-table {
               border-collapse: collapse;
               border: 1px solid black;
          }

          table td {
               padding: 4px 8px;
          }

          table tr {
               border: 1px solid black;
               border-collapse: collapse;
          }

          table.border-table {
               margin-left: 0;
          }

          table.border-table th,
          table.border-table td {
               border: 1px solid black;
               border-collapse: collapse;
          }

          .uppercase {
               text-transform: uppercase;
          }

          h2 {
               margin: 5px 0;
          }

          .footer h4 {
               text-align: center;
               color: #131640;
               border-bottom: 2px solid #ea652b;
               font-size: 16px;
               /* display: inline-block; */
               padding: 0 30px 5px;
               margin-bottom: 5px;
          }

          p,
          table td {
               line-height: 18px;
          }

          table.border-table td {
               line-height: normal;
          }

          .list {
               padding: 0 30px;
          }

          .list li {
               margin-bottom: 10px;
          }

          a,
          a:hover {
               color: #0000ff;
               text-decoarion: underline;
          }

          .page {
               width: 100%;
               /* display:inline-block; */
               margin-top: -10px;
               font-size: 13px;
          }

          .page:before {
               content: counter(page);
               color: #000;
               text-align: right;
               width: 100%;
               margin-top: -20px;
               margin-right: -20px;
               /* display:inline-block; */
          }

          .page-break {
               padding: 0;
               margin: 0;
               width: 100%;
               page-break-after: always;
          }
     </style>
</head>

<body>

     <div class="logo">
          <b style="font-size:13px;">Annexure 2</b>
     </div>
     <table>
          <tr>
               <td style="text-align:center;" width="100%;text-decoration:underline">
                    <h1 style="font-size:16px;display:block;line-height:22px;"><b style="border-bottom:1px solid #000;margin-bottom:10px;">FMR-1</b><br />
                         <b style="border-bottom:1px solid #000;">Report on actual or suspected Frauds in HFCs</b>
                    </h1>
                    <p style="font-size:14px;border-bottom:1px solid #000;padding-top:0px;display:inline-block;margin:0 auto;">(Vide chapter IV)</p>
               </td>
          </tr>
     </table>

     <table class="border-table" style="max-width: 100%;">
          <thead>
               <tr>
                    <th align="left" colspan="3"><span style="padding-left:10px;">Part A: Fraud Report</span> </th>
               </tr>
          </thead>
          <tr>
               <td align="center" width="12%">1.</td>
               <td align="left" width="40%">Name of the HFC</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->fmrEntities->name); ?> (<?php echo e($fmrDetails->fmrEntities->short_code); ?>)</td>
          </tr>
          <tr>
               <td align="center" width="12%">2.</td>
               <td align="left" width="40%">Fraud Number</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->fraud_number); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">3.</td>
               <td align="left" colspan="2" width="40%">Details of branch</td>

          </tr>
          <tr>
               <td align="center" width="12%">3.a.</td>
               <td align="left" width="40%">Name of branch</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->branch_name); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">3.b.</td>
               <td align="left" width="40%">Branch type</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->branch_type); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">3.c.</td>
               <td align="left" width="40%">Place</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->branch_place); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">3.d.</td>
               <td align="left" width="40%">District</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->branch_district); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">3.e.</td>
               <td align="left" width="40%">State</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->branch_state); ?></td>
          </tr>
          <tr>

               <td align="center" width="12%">4.</td>
               <td align="left" width="40%">Name of the principal party/account</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->account_name); ?> <?php echo e(($borrowerDetails->count() > 1) ? ' and '.($borrowerDetails->count() - 1). trans_choice('global.other',$borrowerDetails->count()-1) : ''); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">5.a.</td>
               <td align="left" width="40%">Area of operation where the fraud has occurred?</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->fraud_area); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">5.b.</td>
               <td align="left" width="40%">Whether fraud has occurred in borrower account?</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->fraud_borrower_account === 'Y' ? 'Yes' : 'No'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">6.a.</td>
               <td align="left" width="40%">Nature of Fraud</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->fraud_nature); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">6.b.</td>
               <td align="left" width="40%">Whether computer is used in committing the fraud?</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->is_computer_used === 'Y' ? 'Yes' : 'No'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">6.c.</td>
               <td align="left" width="40%">If yes, details thereof</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->computer_description); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">7.</td>
               <td align="left" width="40%">Total amount involved (Rs. in lakh)</td>
               <td align="left" width="48%"> <b>Loan Amount :</b>INR <?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $resultTotalAmt[0]->disburs_amount , 'false')); ?> <br>
                    <b>Principal Outstanding Amount :</b>INR <?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $resultTotalAmt[0]->outstanding_amount , 'false')); ?>

               </td>
               <!-- <td align="left" width="48%"><?php echo e($fmrDetails->fraud_amount); ?></td> -->
          </tr>
          <?php if(!empty($disburDates)): ?>
          <tr>
               <td align="center" width="12%">8.a.</td>
               <td align="left" width="40%">Date of Occurrence</td>
               <td align="left" width="48%"><?php echo e(\App\Helpers\CommonHelper::dateFormate( $disburDates['disbursement_date'][0]) ?? 'NA'); ?> to <?php echo e(\App\Helpers\CommonHelper::dateFormate( $disburDates['disbursement_date'][1]) ?? 'NA'); ?></td>
          </tr>
          <?php else: ?>
          <tr>
               <td align="center" width="12%">8.a.</td>
               <td align="left" width="40%">Date of Occurrence</td>
               <td align="left" width="48%"><?php echo e(\App\Helpers\CommonHelper::dateFormate($fmrDetails->fraud_date) ?? 'NA'); ?></td>
          </tr>
          <?php endif; ?>
          <tr>
               <td align="center" width="12%">8.b.</td>
               <td align="left" width="40%">Date of Detection</td>
               <td align="left" width="48%"><?php echo e(\App\Helpers\CommonHelper::dateFormate($fmrDetails->detection_date) ?? 'NA'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">8.c.</td>
               <td align="left" width="40%">Reason for delay, if any, in detecting the fraud</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->fraud_delay_reason); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">8.d.</td>
               <td align="left" width="40%">Date on which reported to RBI?</td>
               <td align="left" width="48%"><?php echo e(\App\Helpers\CommonHelper::dateFormate($fmrDetails->rbi_date) ?? 'NA'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">8.e.</td>
               <td align="left" width="40%">Reason for delay if any in reporting the fraud to RBI</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->rbi_delay_reason); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">9.a.</td>
               <td align="left" width="40%">Brief history</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->fraud_brief_history); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">9.b.</td>
               <td align="left" width="40%">Modus operandi</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->modus_operandi); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">10.</td>
               <td align="left" colspan="2" width="40%">Fraud committed by</td>

          </tr>
          <tr>
               <td align="center" width="12%">10.a.</td>
               <td align="left" width="40%">Staff</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->fraud_staff === 'Y' ? 'Yes' : 'No'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">10.b.</td>
               <td align="left" width="40%">Customer</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->fraud_customer === 'Y' ? 'Yes' : 'No'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">10.c.</td>
               <td align="left" width="40%">Outsider</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->fraud_outsider === 'Y' ? 'Yes' : 'No'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">11.a.</td>
               <td align="left" width="40%">Whether the controlling office
                    (Regional/Zonal) could detect the fraud by scrutiny of control returns submitted, if any
               </td>
               <td align="left" width="48%"><?php echo e($fmrDetails->regional_office_detect === 'Y' ? 'Yes' : 'No'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">11.b.</td>
               <td align="left" width="40%">Whether there is need to improve the information system?
               </td>
               <td align="left" width="48%"><?php echo e($fmrDetails->system_improvement === 'Y' ? 'Yes' : "No"); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">12.a.</td>
               <td align="left" width="40%">Whether internal inspection/audit (including concurrent audit(es) during the period between the date of first occurrence of fraud and its detections?
               </td>
               <td align="left" width="48%"><?php echo e($fmrDetails->internal_detection); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">12.b.</td>
               <td align="left" width="40%">If yes, why the fraud could not have been detected during such inspection/audit.
               </td>
               <td align="left" width="48%"><?php echo e($fmrDetails->internal_detection_reason); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">12.c.</td>
               <td align="left" width="40%">What action has been taken for non-detection of fraud during such inspection/audit</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->non_detection_action); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.</td>
               <td align="left" colspan="2" width="40%">Action taken/proposed to be taken</td>

          </tr>
          <tr>
               <td align="center" width="12%">13.a.</td>
               <td align="left" colspan="2" width="40%">Complaint with police</td>
          </tr>
          <tr>
               <td align="center" width="12%">13.a.(i).</td>
               <td align="left" width="40%">Whether any complaint has been lodged with the Police?</td>
               <td align="left" width="48%"> <?php echo e($fmrDetails->police_complaint === 'Y' ? 'Yes' : ($fmrDetails->police_complaint === 'N' ? 'No' : ($fmrDetails->police_complaint === 'U' ? 'In Progress' : 'NA'))); ?>

               </td>

          </tr>
          <tr>
               <td align="center" width="12%">13.a.(ii).</td>
               <td align="left" width="40%">If yes, name of the Police Station.</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->police_station); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">&nbsp;</td>
               <td align="left" width="40%">Date of reference</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->complaint_date ?? 'NA'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">&nbsp;</td>
               <td align="left" width="40%">Present position of the case</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->complaint_status); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">&nbsp;</td>
               <td align="left" width="40%">Date of completion of Police investigation</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->investigation_completion_date ?? 'NA'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">&nbsp;</td>
               <td align="left" width="40%">Date of submission of Investigation report by Police</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->investiagation_report_date ?? 'NA'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.a.(iii).</td>
               <td align="left" width="40%">If not reported to Police, reason therefore</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->not_reported_reason); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.b.</td>
               <td align="left" colspan="2" width="40%">Recovery suit with concerned court</td>

          </tr>
          <tr>
               <td align="center" width="12%">13.b.(i).</td>
               <td align="left" width="40%">Date of filling</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->court_filling_date ?? 'NA'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.b.(ii).</td>
               <td align="left" width="40%">Present position</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->court_status); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.c.</td>
               <td align="left" colspan="2" width="40%">Insurance claim</td>

          </tr>
          <tr>
               <td align="center" width="12%">13.c.(i).</td>
               <td align="left" width="40%">Whether any claim has been lodged with the insurance company</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->insurance_claim_lodged); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.c.(ii).</td>
               <td align="left" width="40%">If not, reason therefore</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->insurance_claim_reason); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.d.</td>
               <td align="left" colspan="2" width="40%">Details of staff side action</td>

          </tr>
          <tr>
               <td align="center" width="12%">13.d.(i)</td>
               <td align="left" width="40%">Whether any internal investigation has been/is proposed to be conducted </td>
               <td align="left" width="48%"><?php echo e($fmrDetails->internal_investigation === 'Y' ? 'Yes' : 'No'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.d.(ii).</td>
               <td align="left" width="40%">If yes, date of completion</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->internal_detection_date ?? 'NA'); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.d.(iii).</td>
               <td align="left" width="40%">Whether any departmental inquiry has been/is proposed to be conducted</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->dept_inquiry); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.d.(iv).</td>
               <td align="left" colspan="2" width="40%">If yes, give details as per format given below:</td>

          </tr>
          <tr>
               <td colspan="3">
                    <table class="border-table " style="max-width: 100%;">
                         <thead>
                              <tr>
                                   <th align="left" width="4%">No.</th>
                                   <th align="left" width="10%">Name</th>
                                   <th align="left" width="10%">Desig-nation</th>
                                   <th align="left" width="12%">Whether suspen-ded/Dt. of suspen-sion</th>
                                   <th align="left" width="10%">Date of issue of charge sheet</th>
                                   <th align="left" width="12%">Date of commen-cement of domestic inquiry</th>
                                   <th align="left" width="10%">Date of comple-tion of inquiry</th>
                                   <th align="left" width="10%">Date of issue of final orders</th>
                                   <th align="left" width="10%">Punish-ment awarded</th>
                                   <th align="left" width="12%">Details of prosecution/ conviction/ acquittal, etc.</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php if($fmrDetails->fraud_amount > 500000): ?>
                              <tr>
                                   <td align="left">1</td>
                                   <td align="left"><?php echo e($fmrDetails->dept_inq_emp_name); ?></td>
                                   <td align="left"><?php echo e($fmrDetails->dept_inq_emp_designation); ?></td>
                                   <td align="left"><?php echo e($fmrDetails->dept_suspension === 'Y' ? 'Yes' : 'No'); ?></td>
                                   <td align="left"><?php echo e($fmrDetails->charge_sheet_date ?? 'NA'); ?></td>
                                   <td align="left"><?php echo e($fmrDetails->domestic_inquiry_date ?? 'NA'); ?></td>
                                   <td align="left"><?php echo e(\App\Helpers\CommonHelper::dateFormate($fmrDetails->frmc_date)); ?></td>
                                   <td align="left"><?php echo e($fmrDetails->final_order_date ?? 'NA'); ?></td>
                                   <td align="left"><?php echo e($fmrDetails->punishment); ?></td>
                                   <td align="left"><?php echo e($fmrDetails->conviction_details); ?></td>
                              </tr>
                              <?php else: ?>
                              <tr>
                                   <td align="center" colspan="10">NA</td>

                              </tr>
                              <?php endif; ?>

                         </tbody>
                    </table>
               </td>

          </tr>
          <tr>
               <td align="center" width="12%">13.d.(v).</td>
               <td align="left" width="40%">If not reason therefore</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->dept_enquiry_reason); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">13.e.</td>
               <td align="left" width="40%">Steps taken/proposed to be taken to avoid such incidents</td>
               <td align="left" width="48%"><?php echo e($fmrDetails->setps_to_avoid); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">14.a.</td>
               <td align="left" colspan="2" width="40%">Total amount recovered</td>

          </tr>
          <tr>
               <td align="center" width="12%">14.a.(i).</td>
               <td align="left" width="40%">Amount recovered from party/parties concerned</td>
               <td align="left" width="48%"><?php echo e('INR.'.\App\Helpers\CommonHelper::convertIntoLakhs( $resultTotalRecovAmt[0]->recovery_amount , 'false')); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">14.a.(ii).</td>
               <td align="left" width="40%">From Insurance</td>
               <td align="left" width="48%"><?php echo e($resultTotalRecovAmt[0]->insurance_amount == 0 ?'Nil' : 'INR.'.\App\Helpers\CommonHelper::convertIntoLakhs( $resultTotalRecovAmt[0]->insurance_amount , 'false')); ?></td>

          </tr>
          <tr>
               <td align="center" width="12%">14.a.(iii).</td>
               <td align="left" width="40%">From other sources</td>
               <td align="left" width="48%"><?php echo e($resultTotalRecovAmt[0]->other_amount == 0 ? 'Nil' : 'INR.' . \App\Helpers\CommonHelper::convertIntoLakhs($resultTotalRecovAmt[0]->other_amount, 'false')); ?>

               </td>
          </tr>
          <tr>
               <td align="center" width="12%">14.b.</td>
               <td align="left" width="40%">Extent of loss to HFC
               </td>
               <td align="left" width="48%"><?php echo e($fmrDetails->loss_to_hfc == 0 ? 'Nil' : 'INR.' .\App\Helpers\CommonHelper::convertIntoLakhs( $fmrDetails->loss_to_hfc , 'false')); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">14.c.</td>
               <td align="left" width="40%">Provision held
               </td>
               <td align="left" width="48%"><?php echo e('INR.'.\App\Helpers\CommonHelper::convertIntoLakhs( $resultTotalAmt[0]->outstanding_amount , 'false')); ?></td>
               <!-- <?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $resultTotalAmt[0]->outstanding_amount , 'false')); ?> $fmrDetails->provision_amount -->
          </tr>
          <tr>
               <td align="center" width="12%">14.d.</td>
               <td align="left" width="40%">Amount written off
               </td>
               <td align="left" width="48%"><?php echo e($resultTotalRecovAmt[0]->return_of_amount == 0 ? 'Nil' : 'INR.'.\App\Helpers\CommonHelper::convertIntoLakhs($resultTotalRecovAmt[0]->return_of_amount, 'false')); ?></td>
          </tr>
          <tr>
               <td align="center" width="12%">15.</td>
               <td align="left" width="40%">Suggestions for consideration of RBI
               </td>
               <td align="left" width="48%"><?php echo e($fmrDetails->rbi_suggestions); ?></td>
          </tr>
     </table>

     <table class="border-table " style="max-width: 100%;">
          <thead>
               <tr>
                    <th align="left" colspan="2"><span style="padding-left:10px;">Part B: Additional Information on Frauds in Borrowal Accounts</span> </th>
               </tr>
          </thead>

          <tr>
               <td align="center" width="12%">a.</td>
               <td align="left" width="88%">(This part is required to be completed in respect of frauds in all borrowal accounts involving an amount of Rs. 5 lakh and above)</td>

          </tr>
          <tr>
               <td colspan="2">
                    <table class="border-table " style="max-width: 100%;">
                         <thead>
                              <tr>
                                   <th align="left" width="5%">Sr. No</th>
                                   <th align="left" width="20%">Type of Party</th>
                                   <th align="left" width="30%">Name of the party / account</th>
                                   <th align="left" width="45%">Party address</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php if($fmrDetails->fraud_amount > 500000): ?>
                              <?php $count = 1; ?>
                              <?php $__currentLoopData = $borrowerDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowerDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                   <td align="left"><?php echo e($count++); ?></td>
                                   <td align="left"><?php echo e($borrowerDetail->type_of_party ?? ''); ?></td>
                                   <td align="left"><?php echo e($borrowerDetail->account_name ?? ''); ?></td>
                                   <td align="left"><?php echo e($borrowerDetail->party_address ?? ''); ?></td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php else: ?>
                              <tr>
                                   <td align="center" colspan="4">NA</td>
                              </tr>
                              <?php endif; ?>
                         </tbody>
                    </table>
               </td>

          </tr>
          <!-- <tr>
               <th align="left" colspan="2"><span style="padding-left:10px;">b. Borrowal accounts details:</span> </th>
          </tr> -->
          <tr>
               <td align="center" width="12%">b.</td>
               <td align="left" width="88%">Borrowal accounts details:</td>
          </tr>
          <!-- <tr>
               <td align="center" colspan="2">&nbsp;</td>

          </tr> -->
          <tr>
               <td colspan="2" style="padding-top:20px;">
                    <table class="border-table " style="max-width: 100%;">
                         <thead>
                              <tr>
                                   <th align="left" width="5%" rowspan="2">Sr. No</th>
                                   <th align="left" width="20%" rowspan="2">Name of party / Account</th>
                                   <th align="left" width="10%" rowspan="2">Borrowal account number</th>
                                   <th align="left" width="10%" rowspan="2">Nature of Account</th>
                                   <th align="left" width="10%" rowspan="2">Date of Sanction</th>
                                   <th align="left" width="15%">Sanctioned limit</th>
                                   <!-- <th align="left" width="15%">Disbursed amount</th> -->
                                   <th align="left" width="15%">Balance Outstanding</th>
                              </tr>
                              <tr>

                                   <th align="center" width="45%" colspan="2">(In INR Lakhs)</th>

                              </tr>
                         </thead>
                         <tbody>
                              <?php if($fmrDetails->fraud_amount > 500000): ?>
                              <?php $bcount = 1; ?>
                              <?php $__currentLoopData = $borrowerDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowerDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                   <td align="left"><?php echo e($bcount++); ?></td>
                                   <td align="left"><?php echo e(!empty($borrowerDetail->account_name) ? $borrowerDetail->account_name : ''); ?></td>
                                   <td align="left"><?php echo e(!empty($borrowerDetail->lan) ? $borrowerDetail->lan : ''); ?></td>
                                   <td align="left"><?php echo e(!empty($borrowerDetail->nature_of_account) ? $borrowerDetail->nature_of_account : ''); ?></td>
                                   <td align="left"><?php echo e(!empty($borrowerDetail->disbursement_date) ? \App\Helpers\CommonHelper::dateFormate($borrowerDetail->disbursement_date) : 'NA'); ?></td>
                                   <td align="center"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($borrowerDetail->sanction_limit, 'true' ) ?? ''); ?></td>
                                   <!-- <td align="center"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($borrowerDetail->disburse_amount, 'true') ?? ''); ?></td> -->
                                   <td align="center"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($borrowerDetail->balance_outstanding, 'true') ?? ''); ?></td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php else: ?>
                              <tr>
                                   <td align="center" colspan="7">NA</td>
                              </tr>
                              <?php endif; ?>

                         </tbody>
                    </table>
               </td>

          </tr>
          <tr>
               <td align="center" width="12%">c.</td>
               <td align="left" width="88%">Director Details:</td>
          </tr>
          <tr>
               <td colspan="2" style="padding-top:30px;">
                    <?php
                    $emptyData = true;
                    $borrowerDirArr = [];
                    if(isset($fmrDetails->borrowerDetails->borrowerDirDetails) && !empty($fmrDetails->borrowerDetails->borrowerDirDetails)){
                    $emptyData = false;
                    $borrowerDirArr = $fmrDetails->borrowerDetails->borrowerDirDetails->toArray();
                    }
                    ?>
                    <table class="border-table" style="max-width: 100%;">
                         <thead>
                              <tr>
                                   <th align="center" width="20%">Name of party/account</th>
                                   <th align="center" width="20%">Sr. No.</th>
                                   <th align="center" width="20%">Name of Director/Proprietor</th>
                                   <th align="center" width="40%">Address</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php if($fmrDetails->fraud_amount > 500000): ?>
                              <?php $count = 1; ?>
                              <?php $__currentLoopData = $directorDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $directorDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                   <td align="center"><?php echo e(@$directorDetail->account_name ?? ''); ?></td>
                                   <td align="center"><?php echo e($count++); ?></td>
                                   <td align="center"><?php echo e(@$directorDetail->director_name ?? ''); ?></td>
                                   <td align="center"><?php echo e(@$directorDetail->director_address ?? ''); ?></td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php else: ?>
                              <tr>
                                   <td align="center" colspan="4">NA</td>
                              </tr>
                              <?php endif; ?>

                         </tbody>
                    </table>
               </td>

          </tr>
          <tr>
               <td align="center" width="12%">d.</td>
               <td align="left" width="88%">Associate Concerns:</td>

          </tr>
          <tr>
               <?php
               $emptyDataAsso = true;
               $borrowerAssoArr = [];
               if(isset($fmrDetails->borrowerDetails->borrowerAssoDetails) && !empty($fmrDetails->borrowerDetails->borrowerAssoDetails)){
               $emptyDataAsso = false;
               $borrowerAssoArr = $fmrDetails->borrowerDetails->borrowerAssoDetails->toArray();
               }
               ?>
               <td colspan="2" style="padding-top:20px;">
                    <table class="border-table " style="max-width: 100%;">
                         <thead>
                              <tr>
                                   <th align="center" width="20%">Name of party/account</th>
                                   <th align="center" width="20%">Sr. No. Associate Concern</th>
                                   <th align="center" width="20%">Name of Associate Concern</th>
                                   <th align="center" width="40%">Address</th>


                              </tr>
                         </thead>
                         <tbody>
                              <?php if($fmrDetails->fraud_amount > 500000): ?>
                              <?php $count = 1; ?>
                              <?php $__currentLoopData = $associateDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associateDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                   <td align="center"><?php echo e(@$associateDetail->account_name ?? ''); ?></td>
                                   <td align="center"><?php echo e($count++); ?></td>
                                   <td align="center"><?php echo e(@$associateDetail->associate_name ?? ''); ?></td>
                                   <td align="center"><?php echo e(@$associateDetail->address ?? ''); ?></td>

                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php else: ?>
                              <tr>
                                   <td align="center" colspan="4">NA</td>
                              </tr>
                              <?php endif; ?>

                         </tbody>
                    </table>
               </td>

          </tr>
          <tr>
               <td align="center" width="12%">e.</td>
               <td align="left" width="88%">Associate Concerns Director:</td>

          </tr>
          <tr>
               <?php
               $emptyDataAsso = true;
               $borrowerAssoArr = [];
               if(isset($fmrDetails->borrowerDetails->borrowerAssoDirDetails) && !empty($fmrDetails->borrowerDetails->borrowerAssoDirDetails)){
               $emptyDataAsso = false;
               $borrowerAssoDirArr = $fmrDetails->borrowerDetails->borrowerAssoDirDetails->toArray();
               }
               ?>
               <td colspan="2" style="padding-top:20px;">
                    <table class="border-table " style="max-width: 100%;">
                         <thead>
                              <tr>
                                   <th align="center" width="20%">Name of party/account</th>
                                   <th align="center" width="20%">Sr. No. Associate Director</th>
                                   <th align="center" width="20%">Name of Associate Director</th>
                                   <th align="center" width="40%">Asso. Director Address</th>


                              </tr>
                         </thead>
                         <tbody>
                              <?php if($fmrDetails->fraud_amount > 500000): ?>
                              <?php $count = 1; ?>
                              <?php $__currentLoopData = $associateDirDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associateDirDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                   <td align="center"><?php echo e(@$associateDirDetails->account_name ?? ''); ?></td>
                                   <td align="center"><?php echo e($count++); ?></td>
                                   <td align="center"><?php echo e(@$associateDirDetails->director_name ?? ''); ?></td>
                                   <td align="center"><?php echo e(@$associateDirDetails->director_address ?? ''); ?></td>

                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php else: ?>
                              <tr>
                                   <td align="center" colspan="4">NA</td>
                              </tr>
                              <?php endif; ?>

                         </tbody>
                    </table>
               </td>

          </tr>
          <!-- <tr>
                    <th align="left" colspan="2">
                         <span style="padding-left:10px;">Associate Concern Director/proprietor details:</span></th>
                    </tr>
                   -->
     </table>
</body>

</html><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/admin/fmr/fmr_report1.blade.php ENDPATH**/ ?>