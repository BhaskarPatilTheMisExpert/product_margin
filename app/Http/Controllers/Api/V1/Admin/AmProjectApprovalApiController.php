<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAmProjectApprovalRequest;
use App\Http\Requests\UpdateAmProjectApprovalRequest;
use App\Http\Resources\Admin\AmProjectApprovalResource;
use App\Models\AmProjectApproval;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AmProjectApprovalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('am_project_approval_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AmProjectApprovalResource(AmProjectApproval::all());
    }

    public function store(StoreAmProjectApprovalRequest $request)
    {
        $amProjectApproval = AmProjectApproval::create($request->all());

        return (new AmProjectApprovalResource($amProjectApproval))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AmProjectApproval $amProjectApproval)
    {
        abort_if(Gate::denies('am_project_approval_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AmProjectApprovalResource($amProjectApproval);
    }

    public function update(UpdateAmProjectApprovalRequest $request, AmProjectApproval $amProjectApproval)
    {
        $amProjectApproval->update($request->all());

        return (new AmProjectApprovalResource($amProjectApproval))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AmProjectApproval $amProjectApproval)
    {
        abort_if(Gate::denies('am_project_approval_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $amProjectApproval->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
