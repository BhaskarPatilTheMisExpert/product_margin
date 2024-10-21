<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Exception;
use App\Models\LanDetail;


class FmrLanImport implements ToModel, WithChunkReading, WithBatchInserts,WithHeadingRow,WithCalculatedFormulas
{
    public function model(array $row)
    { 
        return new LanDetail([
            'loan_account_number' => $row[0],
            'customer_name' => $row[1],
            'product' => $row[2],
            'disbursement_date'=> \DateTime::createFromFormat('m/d/Y', $row[3])->format('Y-m-d'),
            'sanctioned_amount' => $row[4],
            'disb_amount' => $row[5],
            'principal_outstanding' => $row[6],
            'branch_name' => $row[7],
            'customer_address' => $row[8],
            'district' => $row[9],
            'state' => $row[10],
        ]);
        
        // \Carbon\Carbon::createFromFormat('m/d/Y', $row[3])->format('Y-m-d'),
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
