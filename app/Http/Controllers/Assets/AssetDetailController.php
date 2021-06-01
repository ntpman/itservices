<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assets\CreateDetailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Assets\AssetDetail;

class AssetDetailController extends Controller
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
    public function store(CreateDetailRequest $request)
    {
        /**
         * store in the database
         */
        $assetDetail = new AssetDetail;
        $assetDetail->asset_id = $request->input('asset_id');
        $assetDetail->asset_detail_description = $request->input('asset_detail_description');
        $assetDetail->asset_detail_amont = $request->input('asset_detail_amont');
        $assetDetail->asset_detail_comment = $request->input('asset_detail_comment');
        $assetDetail->created_by = auth()->user()->name;

        if($assetDetail->save()) {
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
    public function edit(AssetDetail $detail)
    {
        return view ('assets.detail.edit', [
            'assetDetail' => $detail
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
            'asset_detail_description' => ['required', 'string'],
            'asset_detail_amont' => ['required', 'string', 'max:50'],
            'asset_detail_comment' => ['nullable', 'string'],
        ]);
        /**
         * Store in the database
         */
        $assetDetail = AssetDetail::find($id);
        $assetDetail->asset_detail_description = $request->input('asset_detail_description');
        $assetDetail->asset_detail_amont = $request->input('asset_detail_amont');
        $assetDetail->asset_detail_comment = $request->input('asset_detail_comment');
        $assetDetail->updated_by = auth()->user()->name;
        
        if($assetDetail->save()){
            
            Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อย');

            return redirect("/assets/asset/$assetDetail->asset_id");
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
