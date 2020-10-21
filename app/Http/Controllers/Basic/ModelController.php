<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Basic\AssetModel;
use App\Model\Basic\Brand;

class ModelController extends Controller
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
        $allModel = AssetModel::all();
        return view('basic.model.index',['showAllModel' => $allModel]);
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
        return view('basic.model.create', ['allBrand' => $brands]);
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
            'brandFullName' => 'required',
            'modelName' => 'required|unique:models,model_name',
        ]);

        //Add new data
            $addModel = new AssetModel;
            $addModel->brand_id = $request->input('brandFullName');
            $addModel->model_name = $request->input('modelName');
            $addModel->model_status = 'A';
            $addModel->created_by = auth()->user()->name;
            $addModel->save();

        //return index view
        return redirect('/basic/model');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function show(Model $model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $model)
    {
        $editBrand = Model::find($brand->id);
        return view('basic.model.edit',['editBrand' => $editBrand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $model)
    {
        //validate data

        //update data
            $updateBrand = Model::find($model->id);
            $updateBrand->brand_full_name = $request->input('brandFullName');
            $updateBrand->brand_abbr_name = $request->input('brandAbbrName');
            $updateBrand->brand_status = $request->input('brandStatus');
            $updateBrand->updated_by = 'UPDATE';
            $updateBrand->save();

        //return index view
        return redirect('/basic/model');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        //
    }
}
