<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Basic\Subtype;
use App\Model\Basic\Type;

class SubTypeController extends Controller
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
        $allSubType = SubType::all();
        return view('basic.sub_type.index',['showAllSubType' => $allSubType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $types = Type::all()
            ->where('asset_type_status','=', 'A')
            ->pluck('asset_type_name', 'id')->toArray();

        return view('basic.sub_type.create', ['allType' => $types]);
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
            'typeName' => 'required',
            'subTypeName' => 'required|unique:asset_subtypes,subtype_name',
        ]);

        //Add new data
            $addSubType = new SubType;
            $addSubType->asset_type_id = $request->input('typeName');
            $addSubType->subtype_name = $request->input('subTypeName');
            $addSubType->subtype_status = 'A';
            $addSubType->created_by = auth()->user()->name;
            $addSubType->save();

        //return index view
        return redirect('/basic/sub_type');
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
    public function edit(SubType $subType)
    {
        $types = Type::all()
        ->where('asset_type_status','=', 'A')
        ->pluck('asset_type_name', 'id')->toArray();

        return view('basic.sub_type.edit', [
            'editSubType' => $subType,
            'allType' => $types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\AssetModel  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubType $subType)
    {
        if ($request->input('_name')==='edit'){
        
            //validate data
        $this->validate($request, [
            'subTypeName' => 'required|unique:asset_subtypes,subtype_name',
        ]);

        //update data
            $updateModel = SubType::find($subType->id);
            $updateModel->asset_type_id = $request->input('typeName');
            $updateModel->subtype_name = $request->input('subTypeName');
            $updateModel->updated_by = auth()->user()->name;
            $updateModel->save();

            Session::flash('success_msg', 'บันทึกข้อมูลประเภทครุภัณฑ์ย่อยเรียบร้อย');
        }
        else {
            $updateModel = SubType::find($subType->id);
            $updateModel->subtype_status = $request->input('subTypeStatus');
            $updateModel->updated_by = auth()->user()->name;
            $updateModel->save();

            Session::flash('success_msg', 'แก้ไขสถานะการใช้ข้อมูลเรียบร้อย');
        }

        //return index view
        return redirect('/basic/sub_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubType $subType)
    {
        //
    }

    public function changeStatus(SubType $subType)
    {
        $types = Type::all()
        ->where('asset_type_status','=', 'A')
        ->pluck('asset_type_name', 'id')->toArray();

        return view('basic.sub_type.change_status', [
            'editSubType' => $subType,
            'allType' => $types,
        ]);
    }

}
