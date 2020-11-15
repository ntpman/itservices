<?php

namespace App\Http\Controllers\Basics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Basics\Usage;

class UsageController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsage = Usage::all();
        return view('basics.usage.index',['showAllUsage' => $allUsage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basics.usage.create');
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
        return redirect('/basics/usage');
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
        return view('basics.usage.edit',['editUsage' => $usage]);
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
        if ($request->input('edit-usageName') == 1) {
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

        if ($request->input('edit-usageStatus') == 1) {
            //update data
            $updateUsage = Usage::find($usage->id);
            $updateUsage->usage_status = $request->input('usageStatus');
            $updateUsage->updated_by = auth()->user()->name;
            $updateUsage->save();

            Session::flash('success_msg','แก้ไขสถานะการใช้งานครุภัณฑ์เรียบร้อย');
            //return index view
            return redirect('/basics/usage');
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
