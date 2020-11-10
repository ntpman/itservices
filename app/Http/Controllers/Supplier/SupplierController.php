<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSupplierRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Supplier\Supplier;

class SupplierController extends Controller
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
        $suppliers = Supplier::all();

        // return $suppliers;

        return view('supplier.index', [
            'suppliers' => $suppliers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create', [
            ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupplierRequest $request)
    {
        // return $request->all();

        /**
         * Store in the database
         */
        $supplier = new Supplier;
        $supplier->supplier_name = $request->input('supplier_name');
        $supplier->supplier_address = $request->input('supplier_address');
        $supplier->supplier_subdistrict_id = $request->input('supplier_subdistrict_id');
        $supplier->supplier_district_id = $request->input('supplier_district_id');
        $supplier->supplier_province_id = $request->input('supplier_province_id');
        $supplier->supplier_postcode = $request->input('supplier_postcode');
        $supplier->supplier_phone = $request->input('supplier_phone');
        $supplier->supplier_email = $request->input('supplier_email');
        $supplier->supplier_contact = $request->input('supplier_contact');
        $supplier->created_by = auth()->user()->name;

        if($supplier->save()) {
            
            Session::flash('success_msg', 'เพิ่มผู้จำหน่ายสินค้าเรียบร้อย');

            if($request->input('asset-add-supplier') == 1){
                return redirect()->back();
            } else {
                return redirect('/supplier');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('supplier.show', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', [
            'supplier' => $supplier
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
        if($request->input('form_edit_supplier_name') == 1) {
            $request->validate([
                'supplier_name' => ['required', 'string', 'max:255', 'unique:suppliers,supplier_name'],
            ]);
            /**
             * Store in the database
             */
            Supplier::where('id', $id)->update([
                'supplier_name' => $request->input('supplier_name'),
                'updated_by' => auth()->user()->name,
            ]);

            Session::flash('success_msg', 'แก้ไขชื่อผู้จำหน่ายสินค้าเรียบร้อย');

            return redirect()->back();
        }

        /**
         * Check Update Supplier
         */
        $request->validate([
            'supplier_address' => ['required', 'string', 'max:255'],
            'supplier_subdistrict_id' => ['nullable', 'integer'],
            'supplier_district_id' => ['required', 'integer'],
            'supplier_province_id' => ['required', 'integer',],
            'supplier_postcode' => ['required', 'string', 'min:5', 'max:5'],
            'supplier_phone' => ['required', 'string', 'max:255'],
            'supplier_email' => ['required', 'string', 'email', 'max:255'],
            'supplier_contact' => ['required', 'string', 'max:255'],
            'updated_by' => ['nullable', 'string', 'max:50'],
        ]);
        
        /**
         * Store in the database
         */
        Supplier::where('id', $id)->update([
            'supplier_address' => $request->input('supplier_address'),
            'supplier_subdistrict_id' => $request->input('supplier_subdistrict_id'),
            'supplier_district_id' => $request->input('supplier_district_id'),
            'supplier_province_id' => $request->input('supplier_province_id'),
            'supplier_postcode' => $request->input('supplier_postcode'),
            'supplier_phone' => $request->input('supplier_phone'),
            'supplier_email' => $request->input('supplier_email'),
            'supplier_contact' => $request->input('supplier_contact'),
            'updated_by' => auth()->user()->name,
        ]);

        Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อย');

        return redirect("/supplier");
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
