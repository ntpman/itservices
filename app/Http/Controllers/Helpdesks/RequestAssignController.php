<?php

namespace App\Http\Controllers\Helpdesks;

use App\Http\Controllers\Controller;
use App\Models\Helpdesks\RequestAssign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Helpdesks\RequestInfo;
use App\User;

class RequestAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unAssignSupervisor()
    {
        // $requestAssign = RequestAssign::where('assign_status','=','รอมอบหมายหัวหน้างาน')->get();
        $requestInfo = RequestInfo::where('request_status','=','รอมอบหมายหัวหน้างาน')->get();

        return view('helpdesks.unAssignSupervisor', [
            'requestInfos' => $requestInfo
        ]);
    }

    public function unAssignWorker()
    {
        $requestInfos = RequestInfo::all();

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

    public function assignSupervisor(Request $request, RequestAssign $requestAssign)
    {
        $requestInfo = RequestInfo::where('id','=',$request->id)->get();
        $user = User::where('position','like','%หัวหน้างาน%')->get();

        return view('helpdesks.assignSupervisor', [
            'requestInfos' => $requestInfo,
            'users' => $user,
        ]);
    }

    public function assignWorker(RequestAssign $requestAssign)
    {
        $requestInfos = RequestInfo::all();

        return view('helpdesks.assignWorker', [
            'requestInfos' => $requestInfos
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
        $addSupervisor->created_by = "หัวหน้างาน";
        $addSupervisor->save();

        $requestInfo = RequestInfo::find($request->request_info_id);
        $requestInfo->user_id = $request->input('supervisor');
        $requestInfo->request_status = "รอมอบหมายผู้ปฏิบัติงาน";
        $requestInfo->updated_by = "หัวหน้างาน";
        $requestInfo->save();

        Session::flash('success_msg', 'มอบหมายหัวหน้างานเรียบร้อย');

        return redirect('/helpdesk/unAssignSupervisor');

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
