@extends('layouts.admin')

@section('page')
    Edit Equipment
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
	<div class="row">
		<!-- column -->
		<div class="col-md-12">
			<!-- general form elements -->
            <div class="card card-info">
				<div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> แก้ไขข้อมูลเครื่องมือวิทยาศาสตร์ :</h3>
                </div>
                <!-- /.card-header -->
				<!-- form start -->
				<form action="/equipment/{{ $equipment->id }}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
					@method('PUT')
					<input type="hidden" name="survey_status_id" value="{{ $equipment->lab->survey_status_id }}">
					<div class="card-body py-2">
						<div class="row">
							<div class="col-md-12">
                                <blockquote class="m-0 bg-light">
                                    <mark>Ref.รหัสเอกสาร</mark> : {{ $equipment->id }}
                                    <strong>|</strong> 
                                    <mark>ปรับปรุงข้อมูลล่าสุด</mark> : <i class="far fa-clock"></i> {{ $equipment->updated_at }}
                                    <strong>|</strong>
                                    <mark>สถานะ</mark> :
                                    @switch($equipment->lab->survey_status_id)
										@case(1)
											<small class="badge badge-secondary">
												{{ $equipment->lab->surveyStatus->survey_status_name_th }}
											</small>
											@break
										@case(2)
											<small class="badge badge-primary">
												{{ $equipment->lab->surveyStatus->survey_status_name_th }}
											</small>
											@break
										@case(3)
											<small class="badge badge-info">
												{{ $equipment->lab->surveyStatus->survey_status_name_th }}
											</small>
											@break
										@case(4)
											<small class="badge badge-success">
												{{ $equipment->lab->surveyStatus->survey_status_name_th }}
											</small>
											@break
										@case(5)
											<small class="badge badge-warning">
												{{ $equipment->lab->surveyStatus->survey_status_name_th }}
											</small>
											@break
										@default
									@endswitch
                                </blockquote>
							</div>
							{{-- /.col Ref.รหัสเอกสาร --}}
                            <div class="col-md-12 my-2">
                                <strong>หมายเหตุ :<span><sup class="text-danger"> * </sup>จำเป็น</span></strong>
                            </div>
                            {{-- /.col  --}}
							<div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label for="lab_id">
										ห้องปฏิบัติการ :<span><sup class="text-danger"> *</sup></span>
									</label>
                                    <select class="form-control custom-select select2 @error('lab_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="lab_id" id="lab_id" required>
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($labs as $item)
                                        <option value="{{ $item->id }}" {{ $equipment->lab_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->lab_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('lab_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
							</div>
							{{-- /.col ห้องปฏิบัติการ : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_code">
										3.1 รหัสเครื่องมือ (AABCC-MNN-RRRSS) :<span><sup class="text-danger"> </sup></span>
									</label>
									<input type="text" name="equipment_code" id="equipment_code" class="form-control @error('equipment_code') is-invalid @enderror" placeholder="ระบบทำการสร้างให้อัตโนมัติ" value="{{ $equipment->equipment_code }}" required readonly>
									@error('equipment_code')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							{{-- /.col 3.1 รหัสเครื่องมือ (AABCC-MNN-RRRSS) : --}}
							<div class="col-md-6">
								<div class="form-group ">
									<label for="science_tool_id">
										3.2 ชื่อเครื่องมือ (ภาษาอังกฤษ) :<span><sup class="text-danger"> *</sup></span>
									</label>
									<select class="form-control custom-select select2 @error('science_tool_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="science_tool_id" id="science_tool_id" required>
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($scienceTools as $item)
                                        <option value="{{ $item->id }}" {{ $equipment->science_tool_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->science_tool_name }} : {{ $item->science_tool_abbr }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('science_tool_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group d-none" id="display_science_tool_other_name">
									<label for="science_tool_other_name">
										ในกรณีเลือกอื่นๆ โปรดระบุ ชื่อเครื่องมือ (ภาษาอังกฤษ) :<span><sup class="text-danger"> *</sup></span>
									</label>
									<input class="form-control @error('science_tool_other_name') is-invalid @enderror" type="text" name="science_tool_other_name" id="science_tool_other_name" placeholder="" value="{{ $equipment->science_tool_other_name }}">
									@error('science_tool_other_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							{{-- <div class="col-md-6">
								<div class="form-group d-none" id="display_science_tool_other_abbr">
									<label for="science_tool_other_abbr">
										ชื่อย่อเครื่องมือ (ภาษาอังกฤษ) :<span><sup class="text-danger"> *</sup></span>
									</label>
									<input class="form-control @error('science_tool_other_abbr') is-invalid @enderror" type="text" name="science_tool_other_abbr" id="science_tool_other_abbr" placeholder="" value="{{ $equipment->science_tool_other_abbr }}">
									@error('science_tool_other_abbr')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div> --}}
							{{-- /.col --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_name_th">3.3 ชื่อเครื่องมือ (ภาษาไทย) :</label>
									<input type="text" name="equipment_name_th" id="equipment_name_th" class="form-control" value="{{ $equipment->equipment_name_th }}">
								</div>
							</div>
							{{-- /.col 3.3 ชื่อเครื่องมือ (ภาษาไทย) : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_brand">3.4 ยี่ห้อของเครื่องมือ :</label>
									<input type="text" name="equipment_brand" id="equipment_brand" class="form-control" value="{{ $equipment->equipment_brand }}">
								</div>
							</div>
							{{-- /.col 3.4 ยี่ห้อของเครื่องมือ : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_model">3.5 รุ่นของเครื่องมือ :</label>
									<input type="text" name="equipment_model" id="equipment_model" class="form-control" value="{{ $equipment->equipment_model }}">
								</div>
							</div>
							{{-- /.col 3.5 รุ่นของเครื่องมือ : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_number">3.6 รหัสเครื่องมือของหน่วยงาน/รหัสครุภัณฑ์ (ถ้ามี) :</label>
									<input type="text" name="equipment_number" id="equipment_number" class="form-control" value="{{ $equipment->equipment_number }}">
								</div>							
							</div>
							{{-- /.col 3.6 รหัสเครื่องมือของหน่วยงาน/รหัสครุภัณฑ์ (ถ้ามี) : --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_year">3.7 ปีที่ซื้อ :</label>
									<input type="number" name="equipment_year" id="equipment_year" class="form-control" min="0" placeholder="กรอกเฉพาะตัวเลขเท่านั้น" value="{{ $equipment->equipment_year }}">
								</div>
							</div>
							{{-- /.col 3.7 ปีที่ซื้อ : --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_price">3.8 มูลค่า (บาท) : กรอกเฉพาะตัวเลขเท่านั้น</label>
									<input type="number" name="equipment_price" id="equipment_price" class="form-control" min="0" placeholder="กรอกเฉพาะตัวเลขเท่านั้น" value="{{ $equipment->equipment_price }}">
								</div>
							</div>
							{{-- /.col 3.8 มูลค่า (บาท) : --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_supplier">3.9 บริษัทที่จัดจำหน่าย :</label>
									<input type="text" name="equipment_supplier" id="equipment_supplier" class="form-control" value="{{ $equipment->equipment_supplier }}">
								</div>
							</div>
							{{-- /.col 3.9 บริษัทที่จัดจำหน่าย : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="major_technology_id">
										3.10 สาขาเทคโนโลยีของเครื่องมือ (เลือกได้มากกว่า 1 คำตอบ) :<span><sup class="text-danger"> *</sup></span>
									</label>
									<select class="form-control custom-select select2-multi @error('major_technology_id') is-invalid @enderror" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="major_technology_id[]" id="major_technology_id" required>
                                        @foreach ($majorTechnologies as $item)
                                        <option value="{{ $item->id }}" {{ in_array($item->id, old('major_technology_id') ? : []) ? 'selected' : '' }}>
                                            {{ $item->major_tech_name }}
                                        </option>
                                        @endforeach
									</select>
									@error('major_technology_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group d-none" id="display_major_technology_other">
									<label for="major_technology_other">
										กรณีเลือกอื่น ๆ โปรดระบุ :<span><sup class="text-danger"> *</sup>
									</label>
									<input class="form-control" type="text" name="major_technology_other" id="major_technology_other" placeholder="โปรดระบุรายละเอียด" value="{{ $equipment->major_technology_other }}">
								</div>
							</div>
							{{-- /.col 3.10 สาขาเทคโนโลยีของเครื่องมือ (เลือกได้มากกว่า 1 คำตอบ) : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="objective_usage_id">
										3.11 วัตถุประสงค์การใช้งาน (เลือกได้มากกว่า 1 คำตอบ) :<span><sup class="text-danger"> *</sup></span>
									</label>
									<select class="form-control custom-select select2-multi @error('objective_usage_id') is-invalid @enderror" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="objective_usage_id[]" id="objective_usage_id" required>
                                        @foreach ($objectiveUsages as $item)
										<option value="{{ $item->id }}" {{ in_array($item->id, old('objective_usage_id') ? : []) ? 'selected' : '' }}>
											{{ $item->obj_usage_name }}
										</option>
										@endforeach
									</select>
									@error('objective_usage_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							{{-- /.col 3.11 วัตถุประสงค์การใช้งาน (เลือกได้มากกว่า 1 คำตอบ) : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_usage_id">
										3.12 ขอบเขตการใช้เครื่องมือ :<span><sup class="text-danger"> *</sup>
									</label>
									<select class="form-control custom-select select2 @error('equipment_usage_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="equipment_usage_id" id="equipment_usage_id" required>
										<option value="" selected disabled="disabled">disabled</option>
										@foreach ($equipmentUsages as $item)
										<option value="{{ $item->id }}" {{ $equipment->equipment_usage_id ==  $item->id ? 'selected' : '' }}>
											{{ $item->equipment_usage_name }}
										</option>
										@endforeach
									</select>
									@error('equipment_usage_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror									
								</div>
							</div>
							{{-- /.col 3.12 ขอบเขตการใช้เครื่องมือ : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_ability">3.13 ความสามารถของเครื่อง/ความละเอียด :</label>
									<input type="text" class="form-control" name="equipment_ability" id="equipment_ability" value="{{ $equipment->equipment_ability }}">
								</div>
							</div>
							{{-- /.col 3.13 ความสามารถของเครื่อง/ความละเอียด : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_image">3.14 รูปภาพเครื่องมือ (.jpg, .jpeg, .png) :</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('equipment_image') is-invalid @enderror" name="equipment_image" id="equipment_image">
                                        <label class="custom-file-label" for="equipment_image">
                                            Choose file...
                                        </label>                                            
                                        @error('equipment_image')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
                                        @enderror
                                    </div>                                   																	
								</div>
							</div>
							{{-- /.col 3.14 รูปภาพเครื่องมือ (.jpg, .jpeg, .png) : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_calibration_id">3.15 การสอบเทียบ :</label>
									<select class="form-control custom-select select2"  data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="equipment_calibration_id" id="equipment_calibration_id">
										<option value="" selected disabled="disabled">disabled</option>
										<option value="1" {{ $equipment->equipment_calibration_id ==  1 ? 'selected' : '' }}>ไม่มี</option>
										<option value="2" {{ $equipment->equipment_calibration_id ==  2 ? 'selected' : '' }}>มี</option>
									</select>
								</div>
								<div class="form-group d-none" id="display_equipment_calibration_by">
									<label for="equipment_calibration_by">
										กรณีเลือก "มี" โปรดระบุ ชื่อหน่วยงานสอบเทียบ :<span><sup class="text-danger"> *</sup>
									</label>
									<input class="form-control" type="text" name="equipment_calibration_by" id="equipment_calibration_by" placeholder="" value="{{ $equipment->equipment_calibration_by }}">
								</div>
								<div class="form-group d-none" id="display_equipment_calibration_year">
									<label for="equipment_calibration_by">
										กรณีเลือก "มี" โปรดระบุ วัน/เดือน/ปี :<span><sup class="text-danger"> *</sup>
									</label>
									<input class="form-control" type="text" name="equipment_calibration_year" id="equipment_calibration_year" placeholder="" value="{{ $equipment->equipment_calibration_year }}">
								</div>
							</div>
							{{-- /.col 3.15 การสอบเทียบ : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_maintenance_id">
										3.16 การตรวจเช็ค/บำรุงรักษาเครื่องมืออุปกรณ์ทางวิทยาศาสตร์ :<span><sup class="text-danger"> *</sup>
									</label>
									<select class="form-control custom-select select2 @error('equipment_maintenance_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="equipment_maintenance_id" id="equipment_maintenance_id" required>
										<option value="" selected disabled="disabled">disabled</option>
										@foreach ($equipmentMaintenances as $item)
										<option value="{{ $item->id }}" {{ $equipment->equipment_maintenance_id ==  $item->id ? 'selected' : '' }}>
											{{ $item->equipment_maintenance_name }}
										</option>
										@endforeach
									</select>
									@error('equipment_maintenance_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group d-none" id="display_equipment_maintenance_other">
									<label for="equipment_maintenance_other">
										ในกรณีเลือกอื่น ๆ โปรดระบุ :<span><sup class="text-danger"> *</sup>
									</label>
									<input class="form-control" type="text" name="equipment_maintenance_other" id="equipment_maintenance_other" placeholder="" value="{{ $equipment->equipment_maintenance_other }}">
								</div>
							</div>
							{{-- /.col 3.16 การตรวจเช็ค/บำรุงรักษาเครื่องมืออุปกรณ์ทางวิทยาศาสตร์ : --}}
							<div class="col-md-6">
								<div class="form-group">    
									<label for="equipment_maintenance_budget">3.17 งบประมาณในการบำรุงรักษา/สอบเทียบ ต่อปี (บาท) :</label>
									<input type="number" min="0" class="form-control" name="equipment_maintenance_budget" id="equipment_maintenance_budget" placeholder="กรอกเฉพาะตัวเลขเท่านั้น" value="{{ $equipment->equipment_maintenance_budget }}">
								</div>
							</div>
							{{-- /.col 3.17 งบประมาณในการบำรุงรักษา/สอบเทียบ ต่อปี (บาท) : --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_admin_name">
										3.18 ชื่อผู้ดูแลเครื่องมือ :<span><sup class="text-danger"> *</sup>
									</label>
									<input type="text" class="form-control @error('equipment_admin_name') is-invalid @enderror" name="equipment_admin_name" id="equipment_admin_name" value="{{ $equipment->equipment_admin_name }}" required>
									@error('equipment_admin_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							{{-- /.col 3.18 ชื่อผู้ดูแลเครื่องมือ : --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_admin_phone">เบอร์โทรศัพท์ :</label>
									<input type="text" class="form-control" name="equipment_admin_phone" id="equipment_admin_phone" value="{{ $equipment->equipment_admin_phone }}">
								</div>
							</div>
							{{-- /.col เบอร์โทรศัพท์ --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_admin_email">อีเมล :</label>
									<input type="email" class="form-control" name="equipment_admin_email" id="equipment_admin_email" value="{{ $equipment->equipment_admin_email }}">
								</div>
							</div>
							{{-- /.col อีเมล : --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_manual_id">3.19 คู่มือการใช้งาน :</label>
									<select class="form-control custom-select select2 @error('equipment_manual_id') is-invalid @enderror"  data-placeholder="-- โปรดเลือก --" style="width: 100%;"  name="equipment_manual_id" id="equipment_manual_id">
										<option value="" selected disabled="disabled">disabled</option>
										<option value="1" {{ $equipment->equipment_manual_id ==  1 ? 'selected' : '' }}>ไม่มี</option>
										<option value="2" {{ $equipment->equipment_manual_id ==  2 ? 'selected' : '' }}>มี</option>
									</select>
									@error('equipment_manual_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group d-none" id="display_equipment_manual_name">
									<label for="equipment_manual_name">
										กรณีเลือก "มี" โปรดระบุ ชื่อคู่มือ/รหัสคู่มือ :<span><sup class="text-danger"> *</sup>
									</label>
									<input type="text" class="form-control" name="equipment_manual_name" id="equipment_manual_name" placeholder="" value="{{ $equipment->equipment_manual_name }}">
								</div>
								<div class="form-group d-none" id="display_equipment_manual_locate">
									<label for="equipment_manual_location">
										กรณีเลือก "มี" โปรดระบุ สถานที่จัดเก็บ/ลิงก์ดาวน์โหลด :<span><sup class="text-danger"> *</sup>
									</label>
									<input type="text" class="form-control" name="equipment_manual_location" id="equipment_manual_location" placeholder="" value="{{ $equipment->equipment_manual_location }}">
								</div>
							</div>
							{{-- /.col 3.19 คู่มือการใช้งาน --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_rent_id">
										3.20 การให้เช่าใช้เครื่องมือ :<span><sup class="text-danger"> *</sup>
									</label>
									<select class="form-control custom-select select2 @error('equipment_rent_id') is-invalid @enderror"  data-placeholder="-- โปรดเลือก --" style="width: 100%;"  name="equipment_rent_id" id="equipment_rent_id" required>
										<option value="" selected disabled="disabled">disabled</option>
										<option value="1" {{ $equipment->equipment_rent_id ==  1 ? 'selected' : '' }}>
											ไม่ให้บุคคลภายนอกเช่า
										</option>
										<option value="2" {{ $equipment->equipment_rent_id ==  2 ? 'selected' : '' }}>
											ให้บุคคลภายนอกเช่าใช้ได้
										</option>
									</select>
									@error('equipment_rent_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group" id="display_equipment_rent_fee">
									<label for="equipment_rent_fee">
										3.20.1 ค่าบริการต่อครั้ง (บาท) หากไม่คิดระบุเป็น "0 บาท" :<span><sup class="text-danger"> *</sup>
									</label>
									<input type="text" class="form-control" name="equipment_rent_fee" id="equipment_rent_fee" value="{{ $equipment->equipment_rent_fee }}">
								</div>
								<div class="form-group" id="display_equipment_rent_detail">
									<label for="equipment_rent_detail">
										3.20.2 เงื่อนไขการขอยืม/ใช้งานเครื่องมือ :<span><sup class="text-danger"> *</sup>
									</label>
									<input type="text" class="form-control" name="equipment_rent_detail" id="equipment_rent_detail" placeholder="" value="{{ $equipment->equipment_rent_detail }}">
								</div>
							</div>
							{{-- /.col 3.20 การให้เช่าใช้เครื่องมือ : --}}
						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<a href="/equipment/{{ $equipment->id }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-undo"></i> ย้อนกลับ
                        </a>
						@switch($equipment->lab->survey_status_id)
							@case(1)
								<button type="submit" class="btn btn-info btn-sm">
									<i class="fas fa-save"></i> บันทึกการแก้ไข
								</button>
								@break
							@case(3)
								<button type="submit" class="btn btn-info btn-sm">
									<i class="fas fa-save"></i> บันทึกการแก้ไข
								</button>
								@break
							@case(5)
								<button type="submit" class="btn btn-info btn-sm">
									<i class="fas fa-save"></i> บันทึกการแก้ไข
								</button>
								@break
							@default
						@endswitch
					</div>
					<!-- /.card-footer -->
				</form>
				<!-- form end -->
			</div>
			{{-- /.card --}}
		</div>
		{{-- /.col --}}
	</div>
	{{-- ./row --}}
@endsection

@section('scripts')
    <script src="{{ asset('js/components.js') }}"></script>
    <script src="{{ asset('js/form-equipment.js') }}"></script>
    <script type="text/javascript">
		$('#major_technology_id').val({{ $major_technology_item }});
        $('#major_technology_id').trigger('change');
		$('#objective_usage_id').val({{ $objective_usage_item }});
        $('#objective_usage_id').trigger('change');
    </script>
@endsection