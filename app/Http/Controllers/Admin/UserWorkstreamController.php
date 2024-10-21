<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gate, DB;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Workstream;
use App\Models\WorkstreamUser;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UpdateUserWorkstreamRequest;
use App\Http\Requests\StoreUserWorkstreamRequest;

class UserWorkstreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_workstream_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workstreamData = WorkstreamUser::join('asmita_arp_db.workstreams', 'asmita_arp_db.workstream_users.workstream_id', 'asmita_arp_db.workstreams.id')->select('user_id', DB::raw("STRING_AGG ( asmita_arp_db.workstreams.workstream, ',') as workstreamdata"))->groupBy('user_id')->get();

        return view('admin.userWorkstream.index', compact('workstreamData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user_workstream_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workstreams = Workstream::pluck('workstream', 'id');
        $users = User::select(
            DB::raw("CONCAT(name,' - ',email) AS name"),
            'id'
        )
            ->pluck('name', 'id');
        return view('admin.userWorkstream.create', compact('users', 'workstreams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = User::find($input['user']);
        $message = '';

        if ($user && $user->count()) {
            // check if records for user id is already exists
            $alreadyExists = WorkstreamUser::where('user_id', $input['user'])->count();
            if ($alreadyExists) {
                $message = "Workstream is already mapped to user.";
                return back()->withInput()->with('message', $message);
            } else {
                $userWorkstreams = [];
                foreach ($input['workstreams'] as $key => $value) {
                    $userWorkstreams[] = [
                        'user_id' => $user->id,
                        'workstream_id' => $value,
                        'created_by_id' => auth()->user()->id,
                        'updated_by_id' => auth()->user()->id,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ];
                }

                $insertResult = WorkstreamUser::insert($userWorkstreams);

                if ($insertResult) {
                    $message = "Workstream and user mapping done successfully";
                    return redirect()->route('admin.user-workstream.index')->with('message', $message);
                }
            }
        } else {
            $message = "User not found.";
            return back()->withInput()->with('message', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        abort_if(Gate::denies('user_workstream_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $workstreams = Workstream::pluck('workstream', 'id');
        $userWorkstreams = WorkstreamUser::where('user_id', $id)->get();
        $user = User::find($id);
        return view('admin.userWorkstream.edit', compact('user', 'workstreams', 'userWorkstreams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserWorkstreamRequest $request, $userId)
    {
        $input = $request->all();
        
        $userWorkstreams = [];
        foreach ($input['workstreams'] as $key => $value) {
            $userWorkstreams[] = [
                'user_id' => $userId,
                'workstream_id' => $value,
                'updated_by_id' => auth()->user()->id,
                'created_by_id' => auth()->user()->id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }

        $workstreamuser = WorkstreamUser::upsert($userWorkstreams, ['user_id', 'workstream_id'], ['updated_by_id', 'updated_at']);

        // delete data if is there any
        $addedWorkstreams = WorkstreamUser::where("user_id",$userId)->select('workstream_id')->get()->toArray();
        if(!empty($addedWorkstreams)){
            $addedWorkstreams = array_column($addedWorkstreams,'workstream_id');
            $tobeDeleted = array_diff($addedWorkstreams,$input['workstreams']);
            if(!empty($tobeDeleted)){
                WorkstreamUser::where("user_id",$userId)->whereIn('workstream_id',$tobeDeleted)->delete();
            }
        }
        return redirect()->route('admin.user-workstream.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkstreamUser $workstreamUser, $id)
    {
        $workstreamUser=WorkstreamUser::where('user_id',$id)->delete($id);
        return back()->with('message','Deleted Successfully');
    }
}
