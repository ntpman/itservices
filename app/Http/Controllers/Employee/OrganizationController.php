<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\Organization;
use App\Model\Employee\Lab;
use App\Model\Employee\Equipment;
use App\Model\Employee\ProductLab;

use App\Model\BasicInformations\SaleProduct;
use App\Model\BasicInformations\Country;
use App\Model\BasicInformations\OrganisationType;
use App\Model\BasicInformations\BusinessType;
use App\Model\BasicInformations\IndustrialType;
use App\Model\BasicInformations\QualitySystem;
use App\Model\Employee\Operation;
use App\Model\Employee\QualitySystemIso9000;
use App\Model\Employee\QualitySystemIso14000;
use App\Model\Employee\QualitySystemIsoHaccp;

use App\Helpers\LogActivity;

class OrganizationController extends Controller
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
        // $orgs = Organization::all();
        $orgs = Organization::where('user_id', auth()->user()->id)->where('completed',0)->get();
        $orgsDel = Organization::where('user_id', auth()->user()->id)->where('completed',1)->get();
        return view('employee.organization.index', ['orgs' => $orgs, 'orgsDel' => $orgsDel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // data for loop select
        $saleProduct = SaleProduct::where('sale_product_status', 'A')->get();
        $country = Country::where('country_status', 'A')->get();
        $organisationType = OrganisationType::where('org_type_status', 'A')->get();
        $businessType = BusinessType::where('business_type_status', 'A')->get();
        $industrialType = IndustrialType::where('industrial_type_status', 'A')->get();
        $qualitySystems = QualitySystem::where('quality_system_status', 'A')->get();
        $operations = Operation::where('operation_status', 'A')->get();


        // return $industrialType;

        return view('employee.organization.create',[
            'saleProducts' => $saleProduct,
            'countrys' => $country,
            'organisationTypes' => $organisationType,
            'businessTypes' => $businessType,
            'industrialTypes' => $industrialType,
            'qualitySystems' => $qualitySystems,
            'operations' => $operations,
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

        $user_code = auth()->user()->user_code;
        $province_id = $request->input('province_info_ch_id');
        $org_type_id = OrganisationType::find($request->input('organisation_type_id'));
        $org_type_abbr = $org_type_id->org_type_abbr;
        
        $temp_org_code = $user_code."-".$province_id.$org_type_abbr;
        $count_org_code = strlen($temp_org_code);
        $exist_org_code = Organization::where('org_code', 'LIKE' ,"$temp_org_code%")
                                        ->orderBy('org_code', 'desc')
                                        ->first();
        // return $exist_org_code;

        if ($exist_org_code == null) {
            $org_code = $temp_org_code."01";
            // return $org_code;
        } else {
            $org_code_intival =  intval(substr( $exist_org_code->org_code,$count_org_code))+1;
            // return $org_code_intival;
            if (strlen($org_code_intival)==1) {
                $org_code_intival = "0".strval($org_code_intival);
                $org_code =  $temp_org_code.$org_code_intival;
                // return $org_code;
            }else if(strlen($org_code_intival)!=1){
                $org_code_intival = strval($org_code_intival);
                $org_code =  $temp_org_code.$org_code_intival;
                // return $org_code."no 0";
            }
        }
        

        // validate the data with function
        $request->validate([
            'org_code' => '',
        ]);

        $this->validateOrganization();
        
        // store in the database
        $org = new Organization;

        $org->user_id = auth()->user()->id;
        $org->org_name = $request->input('org_name');
        $org->org_name_level_1 = $request->input('org_name_level_1');
        $org->org_name_level_2 = $request->input('org_name_level_2');
        $org->org_code = $org_code;
        $org->org_number = $request->input('org_number');
        $org->org_building = $request->input('org_building');
        $org->org_floor = $request->input('org_floor');
        $org->org_address = $request->input('org_address');
        $org->org_soi = $request->input('org_soi');
        $org->org_road = $request->input('org_road');
        $org->province_info_ch_id = $request->input('province_info_ch_id');
        $org->province_info_am_id = $request->input('province_info_am_id');
        $org->province_info_ta_id = $request->input('province_info_ta_id');
        $org->org_postcode = $request->input('org_postcode');
        $org->org_phone = $request->input('org_phone');
        $org->org_fax = $request->input('org_fax');
        $org->org_email = $request->input('org_email');
        $org->org_website = $request->input('org_website');
        $org->org_lat = $request->input('org_lat');
        $org->org_long = $request->input('org_long');
        $org->org_capital = $request->input('org_capital');
        $org->org_employee_amount = $request->input('org_employee_amount');
        $org->organisation_type_id = $request->input('organisation_type_id');
        $org->organisation_type_other = $request->input('organisation_type_other');
        $org->business_type_id = $request->input('business_type_id');
        $org->business_type_other = $request->input('business_type_other');
        $org->industrial_type_other = $request->input('industrial_type_other');
        $org->quality_system_other = $request->input('quality_system_other');
        
        if($org->save()) {
            // save multi data for relations many to many
            $org->saleProducts()->sync($request->input('sale_products'), false);
            $org->countrys()->sync($request->input('countrys'), false);
            $org->industrialTypes()->sync($request->input('industrial_types'), false);

            // clean
            $iso9000 = new QualitySystemIso9000;
            $iso9000->org_id = $org->id;
            $iso9000->operation_id = $request->input('iso_9000_operation_id');
            $iso9000->scoped = $request->input('iso_9000_scoped');
            $iso9000->certification_agency = $request->input('iso_9000_certification_agency');
            $iso9000->accredited = $request->input('iso_9000_accredited');
            $iso9000->save();

            // clean
            $iso14000 = new QualitySystemIso14000;
            $iso14000->org_id = $org->id;
            $iso14000->operation_id = $request->input('iso_14000_operation_id');
            $iso14000->scoped = $request->input('iso_14000_scoped');
            $iso14000->certification_agency = $request->input('iso_14000_certification_agency');
            $iso14000->accredited = $request->input('iso_14000_accredited');
            $iso14000->save();

            // clean
            $isoHaccp = new QualitySystemIsoHaccp;
            $isoHaccp->org_id = $org->id;
            $isoHaccp->operation_id = $request->input('iso_haccp_operation_id');
            $isoHaccp->scoped = $request->input('iso_haccp_scoped');
            $isoHaccp->certification_agency = $request->input('iso_haccp_certification_agency');
            $isoHaccp->accredited = $request->input('iso_haccp_accredited');
            $isoHaccp->save();

            // create log activity
            LogActivity::addToLog("Add Organization : $org->id : $org->org_name successfully.");

            return redirect()->route('organization.show', $org->id);
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
        // $org = Organization::find($id);
        $org = Organization::findOrFail($id);

        // Check for correct user
        if(auth()->user()->id !== $org->user_id){
            return redirect()->route('organization.index')->with('error', 'Unauthorized Page');
        }
        
        if($org->completed == 1){
            return redirect()->route('organization.index')->with('error', 'องค์กรที่ท่านต้องการดูข้อมูลถูกยกเลิกแล้ว');
        }
        return view('employee.organization.show', [
            'org' => $org,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $org = Organization::findOrFail($id);

        // Check for correct user
        if(auth()->user()->id !== $org->user_id){
            return redirect()->route('organization.index')->with('error', 'Unauthorized Page');
        }

        if($org->completed == 1) {
            return redirect()->route('organization.show', $org->id);
        }

        // data for loop select
        $saleProducts = SaleProduct::where('sale_product_status', 'A')->get();
        $countrys = Country::where('country_status', 'A')->get();
        $organisationTypes = OrganisationType::where('org_type_status', 'A')->get();
        $businessTypes = BusinessType::where('business_type_status', 'A')->get();
        $industrialTypes = IndustrialType::where('industrial_type_status', 'A')->get();
        $operations = Operation::where('operation_status', 'A')->get();
        // data relations in id
        $sale_product_items = array();
        foreach ($org->saleProducts as $item){
            $sale_product_items[] = $item->id;
        }
        $country_items = array();
        foreach ($org->countrys as $item){
            $country_items[] = $item->id;
        }
        $industrial_type_items = array();
        foreach ($org->industrialTypes as $item){
            $industrial_type_items[] = $item->id;
        }
        // return $country_items;

        return view('employee.organization.edit',[
            'org' => $org,
            'saleProducts' => $saleProducts,
            'sale_product_items' => $sale_product_items,
            'countrys' => $countrys,
            'country_items' => $country_items,
            'organisationTypes' => $organisationTypes,
            'businessTypes' => $businessTypes,
            'industrialTypes' => $industrialTypes,
            'industrial_type_items' => $industrial_type_items,
            'operations' => $operations,
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
        $this->validateOrganization();

        // store in the database
        $org = Organization::find($id);

        $org->org_name = $request->input('org_name');
        $org->org_name_level_1 = $request->input('org_name_level_1');
        $org->org_name_level_2 = $request->input('org_name_level_2');
        $org->org_number = $request->input('org_number');
        $org->org_building = $request->input('org_building');
        $org->org_floor = $request->input('org_floor');
        $org->org_address = $request->input('org_address');
        $org->org_soi = $request->input('org_soi');
        $org->org_road = $request->input('org_road');
        $org->province_info_ch_id = $request->input('province_info_ch_id');
        $org->province_info_am_id = $request->input('province_info_am_id');
        $org->province_info_ta_id = $request->input('province_info_ta_id');
        $org->org_postcode = $request->input('org_postcode');
        $org->org_phone = $request->input('org_phone');
        $org->org_fax = $request->input('org_fax');
        $org->org_email = $request->input('org_email');
        $org->org_website = $request->input('org_website');
        $org->org_lat = $request->input('org_lat');
        $org->org_long = $request->input('org_long');
        $org->org_capital = $request->input('org_capital');
        $org->org_employee_amount = $request->input('org_employee_amount');
        $org->organisation_type_id = $request->input('organisation_type_id');
        $org->organisation_type_other = $request->input('organisation_type_other');
        $org->business_type_id = $request->input('business_type_id');
        $org->business_type_other = $request->input('business_type_other');
        $org->industrial_type_other = $request->input('industrial_type_other');
        $org->quality_system_other = $request->input('quality_system_other');
        
        if($org->save()) {
            // save multi data for relations many to many
            $org->saleProducts()->sync($request->input('sale_products'));
            $org->countrys()->sync($request->input('countrys'));
            $org->industrialTypes()->sync($request->input('industrial_types'));

            // clean
            QualitySystemIso9000::where('org_id', $id)
                ->update([
                    'operation_id' => $request->input('iso_9000_operation_id'),
                    'scoped' => $request->input('iso_9000_scoped'),
                    'certification_agency' => $request->input('iso_9000_certification_agency'),
                    'accredited' => $request->input('iso_9000_accredited'),
                ]);

            // clean
            QualitySystemIso14000::where('org_id', $id)
                ->update([
                    'operation_id' => $request->input('iso_14000_operation_id'),
                    'scoped' => $request->input('iso_14000_scoped'),
                    'certification_agency' => $request->input('iso_14000_certification_agency'),
                    'accredited' => $request->input('iso_14000_accredited'),
                ]);

            // clean
            QualitySystemIsoHaccp::where('org_id', $id)
                ->update([
                    'operation_id' => $request->input('iso_haccp_operation_id'),
                    'scoped' => $request->input('iso_haccp_scoped'),
                    'certification_agency' => $request->input('iso_haccp_certification_agency'),
                    'accredited' => $request->input('iso_haccp_accredited'),
                ]);

            // create log activity
            LogActivity::addToLog("Edit Organization : $org->id : $org->org_name successfully.");
            
            return redirect()->route('organization.show', $org->id);
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
        // find org that will disabled
        $org = Organization::findOrFail($id);

        // // check Lab in this Organize that disabled yet ?
        // $chk_lab_in_org = count($org->labs);
        // // return $chk_lab_in_org;

        // if ($chk_lab_in_org == 0) {
        //     $org->completed = TRUE;
        //     $org->save();
        //     return redirect()->route('organization.index');
        // } else {
        //     return redirect()->route('organization.index')->with('error', 'ไม่สามารถยกเลิกองค์กรนี้ได้ เนื่องจากในองค์กรนี้ยังมีห้องปฏิบัติการ เครื่องมือวิทยาศาสตร์ หรือข้อมูลผลิตภัณฑ์ และรายการวิจัย/ทดสอบ/สอบเทียบ
        //     กรุณาตรวจสอบอีกครั้ง !!');
        // }
        
        $lab = array();
        foreach ($org->labs as $item) {
            $lab[] = $item->completed;
        }
        
        if (empty($lab)) {
            $org->completed = TRUE;
            $org->save();
            return redirect()->route('organization.index');
        } else {
            for ($i=0; $i < count($lab); $i++) { 
                if($lab[$i] == 0){
                    return redirect()->route('organization.index')->with('error', '!! ไม่สามารถยกเลิกข้อมูลองค์กรได้ เนื่องจากในองค์กรยังมีข้อมูลห้องปฏิบัติการ เครื่องมือวิทยาศาสตร์ หรือข้อมูลผลิตภัณฑ์ และรายการวิจัย/ทดสอบ/สอบเทียบ กรุณาตรวจสอบอีกครั้ง !!');
                } else {
                    $org->completed = TRUE;
                    $org->save();
                    return redirect()->route('organization.index');
                }
            }
        }
        
    }

    /**
     * Validate data in request 
     */
    protected function validateOrganization()
    {
        return request()->validate([
            'org_name' => 'required',
            'org_name_level_1' => '',
            'org_name_level_2' => '',
            'org_number' => '',
            'org_building' => '',
            'org_floor' => '',            
            'org_address' => 'required',       
            'org_soi' => '',
            'org_road' => '',            
            'province_info_ch_id' => 'required',
            'province_info_am_id' => 'required',
            'province_info_ta_id' => 'required',
            'org_postcode' => 'required|min:5|max:5',
            'org_phone' => '',            
            'org_fax' => '',
            'org_email' => '',
            'org_website' => '',
            'org_lat' => '',
            'org_long' => '',           
            'org_capital' => '',          
            'org_employee_amount' => '',  
            'sale_products' => [''],
            'countrys' => [''],
            'organisation_type_id' => 'required',  
            'organisation_type_other' => '',
            'business_type_id' => 'required',
            'business_type_other' => '',
            'industrial_types' => [''],
            'industrial_type_other' => '',
            'quality_system_other' => '',
            'iso_9000_operation_id' => '',
            'iso_9000_scoped' => '',
            'iso_9000_certification_agency' => '',
            'iso_9000_accredited' => '',
            'iso_14000_operation_id' => '',
            'iso_14000_scoped' => '',
            'iso_14000_certification_agency' => '',
            'iso_14000_accredited' => '',
            'iso_haccp_operation_id' => '',
            'iso_haccp_scoped' => '',
            'iso_haccp_certification_agency' => '',
            'iso_haccp_accredited' => '',
        ]);
    }
}
