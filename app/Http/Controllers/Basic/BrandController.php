<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Basic\Brand;

class BrandController extends Controller
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
        $allBrand = Brand::all();
        return view('basic.brand.index',['showAllBrand' => $allBrand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic.brand.create');
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
        ]);

        //Add new data
            $addBrand = new Brand;
            $addBrand->brand_full_name = $request->input('brandFullName');
            $addBrand->brand_abbr_name = $request->input('brandAbbrName');
            $addBrand->brand_status = 'A';
            $addBrand->created_by = auth()->user()->name;
            $addBrand->save();

        //return index view
        return redirect('/basic/brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $editBrand = Brand::find($brand->id);
        return view('basic.brand.edit',['editBrand' => $editBrand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //validate data

        //update data
            $updateBrand = Brand::find($brand->id);
            $updateBrand->brand_full_name = $request->input('brandFullName');
            $updateBrand->brand_abbr_name = $request->input('brandAbbrName');
            $updateBrand->brand_status = $request->input('brandStatus');
            $updateBrand->updated_by = auth()->user()->name;
            $updateBrand->save();

        //return index view
        return redirect('/basic/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
