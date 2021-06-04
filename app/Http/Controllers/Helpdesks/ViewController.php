<?php

namespace App\Http\Controllers\Helpdesks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Helpdesks\RequestInfo;
use App\Models\Helpdesks\RequestAssign;


class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = RequestInfo::whereNotIn('request_status',["บันทึกผลการปฏิบัติงานแล้ว","ประเมินความพึงพอใจแล้ว"])->get();

        return view('helpdesks.index', [
            'requests' => $request,
        ]);
    }

    public function listAll()
    {
        $requestAll = RequestInfo::all();

        return view('helpdesks.listAll', [
            'requestAlls' => $requestAll,
        ]);
    }

    public function listByCriteria()
    {
        $requestAll = RequestInfo::all();

        return view('helpdesks.listByCriteria', [
            // 'requestAlls' => $requestAll,
        ]);
    }

    public function newRequest()
    {
        $newRequest = RequestInfo::where('request_status','=','รอมอบหมายหัวหน้างาน')->get();

        return view('helpdesks.newRequest', [
            'newRequests' => $newRequest,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('helpdesks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basics\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(RequestInfo $requestInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basics\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestInfo $requestInfo)
    {
        dd($requestInfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basics\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basics\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
