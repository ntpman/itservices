<?php

namespace App\Http\Controllers\Basics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Basics\Common;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCommon = Common::all();
        return view('basics.common.index',['showAllCommon' => $allCommon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('basics.common.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate date
        $this->validate($request, [
            'commonName' => 'required|unique:commons,common_name',
        ]);

        //Add new data
        $addCommon = new Common;
        $addCommon->common_name = $request->input('commonName');
        $addCommon->common_status = 'A';
        $addCommon->created_by = auth()->user()->name;
        $addCommon->save();

        Session::flash('success_msg', 'บันทึกข้อมูลชื่อครุภัณฑ์เรียบร้อย');

        //return index view
        return redirect('/basics/common');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Basic\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Basic\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function edit(Common $common)
    {
        return view('basics.common.edit', [
            'editCommon' => $common,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Basic\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Common $common)
    {
        if ($request->input('edit-commonName') == 1) {
            //validate data
            $this->validate($request, [
                'commonName' => 'required|unique:commons,common_name',
            ]);

            //update data
            $updateCommon = Common::find($common->id);
            $updateCommon->common_name = $request->input('commonName');
            $updateCommon->updated_by = auth()->user()->name;
            $updateCommon->save();

            Session::flash('success_msg', 'แก้ไขชื่อครุภัณฑ์เรียบร้อย');
            //return index view
            return redirect()->back();
        }

        if ($request->input('edit-commonStatus') == 1) {
            $updateCommon = Common::find($common->id);
            $updateCommon->common_status = $request->input('commonStatus');
            $updateCommon->updated_by = auth()->user()->name;
            $updateCommon->save();

            Session::flash('success_msg', 'แก้ไขสถานะการใช้ข้อมูลเรียบร้อย');
            //return index view
            return redirect('/basics/common');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Basic\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function destroy(Common $common)
    {
        //
    }

}
