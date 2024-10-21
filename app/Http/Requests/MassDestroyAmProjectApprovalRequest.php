<?php

namespace App\Http\Requests;

use App\Models\AmProjectApproval;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAmProjectApprovalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('am_project_approval_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:am_project_approvals,id',
        ];
    }
}
