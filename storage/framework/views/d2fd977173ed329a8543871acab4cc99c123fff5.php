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
            /* its 4 and 8 */
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
        <b style="font-size:13px;margin:0;">FMR 2</b>
    </div>
    <table>
        <tr>
            <td style="text-align:center;" width="100%;text-decoration:underline">
                <h1 style="font-size:16px;display:block;line-height:22px;"><b style="border-bottom:1px solid #000;margin-bottom:10px;">FMR-2</b><br />
                    <b style="border-bottom:1px solid #000;">Quarterly Report on Frauds Outstanding</b>
                </h1>
                <p style="font-size:14px;border-bottom:1px solid #000;padding-top:0px;display:inline-block;margin:0 auto;">(Vide chapter IV)</p>
            </td>
        </tr>
    </table>

    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;"><b>Name of the NBFC</b> <u>Piramal Capital and Housing Finance Ltd</u></p><br>
    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;"><b>Report for the quarter ended</b><u> <?php echo e(\Carbon\Carbon::parse($lastQuarterEndDate)->format('jS F Y')); ?></u></p><br><br>

    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0;">
        <center><b><u>Part -A : Frauds Outstanding </b></u></center>
    </p>
    <!-- <p class="logo"> -->
    <p style="font-size:13px; text-align: right;margin:0;">(Amount in Rs Lakh)</p>
    <!-- </p> -->

  
    <table class="border-table " style="max-width: 100%;border-collapse: collapse;">
        <thead>
            <tr>
                <th align="left" width="3%" colspan="2">Category</th>
                <th align="left" width="10%" colspan="2">Cases outs- tanding as at the end of the previous quarter</th>
                <th align="left" width="10%" colspan="2">New cases reported during the current quarter</th>
                <th align="left" width="10%" colspan="2">Cases closed during the current quarter</th>
                <th align="left" width="12%" colspan="2">Cases outstanding  as at the end of the quarter</th>
                <th align="left" width="10%">Total amount recovered</th>
                <th align="left" width="10%">Provision held for cases outstanding as at the end of the Qtr.</th>
                <th align="left" width="10%">Amount Recovered during the current Qtr.</th>
                <th align="left" width="5%">Amount Written off during the current quarter. </th>
            </tr>
        </thead>
        <tr>

            <td align="left" colspan="2" style="width:5px ;height:4px"></td>
            <td align="left" >No</td>
            <td align="left">Amt.</td>
            <td align="left" >No</td>
            <td align="left" >Amt.</td>
            <td align="left" >No</td>
            <td align="left" >Amt.</td>
            <td align="left" >No.(2+ 4-6)</td>
            <td align="left" style="word-wrap: break-word;">Amt.(3+ 5-7)</td>
            <td align="left" >Amt.</td>
            <td align="left" >Amt.</td>
            <td align="left" >Amt.</td>
            <td align="left" >Amt.</td>
        </tr>
        <tr>
            <td align="left" colspan="2">1</td>
            <td align="left">2</td>
            <td align="left">3</td>
            <td align="left">4</td>
            <td align="left">5</td>
            <td align="left">6</td>
            <td align="left">7</td>
            <td align="left">8</td>
            <td align="left">9</td>
            <td align="left">10</td>
            <td align="left">11</td>
            <td align="left">12</td>
            <td align="left">13</td>

        </tr>

        <tbody>
            <tr>
                <td align="left" colspan="2">Cash</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>
                <td align="left" rowspan="4">Deposits</td>
                <td align="left">(i)Recurring</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>

                <td align="left">(ii) Daily</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>

                <td align="left">(iii) Term</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>

                <td align="left">(iv) Others</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>


            </tr>
            <tr>
                <td align="left" colspan="2">Non-resident accounts</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>
                <td align="left" rowspan="4">Advances</td>
                <td align="left">(i) Cash Credit</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>
                <?php
                    $termLoan = $fraudOutstanding['termLoans'];
                ?>
                <td align="left">(ii) Term Loans</td>
                <td align="left"><?php echo e($termLoan['prevQuarter']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($termLoan['prevQuarter']['amount'], 'true')); ?></td>
                <td align="left"> <?php echo e($termLoan['new_cases']['count']); ?> </td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $termLoan['new_cases']['amount'], 'true')); ?></td>
                <td align="left"> <?php echo e($termLoan['closed_cases']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($termLoan['closed_cases']['amount'] , 'true')); ?></td>
                <td align="left"><?php echo e($termLoan['outstanding_cases']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $termLoan['outstanding_cases']['amount'], 'true')); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $termLoan['amount_recovered'], 'true')); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $termLoan['provision_held'], 'true')); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $termLoan['amount_recovered_qtr'], 'true')); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $termLoan['amount_written_off'], 'true')); ?></td>

            </tr>
            <tr>

                <td align="left">(iii) Bills</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>

                <td align="left">(iv) Others</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>


            </tr>
            <tr>
                <td align="left" colspan="2">Inter-branch accounts</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>
                <td align="left" rowspan="4">Off-balance sheet</td>
                <td align="left">(i) Letters of Credit</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>
                <td align="left">(ii) Guarantees</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>
                <td align="left">(iii) Co-acceptance</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>

                <td align="left">(iv) Others</td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
            </tr>
            <tr>
                <?php
                    $otherLoan = $fraudOutstanding['otherLoans'];
                ?>
                <td align="left" rowspan="2">Others</td>
                <td align="left">A-(PCHFL)</td>
                <td align="left"><?php echo e($otherLoan['prevQuarter']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($otherLoan['prevQuarter']['amount'], 'true')); ?></td>
                <td align="left"> <?php echo e($otherLoan['new_cases']['count']); ?> </td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $otherLoan['new_cases']['amount'], 'true')); ?></td>
                <td align="left"> <?php echo e($otherLoan['closed_cases']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($otherLoan['closed_cases']['amount'] , 'true')); ?></td>
                <td align="left"><?php echo e($otherLoan['outstanding_cases']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $otherLoan['outstanding_cases']['amount'], 'true')); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $otherLoan['amount_recovered'], 'true')); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $otherLoan['provision_held'], 'true')); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $otherLoan['amount_recovered_qtr'], 'true')); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $otherLoan['amount_written_off'], 'true')); ?></td>

            </tr>
            <tr>
                <td align="left" style="word-wrap: break-word;">B - (Old DHFL frauds ) </td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>
            <td align="left" colspan="2"><b>Total</b></td>
                <td align="left"><b><?php echo e($termLoan['prevQuarter']['count'] + $otherLoan['prevQuarter']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $termLoan['prevQuarter']['amount'] + $otherLoan['prevQuarter']['amount'], 'true')); ?> </b></td>

                <td align="left"><b><?php echo e($termLoan['new_cases']['count'] + $otherLoan['new_cases']['count']); ?> </b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $termLoan['new_cases']['amount'] + $otherLoan['new_cases']['amount'], 'true')); ?></b></td>
                
                <td align="left"><b><?php echo e($termLoan['closed_cases']['count'] + $otherLoan['closed_cases']['count']); ?> </b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $termLoan['closed_cases']['amount'] + $otherLoan['closed_cases']['amount'], 'true')); ?></b></td>

                <td align="left"><b><?php echo e($termLoan['outstanding_cases']['count'] + $otherLoan['outstanding_cases']['count']); ?> </b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $termLoan['outstanding_cases']['amount'] + $otherLoan['outstanding_cases']['amount'], 'true')); ?></b></td>

                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($termLoan['amount_recovered'] + $otherLoan['amount_recovered'], 'true')); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($termLoan['provision_held'] + $otherLoan['provision_held'], 'true')); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($termLoan['amount_recovered_qtr'] + $otherLoan['amount_recovered_qtr'], 'true')); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs($termLoan['amount_written_off'] + $otherLoan['amount_written_off'], 'true')); ?></b></td>
            </tr>
        </tbody>
       
    </table>
    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;">
        # For the purpose of clarity, the details of frauds reported by erstwhile Dewan Housing Finance Corporation ("DHFL") have been
        presented separately in Annexure 1. The above report contains the remaining frauds reported by standalone Piramal Capital and Housing finance limited ("PCHFL") prior to merger as well as for PCHFL as a combined entity after the merger with DHFL. 
    </p>

    <!-- <p style="page-break-after:always"></p> -->
    <br>
    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;page-break-before:always" >
        <center><b><u>Part – B: Category-wise classification of frauds reported during the quarter </b></u></center>
    </p><br>

    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;"><b>Name of the NBFC</b><u> Piramal Capital and Housing Finance Ltd</u></p><br><br>
    <p style="font-size:13px; text-align: right;margin:0;">(Amount in Rs Lakh)</p>

    <table class="border-table " style="max-width: 100%;border-collapse: collapse;">
        <thead>
            <tr>

                <th align="left" width="14%" style="word-wrap: break-word;">Category</th>
                <th align="left" width="10%" colspan="2" style="word-wrap: break-word;">Misappropriation and criminal breach of trust</th>
                <th align="left" width="12%" colspan="2" style="word-wrap: break-word;">Fraudulent encashment/ manipulation of books of account and conversion of property</th>
                <th align="left" width="10%" colspan="2" style="word-wrap: break-word;">Unauthorised credit facility extended for illegal gratification</th>
                <th align="left" width="12%" colspan="2">Negligence and cash shortages</th>
                <th align="left" width="10%" colspan="2">Cheating and forgery</th>
                <th align="left" width="10%" colspan="2">Irregularities in foreign exchange transactions</th>
                <th align="left" width="10%" colspan="2">Others</th>
                <th align="left" width="5%" colspan="2">Total </th>
            </tr>
        </thead>
        <tr>
            <td align="left"></td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No.</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
        </tr>
        <!-- <tr>
            <td align="left">1</td>
            <td align="left">2</td>
            <td align="left">3</td>
            <td align="left">4</td>
            <td align="left">5</td>
            <td align="left">6</td>
            <td align="left">7</td>
            <td align="left">8</td>
            <td align="left">9</td>
            <td align="left">10</td>
            <td align="left">11</td>
            <td align="left">12</td>
            <td align="left">13</td>
            <td align="left">14</td>
            <td align="left">15</td>
            <td align="left">16</td>
            <td align="left">17</td>

        </tr> -->

        <tbody>
            <tr>
                <td align="left"><b>Less than Rs 1 lakh</b></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>
                <td align="left"><b> 1 lakh and above but less the 1cr</b></td>
                <td align="left"><?php echo e($categoryWiseData['category1']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category1']['amount'], 'true')); ?></td>

                <td align="left"><?php echo e($categoryWiseData['category2']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category2']['amount'], 'true')); ?></td>
                
                <td align="left"><?php echo e($categoryWiseData['category3']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category3']['amount'], 'true')); ?></td>
                
                <td align="left"><?php echo e($categoryWiseData['category4']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category4']['amount'], 'true')); ?></td>
                
                <td align="left"><?php echo e($categoryWiseData['category5']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category5']['amount'], 'true')); ?></td>
                
                <td align="left"><?php echo e($categoryWiseData['category6']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category6']['amount'], 'true')); ?></td>
                
                <td align="left"><?php echo e($categoryWiseData['category7']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category7']['amount'], 'true')); ?></td>
                
                <td align="left"><?php echo e($categoryWiseData['total']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['total']['amount'], 'true')); ?></td>
                
            </tr>
            <tr>
                <td align="left"><b>above Rs 1 Cr</b></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
            </tr>
            <tr>
                <td align="left"><b>Total</b></td>
                <td align="left"><b><?php echo e($categoryWiseData['category1']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category1']['amount'], 'true')); ?></b></td>

                <td align="left"><b><?php echo e($categoryWiseData['category2']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category2']['amount'], 'true')); ?></b></td>
                
                <td align="left"><b><?php echo e($categoryWiseData['category3']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category3']['amount'], 'true')); ?></b></td>
                
                <td align="left"><b><?php echo e($categoryWiseData['category4']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category4']['amount'], 'true')); ?></b></td>
                
                <td align="left"><b><?php echo e($categoryWiseData['category5']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category5']['amount'], 'true')); ?></b></td>
                
                <td align="left"><b><?php echo e($categoryWiseData['category6']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category6']['amount'], 'true')); ?></b></td>
                
                <td align="left"><b><?php echo e($categoryWiseData['category7']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['category7']['amount'], 'true')); ?></b></td>
                
                <td align="left"><b><?php echo e($categoryWiseData['total']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $categoryWiseData['total']['amount'], 'true')); ?></b></td>
                
            </tr>
        </tbody>
    </table>

    <!-- second table part c  -->
    <br><br>
    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;">
        <center><b><u>Part – C: Perpetrator-wise classification of frauds reported during the quarter </b></u></center>
    </p><br>

    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;"><b>Name of the NBFC</b><u> Piramal Capital and Housing Finance Ltd</u></p><br>
    <p style="font-size:13px; text-align: right;margin:0;">(Amount in Rs Lakh)</p>
    <table class="border-table " style="max-width: 100%;border-collapse: collapse;">
        <thead>
            <tr>

                <th align="left" width="10%" style="word-wrap: break-word;">Category</th>
                <th align="left" width="10%" colspan="2" style="word-wrap: break-word;">Staff</th>
                <th align="left" width="12%" colspan="2" style="word-wrap: break-word;">Customers</th>
                <th align="left" width="10%" colspan="2" style="word-wrap: break-word;">Outsiders</th>
                <th align="left" width="12%" colspan="2">Staff and Customers</th>
                <th align="left" width="10%" colspan="2">Staff and Outsiders</th>
                <th align="left" width="10%" colspan="2">Customers and Outsiders</th>
                <th align="left" width="10%" colspan="2">Staff, Customers and Outsiders</th>
                <th align="left" width="12%" colspan="2">Total </th>
            </tr>
        </thead>
        <tr>
            <td align="left"></td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No.</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
            <td align="left">No</td>
            <td align="left">Amt.</td>
        </tr>
        <!-- <tr>
            <td align="left">1</td>
            <td align="left">2</td>
            <td align="left">3</td>
            <td align="left">4</td>
            <td align="left">5</td>
            <td align="left">6</td>
            <td align="left">7</td>
            <td align="left">8</td>
            <td align="left">9</td>
            <td align="left">10</td>
            <td align="left">11</td>
            <td align="left">12</td>
            <td align="left">13</td>
            <td align="left">14</td>
            <td align="left">15</td>
            <td align="left">16</td>
            <td align="left">17</td>

        </tr> -->

        <tbody>
            <tr>
                <td align="left" height="1%"><b>Less than Rs 1 lakh </b></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>
                <td align="left" height="1px"><b>Rs 1 lakh and above but less than Rs 1 crore </b></td>
            
                <td align="left"><?php echo e($perpetratorDetails['staff']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['staff']['amount'], 'true')); ?></td>

                <td align="left"><?php echo e($perpetratorDetails['customer']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['customer']['amount'], 'true')); ?></td>

                <td align="left"><?php echo e($perpetratorDetails['outsider']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['outsider']['amount'], 'true')); ?></td>

                <td align="left"><?php echo e($perpetratorDetails['staffCustomer']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['staffCustomer']['amount'], 'true')); ?></td>

                <td align="left"><?php echo e($perpetratorDetails['staffOutsider']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['staffOutsider']['amount'], 'true')); ?></td>
                
                <td align="left"><?php echo e($perpetratorDetails['customerOutsider']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['customerOutsider']['amount'], 'true')); ?></td>
                
                <td align="left"><?php echo e($perpetratorDetails['staffCustOutsider']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['staffCustOutsider']['amount'], 'true')); ?></td>
                

                <td align="left"><?php echo e($perpetratorDetails['total']['count']); ?></td>
                <td align="left"><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['total']['amount'], 'true')); ?></td>
                
            </tr>
            <tr>
                <td align="left"><b>Rs 1 crore and above</b></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
            </tr>
            <tr>
                <td align="left"><b>Total</b></td>
                <td align="left"><b><?php echo e($perpetratorDetails['staff']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['staff']['amount'], 'true')); ?></b></td>

                <td align="left"><b><?php echo e($perpetratorDetails['customer']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['customer']['amount'], 'true')); ?></b></td>

                <td align="left"><b><?php echo e($perpetratorDetails['outsider']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['outsider']['amount'], 'true')); ?></b></td>

                <td align="left"><b><?php echo e($perpetratorDetails['staffCustomer']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['staffCustomer']['amount'], 'true')); ?></b></td>

                <td align="left"><b><?php echo e($perpetratorDetails['staffOutsider']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['staffOutsider']['amount'], 'true')); ?></b></td>
                
                <td align="left"><b><?php echo e($perpetratorDetails['customerOutsider']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['customerOutsider']['amount'], 'true')); ?></b></td>
                
                <td align="left"><b><?php echo e($perpetratorDetails['staffCustOutsider']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['staffCustOutsider']['amount'], 'true')); ?></b></td>
                

                <td align="left"><b><?php echo e($perpetratorDetails['total']['count']); ?></b></td>
                <td align="left"><b><?php echo e(\App\Helpers\CommonHelper::convertIntoLakhs( $perpetratorDetails['total']['amount'], 'true')); ?></b></td>
                
            </tr>
        </tbody>
    </table>
    <br>
    <p>
        <b><u>Certificate</u></b>
        Certified that all frauds of Rs. 1 lakh and above reported to the Regulator during the last quarter will be reported to the Company’s Board and have been incorporated in Part A (Columns 4 and 5) and Parts B and C above.

    </p>

    <p>
        Signature: <br>
        Name and Designation: Anand Chaturvedi (Joint Vice President)
    </p>
    <p>
        Place: Mumbai <br>
        Date: <?php echo e(\Carbon\Carbon::now()->format('dS F Y')); ?>

    </p>

    
    <!-- <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;">
        <center><b><u>Quarterly Progress Report on Frauds of ₹ 1.0 lakh & above </b></u></center><br>
        <center>(Vide Paragraph 4.2)</center>
    </p><br>

    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;"><b>Name of the NBFC</b> Piramal Capital and Housing Finance Ltd</p><br><br>
    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;"><b>Statement for quarter ended</b> 30th June 2023</p><br><br>

    <p style="font-size:14px;padding-top:0px;display:inline-block;margin:0 auto;">
        <center><b><u>Part A: Summary information </b></u></center><br>
    </p><br>

    <table class="border-table " style="max-width: 100%;border-collapse: collapse;">
        <thead>
            <tr>

                <th align="left" width="2%" style="word-wrap: break-word;"></th>
                <th align="left" width="25%" style="word-wrap: break-word;"></th>
                <th align="left" width="12%" style="word-wrap: break-word;">Number</th>
                <th align="left" width="10%" style="word-wrap: break-word;">Amount involved (Rs. in lakh)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left">1.</td>
                <td align="left">Cases outstanding</td>
                <td align="left"></td>
                <td align="left"></td>
            </tr>
            <tr>
                <td align="left">2.</td>
                <td align="left">Cases where there is no progress (furnish case-wise details as per format at Part B below)</td>
                <td align="left"></td>
                <td align="left"></td>

            </tr>
            <tr>
                <td align="left">3.</td>
                <td align="left">Cases where there is progress (furnish case-wise details as per format at Part C below)</td>
                <td align="left"></td>
                <td align="left"></td>
                
            </tr>
           
        </tbody>
    </table> -->







</body>

</html><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/admin/fmr/fmr_report2.blade.php ENDPATH**/ ?>