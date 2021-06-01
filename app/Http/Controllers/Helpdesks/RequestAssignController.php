<?php

namespace App\Http\Controllers\Helpdesks;

use App\Http\Controllers\Controller;
use App\Models\Helpdesks\RequestAssign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use App\Models\Helpdesks\RequestInfo;
use App\User;

class RequestAssignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unAssignSupervisor()
    {
        $requestInfo = RequestInfo::where('request_status','=','รอมอบหมายหัวหน้างาน')->get();

        return view('helpdesks.unAssignSupervisor', [
            'requestInfos' => $requestInfo
        ]);
    }

    public function unAssignWorker()
    {
        $requestInfos = RequestInfo::where('request_status','=','รอมอบหมายผู้ปฏิบัติงาน')
                        ->where('user_id','=', Auth()->user()->id)->get();

        return view('helpdesks.unAssignWorker', [
            'requestInfos' => $requestInfos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Helpdesks\RequestAssign  $requestAssign
     * @return \Illuminate\Http\Response
     */
    public function show(RequestAssign $requestAssign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Helpdesks\RequestAssign  $requestStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestAssign $requestAssign)
    {
        //
    }

    public function assignSupervisor(Request $request)
    {
        $requestInfo = RequestInfo::where('id','=',$request->id)->get();
        $user = User::where('position','like','%หัวหน้างาน%')->get();

        return view('helpdesks.assignSupervisor', [
            'requestInfos' => $requestInfo,
            'users' => $user,
        ]);
    }

    public function assignWorker(Request $request)
    {
        $requestInfos = RequestInfo::where('id','=',$request->id)->get();
        $supervisor = Str::substr($request->user()->position,10);
        $user = User::where('position','like','%'.$supervisor.'%')->get();

        return view('helpdesks.assignWorker', [
            'requestInfos' => $requestInfos,
            'users' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Helpdesks\RequestAssign  $requestAssign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    public function saveSupervisor(Request $request)
    {
        $addSupervisor = new RequestAssign;
        $addSupervisor->request_info_id = $request->request_info_id;
        $addSupervisor->user_id = $request->input('supervisor');
        $addSupervisor->assign_status = "รอมอบหมายผู้ปฏิบัติงาน";
        $addSupervisor->assign_date = date('Y-m-d');
        $addSupervisor->created_by = auth()->user()->name;
        $addSupervisor->save();

        $requestInfo = RequestInfo::find($request->request_info_id);
        $requestInfo->user_id = $request->input('supervisor');
        $requestInfo->request_status = "รอมอบหมายผู้ปฏิบัติงาน";
        $requestInfo->updated_by = auth()->user()->name;
        $requestInfo->save();

        Session::flash('success_msg', 'มอบหมายหัวหน้างานเรียบร้อย');

        return redirect('/helpdesk/unAssignSupervisor');

    }


    public function saveWorker(Request $request)
    {
        $addWorker = new RequestAssign;
        $addWorker->request_info_id = $request->request_info_id;
        $addWorker->user_id = $request->input('worker');
        $addWorker->assign_status = "อยู่ระหว่างดำเนินงาน";
        $addWorker->assign_date = date('Y-m-d');
        $addWorker->created_by = auth()->user()->name;
        $addWorker->save();

        $requestInfo = RequestInfo::find($request->request_info_id);
        $requestInfo->user_id = $request->input('worker');
        $requestInfo->request_status = "อยู่ระหว่างดำเนินงาน";
        $requestInfo->updated_by = auth()->user()->name;
        $requestInfo->save();

        Session::flash('success_msg', 'มอบหมายผู้ปฏิบัติงานเรียบร้อย');

        return redirect('/helpdesk/unAssignWorker');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Helpdesks\RequestAssign  $requestAssign
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestAssign $requestAssign)
    {
        //
    }
}
