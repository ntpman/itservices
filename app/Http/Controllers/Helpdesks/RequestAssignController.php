<?php

namespace App\Http\Controllers\Helpdesks;

use App\Http\Controllers\Controller;
use App\Models\Helpdesks\RequestAssign;
use Illuminate\Http\Request;

use App\Models\Helpdesks\RequestInfo;

class RequestAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unAssignSupervisor()
    {
        $requestInfos = RequestInfo::all();

        return view('helpdesks.unAssignSupervisor', [
            'requestInfos' => $requestInfos
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

    public function assignSupervisor(RequestAssign $requestAssign)
    {
        $requestInfos = RequestInfo::all();

        return view('helpdesks.assignSupervisor', [
            'requestInfos' => $requestInfos
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
    public function update(Request $request, RequestAssign $requestAssign)
    {
        //
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
