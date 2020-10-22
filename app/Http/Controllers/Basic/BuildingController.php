<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Basic\Building;

class BuildingController extends Controller
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
        $allBuilding = Building::all();
        return view('basic.building.index',['showAllBuilding' => $allBuilding]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('basic.building.create');
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
            'buildingName' => 'required|unique:buildings,building_name',
        ]);

        //Add new data
            $addBuilding = new Building;
            $addBuilding->building_name = $request->input('buildingName');
            $addBuilding->building_status = 'A';
            $addBuilding->created_by = auth()->user()->name;
            $addBuilding->save();

            Session::flash('success_msg', 'บันทึกชื่ออาคารเรียบร้อย');

        //return index view
        return redirect('/basic/building');
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
    public function edit(Building $building)
    {
        return view('basic.building.edit', [
            'editBuilding' => $building,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\AssetModel  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        if ($request->input('_name')==='edit'){
        
            //validate data
        $this->validate($request, [
            'buildingName' => 'required|unique:buildings,building_name',
        ]);

        //update data
            $updateBuilding = Building::find($building->id);
            $updateBuilding->building_name = $request->input('buildingName');
            $updateBuilding->updated_by = auth()->user()->name;
            $updateBuilding->save();

            Session::flash('success_msg', 'แก้ไขชื่ออาคารเรียบร้อย');
        }
        else {
            $updateBuilding = Building::find($building->id);
            $updateBuilding->building_status = $request->input('buildingStatus');
            $updateBuilding->updated_by = auth()->user()->name;
            $updateBuilding->save();

            Session::flash('success_msg', 'แก้ไขสถานะการใช้ข้อมูลเรียบร้อย');
        }

        //return index view
        return redirect('/basic/building');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        //
    }

    public function changeStatus(Building $building)
    {
        return view('basic.building.change_status', [
            'editBuilding' => $building,
        ]);
    }

}
