<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Model\Employee\Organization;
use App\Model\Employee\Lab;
use App\Model\Employee\Equipment;

use App\Model\BasicInformations\ScienceTool;
use App\Model\BasicInformations\MajorTechnology;
use App\Model\BasicInformations\TechnicalEquipment;
use App\Model\BasicInformations\ObjectiveUsage;
use App\Model\BasicInformations\EquipmentUsage;
use App\Model\BasicInformations\EquipmentCalibration;
use App\Model\BasicInformations\EquipmentMaintenance;
use App\Model\BasicInformations\EquipmentManual;
use App\Model\BasicInformations\EquipmentRent;

use App\Helpers\LogActivity;

class EquipmentController extends Controller
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
        // data
        $equipments = Equipment::where('user_id', auth()->user()->id)->where('completed',0)->get();
        $equipmentsDel = Equipment::where('user_id', auth()->user()->id)->where('completed',1)->get();
        
        // dd($equipments) ;

        return view('employee.equipment.index', [
            'equipments' => $equipments,
            'equipmentsDel' => $equipmentsDel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // data for loop select
        $labs = Lab::where('user_id', auth()->user()->id)->get();
        $scienceTools = ScienceTool::where('science_tool_status','A')->get();
        $majorTechnologies = MajorTechnology::where('major_tech_status','A')->get();
        $technicalEquipments = TechnicalEquipment::where('technical_equipment_status','A')->get();
        $objectiveUsages = ObjectiveUsage::where('obj_usage_status','A')->get();
        $equipmentUsages = EquipmentUsage::where('equipment_usage_status','A')->get();
        $equipmentCalibrations = EquipmentCalibration::where('equipment_calibration_status','A')->get();
        $equipmentMaintenances = EquipmentMaintenance::where('equipment_maintenance_status','A')->get();
        $equipmentManuals = EquipmentManual::where('equipment_manual_status','A')->get();
        $equipmentRents = EquipmentRent::where('equipment_rent_status','A')->get();

        return view('employee.equipment.create', [
            'labs' => $labs,
            'scienceTools' => $scienceTools,
            'majorTechnologies' => $majorTechnologies,
            'technicalEquipments' => $technicalEquipments,
            'objectiveUsages' => $objectiveUsages,
            'equipmentUsages' => $equipmentUsages,
            'equipmentCalibrations' => $equipmentCalibrations,
            'equipmentMaintenances' => $equipmentMaintenances,
            'equipmentManuals' => $equipmentManuals,
            'equipmentRents' => $equipmentRents,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createByLabId($labId)
    {
        // data for loop select
        $lab = Lab::findOrFail($labId);
        if($lab->completed == 1){
            return redirect()->route('lab.index')->with('error', 'ห้องปฏิบัติการที่ท่านต้องการเพิ่มข้อมูลถูกยกเลิกแล้ว');
        }
        $scienceTools = ScienceTool::where('science_tool_status','A')->get();
        $majorTechnologies = MajorTechnology::where('major_tech_status','A')->get();
        $technicalEquipments = TechnicalEquipment::where('technical_equipment_status','A')->get();
        $objectiveUsages = ObjectiveUsage::where('obj_usage_status','A')->get();
        $equipmentUsages = EquipmentUsage::where('equipment_usage_status','A')->get();
        $equipmentCalibrations = EquipmentCalibration::where('equipment_calibration_status','A')->get();
        $equipmentMaintenances = EquipmentMaintenance::where('equipment_maintenance_status','A')->get();
        $equipmentManuals = EquipmentManual::where('equipment_manual_status','A')->get();
        $equipmentRents = EquipmentRent::where('equipment_rent_status','A')->get();

        return view('employee.equipment.create-lab-id', [
            'lab' => $lab,
            'scienceTools' => $scienceTools,
            'majorTechnologies' => $majorTechnologies,
            'technicalEquipments' => $technicalEquipments,
            'objectiveUsages' => $objectiveUsages,
            'equipmentUsages' => $equipmentUsages,
            'equipmentCalibrations' => $equipmentCalibrations,
            'equipmentMaintenances' => $equipmentMaintenances,
            'equipmentManuals' => $equipmentManuals,
            'equipmentRents' => $equipmentRents,
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

        $lab_id = Lab::find($request->input('lab_id'));
        $lab_code = $lab_id->lab_code;
        // return $lab_code;

        $science_tool_id = ScienceTool::find($request->input('science_tool_id'));
        $science_tool_abbr = $science_tool_id->science_tool_abbr;
        // return $science_tool_abbr;

        $temp_science_tool_code = $lab_code."-".$science_tool_abbr;
        $count_science_tool_code = strlen($temp_science_tool_code);
        // return $temp_science_tool_code;
        $exist_equipment_code = Equipment::where('equipment_code', 'LIKE' ,"$temp_science_tool_code%")
            ->orderBy('equipment_code', 'desc')
            ->first();
        // return $exist_equipment_code."xxx";

        if ($exist_equipment_code == null) {
            $equipment_code = $temp_science_tool_code."01";
            // return $equipment_code."new lab";
        } else {
            $equipment_code_intival =  intval(substr( $exist_equipment_code->equipment_code,$count_science_tool_code))+1;
            
            if (strlen($equipment_code_intival)==1) {
                $equipment_code_intival = "0".strval($equipment_code_intival);
                $equipment_code =  $temp_science_tool_code.$equipment_code_intival;
                // return $equipment_code."less 9";
            }else if(strlen($equipment_code_intival)!=1){
                $equipment_code_intival = strval($equipment_code_intival);
                $equipment_code =  $temp_science_tool_code.$equipment_code_intival;
                // return $equipment_code."more 10";
            }
        }
        
        // validate the data with function
        $request->validate([
            'equipment_code' => '',
        ]);

        $this->validateEquipment();

        // Handle File Upload
        if($request->hasFile('equipment_image')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('equipment_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('equipment_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('equipment_image')->storeAs('public/equipment_image', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        //get org_id
        $lab = Lab::find($request->input('lab_id'));
        // dd($lab);

        // update status in labs
        if($lab->survey_status_id == 5){
            // clean
            Lab::where('id', $lab->id)->update(['survey_status_id' => 3]);
        }

        // Handle File Upload

        // store in the database
        $equipment = new Equipment;

        $equipment->user_id = auth()->user()->id;
        $equipment->lab_id = $request->input('lab_id');
        $equipment->org_id = $lab->organization_id;
        // $equipment->equipment_code = $request->input('equipment_code');
        $equipment->equipment_code = $equipment_code;
        $equipment->science_tool_id = $request->input('science_tool_id');
        $equipment->science_tool_other_name = $request->input('science_tool_other_name');
        $equipment->science_tool_other_abbr = $request->input('science_tool_other_abbr');
        $equipment->equipment_name_th = $request->input('equipment_name_th');
        $equipment->equipment_brand = $request->input('equipment_brand');
        $equipment->equipment_model = $request->input('equipment_model');
        $equipment->equipment_number = $request->input('equipment_number');
        $equipment->equipment_year = $request->input('equipment_year');
        $equipment->equipment_price = $request->input('equipment_price');
        $equipment->equipment_supplier = $request->input('equipment_supplier');
        $equipment->major_technology_other = $request->input('major_technology_other');
        $equipment->equipment_usage_id = $request->input('equipment_usage_id');
        $equipment->equipment_ability = $request->input('equipment_ability');
        $equipment->equipment_image = $fileNameToStore;
        $equipment->equipment_calibration_id = $request->input('equipment_calibration_id');
        $equipment->equipment_calibration_by = $request->input('equipment_calibration_by');
        $equipment->equipment_calibration_year = $request->input('equipment_calibration_year');
        $equipment->equipment_maintenance_id = $request->input('equipment_maintenance_id');
        $equipment->equipment_maintenance_other = $request->input('equipment_maintenance_other');
        $equipment->equipment_maintenance_budget = $request->input('equipment_maintenance_budget');
        $equipment->equipment_admin_name = $request->input('equipment_admin_name');
        $equipment->equipment_admin_phone = $request->input('equipment_admin_phone');
        $equipment->equipment_admin_email = $request->input('equipment_admin_email');
        $equipment->equipment_manual_id = $request->input('equipment_manual_id');
        $equipment->equipment_manual_name = $request->input('equipment_manual_name');
        $equipment->equipment_manual_location = $request->input('equipment_manual_location');
        $equipment->equipment_rent_id = $request->input('equipment_rent_id');
        $equipment->equipment_rent_fee = $request->input('equipment_rent_fee');
        $equipment->equipment_rent_detail = $request->input('equipment_rent_detail');
        
        if($equipment->save()) {
            // save multi data for relations many to many
            $equipment->majorTechnologies()->sync($request->input('major_technology_id'), false);
            $equipment->objectiveUsages()->sync($request->input('objective_usage_id'), false);

            // create log activity
            LogActivity::addToLog('Add Equipment : '.$equipment->id.' : '.$equipment->equipment_code.' successfully.');

            return redirect()->route('equipment.show', $equipment->id);
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
        $equipment = Equipment::findOrFail($id);

        // Check for correct user
        if(auth()->user()->id !== $equipment->user_id){
            return redirect()->route('equipment.index')->with('error', 'Unauthorized Page');
        }

        if($equipment->completed == 1){
            return redirect()->route('equipment.index')->with('error', 'เครื่องมือที่ท่านต้องการดูข้อมูลถูกยกเลิกแล้ว');
        }
        
        return view('employee.equipment.show', ['equipment' => $equipment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);

        // Check for correct user
        if(auth()->user()->id !== $equipment->user_id){
            return redirect()->route('equipment.index')->with('error', 'Unauthorized Page');
        }

        if($equipment->lab->survey_status_id == 2 || $equipment->lab->survey_status_id == 4) {
            return redirect()->route('equipment.show', $equipment->id);
        }

        if($equipment->completed == 1 ){
            return redirect()->route('equipment.index')->with('error', 'เครื่องมือที่ท่านต้องการดูข้อมูลถูกยกเลิกแล้ว');
        }

        // data for loop select
        $labs = Lab::where('user_id', auth()->user()->id)->get();
        $scienceTools = ScienceTool::where('science_tool_status','A')->get();
        $majorTechnologies = MajorTechnology::where('major_tech_status','A')->get();
        $technicalEquipments = TechnicalEquipment::where('technical_equipment_status','A')->get();
        $objectiveUsages = ObjectiveUsage::where('obj_usage_status','A')->get();
        $equipmentUsages = EquipmentUsage::where('equipment_usage_status','A')->get();
        $equipmentCalibrations = EquipmentCalibration::where('equipment_calibration_status','A')->get();
        $equipmentMaintenances = EquipmentMaintenance::where('equipment_maintenance_status','A')->get();
        $equipmentManuals = EquipmentManual::where('equipment_manual_status','A')->get();
        $equipmentRents = EquipmentRent::where('equipment_rent_status','A')->get();
        // data relations in id
        $major_technology_items = array();
        foreach ($equipment->majorTechnologies as $item){
            $major_technology_items[] = $item->id;
        }
        if($major_technology_items != null) {
            $major_technology_item = json_encode($major_technology_items);
        } else {
            $major_technology_item = '';
        }
        $objective_usage_items = array();
        foreach ($equipment->objectiveUsages as $item){
            $objective_usage_items[] = $item->id;
        }
        if($objective_usage_items != null) {
            $objective_usage_item = json_encode($objective_usage_items);
        } else {
            $objective_usage_item = '';
        }

        return view('employee.equipment.edit', [
            'equipment' => $equipment,
            'labs' => $labs,
            'scienceTools' => $scienceTools,
            'majorTechnologies' => $majorTechnologies,
            'major_technology_item' => $major_technology_item,
            'technicalEquipments' => $technicalEquipments,
            'objectiveUsages' => $objectiveUsages,
            'objective_usage_item' => $objective_usage_item,
            'equipmentUsages' => $equipmentUsages,
            'equipmentCalibrations' => $equipmentCalibrations,
            'equipmentMaintenances' => $equipmentMaintenances,
            'equipmentManuals' => $equipmentManuals,
            'equipmentRents' => $equipmentRents,
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
        // dd($request->all());
        // dd($request);
        
        // validate the data with function
        $this->validateEquipment();

        // Handle File Upload
        if($request->hasFile('equipment_image')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('equipment_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('equipment_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('equipment_image')->storeAs('public/equipment_image', $fileNameToStore);
        }

        // store in the database
        // get org_id

        // Update Status ID
        $lab = Lab::find($request->input('lab_id'));

        // update status in labs
        $survey_status_id = $request->input('survey_status_id');
        if($survey_status_id == 5){
            // clean
            Lab::where('id', $lab->id)->update(['survey_status_id' => 3]);
        }
        // End Update Status ID

        // dd($lab);

        $equipment = Equipment::find($id);

        $science_tool_id = $request->input('science_tool_id');
        $science_tool_id_exist = $equipment->science_tool_id;
        // Check Update science_tool_id
        if($science_tool_id != $science_tool_id_exist) {
            $lab_id = Lab::find($request->input('lab_id'));
            $lab_code = $lab_id->lab_code;
            
            $new_science_tool_id = ScienceTool::find($request->input('science_tool_id'));
            $new_science_tool_abbr = $new_science_tool_id->science_tool_abbr;
            // return $science_tool_abbr;

            $temp_science_tool_code = $lab_code."-".$new_science_tool_abbr;
            $count_science_tool_code = strlen($temp_science_tool_code);
            // return $temp_science_tool_code;

            $exist_equipment_code = Equipment::where('equipment_code', 'LIKE' ,"$temp_science_tool_code%")
                ->orderBy('equipment_code', 'desc')
                ->first();
            // return $exist_equipment_code."xxx";

            if ($exist_equipment_code == null) {
                $equipment_code = $temp_science_tool_code."01";
                $equipment->equipment_code = $equipment_code;
                // return $equipment_code."new lab";
            } else {
                $equipment_code_intival =  intval(substr( $exist_equipment_code->equipment_code,$count_science_tool_code))+1;
                if (strlen($equipment_code_intival)==1) {
                    $equipment_code_intival = "0".strval($equipment_code_intival);
                    $equipment_code =  $temp_science_tool_code.$equipment_code_intival;
                    $equipment->equipment_code = $equipment_code;
                    // return $equipment_code."less 9";
                } else if(strlen($equipment_code_intival)!=1){
                    $equipment_code_intival = strval($equipment_code_intival);
                    $equipment_code =  $temp_science_tool_code.$equipment_code_intival;
                    $equipment->equipment_code = $equipment_code;
                    // return $equipment_code."more 10";
                }
            }
        }

        $equipment->lab_id = $request->input('lab_id');
        $equipment->org_id = $lab->organization_id;
        $equipment->science_tool_id = $request->input('science_tool_id');
        $equipment->science_tool_other_name = $request->input('science_tool_other_name');
        $equipment->science_tool_other_abbr = $request->input('science_tool_other_abbr');
        $equipment->equipment_name_th = $request->input('equipment_name_th');
        $equipment->equipment_brand = $request->input('equipment_brand');
        $equipment->equipment_model = $request->input('equipment_model');
        $equipment->equipment_number = $request->input('equipment_number');
        $equipment->equipment_year = $request->input('equipment_year');
        $equipment->equipment_price = $request->input('equipment_price');
        $equipment->equipment_supplier = $request->input('equipment_supplier');
        $equipment->major_technology_other = $request->input('major_technology_other');
        $equipment->equipment_usage_id = $request->input('equipment_usage_id');
        $equipment->equipment_ability = $request->input('equipment_ability');
        if($request->hasFile('equipment_image')) {        
            $equipment->equipment_image = $fileNameToStore;
        }
        // $equipment->equipment_image = $fileNameToStore;
        $equipment->equipment_calibration_id = $request->input('equipment_calibration_id');
        $equipment->equipment_calibration_by = $request->input('equipment_calibration_by');
        $equipment->equipment_calibration_year = $request->input('equipment_calibration_year');
        $equipment->equipment_maintenance_id = $request->input('equipment_maintenance_id');
        $equipment->equipment_maintenance_other = $request->input('equipment_maintenance_other');
        $equipment->equipment_maintenance_budget = $request->input('equipment_maintenance_budget');
        $equipment->equipment_admin_name = $request->input('equipment_admin_name');
        $equipment->equipment_admin_phone = $request->input('equipment_admin_phone');
        $equipment->equipment_admin_email = $request->input('equipment_admin_email');
        $equipment->equipment_manual_id = $request->input('equipment_manual_id');
        $equipment->equipment_manual_name = $request->input('equipment_manual_name');
        $equipment->equipment_manual_location = $request->input('equipment_manual_location');
        $equipment->equipment_rent_id = $request->input('equipment_rent_id');
        $equipment->equipment_rent_fee = $request->input('equipment_rent_fee');
        $equipment->equipment_rent_detail = $request->input('equipment_rent_detail');
        
        if($equipment->save()) {
            // save multi data for relations many to many
            $equipment->majorTechnologies()->sync($request->input('major_technology_id'));
            $equipment->objectiveUsages()->sync($request->input('objective_usage_id'));

            // create log activity
            LogActivity::addToLog('Edit Equipment : '.$equipment->id.' : '.$equipment->equipment_code.' successfully.');

            return redirect()->route('equipment.show', $equipment->id);
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
        return abort(404);
    }

    public function changeStatus(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);
        // check equipment use in productLab

        $productLab = array();
        foreach ($equipment->productLabs as $item) {
            $productLab[] = $item->completed;
        }

        // return json_encode($productLab);

        if (empty($productLab)) {
            $equipment->completed = TRUE;
            $equipment->save();
            return redirect()->route('equipment.index');
        } else {
            for ($i=0; $i < count($productLab); $i++) { 
                if($productLab[$i] == 0){
                    return redirect()->route('equipment.index')->with('error', '!! ไม่สามารถยกเลิกเครื่องมือได้ เนื่องจากมีข้อมูลผลิตภัณฑ์ และรายการวิจัย/ทดสอบ/สอบเทียบที่ใช้เครื่องมือนี้อยู่
            กรุณาตรวจสอบอีกครั้ง !!');
                } else {
                    $equipment->completed = TRUE;
                    $equipment->save();
                    return redirect()->route('equipment.index');
                }
            }
        }
    }

    protected function validateEquipment()
    {
        return request()->validate([
            'science_tool_id' => 'required',
            'science_tool_other_name' => '',
            'science_tool_other_abbr' => '',
            'equipment_name_th' => '',
            'equipment_brand' => '',
            'equipment_model' => '',
            'equipment_number' => '',
            'equipment_year' => '',
            'equipment_price' => '',
            'equipment_supplier' => '',
            'major_technology_id' => ['required'],
            'major_technologies_other' => '',
            'objective_usage_id' => ['required'],
            'equipment_usage_id' => 'required',
            'equipment_ability' => '',
            'equipment_image' => 'image|mimes:jpeg,png,jpg',
            'equipment_calibrations_id' => '',
            'equipment_calibration_by' => '',
            'equipment_calibration_year' => '',
            'equipment_maintenance_id' => 'required',
            'equipment_maintenance_other' => '',
            'equipment_maintenance_budget' => '',
            'equipment_admin_name' => '',
            'equipment_admin_phone' => '',
            'equipment_admin_email' => '',
            'equipment_manual_id' => '',
            'equipment_manual_name' => '',
            'equipment_manual_location' => '',
            'equipment_rent_id' => 'required',
            'equipment_rent_fee' => '',
            'equipment_rent_detail' => '',
        ]);
    }
}
