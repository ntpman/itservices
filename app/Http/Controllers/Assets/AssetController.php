<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assets\CreateAssetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Assets\Asset;

use App\Model\Basic\Type;
use App\Model\Basic\Subtype;
use App\Model\Basic\Brand;
use App\Model\Basic\BrandModel;
use App\Model\Basic\Common;
use App\Model\Basic\Usage;

use App\Model\Supplier\Supplier;

class AssetController extends Controller
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
        $assets = Asset::all();

        // return $assets;

        return view('assets.asset.index', [
            'assets' => $assets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::where('type_status', 'A')->get();
        $subtypes = Subtype::where('subtype_status', 'A')->get();
        $brands = Brand::where('brand_status', 'A')->get();
        $brandModels = BrandModel::where('brand_model_status', 'A')->get();
        $commons = Common::where('common_status', 'A')->get();
        $usages = Usage::where('usage_status', 'A')->get();
        $suppliers = Supplier::where('supplier_status', 'A')->get();
        
        return view('assets.asset.create', [
            'types' => $types,
            'subtypes' => $subtypes,
            'brands' => $brands,
            'brandModels' => $brandModels,
            'commons' => $commons,
            'usages' => $usages,
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAssetRequest $request)
    {
        // dd($request);
        // dd($request->all());

        // store in the database
        $asset = new Asset;
        $asset->type_id = $request->input('type_id');
        $asset->subtype_id = $request->input('subtype_id');
        $asset->brand_id = $request->input('brand_id');
        $asset->brand_model_id = $request->input('brand_model_id');
        $asset->common_id = $request->input('common_id');
        $asset->usage_id = $request->input('usage_id');
        $asset->supplier_id = $request->input('supplier_id');
        $asset->asset_number = $request->input('asset_number');
        $asset->asset_serial_number = $request->input('asset_serial_number');
        $asset->asset_purchase_year = $request->input('asset_purchase_year');
        $asset->asset_warranty_period = $request->input('asset_warranty_period');
        $asset->asset_recived = $request->input('asset_recived');
        $asset->asset_retired = $request->input('asset_retired');
        $asset->created_by = auth()->user()->name;

        if($asset->save()) {
            
            Session::flash('success_msg', 'บันทึกข้อมูลเรียบร้อย');

            return redirect('/assets/asset');
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
    public function edit(Asset $asset)
    {
        $types = Type::where('type_status', 'A')->get();
        $subtypes = Subtype::where('subtype_status', 'A')->get();
        $brands = Brand::where('brand_status', 'A')->get();
        $brandModels = BrandModel::where('brand_model_status', 'A')->get();
        $commons = Common::where('common_status', 'A')->get();
        $usages = Usage::where('usage_status', 'A')->get();
        $suppliers = Supplier::where('supplier_status', 'A')->get();
        
        return view('assets.asset.edit', [
            'asset' => $asset,
            'types' => $types,
            'subtypes' => $subtypes,
            'brands' => $brands,
            'brandModels' => $brandModels,
            'commons' => $commons,
            'usages' => $usages,
            'suppliers' => $suppliers,
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
        /**
         * Check Value Input Name hide 
         */
        if($request->input('edit-asset_number') == 1) {
            $request->validate([
                'asset_number' => ['required', 'string', 'max:50', 'unique:assets,asset_number'],
            ]);
            /**
             * Store in the database
             */
            Asset::where('id', $id)->update([
                'asset_number' => $request->input('asset_number'),
                'updated_by' => auth()->user()->name,
            ]);

            Session::flash('success_msg', 'แก้ไขหมายเลขครุภัณฑ์เรียบร้อย');

            return redirect()->back();
        }

        if($request->input('edit-asset_serial_number') == 1) {
            $request->validate([
                'asset_serial_number' => ['required', 'string', 'max:50', 'unique:assets,asset_serial_number'],
            ]);
            /**
             * Store in the database
             */
            Asset::where('id', $id)->update([
                'asset_serial_number' => $request->input('asset_serial_number'),
                'updated_by' => auth()->user()->name,
            ]);

            Session::flash('success_msg', 'แก้ไขหมายเลขประจำเครื่องเรียบร้อย');

            return redirect()->back();
        }

        /**
         * Check Update Asset
         */
        $request->validate([
            'type_id' => ['required', 'integer'],
            'subtype_id' => ['nullable', 'integer'],
            'brand_id' => ['required', 'integer',],
            'brand_model_id' => ['nullable', 'integer'],
            'common_id' => ['required', 'integer'],
            'usage_id' => ['required', 'integer'],
            'supplier_id' => ['required', 'integer'],
            'asset_purchase_year' => ['required', 'string', 'min:4', 'max:4'],
            'asset_warranty_period' => ['required', 'string', 'min:1', 'max:2'],
            'asset_recived' => ['required', 'date'],
            'asset_retired' => ['nullable', 'date'],
        ]);
        
        /**
         * Store in the database
         */
        Asset::where('id', $id)->update([
            'type_id' => $request->input('type_id'),
            'subtype_id' => $request->input('subtype_id'),
            'brand_id' => $request->input('brand_id'),
            'brand_model_id' => $request->input('brand_model_id'),
            'common_id' => $request->input('common_id'),
            'usage_id' => $request->input('usage_id'),
            'supplier_id' => $request->input('supplier_id'),
            'asset_purchase_year' => $request->input('asset_purchase_year'),
            'asset_warranty_period' => $request->input('asset_warranty_period'),
            'asset_recived' => $request->input('asset_recived'),
            'asset_retired' => $request->input('asset_retired'),
            'updated_by' => auth()->user()->name,
        ]);

        Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อย');

        return redirect("/assets/asset");
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
