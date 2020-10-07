<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\LogActivity;

use App\Model\Employee\ProductLab;
use App\Model\Employee\Organization;
use App\Model\Employee\Lab;
use App\Model\Employee\Equipment;

use App\Model\BasicInformations\ProductType;
use App\Model\BasicInformations\TestingCalibratingList;
use App\Model\BasicInformations\TestingCalibratingType;
use App\Model\BasicInformations\TestingCalibratingMethod;
use App\Model\BasicInformations\ResultControl;
use App\Model\BasicInformations\CertifyLaboratory;

class ProductLabController extends Controller
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
        $productLabs = ProductLab::where('user_id', auth()->user()->id)->where('completed',0)->get();
        $productLabsDel = ProductLab::where('user_id', auth()->user()->id)->where('completed',1)->get();

        return view('employee.productLab.index', [
            'productLabs' => $productLabs,
            'productLabsDel' => $productLabsDel
        ]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createByLabId($id)
    {
        $lab = Lab::findOrFail($id);
        $productTypes = ProductType::where('product_type_status', 'A')->get();
        $equipments = Equipment::where('lab_id', $id)->where('completed',FALSE)->get();
        $testingCalibratingLists = TestingCalibratingList::where('testing_list_status', 'A')->get();
        $testingCalibratingTypes = TestingCalibratingType::where('testing_calibrating_type_status', 'A')->get();
        $testingCalibratingMethods = TestingCalibratingMethod::where('testing_method_status', 'A')->get();
        $resultControls = ResultControl::where('result_control_status', 'A')->get();
        $certifyLaboratories = CertifyLaboratory::where('cert_lab_status', 'A')->get();
        
        return view('employee.productLab.create-lab-id', [
            'lab' => $lab,
            'productTypes' => $productTypes,
            'equipments' => $equipments,
            'testingCalibratingLists' => $testingCalibratingLists,
            'testingCalibratingTypes' => $testingCalibratingTypes,
            'testingCalibratingMethods' => $testingCalibratingMethods,
            'resultControls' => $resultControls,
            'certifyLaboratories' => $certifyLaboratories,
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
        // dd($request);
        // dd($request->all());
        
        // validate the data with function
        $this->validateProductlab();

        //get organization id
        $lab = Lab::find($request->input('lab_id'));

        // update status in labs
        if($lab->survey_status_id == 5){
            // clean
            Lab::where('id', $lab->id)->update(['survey_status_id' => 3]);
        }

        // store in the database
        $productLab = new ProductLab;

        $productLab->user_id = auth()->user()->id;
        $productLab->lab_id = $request->input('lab_id');
        $productLab->organization_id = $lab->organization_id;
        $productLab->product_lab_name = $request->input('product_lab_name');
        $productLab->product_type_other = $request->input('product_type_other');
        $productLab->product_lab_standard = $request->input('product_lab_standard');
        $productLab->product_lab_test_name = $request->input('product_lab_test_name');
        $productLab->testing_calibrating_list_id = $request->input('testing_calibrating_list_id');
        $productLab->testing_calibrating_type_id = $request->input('testing_calibrating_type_id');
        $productLab->testing_calibrating_type_other = $request->input('testing_calibrating_type_other');
        $productLab->testing_calibrating_method_id = $request->input('testing_calibrating_method_id');
        $productLab->testing_calibrating_method_detail = $request->input('testing_calibrating_method_detail');
        $productLab->product_lab_test_unit = $request->input('product_lab_test_unit');
        $productLab->product_lab_test_duration = $request->input('product_lab_test_duration');
        $productLab->product_lab_test_fee = $request->input('product_lab_test_fee');
        $productLab->product_lab_material_ref = $request->input('product_lab_material_ref');
        $productLab->product_lab_material_ref_from = $request->input('product_lab_material_ref_from');
        $productLab->result_control_other = $request->input('result_control_other');
        $productLab->proficiency_testing_id = $request->input('proficiency_testing_id');
        $productLab->proficiency_testing_by = $request->input('proficiency_testing_by');
        $productLab->proficiency_testing_year = $request->input('proficiency_testing_year');
        $productLab->certify_laboratory_id = $request->input('certify_laboratory_id');

        if($productLab->save()) {
            // save multi data for relations many to many
            $productLab->productTypes()->sync($request->input('product_type_id'), false);
            $productLab->equipments()->sync($request->input('equipment_id'), false);
            $productLab->resultControls()->sync($request->input('result_control_id'), false);

            // create log activity
            LogActivity::addToLog("Add Product Lab : $productLab->id : $productLab->product_lab_name successfully.");

            return redirect()->route('productlab.show', $productLab->id);
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
        $productLab = ProductLab::findOrFail($id);

        // Check for correct user
        if(auth()->user()->id !== $productLab->user_id){
            return redirect()->route('productlab.index')->with('error', 'Unauthorized Page');
        }

        if ($productLab->completed == 1){
            return redirect()->route('productlab.index')->with('error', 'รายการทดสอบที่ท่านต้องการดูข้อมูลถูกยกเลิกแล้ว');
        }
        
        return view('employee.productLab.show', ['productLab' => $productLab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productLab = ProductLab::findOrFail($id);

        // return $productLab;

        // Check for correct user
        if(auth()->user()->id !== $productLab->user_id){
            return redirect()->route('productlab.index')->with('error', 'Unauthorized Page');
        }

        if($productLab->lab->survey_status_id == 2 || $productLab->lab->survey_status_id == 4) {
            return redirect()->route('productlab.show', $productLab->id);
        }

        if ($productLab->completed == 1){
            return redirect()->route('productlab.index')->with('error', 'รายการทดสอบที่ท่านต้องการดูข้อมูลถูกยกเลิกแล้ว');
        }

        $productTypes = ProductType::where('product_type_status', 'A')->get();
        $equipments = Equipment::where('lab_id', $productLab->lab_id)->where('completed',FALSE)->get();
        $testingCalibratingLists = TestingCalibratingList::where('testing_list_status', 'A')->get();
        $testingCalibratingTypes = TestingCalibratingType::where('testing_calibrating_type_status', 'A')->get();
        $testingCalibratingMethods = TestingCalibratingMethod::where('testing_method_status', 'A')->get();
        $resultControls = ResultControl::where('result_control_status', 'A')->get();
        $certifyLaboratories = CertifyLaboratory::where('cert_lab_status', 'A')->get();

        // data relations in id
        $product_type_items = array();
        foreach ($productLab->productTypes as $item){
            $product_type_items[] = $item->id;
        }
        $equipment_items = array();
        foreach ($productLab->equipments as $item){
            $equipment_items[] = $item->id;
        }
        $result_control_items = array();
        foreach ($productLab->resultControls as $item){
            $result_control_items[] = $item->id;
        }
        
        return view('employee.productLab.edit', [
            'productLab' => $productLab,
            'productTypes' => $productTypes,
            'product_type_items' => $product_type_items,
            'equipments' => $equipments,
            'equipment_items' => $equipment_items,
            'testingCalibratingLists' => $testingCalibratingLists,
            'testingCalibratingTypes' => $testingCalibratingTypes,
            'testingCalibratingMethods' => $testingCalibratingMethods,
            'resultControls' => $resultControls,
            'result_control_items' => $result_control_items,
            'certifyLaboratories' => $certifyLaboratories,
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
        // dd($request);
        // dd($request->all());
        
        // validate the data with function
        $this->validateProductlab();

        //get organization id
        $lab = Lab::find($request->input('lab_id'));

        // update status in labs
        $survey_status_id = $request->input('survey_status_id');
        if($survey_status_id == 5){
            // clean
            Lab::where('id', $lab->id)->update(['survey_status_id' => 3]);
        }

        // store in the database
        $productLab = ProductLab::find($id);
    
        $productLab->product_lab_name = $request->input('product_lab_name');
        $productLab->product_type_other = $request->input('product_type_other');
        $productLab->product_lab_standard = $request->input('product_lab_standard');
        $productLab->product_lab_test_name = $request->input('product_lab_test_name');
        $productLab->testing_calibrating_list_id = $request->input('testing_calibrating_list_id');
        $productLab->testing_calibrating_type_id = $request->input('testing_calibrating_type_id');
        $productLab->testing_calibrating_type_other = $request->input('testing_calibrating_type_other');
        $productLab->testing_calibrating_method_id = $request->input('testing_calibrating_method_id');
        $productLab->testing_calibrating_method_detail = $request->input('testing_calibrating_method_detail');
        $productLab->product_lab_test_unit = $request->input('product_lab_test_unit');
        $productLab->product_lab_test_duration = $request->input('product_lab_test_duration');
        $productLab->product_lab_test_fee = $request->input('product_lab_test_fee');
        $productLab->product_lab_material_ref = $request->input('product_lab_material_ref');
        $productLab->product_lab_material_ref_from = $request->input('product_lab_material_ref_from');
        $productLab->result_control_other = $request->input('result_control_other');
        $productLab->proficiency_testing_id = $request->input('proficiency_testing_id');
        $productLab->proficiency_testing_by = $request->input('proficiency_testing_by');
        $productLab->proficiency_testing_year = $request->input('proficiency_testing_year');
        $productLab->certify_laboratory_id = $request->input('certify_laboratory_id');

        if($productLab->save()) {
            // save multi data for relations many to many
            $productLab->productTypes()->sync($request->input('product_type_id'));
            $productLab->equipments()->sync($request->input('equipment_id'));
            $productLab->resultControls()->sync($request->input('result_control_id'));

            // create log activity
            LogActivity::addToLog("Edit Product Lab : $productLab->id : $productLab->product_lab_name successfully.");

            return redirect()->route('productlab.show', $productLab->id);
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
        //
    }

    public function changeStatus(Request $request, $id)
    {
        
        $productLab = ProductLab::findOrFail($id);
        $productLab->completed = TRUE;
        $productLab->save();
        // dd($productLab);
        return redirect()->route('productlab.index');
        
    }

    protected function validateProductlab()
    {
        return request()->validate([
            'lab_id' => '',
            'product_lab_name' => 'required',
            'product_type_id' => ['required'],
            'product_type_other' => '',
            'product_lab_standard' => '',
            'product_lab_test_name' => 'required',
            'equipment_id' => ['required'],
            'testing_calibrating_list_id' => 'required',
            'testing_calibrating_type_id' => 'required',
            'testing_calibrating_type_other' => '',
            'testing_calibrating_method_id' => 'required',
            'testing_calibrating_method_detail' => 'required',
            'product_lab_test_unit' => '',
            'product_lab_test_duration' => 'required',
            'product_lab_test_fee' => '',
            'product_lab_material_ref' => '',
            'product_lab_material_ref_from' => '',
            'result_control_id' => ['required'],
            'result_control_other' => '',
            'proficiency_testing_id' => '',
            'proficiency_testing_by' => '',
            'proficiency_testing_year' => '',
            'certify_laboratory_id' => 'required',
        ]);
    }
}
