<?php

namespace App\Http\Controllers\Basics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Basics\BrandModel;
use App\Models\Basics\Brand;

class BrandModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandModels = BrandModel::all();

        return view('basics.brandmodel.index', [
            'showAllBrandModel' => $brandModels
        ]);
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

        return view('basics.brandmodel.create', [
            'allBrand' => $brands
        ]);
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
        return redirect('/basics/brandmodel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basics\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basics\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandModel $brandModel)
    {
        $brands = Brand::all()
        ->where('brand_status','=', 'A')
        ->pluck('brand_full_name', 'id')->toArray();

        return view('basics.brandmodel.edit', [
            'editBrandModel' => $brandModel,
            'allBrand' => $brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basics\BrandModel  $brandModel
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
            Session::flash('success_msg', '?????????????????????????????????????????????????????????????????????????????????????????????');

            return redirect()->back();
        }

        if ($request->input('edit') == 1) {

            //update data
            $updateBrandModel = BrandModel::find($brandModel->id);
            $updateBrandModel->brand_id = $request->input('brandId');
            $updateBrandModel->brand_model_status = $request->input('brandModelStatus');
            $updateBrandModel->updated_by = auth()->user()->name;
            $updateBrandModel->save();

            Session::flash('success_msg', '???????????????????????????????????????????????????????????????');
            
            //return index view
            return redirect('/basics/brandmodel');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basics\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandModel $brandModel)
    {
        //
    }
}
