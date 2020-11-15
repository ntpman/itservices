<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\CreateLocationRequest;

use App\Models\Basics\Building;

use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLocationRequest $request)
    {
        $location = new Location;
        $location->asset_id = $request->input('asset_id');
        $location->building_id = $request->input('building_id');
        $location->location_floor = $request->input('location_floor');
        $location->location_room = $request->input('location_room');
        $location->created_by = auth()->user()->name;

        if($location->save()) {
            Session::flash('success_msg', 'เพิ่มข้อมูลเรียบร้อย');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buildings = Building::where('building_status', 'A')->get();

        $location = Location::FindOrFail($id);

        // return $location;

        return view('assets.asset.location.edit', [
            'location' => $location,
            'buildings' => $buildings,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'building_id' => ['required', 'integer',],
            'location_floor' => ['required', 'string', 'max:25'],
            'location_room' => ['required', 'string', 'max:50'],
        ]);
        /**
         * Store in the database
         */
        $location = Location::find($id);
        $location->building_id = $request->input('building_id');
        $location->location_floor = $request->input('location_floor');
        $location->location_room = $request->input('location_room');
        $location->updated_by = auth()->user()->name;
        
        if($location->save()){
            
            Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อย');

            return redirect("/assets/asset/$location->asset_id");
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
