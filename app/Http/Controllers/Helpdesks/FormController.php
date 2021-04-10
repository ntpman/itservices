<?php

namespace App\Http\Controllers\Helpdesks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('helpdesks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basics.brand.create');
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
            'brandFullName' => 'required|unique:brands,brand_full_name',
            'brandAbbrName' => 'nullable|unique:brands,brand_abbr_name',
        ]);

        //Add new data
        $addBrand = new Brand;
        $addBrand->brand_full_name = $request->input('brandFullName');
        $addBrand->brand_abbr_name = $request->input('brandAbbrName');
        $addBrand->brand_status = 'A';
        $addBrand->created_by = auth()->user()->name;
        $addBrand->save();

        Session::flash('success_msg', 'บันทึกข้อมูลยี่ห้อผลิตภัณฑ์เรียบร้อย');

        return redirect('/basics/brand');
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
