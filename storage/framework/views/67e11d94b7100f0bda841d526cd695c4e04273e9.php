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

        .tsize {
            height: 3%;
            width: 80%;
        }
    </style>
</head>

<body>

    <div class="logo">
        <b style="font-size:13px;">FMR 3</b>
    </div>

    <!-- fmr 3 form here -->
    <br><br>
    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;">
        <center><b><u>Quarterly Progress Report on Frauds of Rs 1.0 lakh & above </b></u></center><br>
        <center>(Vide Paragraph 4.2)</center>
    </p><br>

    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;"><b>Name of the NBFC</b> <u>Piramal Capital and Housing Finance LTD</u></p><br><br>
    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;"><b>Statement for quarter ended</b> <u><?php echo e(\Carbon\Carbon::parse($lastQuarterEndDate)->format('jS F Y')); ?></u></p><br><br>

    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;">
        <center><b><u>Part A: Summary information </b></u></center><br>
    </p><br>

    <table class="border-table " style="max-width: 100%;border-collapse: collapse;">
        <thead>
            <tr>

                <th align="left" width="2%" style="word-wrap: break-word;"></th>
                <th align="left" width="25%" style="word-wrap: break-word;"></th>
                <th align="center" width="15%" style="word-wrap: break-word;">Number</th>
                <th align="center" width="12%" style="word-wrap: break-word;">Amount involved (Rs. in lakh)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left">1.</td>
                <td align="left">Cases outstanding</td>
                <td align="left"><?php echo e($summaryInfo['outstanding']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $summaryInfo['outstanding']['amount'], 'true')); ?></td>
            </tr>
            <tr>
                <td align="left">2.</td>
                <td align="left">Cases where there is no progress (furnish case-wise details as per format at Part B below)</td>
                <td align="left"><?php echo e($summaryInfo['noprogress']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($summaryInfo['noprogress']['amount'], 'true')); ?></td>

            </tr>
            <tr>
                <td align="left">3.</td>
                <td align="left">Cases where there is progress (furnish case-wise details as per format at Part C below)</td>
                <td align="left"><?php echo e($summaryInfo['inprogress']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $summaryInfo['inprogress']['amount'], 'true')); ?></td>

            </tr>

        </tbody>
    </table>

    <br>
    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;">
        <center><b><u>Part B: Details of cases where there is no progress </b></u></center><br>
    </p><br>

    <table class="border-table " style="max-width: 100%;border-collapse: collapse;">
        <thead>
            <tr>

                <th align="left" width="5%" style="word-wrap: break-word;">No.</th>
                <th align="left" width="25%" style="word-wrap: break-word;">Name of the branch</th>
                <th align="left" width="20%" style="word-wrap: break-word;">Fraud No.</th>
                <th align="left" width="25%" style="word-wrap: break-word;">Name of party/ Account</th>
                <th align="left" width="15%" style="word-wrap: break-word;">Amount in Rs. Lakh</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1; ?>
            <?php $__currentLoopData = $noPorgressInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td align="left"><?php echo e($count++); ?></td>
                <td align="left"><?php echo e($value->branch_name); ?></td>
                <td align="left"><?php echo e($value->fraud_number); ?></td>
                <td align="left"><?php echo e($value->account_name); ?><?php echo e(($value->totallans > 1) ? ' and '.($value->totallans - 1).trans_choice('global.other',$value->totallans) : ''); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $value->totalamount, 'true')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <br>
    <p style="page-break-before:always"></p>
    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;">
        <center><b><u>Part C: Case-wise details of progress </b></u></center><br>
    </p><br>
    <?php $__currentLoopData = $caseProgressInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;">
        <b>Name of the party/account:</b> <u><?php echo e($value['account_name']); ?>  <?php echo e(($value['noOfLans'] > 0) ? ' and '.($value['noOfLans']) .trans_choice('global.other',$value['noOfLans']) : ''); ?> </u><br>
        <b>Name of branch/office:</b><u> <?php echo e($value['branch_name']); ?> </u> <br>
        <b>Amount involved (Rs in lakh):</b> Loan amount - <u>Rs. <?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $value['loan_amount'], 'true')); ?> Lakh; Principle Outstanding - Rs. <?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $value['principal_outstanding'], 'true')); ?> Lakh </u> <br>
        <b> Fraud No:</b><u> <?php echo e($value['fraud_number']); ?> </u>
    </p>
    <br><br>

    <table class="" style="max-width: 100%;">
        <thead>
            <!-- <tr>
                <td align="center" style="width: 5%;">1.</td>
                <td align="left" style="width: 35%;">Date of first reporting</td>
                <td align="center"> <input type="text" class="form-control tsize"></td>
            </tr> -->
        </thead>
        <tbody>
            <!-- style="height: 2%;width:80%;" -->
            <tr>
                <td align="center" style="width: 5%;">1.</td>
                <td align="left" style="width: 35%;">Date of first reporting</td>
                <td align="center"> <input type="text" class="form-control tsize" value="<?php echo e(\Carbon\Carbon::parse($value['date_of_reporting'])->format('jS F, Y') ?? 'NA'); ?>" ></td>
            </tr>
            <tr>
                <td align="center">2.a.</td>
                <td align="left">Date of filing recovery suit with DRT/Others </td>
                <td align="center"> <input type="text" class="form-control tsize" value="NA"></td>
            </tr>
            <tr>
                <td align="center">b.</td>
                <td align="left">Present position</td>
                <td align="center"> <input type="text" class="form-control tsize" value="NA"></td>
            </tr>
            <tr>
                <td align="center">3.</td>
                <td align="left">Recoveries made up to the end of the last quarter (Rs. in lakh)</td>
                <td align="center"> <input type="text" class="form-control tsize" value="<?php echo e(($value['prev_quarter_recovery'] ?? 0) != 0 ? 'Rs. ' . \App\Helpers\CommonHelper::convertIntoLakhs($value['prev_quarter_recovery'], 'true') .'  Lakh(Prin.Recovery)' : 'Nil'); ?>"></td>
            </tr>
            <tr>
                <td align="center">4</td>
                <td align="left">Recoveries made during the quarter (Rs. In lakh)</td>
                <td align="center"> <input type="text" class="form-control tsize" value="<?php echo e(($value['curr_quarter_recovery'] ?? 0) != 0 ? \App\Helpers\CommonHelper::convertIntoLakhs($value['curr_quarter_recovery'], 'true') : 'Nil'); ?>"></td>
            </tr>
            <tr>
                <td align="center">a)</td>
                <td align="left">From party/ parties concerned</td>
                <td align="center"> <input type="text" class="form-control tsize" value=" <?php echo e(($value['party_recovery'] ?? 0) != 0 ? 'Rs.'.\App\Helpers\CommonHelper::convertIntoLakhs($value['party_recovery'], 'true') .' Lakh(Prin.Recovery)': 'Nil'); ?>"></td>
            </tr>
            <tr>
                <td align="center">b)</td>
                <td align="left">From insurance</td>
                <td align="center"> <input type="text" class="form-control tsize" value=" <?php echo e(($value['insurance_recovery'] ?? 0) != 0 ? \App\Helpers\CommonHelper::convertIntoLakhs($value['insurance_recovery'], 'true') : 'Nil'); ?>"></td>
            </tr>
            <tr>
                <td align="center">c)</td>
                <td align="left">From other sources</td>
                <td align="center"> <input type="text" class="form-control tsize" value=" <?php echo e(($value['other_recovery'] ?? 0) != 0 ? \App\Helpers\CommonHelper::convertIntoLakhs($value['other_recovery'], 'true') : 'Nil'); ?>"></td>
            </tr>
            <tr>
                <td align="center">5</td>
                <td align="left">Total recoveries (3+4) (Rs. in lakh)</td>
                <td align="center"> <input type="text" class="form-control tsize" value=" <?php echo e(($value['total_recovery'] ?? 0) != 0 ? 'Rs.'.\App\Helpers\CommonHelper::convertIntoLakhs($value['total_recovery'], 'true').' Lakh(Prin.Recovery)' : 'Nil'); ?>" ></td>
            </tr>
            <tr>
                <td align="center">6</td>
                <td align="left">Loss to the NBFC (Rs. in lakh)</td>
                <td align="center"> <input type="text" class="form-control tsize" value="<?php echo e(($value['amount_written_off'] ?? 0) != 0 ? \App\Helpers\CommonHelper::convertIntoLakhs($value['amount_written_off'], 'true') : 'Nil'); ?>"></td>
            </tr>
            <tr>
                <td align="center">7</td>
                <td align="left">Provision held (Rs. in lakh)</td>
                <td align="center"> <input type="text" class="form-control tsize" value="<?php echo e(($value['principal_outstanding'] ?? 0) != 0 ? 'Rs.'.\App\Helpers\CommonHelper::convertIntoLakhs($value['principal_outstanding'], 'true').' Lakh(Prin.Provision)': 'Nil'); ?>"></td>
            </tr>
            <tr>
                <td align="center">8</td>
                <td align="left">Amount written off (Rs. in lakh)</td>
                <td align="center"> <input type="text" class="form-control tsize" value="<?php echo e(($value['amount_written_off'] ?? 0) != 0 ? \App\Helpers\CommonHelper::convertIntoLakhs($value['amount_written_off'], 'true') : 'Nil'); ?>"></td>
            </tr>
            <tr>
                <td align="center">9.a)</td>
                <td align="left">Date of reporting case to police</td>
               
                <td align="center"> 
                    <input type="text" class="form-control tsize" value="<?php echo e(!empty($value['police_complaint_date']) ? ($value['police_complaint_date'][0]) : 'NA'); ?>">

                </td>
               
            </tr>
            <tr>
                <td align="center">b)</td>
                <td align="left">Date of completion of police investigation</td>
                <td align="center"> <input type="text" class="form-control tsize" value="<?php echo e($value['police_investigation_date'][0] ?? 'NA'); ?>"></td>
            </tr>
            <tr>
                <td align="center">c)</td>
                <td align="left">Date of submission of investigation report by police</td>
                <td align="center"> <input type="text" class="form-control tsize"  value="<?php echo e($value['report_submission_date'][0] ?? 'NA'); ?>"></td>
            </tr>
            <tr style="page-break-before:always">
                <td align="center">10.</td>
                <td align="left">Details of staff side action</td>
                <td align="center"> </td>
            </tr>
            <tr align="center">
                <td colspan="3">
                    <table class="border-table " style="max-width: 100%;border-collapse: collapse;">
                        <thead>
                            <tr>

                                <th align="left" width="4%" style="word-wrap: break-word;">No.</th>
                                <th align="left" width="10%" style="word-wrap: break-word;">Name</th>
                                <th align="left" width="12%" style="word-wrap: break-word;">desgn.</th>
                                <th align="left" width="10%" style="word-wrap: break-word;">Whether suspended/ Dt. of suspension</th>
                                <th align="left" width="12%">Date of issue of charge sheet</th>
                                <th align="left" width="10%">Date of commencement of domestic inquiry</th>
                                <th align="left" width="10%">Date of completion of inquiry</th>
                                <th align="left" width="10%">Date of issue of final orders</th>
                                <th align="left" width="12%">Punishment awarded </th>
                                <th align="left" width="12%">Details of prosecution/ conviction/ aquittal, etc. </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($value['staff_action'])): ?>
                        <?php $__currentLoopData = $value['staff_action']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staffAction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                          
                            <tr>
                                <td align="left">1</td>
                                <td align="left"><?php echo e($staffAction['name']); ?></td>
                                <td align="left"><?php echo e($staffAction['designation']); ?></td>
                                <td align="left"><?php echo e($staffAction['suspension']); ?></td>
                                <td align="left"><?php echo e($staffAction['charge_sheet']); ?></td>
                                <td align="left"><?php echo e($staffAction['domestic_enquiry']); ?></td>
                                <td align="left"><?php echo e($staffAction['frmc_date']); ?></td>
                                <td align="left"><?php echo e($staffAction['final_order_date']); ?></td>
                                <td align="left"><?php echo e($staffAction['punishment']); ?></td>
                                <td align="left"><?php echo e($staffAction['conviction_details']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <td align="center">11.</td>
                <td align="left">Other developements</td>
                <td align="center"> <input type="text" class="form-control tsize" value="<?php echo e(!empty($value['other_developments']) ? $value['other_developments'] : 'NA'); ?>"></td>
            </tr>
            <tr>
                <td align="center">12.</td>
                <td align="left">Whether case closed during the quarter</td>
                <td align="center"> <input type="text" class="form-control tsize" value="<?php echo e($value['case_status']); ?>"></td>
            </tr>
            <tr>
                <td align="center">13.</td>
                <td align="left">Date of closure</td>
                <td align="center"> <input type="text" class="form-control tsize" value="<?php echo e(!empty($value['case_closed_date']) ? \Carbon\Carbon::parse($value['case_closed_date'])->format('jS F Y') : 'NA'); ?>"></td>
            </tr>


        </tbody>
    </table>
    <?php if(! $loop->last): ?>
    <p style="page-break-before:always"></p>
     <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





</body>

</html><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/admin/fmr/fmr_report3.blade.php ENDPATH**/ ?>