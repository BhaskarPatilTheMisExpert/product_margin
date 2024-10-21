<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use App\Models\ArpTargetStg;
use Exception;

class ArpDataImport implements ToModel, WithChunkReading, WithBatchInserts,WithHeadingRow,WithCalculatedFormulas
{

    public function __construct($requestId) {
        $this->requestId = $requestId;
        $this->userId = auth()->user()->id;
    }

    public function model(array $row)
    {
        if(isset($row['facility_id']) && !empty($row['facility_id'])){
            return new ArpTargetStg([
                'facility_id' => $row['facility_id'],
                'month_year' => \Carbon\Carbon::parse($row['month_year'])->format('Y-m-d'),
                //'srp_asper_pos_fin' => $row['scheduled_repayments_basis_principal_os'],
                'srp_asper_tos_fin' => $row['scheduled_repayments_basis_total_os'],
                'scheduled_disb' => $row['scheduled_disbursement'],
                'addition_accrued_int' => $row['addition_in_accrued_interest'],
                //'closing_pos' => $row['closing_principal_outstanding'],
                'closing_os_srp' => !empty($row['closing_outstanding_srp']) ? $row['closing_outstanding_srp'] : 0,
                'opening_os' => !empty($row['opening_outstanding']) ? $row['opening_outstanding'] : 0,
                'srp_project_cf' => !empty($row['scheduled_repayments_through_project_cashflows_srcf']) ? $row['scheduled_repayments_through_project_cashflows_srcf'] : 0,
                'srp_project_cf_reason' => $row['srcf_reason_for_change'],
                'pr_ecf' => !empty($row['prepayment_from_excess_cashflows_precf']) ? $row['prepayment_from_excess_cashflows_precf'] : 0,
                'pr_ecf_reason' => $row['precf_reason_for_change'],
                'rf' => !empty($row['re_finance_rf']) ? $row['re_finance_rf'] : 0,
                'rf_remarks' => $row['rf_remarks'],
                'rf_reason' => $row['rf_reason_for_change'],
                'am' => !empty($row['asset_monetization_am']) ? $row['asset_monetization_am'] : 0,
                'am_remarks' => $row['am_remarks'],
                'am_reason' => $row['am_reason_for_change'],
                'ots' => !empty($row['otssettlement_ots']) ? $row['otssettlement_ots'] : 0,
                'ots_remarks' => $row['ots_remarks'],
                'ots_reason' => $row['ots_reason_for_change'],
                'cs_to_aif' => !empty($row['entire_cash_sale_to_aif_total_exit']) ? $row['entire_cash_sale_to_aif_total_exit'] : 0,
                'cs_to_aif_remarks' => $row['total_exit_remarks'],
                'cs_to_aif_reason' => $row['total_exit_reason_for_change'],
                'bs_to_aif' => !empty($row['book_shift_to_aif_bsaif']) ?$row['book_shift_to_aif_bsaif'] : 0,
                'bs_to_aif_liq_per' => !empty($row['bsaif_age_liquidity_expected']) ? $row['bsaif_age_liquidity_expected'] : 0,
                'bs_to_aif_remarks' => $row['bsaif_remarks'],
                'bs_to_aif_reason' => $row['bsaif_reason_for_change'],
                'sale_to_arc' => !empty($row['sale_to_arc']) ? $row['sale_to_arc'] : 0,
                'sale_to_arc_remarks' => $row['arc_remarks'],
                'sale_to_arc_reason' => $row['arc_reason_for_change'],
                'sale_rf_another_lender' => !empty($row['salerefinance_to_another_borrower_srb'])? $row['salerefinance_to_another_borrower_srb'] : 0,
                'sale_rf_another_lender_remarks' => $row['srb_remarks'],
                'sale_rf_another_lender_reason' => $row['srb_reason_for_change'],
                'loss' => !empty($row['loss']) ? $row['loss'] : 0,
                'loss_remarks' => $row['loss_remarks'],
                'loss_reason' => $row['loss_reason_for_change'],
                'disb_pending' => !empty($row['disbursement_sanctioned_but_pending']) ? $row['disbursement_sanctioned_but_pending'] : 0,
                'disb_pending_remarks' => $row['disb_pending_remarks'],
                'disb_pending_reason' => $row['disb_pending_reason_for_change'],
                'disb_add' => !empty($row['additional_disbursement_ad']) ? $row['additional_disbursement_ad'] : 0,
                'disb_add_remarks' => $row['ad_remarks'],
                'disb_add_reason' => $row['ad_reason_for_change'],
                'acc_int_change' => !empty($row['change_in_accrued_interest_cai']) ? $row['change_in_accrued_interest_cai'] : 0,
                'acc_int_change_remarks' => $row['cai_remark'],
                'acc_int_change_reason' => $row['cai_reason_for_change'],
                'arp_others' => !empty($row['arp_others']) ? $row['arp_others'] : 0,
                'arp_others_remarks' => $row['arp_others_remarks'],
                'arp_others_reason' => $row['arp_others_reason_for_change'],
                'request_id' => $this->requestId,
                'record_status' => 'P',
                'arp_total' => round(($row['scheduled_repayments_through_project_cashflows_srcf'] +  $row['prepayment_from_excess_cashflows_precf'] + $row['re_finance_rf'] +  $row['asset_monetization_am'] + $row['otssettlement_ots'] +  $row['entire_cash_sale_to_aif_total_exit'] +  $row['book_shift_to_aif_bsaif'] + $row['salerefinance_to_another_borrower_srb'] + $row['loss'] + $row['disbursement_sanctioned_but_pending'] + $row['additional_disbursement_ad'] +  $row['change_in_accrued_interest_cai'] + $row['arp_others'] + $row['sale_to_arc']),2),
                'created_by_id' => $this->userId,
                'updated_by_id' => $this->userId,
            ]);
        }
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
