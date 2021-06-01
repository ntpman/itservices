<?php

namespace App\Http\Controllers\Basics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Basics\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allType = Type::all();
        return view('basics.type.index',['showAllType' => $allType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('basics.type.create');
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
            'typeName' => 'required|unique:types,type_name',
        ]);

        //Add new data
        $addType = new Type;
        $addType->type_name = $request->input('typeName');
        $addType->type_status = 'A';
        $addType->created_by = auth()->user()->name;
        $addType->save();

        Session::flash('success_msg', 'บันทึกข้อมูลประเภทครุภัณฑ์เรียบร้อย');

        //return index view
        return redirect('/basics/type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Basic\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Basic\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('basics.type.edit', [
            'editType' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Basic\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        if ($request->input('edit-typeName') == 1) {
            //validate data
            $this->validate($request, [
                'typeName' => 'required|unique:types,type_name',
            ]);

            //update data
            $updateType = Type::find($type->id);
            $updateType->type_name = $request->input('typeName');
            $updateType->updated_by = auth()->user()->name;
            $updateType->save();

            Session::flash('success_msg', 'แก้ไขประเภทครุภัณฑ์เรียบร้อย');

            return redirect()->back();
        }
        
        if ($request->input('edit-typeStatus') == 1) {

            $updateType = Type::find($type->id);
            $updateType->type_status = $request->input('typeStatus');
            $updateType->updated_by = auth()->user()->name;
            $updateType->save();

            Session::flash('success_msg', 'แก้ไขสถานะการใช้ข้อมูลเรียบร้อย');

            //return index view
            return redirect('/basics/type');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Basic\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
}
