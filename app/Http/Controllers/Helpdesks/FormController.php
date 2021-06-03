<?php

namespace App\Http\Controllers\Helpdesks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Helpdesks\RequestInfo;
use App\Models\Helpdesks\RequestAssign;


class FormController extends Controller
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
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('helpdesks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //validate date
        $this->validate($request, [
            'request_number' => 'required|unique:request_infos,request_number',
            // 'brandAbbrName' => 'nullable|unique:brands,brand_abbr_name',
        ]);

        //Add new data
        $addNewRequest = new RequestInfo;
        $createDate = $request->input('request_date');
        $addNewRequest->request_date = date('Y-m-d', strtotime($createDate));
        $addNewRequest->org_responsible = $request->input('org_responsible');
        $addNewRequest->chain_of_command = $request->input('chain_of_command');
        $addNewRequest->request_owner = $request->input('request_owner');
        $addNewRequest->division = $request->input('division');
        $addNewRequest->sub_division = $request->input('sub_division');
        $addNewRequest->building = $request->input('building');
        $addNewRequest->floor = $request->input('floor');
        $addNewRequest->room = $request->input('room');
        $addNewRequest->phone = $request->input('phone');
        $addNewRequest->email = $request->input('email');
        $addNewRequest->request_type = $request->input('request_type');
        $addNewRequest->request_objective = $request->input('request_objective');
        $addNewRequest->inv_number = $request->input('inv_number');
        $addNewRequest->request_detail = $request->input('request_detail');
        $recivedDate = $request->input('request_recieved');
        $addNewRequest->request_recieved = date('Y-m-d', strtotime($recivedDate));
        $addNewRequest->request_number = $request->input('request_number');
        $addNewRequest->user_id = "2";
        $addNewRequest->request_status = "รอมอบหมายหัวหน้างาน";
        $fileName = date('Ymdhis').'.'.request()->file('request_file')->getClientOriginalExtension();
        $addNewRequest->request_file = request()->file('request_file')->move('storage/images', $fileName);
        $addNewRequest->created_by = auth()->user()->name;
        $addNewRequest->save();

        //Add request assignment
        $currentRequest = RequestInfo::all()->last();
        $addRequestAssing = new RequestAssign;
        $addRequestAssing->request_info_id = $currentRequest->id;
        $addRequestAssing->user_id = 2;
        $addRequestAssing->assign_status = "รอมอบหมายหัวหน้างาน"; 
        $addRequestAssing->assign_date = date('Y-m-d', strtotime($recivedDate));
        $addRequestAssing->created_by = auth()->user()->name;
        $addRequestAssing->save();

        Session::flash('success_msg', 'บันทึกข้อมูลใบแจ้งปัญหาเรียบร้อย');

        return redirect('/helpdesk/listAll');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basics\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basics\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basics\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basics\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
