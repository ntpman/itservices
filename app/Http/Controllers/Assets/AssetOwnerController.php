<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assets\CreateOwnerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Assets\AssetOwner;

class AssetOwnerController extends Controller
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
    public function store(CreateOwnerRequest $request)
    {
        /**
         * store in the database
         */
        $assetOwner = new AssetOwner;
        $assetOwner->asset_id = $request->input('asset_id');
        $assetOwner->asset_owner_name = $request->input('asset_owner_name');
        $assetOwner->asset_owner_started = $request->input('asset_owner_started');
        $assetOwner->asset_owner_ended = $request->input('asset_owner_ended');
        $assetOwner->created_by = auth()->user()->name;

        if($assetOwner->save()) {
            Session::flash('success_msg', 'บันทึกข้อมูลเรียบร้อย');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOwnerRequest $request, $id)
    {
        /**
         * Store in the database
         */
        AssetOwner::where('id', $id)->update([
            'asset_owner_name' => $request->input('asset_owner_name'),
            'asset_owner_started' => $request->input('asset_owner_started'),
            'asset_owner_ended' => $request->input('asset_owner_ended'),
            'updated_by' => auth()->user()->name,
        ]);

        Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อย');

        return redirect()->back();
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
