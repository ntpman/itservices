<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Basic\Subtype;
use App\Model\Basic\Type;

class SubtypeController extends Controller
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
        $allSubType = Subtype::all();
        return view('basic.subtype.index',['showAllSubType' => $allSubType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $types = Type::all()
        ->where('type_status','=', 'A')
        ->pluck('type_name', 'id')->toArray();
        // return $types;

        return view('basic.subtype.create', ['allType' => $types]);
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
            'typeId' => 'required',
            'subTypeName' => 'required|unique:subtypes,subtype_name',
        ]);

        //Add new data
        $addSubType = new Subtype;
        $addSubType->type_id = $request->input('typeId');
        $addSubType->subtype_name = $request->input('subTypeName');
        $addSubType->subtype_status = 'A';
        $addSubType->created_by = auth()->user()->name;
        $addSubType->save();

        Session::flash('success_msg', 'บันทึกข้อมูลประเภทครุภัณฑ์ย่อยเรียบร้อย');
        //return index view
        return redirect('/basic/subtype');
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
    public function edit(Subtype $subtype)
    {
        $types = Type::all()
        ->where('type_status','=', 'A')
        ->pluck('type_name', 'id')->toArray();

        return view('basic.subtype.edit', [
            'editSubType' => $subtype,
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
    public function update(Request $request, Subtype $subtype)
    {
        if($request->input('edit-subTypeName') == 1) {
        
            //validate data
            $this->validate($request, [
                'subTypeName' => 'required|unique:subtypes,subtype_name',
            ]);

            //update data
            $updateModel = Subtype::find($subtype->id);
            $updateModel->subtype_name = $request->input('subTypeName');
            $updateModel->updated_by = auth()->user()->name;
            $updateModel->save();

<<<<<<< HEAD
            Session::flash('success_msg', 'บันทึกข้อมูลประเภทครุภัณฑ์ย่อยเรียบร้อย');
=======
            Session::flash('success_msg', 'แก้ไขชื่อรุ่นผลิตภัณฑ์เรียบร้อย');
            
            return redirect()->back();
>>>>>>> e8275cf437606d269707a3316971e8f6226ef0b2
        }

        if($request->input('edit') == 1) {
            //update data
            $updateModel = Subtype::find($subtype->id);
            $updateModel->type_id = $request->input('typeId');
            $updateModel->subtype_status = $request->input('subTypeStatus');
            $updateModel->updated_by = auth()->user()->name;
            $updateModel->save();
<<<<<<< HEAD

            Session::flash('success_msg', 'แก้ไขสถานะการใช้ข้อมูลเรียบร้อย');
        }
=======
>>>>>>> e8275cf437606d269707a3316971e8f6226ef0b2

            Session::flash('success_msg', 'บันทึกข้อมูลประเภทครุภัณฑ์ย่อยเรียบร้อย');
            //return index view
            return redirect('/basic/subtype');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subtype $subtype)
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
