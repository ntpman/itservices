@extends('layouts.admin')

@section('page')
    Create Organization 
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-edit"></i> เพิ่มข้อมูลองค์กร :</h3>           
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/organization" method="POST" role="form">
                    @csrf
                    <div class="card-body py-2">
                        <div class="row">
                            <div class="col-md-12 my-2">
                                <strong>ส่วนที่ 1 ข้อมูลองค์กร : หมายเหตุ :<span><sup class="text-danger"> * </sup>จำเป็น</span></strong>
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_name">
                                        1.1 ชื่อหน่วยงาน :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <input type="text" name="org_name" class="form-control @error('org_name') is-invalid @enderror" id="org_name" placeholder="" value="{{ old('org_name') }}" required>
                                    @error('org_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            {{-- <strong>text assignment</strong> --}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 1.1 ชื่อหน่วยงาน --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_name_level_1">ชื่อหน่วยงานย่อย ระดับที่ 1 :</label>
                                    <input type="text" name="org_name_level_1" class="form-control" id="org_name_level_1" placeholder="" value="{{ old('org_name_level_1') }}">
                                </div>
                            </div>
                            {{-- /.col ชื่อหน่วยงานย่อย ระดับที่ 1 : --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_name_level_2">ชื่อหน่วยงานย่อย ระดับที่ 2 :</label>
                                    <input type="text" name="org_name_level_2" class="form-control" id="org_name_level_2" placeholder="" value="{{ old('org_name_level_2') }}">
                                </div>
                            </div>
                            {{-- /.col ชื่อหน่วยงานย่อย ระดับที่ 2 : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_code">
                                        1.2 รหัสหน่วยงาน (AABCC) :<span><sup class="text-danger"> </sup></span>
                                    </label>
                                    <input type="text" name="org_code" class="form-control @error('org_code') is-invalid @enderror" id="org_code" placeholder="ระบบจะสร้างรหัสให้อัตโนมัติ" value="{{ old('org_code') }}" required disabled>
                                    @error('org_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 1.2 รหัสหน่วยงาน (AABCC) : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_number">1.3	หมายเลขประจำหน่วยงาน (ถ้ามี) :</label>
                                    <input type="text" name="org_number" class="form-control" id="org_number" placeholder="" value="{{ old('org_number') }}">
                                </div>
                            </div>
                            {{-- /.col 1.3 หมายเลขประจำหน่วยงาน (ถ้ามี) : --}}
                            <div class="col-md-12">
                                <label>1.4	ที่อยู่</label>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_building">อาคาร :</label>
                                    <input type="text" name="org_building" class="form-control" id="org_building" placeholder="" value="{{ old('org_building') }}">
                                </div>
                            </div>
                            {{-- /.col อาคาร --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_floor">ชั้น :</label>
                                    <input type="text" name="org_floor" class="form-control" id="org_floor" placeholder="" value="{{ old('org_floor') }}">
                                </div>
                            </div>
                            {{-- /.col ชั้น --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_address">
                                        เลขที่ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <input type="text" name="org_address" class="form-control @error('org_address') is-invalid @enderror" id="org_address" placeholder="" value="{{ old('org_address') }}" required>
                                    @error('org_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col เลขที่ --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_soi">ซอย :</label>
                                    <input type="text" name="org_soi" class="form-control" id="org_soi" placeholder="" value="{{ old('org_soi') }}">
                                </div>
                            </div>
                            {{-- /.col ซอย --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_road">ถนน :</label>
                                    <input type="text" name="org_road" class="form-control" id="org_road" placeholder="" value="{{ old('org_road') }}">
                                </div>
                            </div>
                            {{-- /.col ถนน --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="province_info_ch_id">
                                        จังหวัด :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('province_info_ch_id') is-invalid @enderror" data-placeholder="-- โปรดเลือกจังหวัด --" style="width: 100%;" name="province_info_ch_id" id="province_info_ch_id" data-value="{{ old('province_info_ch_id') }}" required>
                                        <option value="" selected disabled="disabled">-- โปรดเลือกจังหวัด --</option>
                                    </select>
                                    @error('province_info_ch_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                            </div>
                            {{-- /.col จังหวัด --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="province_info_am_id">
                                        เขต/อำเภอ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('province_info_am_id') is-invalid @enderror" data-placeholder="-- โปรดเลือกเขต/อำเภอ --" style="width: 100%;" name="province_info_am_id" id="province_info_am_id" data-value="{{ old('province_info_am_id') }}" required>
                                        <option value="" selected disabled="disabled">-- โปรดเลือกเขต/อำเภอ --</option>
                                    </select>
                                    @error('province_info_am_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col เขต/อำเภอ --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="province_info_ta_id">
                                        แขวง/ตำบล :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('province_info_ta_id') is-invalid @enderror" data-placeholder="-- โปรดเลือกแขวง/ตำบล --" style="width: 100%;" name="province_info_ta_id" id="province_info_ta_id" data-value="{{ old('province_info_ta_id') }}" required>
                                        <option value="" selected disabled="disabled">-- เลือกแขวง/ตำบล --</option>
                                    </select>
                                    @error('province_info_ta_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col แขวง/ตำบล --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_postcode">
                                        รหัสไปรษณีย์ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <input type="text" name="org_postcode" class="form-control @error('org_postcode') is-invalid @enderror" id="org_postcode" placeholder="" value="{{ old('org_postcode') }}" data-inputmask='"mask": "99999"' data-mask required>
                                    @error('org_postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col รหัสไปรษณีย์ --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_phone">โทรศัพท์ :</label>
                                    <input type="text" name="org_phone" class="form-control @error('org_phone') is-invalid @enderror" id="org_phone" placeholder="" value="{{ old('org_phone') }}">
                                    @error('org_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col โทรศัพท์ --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_fax">โทรสาร :</label>
                                    <input type="text" name="org_fax" class="form-control" id="org_fax" placeholder="" value="{{ old('org_fax') }}">
                                </div>
                            </div>
                            {{-- /.col โทรสาร --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_email">อีเมล :</label>
                                    <input type="email" name="org_email" class="form-control" id="org_email" placeholder="" value="{{ old('org_email') }}" autocomplete="email">
                                </div>
                            </div>
                            {{-- /.col อีเมล --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_website">เว็บไซต์ :</label>
                                    <input type="text" name="org_website" class="form-control" id="org_website" placeholder="" value="{{ old('org_website') }}">
                                </div>
                            </div>
                            {{-- /.col เว็บไซต์ --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_lat">ละติจูด :</label>
                                    <input type="text" name="org_lat" class="form-control" id="org_lat" placeholder="" value="{{ old('org_lat') }}">
                                </div>
                            </div>
                            {{-- /.col ละติจูด --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_long">ลองจิจูด :</label>
                                    <input type="text" name="org_long" class="form-control" id="org_long" placeholder="" value="{{ old('org_long') }}">
                                </div>
                            </div>
                            {{-- /.col ลองจิจูด --}}
                            <div class="col-md-6">                        
                                <div class="form-group">
                                    <label for="org_capital">1.5 ทุนจดทะเบียน (ล้านบาท) :</label>
                                    <input type="number" name="org_capital" min="0" class="form-control" id="org_capital" placeholder="" value="{{ old('org_capital') }}">
                                </div>
                            </div>
                            {{-- /.col 1.5 ทุนจดทะเบียน (ล้านบาท) : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_employee_amount">
                                        1.6 จำนวนบุคลากร (คน) :<span><sup class="text-danger"> </sup></span>
                                    </label>
                                    <input type="number" name="org_employee_amount" min="0" class="form-control @error('org_employee_amount') is-invalid @enderror" id="org_employee_amount" placeholder="" value="{{ old('org_employee_amount') }}">
                                    @error('org_employee_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 1.6 จำนวนบุคลากร (คน) : --}}
                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <label for="'sale_products">1.7 การจำหน่าย/ส่งออกสินค้า/บริการ (เลือกได้มากกว่า 1 คำตอบ) :</label>
                                    <select class="form-control custom-select select2-multi" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="sale_products[]" id="sale_products" data-value="{{ old('sale_products[]') }}">
                                        {{-- <option value="" disabled="disabled">disabled</option> --}}
                                        @foreach ($saleProducts as $saleProduct)
                                        <option value="{{ $saleProduct->id }}" {{ in_array($saleProduct->id, old('sale_products') ? : []) ? 'selected' : '' }}>
                                            {{ $saleProduct->sale_product_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group d-none" id="display_country">
                                    <label for="countrys" class="col-md-12 col-form-label">
                                        กรณีต่างประเทศ โปรดระบุ (เลือกได้มากกว่า 1 คำตอบ) :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <div class="col-md-12">
                                        <select class="form-control custom-select select2-multi" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="countrys[]" id="countrys" data-value="{{ old('countrys[]') }}">
                                            {{-- <option value="" disabled="disabled">disabled</option> --}}
                                            @foreach ($countrys as $country)
                                            <option value="{{ $country->id }}" {{ in_array($country->id, old('countrys') ? : []) ? 'selected' : '' }}>
                                                {{ $country->country_name_thai }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- /.col 1.7 การจำหน่าย/ส่งออกสินค้า/บริการ : --}}     
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="organisation_type_id">
                                        1.8 ประเภทองค์กร :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('organisation_type_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="organisation_type_id" id="organisation_type_id" data-value="{{ old('organisation_type_id') }}" required>
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($organisationTypes as $organisationType)
                                        <option value="{{ $organisationType->id }}" {{ ( old('organisation_type_id') == $organisationType->id) ? 'selected' : '' }}>
                                            {{ $organisationType->org_type_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('organisation_type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group d-none" id="display_org_type_other">
                                    <label for="organisation_type_other" class="col-md-12 col-form-label">
                                        โปรดระบุ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" name="organisation_type_other" class="form-control" id="organisation_type_other" placeholder="" value="{{ old('organisation_type_other') }}">
                                    </div>
                                </div>
                            </div>
                            {{-- /.col 1.8 ประเภทองค์กร : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_type_id">
                                        1.9 ประเภทกิจการ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('business_type_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="business_type_id" id="business_type_id" data-value="{{ old('business_type_id') }}" required>
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($businessTypes as $businessType)
                                        <option value="{{ $businessType->id }}" {{ (old('business_type_id') == $businessType->id) ? 'selected' : '' }}>
                                            {{ $businessType->business_type_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row d-none" id="">
                                    <label for="business_type_other" class="col-md-2 col-form-label">
                                        โปรดระบุ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" name="business_type_other" class="form-control" id="business_type_other" placeholder="" value="{{ old('business_type_other') }}">
                                    </div>
                                </div>
                            </div>
                            {{-- /.col 1.9 ประเภทกิจการ : --}}                   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industrial_type">1.10 ประเภทอุตสาหกรรม : (เลือกได้มากกว่า 1 คำตอบ)</label>
                                    <select class="form-control custom-select select2-multi" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="industrial_types[]" id="industrial_types" data-value="{{ old('industrial_types[]') }}">
                                        {{-- <option value="" disabled="disabled">disabled</option> --}}
                                        @foreach ($industrialTypes as $industrialType)
                                            <option value="{{ $industrialType->id }}" {{ in_array($industrialType->id, old('industrial_types') ? : []) ? 'selected' : '' }}>
                                                {{ $industrialType->industrial_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group d-none" id="display_ind_type_other">
                                    <label for="industrial_type_other" class="col-md-12 col-form-label">
                                        โปรดระบุ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" name="industrial_type_other" class="form-control" id="industrial_type_other" placeholder="" value="{{ old('industrial_type_other') }}">
                                    </div>
                                </div>                             
                            </div>
                            <!-- /.col 1.10 ประเภทอุตสาหกรรม : -->
                            <div class="col-md-12">
                                <label for="">1.11 ข้อมูลระบบคุณภาพของหน่วยงาน :</label>
                            </div>                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">ระบบคุณภาพ</label>                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">1.11.1 ISO 9000 series</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="iso_9000_operation_id">การดำเนินการ :</label>
                                                        <select class="custom-select" name="iso_9000_operation_id" data-placeholder="-- โปรดเลือก --" style="width: 100%;">
                                                            <option value="" selected disabled="disabled">-- โปรดเลือก --</option>
                                                            @foreach ($operations as $item)
                                                            <option value="{{ $item->id }}" {{ (old('iso_9000_operation_id') == $item->id) ? 'selected' : '' }}>
                                                                {{ $item->operation_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <label for="">หากได้รับการรับรองแล้ว</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="iso_9000_scoped">ขอบข่าย :</label>
                                                        <input type="text" name="iso_9000_scoped" class="form-control" id="" placeholder="" value="{{ old('iso_9000_scoped') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="iso_9000_certification_agency">หน่วยงานรับรอง :</label>
                                                        <input type="text" name="iso_9000_certification_agency" class="form-control" id="" placeholder="" value="{{ old('iso_9000_certification_agency') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="iso_9000_accredited">ปีที่ได้รับการรับรอง :</label>
                                                        <input type="text" name="iso_9000_accredited" class="form-control" id="" placeholder="" value="{{ old('iso_9000_accredited') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- /.form-group 1.11.1 ISO 9000 series : --}}
                                <hr>
                                <div class="form-group">
                                    <label for="">ระบบคุณภาพ</label>                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">1.11.2 ISO 14000</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="iso_14000_operation_id">การดำเนินการ :</label>
                                                        <select class="custom-select" name="iso_14000_operation_id" data-placeholder="-- โปรดเลือก --" style="width: 100%;">
                                                            <option value="" selected disabled="disabled">-- โปรดเลือก --</option>
                                                            @foreach ($operations as $item)
                                                            <option value="{{ $item->id }}" {{ (old('iso_14000_operation_id') == $item->id) ? 'selected' : '' }}>
                                                                {{ $item->operation_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <label for="">หากได้รับการรับรองแล้ว</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="iso_14000_scoped">ขอบข่าย :</label>
                                                        <input type="text" name="iso_14000_scoped" class="form-control" id="" placeholder="" value="{{ old('iso_14000_scoped') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="iso_14000_certification_agency">หน่วยงานรับรอง :</label>
                                                        <input type="text" name="iso_14000_certification_agency" class="form-control" id="" placeholder="" value="{{ old('iso_14000_certification_agency') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="iso_14000_accredited">ปีที่ได้รับการรับรอง :</label>
                                                        <input type="text" name="iso_14000_accredited" class="form-control" id="" placeholder="" value="{{ old('iso_14000_accredited') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- /.form-group 1.11.2 ISO 14000 : --}}
                                <hr>
                                <div class="form-group">
                                    <label for="">ระบบคุณภาพ</label>                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">1.11.3 ISO HACCP</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="iso_haccp_operation_id">การดำเนินการ :</label>
                                                        <select class="custom-select" name="iso_haccp_operation_id" data-placeholder="-- โปรดเลือก --" style="width: 100%;">
                                                            <option value="" selected disabled="disabled">-- โปรดเลือก --</option>
                                                            @foreach ($operations as $item)
                                                            <option value="{{ $item->id }}" {{ (old('iso_haccp_operation_id') == $item->id) ? 'selected' : '' }}>
                                                                {{ $item->operation_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <label for="">หากได้รับการรับรองแล้ว</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="iso_haccp_scoped">ขอบข่าย :</label>
                                                        <input type="text" name="iso_haccp_scoped" class="form-control" id="" placeholder="" value="{{ old('iso_haccp_scoped') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="iso_haccp_certification_agency">หน่วยงานรับรอง :</label>
                                                        <input type="text" name="iso_haccp_certification_agency" class="form-control" id="" placeholder="" value="{{ old('iso_haccp_certification_agency') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="iso_haccp_accredited">ปีที่ได้รับการรับรอง :</label>
                                                        <input type="text" name="iso_haccp_accredited" class="form-control" id="" placeholder="" value="{{ old('iso_haccp_accredited') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- /.form-group 1.11.2 ISO HACCP : --}}
                                <hr>
                                <div class="form-group">
                                    <label for="">ระบบคุณภาพ</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="quality_system_other">1.11.4 อื่นๆ โปรดระบุ :</label>
                                            <textarea class="form-control col-md-12" name="quality_system_other" rows="3" placeholder="">{{ old('quality_system_other') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- /.form-group 1.11.4 อื่นๆ โปรดระบุ : --}}
                            </div>
                            {{-- /.col 1.11 ข้อมูลระบบคุณภาพของหน่วยงาน : --}}
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="/organization" class="btn btn-secondary btn-sm">
                            <i class="fas fa-undo"></i> ย้อนกลับ
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> บันทึกข้อมูล
                        </button>
                    </div>
                    <!-- /.card-footer -->
                </form>
                <!-- form end -->
            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection

@section('scripts')
    <script src="{{ asset('js/components.js') }}"></script>
    <script src="{{ asset('js/form-org.js') }}"></script>
@endsection