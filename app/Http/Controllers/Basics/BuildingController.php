<?php

namespace App\Http\Controllers\Basics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Basics\Building;

class BuildingController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBuilding = Building::all();
        return view('basics.building.index',['showAllBuilding' => $allBuilding]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('basics.building.create');
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
            'buildingFullName' => 'required|unique:buildings,building_full_name',
            'buildingAbbrName' => 'required|unique:buildings,building_abbr_name',
        ]);

        //Add new data
        $addBuilding = new Building;
        $addBuilding->building_full_name = $request->input('buildingFullName');
        $addBuilding->building_abbr_name = $request->input('buildingAbbrName');
        $addBuilding->building_status = 'A';
        $addBuilding->created_by = auth()->user()->name;
        $addBuilding->save();

        Session::flash('success_msg', 'บันทึกชื่ออาคารเรียบร้อย');

        //return index view
        return redirect('/basics/building');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Basic\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Basic\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        return view('basics.building.edit', [
            'editBuilding' => $building,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Basic\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        if ($request->input('edit-buildingFullName') == 1) {
            //validate data
            $this->validate($request, [
                'buildingFullName' => 'required|unique:buildings,building_full_name',
            ]);

            //update data
            $updateBuilding = Building::find($building->id);
            $updateBuilding->building_full_name = $request->input('buildingName');
            $updateBuilding->updated_by = auth()->user()->name;
            $updateBuilding->save();

            Session::flash('success_msg', 'แก้ไขชื่อเต็มของอาคารเรียบร้อย');

            return redirect()->back();
        }

        if ($request->input('edit-buildingAbbrName') == 1) {
            //validate data
            $this->validate($request, [
                'buildingAbbrName' => 'required|unique:buildings,building_abbr_name',
            ]);

            //update data
            $updateBuilding = Building::find($building->id);
            $updateBuilding->building_abbr_name = $request->input('buildingAbbrName');
            $updateBuilding->updated_by = auth()->user()->name;
            $updateBuilding->save();

            Session::flash('success_msg', 'แก้ไขชื่อย่อของอาคารเรียบร้อย');

            return redirect()->back();
        }
        if ($request->input('edit') == 1) {

            $updateBuilding = Building::find($building->id);
            $updateBuilding->building_status = $request->input('buildingStatus');
            $updateBuilding->updated_by = auth()->user()->name;
            $updateBuilding->save();

            Session::flash('success_msg', 'แก้ไขสถานะการใช้ข้อมูลเรียบร้อย');

            //return index view
            return redirect('/basics/building');
        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Basic\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        //
    }
}
