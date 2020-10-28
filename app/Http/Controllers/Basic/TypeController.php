<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Basic\Type;

class TypeController extends Controller
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
        $allType = Type::all();
        return view('basic.type.index',['showAllType' => $allType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('basic.type.create');
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
        return redirect('/basic/type');
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
        return view('basic.type.edit', [
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
        if ($request->input('_name') === 'edit'){
        
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
        }
        else {
            $updateType = Type::find($type->id);
            $updateType->type_status = $request->input('typeStatus');
            $updateType->updated_by = auth()->user()->name;
            $updateType->save();

            Session::flash('success_msg', 'แก้ไขสถานะการใช้ข้อมูลเรียบร้อย');
        }

        //return index view
        return redirect('/basic/type');
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

    public function changeStatus(Type $type)
    {
        return view('basic.type.change_status', [
            'editType' => $type,
        ]);
    }

}
