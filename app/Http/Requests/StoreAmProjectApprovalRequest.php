<?php

namespace App\Http\Requests;

use App\Models\AmProjectApproval;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAmProjectApprovalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('am_project_approval_create');
    }

    public function rules()
    {
        return [
            'pid' => [
                'string',
                'required',
            ],
            'pname' => [
                'string',
                'required',
            ],
            'busines_business_dates_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'approval_status' => [
                'string',
                'min:1',
                'max:1',
                'required',
            ],
            'updated_by' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
