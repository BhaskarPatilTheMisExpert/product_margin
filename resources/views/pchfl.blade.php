<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <style>
        html{
            overflow:auto;
        }
        body, th, td{
            font-family: 'Arial';
            font-size: 10px;
            vertical-align: middle;

        }

        .green{
            background:#20b2aa;
            color:#000;
            font-weight:bold;
        }
        th.green {
            background:#20b2aa;
            color:#fff;
            font-weight:bold;
        }
        .border td, table thead th{
            border-bottom:1px solid #000;
        }
        table,th,td{
            /*max-width:700px;
            width:100%;*/
            /*width:930px;*/
            
            overflow-x:auto;
            border: 1px solid black;
            border-collapse: collapse;
        }
        table td, table th{
            padding:4px 6px;
        }
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 63px;
            padding: 5px 5px 0 0;
            text-align: right;
        }
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 10px;
            width: 100%;
            /** Extra personal styles **/
            color: #000;
            text-align: center;
            background-image: url();
            background-position: bottom bottom;
            background-size: contain;
            width: 100%;
            /*height: 30px;*/
            background-repeat: no-repeat;
        }
        
    </style>
</head>
<body>
<header>
    <img src="{{ storage_path('app/public/images/pchf.png') }}"
    alt="piramal"/>
</header>
<footer>
    <div style="font-size:9px;">
        <p><b>Piramal Capital & Housing Finance Limited</b><br>
        (formerly Known as Dewan Finance Corporation Limited)</p>
    </div>
    <div style="font-size: 11px;">

        CIN: L65910MH1984PLC032639<br>
        Registered Office: Unit No 601, 6th Floor, Amiti Building, Agastya Corporate Park, Kamani Junction, LBS Marg, Kurla (W), Mumbai 400070.<br>
        T +91 22 3802 4000<br>
        <a href="www.piramalfinance.com" style="color: red">www.piramalfinance.com</a><br/>

    </div>
</footer>

<main>

   <p style="margin-top: 80px;">
    The Manager<br><b>{{ $entityData[0]->group_name }},</b> <br><br><br>

    Dear Sir/Madam,<br>
    <p style="padding-right: 10px;">
     In connection with the income tax return filing for the <b>Assessment Year 2021-2022</b>, we would be obliged if you could<br> confirm the below mentioned balances/amount for all your loan accounts for the 
     <b>Financial Year 2020-2021</b> send it to us at <a href="mailto:Payment.Advice@piramal.com">Payment.Advice@piramal.com</a> after completing the Annexure below.<br><br>

     Please note that this request covers all your accounts with us for the above-mentioned period. We would also request you to give particulars of any of your accounts closed during the year.
 </p>

</p>

@if($entityData->count())
<table cellspacing="0" cellpadding="0"> 
    <thead style="background-color: #51823A;float: center">
        <tr>
            <th  width="11%" >Loan ID</th>
            <th   width="11%">Facility Name</th>
            <th   width="8%">Interest Income</th>
            <th   width="5%">Fees</th>
            <th   width="5%">Penal Interest</th>
            <th   width="8%">Prepayment Charges</th>
            <th  width="8%">Total Income</th>
            <th  width="8%">Total TDS</th>

        </tr>
    </thead>
    <tbody>
        @foreach($entityData as $data)
        <tr>
            <td>{{ $data->loan_id }}</td>
            <td>{{ $data->facility_name }}</td>
            <td>{{ $data->interest_income }}</td>
            <td>{{ $data->fees }}</td>
            <td>{{ $data->penal_interest }}</td>
            <td>{{ $data->prepayment_charges }}</td>
            <td>{{ $data->total_income }}</td>
            <td>{{ $data->total_tds }}</td>    
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No data found</p>
@endif
<br><br>
<p>Yours faithfully,<br>
    For Piramal Capital & Housing Finance Ltd
</p>
<br><br>
<p>Note: This is a system-generated letter and does not require a signature.</p>
<main>

</body>
</html>
