<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Basics\Brand;
use App\Http\Resources\Brand as BrandResource;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get brands
        $brands = Brand::orderBy('created_at', 'desc')
            ->get();
            // ->paginate(5);

        // Return collection of articles as a resource
        return BrandResource::collection($brands);
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
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            //validate date
            $this->validate($request, [
                'brand_full_name' => 'required|unique:brands,brand_full_name',
                'brand_abbr_name' => 'nullable|unique:brands,brand_abbr_name',
            ]);
            
            $brand = new Brand;
            $brand->brand_full_name = $request->input('brand_full_name');
            $brand->brand_abbr_name = $request->input('brand_abbr_name');
            $brand->brand_status = 'A';
            $brand->created_by = auth()->user()->name;
    
            if($brand->save()) {
                Session::flash('success_msg', 'บันทึกข้อมูลยี่ห้อผลิตภัณฑ์เรียบร้อย');
            }
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
        // Get brand
        $brand = Brand::findOrFail($id);

        // Return single brand as a resource
        return new BrandResource($brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // If null
        abort(404);
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
        // If null
        if (!$request->isMethod()) {
            abort(404);
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
        // If null
        abort(404);
    }
}
