<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Basic\CommonName;

class CommonNameController extends Controller
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
        $allCommonName = CommonName::all();
        return view('basic.common_name.index',['showAllCommonName' => $allCommonName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('basic.common_name.create');
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
            'commonName' => 'required|unique:asset_common_names,common_name',
        ]);

        //Add new data
            $addCommonName = new CommonName;
            $addCommonName->common_name = $request->input('commonName');
            $addCommonName->common_name_status = 'A';
            $addCommonName->created_by = auth()->user()->name;
            $addCommonName->save();

            Session::flash('success_msg', 'บันทึกข้อมูลชื่อครุภัณฑ์เรียบร้อย');

        //return index view
        return redirect('/basic/common_name');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\AssetModel  $assetModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function edit(CommonName $commonName)
    {
        return view('basic.common_name.edit', [
            'editCommonName' => $commonName,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\AssetModel  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommonName $commonName)
    {
        if ($request->input('_name')==='edit'){
        
            //validate data
        $this->validate($request, [
            'commonName' => 'required|unique:asset_common_names,common_name',
        ]);

        //update data
            $updateCommonName = CommonName::find($building->id);
            $updateCommonName->common_name = $request->input('commonName');
            $updateCommonName->updated_by = auth()->user()->name;
            $updateCommonName->save();

            Session::flash('success_msg', 'แก้ไขชื่อครุภัณฑ์เรียบร้อย');
        }
        else {
            $updateCommonName = CommonName::find($building->id);
            $updateCommonName->common_name_status = $request->input('commonNameStatus');
            $updateCommonName->updated_by = auth()->user()->name;
            $updateCommonName->save();

            Session::flash('success_msg', 'แก้ไขสถานะการใช้ข้อมูลเรียบร้อย');
        }

        //return index view
        return redirect('/basic/common_name');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommonName $commonName)
    {
        //
    }

}
