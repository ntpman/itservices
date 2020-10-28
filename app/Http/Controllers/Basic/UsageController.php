<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Basic\Usage;

class UsageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $allUsage = Usage::all();
        return view('basic.usage.index',['showAllUsage' => $allUsage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic.usage.create');
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
            'usageName' => 'required|unique:usages,usage_name',
        ]);

        //Add new data
        $addUsage = new Usage;
        $addUsage->usage_name = $request->input('usageName');
        $addUsage->usage_status = 'A';
        $addUsage->created_by = auth()->user()->name;
        $addUsage->save();

        Session::flash('success_msg','บันทึกข้อมูลการใช้งานครุภัณฑ์เรียบร้อย');

        //return index view
        return redirect('/basic/usage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Basic\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function show(Usage $usage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Basic\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function edit(Usage $usage)
    {
        return view('basic.usage.edit',['editUsage' => $usage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Basic\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usage $usage)
    {
        if($request->input('edit-usageName') == 1) {
            //validate data
            $this->validate($request, [
                'usageName' => 'required|unique:usages,usage_name',
            ]);

            //update data
            $updateUsage = Usage::find($usage->id);
            $updateUsage->usage_name = $request->input('usageName');
            $updateUsage->updated_by = auth()->user()->name;
            $updateUsage->save();

            Session::flash('success_msg','แก้ไขชื่อการใช้งานครุภัณฑ์เรียบร้อย');

            return redirect()->back();
        }

        if ($request->input('edit') == 1) {
            //update data
            $updateUsage = Usage::find($usage->id);
            $updateUsage->usage_status = $request->input('usageStatus');
            $updateUsage->updated_by = auth()->user()->name;
            $updateUsage->save();

<<<<<<< HEAD
            Session::flash('success_msg','แก้ไขสถานะการใช้งานเรียบร้อย');
=======
            Session::flash('success_msg','แก้ไขสถานะการใช้งานครุภัณฑ์เรียบร้อย');
            //return index view
            return redirect('/basic/usage');
>>>>>>> e8275cf437606d269707a3316971e8f6226ef0b2
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Basic\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usage $usage)
    {
        //
    }
}
