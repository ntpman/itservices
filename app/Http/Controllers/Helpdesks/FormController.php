<?php

namespace App\Http\Controllers\Helpdesks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Helpdesks\RequestInfo;


class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestInfos = RequestInfo::all();

        return view('helpdesks.index', [
            'requestInfos' => $requestInfos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('helpdesks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // dd($request->request_date,
        // $request->director,
        // $request->name,
        // $request->division,
        // $request->sub_division,
        // $request->building,
        // $request->floor,
        // $request->room,
        // $request->phone,
        // $request->email,
        // $request->request_type,
        // $request->request_objective,
        // $request->inv_number,
        // $request->request_detail);

        //validate date
        // $this->validate($request, [
        //     'brandFullName' => 'required|unique:brands,brand_full_name',
        //     'brandAbbrName' => 'nullable|unique:brands,brand_abbr_name',
        // ]);

        //Add new data
        $addNewRequest = new RequestInfo;
        $addNewRequest->request_date = $request->input('request_date');
        $addNewRequest->director = $request->input('director');
        $addNewRequest->document_route = $request->input('document_route');
        $addNewRequest->request_owner = $request->input('request_owner');
        $addNewRequest->division = $request->input('division');
        $addNewRequest->sub_division = $request->input('sub_division');
        $addNewRequest->building = $request->input('building');
        $addNewRequest->floor = $request->input('floor');
        $addNewRequest->room = $request->input('room');
        $addNewRequest->phone = $request->input('phone');
        $addNewRequest->email = $request->input('email');
        $addNewRequest->request_type = $request->input('request_type');
        $addNewRequest->request_objective = $request->input('request_objective');
        $addNewRequest->inv_number = $request->input('inv_number');
        $addNewRequest->request_detail = $request->input('request_detail');
        $addNewRequest->request_recieved = $request->input('request_recieved');
        $addNewRequest->request_number = $request->input('request_number');
        $addNewRequest->request_responsed = "หก.ทส.";
        $addNewRequest->request_status = "รอมอบหมายงาน";
        $fileName = date('Ymdhis').'.'.request()->file('request_file')->getClientOriginalExtension();
        $addNewRequest->request_file = request()->file('request_file')->move('storage/images', $fileName);
        $addNewRequest->created_by = "ทดสอบ";
        $addNewRequest->save();

        Session::flash('success_msg', 'บันทึกข้อมูลใบแจ้งปัญหาเรียบร้อย');

        return redirect('/helpdesk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basics\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basics\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('basics.brand.edit', [
            'editBrand' => $brand
        ]);
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
        /**
         * Check Set Value: 1 => true
         */
        if ($request->input('edit-brandStatus') == 1) {
            //update data
            $updateBrand = Brand::find($brand->id);
            $updateBrand->brand_status = $request->input('brandStatus');
            $updateBrand->updated_by = auth()->user()->name;
            $updateBrand->save();

            Session::flash('success_msg', 'แก้ไขสถานะยี่ห้อผลิตภัณฑ์เรียบร้อย');
            //return index view
            return redirect('/basics/brand');
        }

        if ($request->input('edit-brandFullName') == 1) {
            //validate data
            $this->validate($request, [
                'brandFullName' => 'required|unique:brands,brand_full_name',
            ]);
            //update data
            $updateBrand = Brand::find($brand->id);
            $updateBrand->brand_full_name = $request->input('brandFullName');
            $updateBrand->updated_by = auth()->user()->name;
            $updateBrand->save();
            Session::flash('success_msg', 'แก้ไขชื่อเต็มยี่ห้อผลิตภัณฑ์เรียบร้อย');
            //return index view
            return redirect()->back();
        }
        
        if ($request->input('edit-brandAbbrName') == 1) {
            //validate data
            $this->validate($request, [
                'brandAbbrName' => 'nullable|unique:brands,brand_abbr_name',
            ]);
            //update data
            $updateBrand = Brand::find($brand->id);
            $updateBrand->brand_abbr_name = $request->input('brandAbbrName');
            $updateBrand->updated_by = auth()->user()->name;
            $updateBrand->save();
            Session::flash('success_msg', 'แก้ไขชื่อย่อยี่ห้อผลิตภัณฑ์เรียบร้อย');
            //return index view
            return redirect()->back();
        }
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
