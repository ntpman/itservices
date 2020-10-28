<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Basic\BrandModel;
use App\Model\Basic\Brand;

class BrandModelController extends Controller
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
        $allBrandModel = BrandModel::all();
        return view('basic.brand_model.index',['showAllBrandModel' => $allBrandModel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $brands = Brand::all()
            ->where('brand_status','=', 'A')
            ->pluck('brand_full_name', 'id')->toArray();

        return view('basic.brand_model.create', ['allBrand' => $brands]);
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
            'brandId' => 'required',
            'brandModelName' => 'required|unique:brand_models,brand_model_name',
        ]);

        //Add new data
        $addBrandModel = new BrandModel;
        $addBrandModel->brand_id = $request->input('brandId');
        $addBrandModel->brand_model_name = $request->input('brandModelName');
        $addBrandModel->brand_model_status = 'A';
        $addBrandModel->created_by = auth()->user()->name;
        $addBrandModel->save();

        //return index view
        return redirect('/basic/brandmodel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Basic\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Basic\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandModel $brandModel)
    {
        $brands = Brand::all()
        ->where('brand_status','=', 'A')
        ->pluck('brand_full_name', 'id')->toArray();

        return view('basic.brand_model.edit', [
            'editBrandModel' => $brandModel,
            'allBrand' => $brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Basic\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandModel $brandModel)
    {
        if ($request->input('edit-brandModelName') == 1) {
            //validate data
            $this->validate($request, [
                'brandModelName' => 'required|unique:brand_models,brand_model_name',
            ]);

            //update data
            $updateBrandModel = BrandModel::find($brandModel->id);
            $updateBrandModel->brand_model_name = $request->input('brandModelName');
            $updateBrandModel->updated_by = auth()->user()->name;
            $updateBrandModel->save();
            Session::flash('success_msg', 'แก้ไขชื่อรุ่นผลิตภัณฑ์เรียบร้อย');

            return redirect()->back();
        }

        if($request->input('edit') == 1) {

            //update data
            $updateBrandModel = BrandModel::find($brandModel->id);
            $updateBrandModel->brand_id = $request->input('brandId');
            $updateBrandModel->brand_model_status = $request->input('brandModelStatus');
            $updateBrandModel->updated_by = auth()->user()->name;
            $updateBrandModel->save();

            Session::flash('success_msg', 'บันทึกข้อมูลเรียบร้อย');
            
            //return index view
            return redirect('/basic/brandmodel');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Basic\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandModel $brandModel)
    {
        //
    }
}
