@extends('layouts.admin')

@section('page')
	Bsti Admin Questionnaire Detail
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-primary card-outline">
				<h3 class="card-title"><i class="far fa-folder-open"></i> โปรดตรวจสอบความถูกต้องของข้อมูล</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<blockquote class="mx-0 mt-0 bg-light">
                    <h3><i class="fas fa-user-edit"></i> {{ $lab->user->role->role_name }}</h3>          
                    <div class="d-flex flex-row justify-content-between">
                        <span class="mr-2">
                            <mark>รหัสประจำตัว</mark> : {{ $lab->user->user_code }}
                        </span>                     
                        <span class="mr-2">
                            <mark>ชื่อ-สกุล</mark> : {{ $lab->user->name }}
                        </span>                     
                        <span class="mr-2">
                            <mark>อีเมล</mark> : {{ $lab->user->email }}
                        </span>                     
                        <span class="mr-2">
                            <mark>พื้นที่สำรวจข้อมูล</mark> : {{ $lab->user->region->region_name }}
                        </span>                     
                    </div>
					<!-- /.d-flex -->
					<hr>
                    <div class="d-flex flex-row justify-content-start">
                        <span class="mr-2">
                            <mark>รหัสห้องปฏิบัติการ</mark> : {{ $lab->lab_code }}
						</span>
						<span class="mr-2">
							<a href="/bstiadmin-questionnaire/{{$lab->user_id}}" class="btn btn-secondary btn-xs">
								<i class="fas fa-undo"></i> ย้อนกลับ
							</a>
                        </span>
						@if ($lab->survey_status_id == 2)
						<span class="mr-2">
							<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-approve">
								อนุมัติข้อมูลส่งงานได้
							</button>
                        </span>                     
                        <span class="mr-2">
							<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-reject">
								ตรวจสอบข้อมูลแล้วขอให้แก้ไข
							</button>
                        </span>
						@endif
                    </div>
                    <!-- /.d-flex -->
                </blockquote>
				<div class="card card-primary card-outline card-outline-tabs">
					<div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-four-org-tab" data-toggle="pill" href="#custom-tabs-four-org" role="tab" aria-controls="custom-tabs-four-org" aria-selected="true">
									<mark>ส่วนที่ 1</mark> องค์กร
                                </a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" id="custom-tabs-four-lab-tab" data-toggle="pill" href="#custom-tabs-four-lab" role="tab" aria-controls="custom-tabs-four-lab" aria-selected="false">
									<mark>ส่วนที่ 2</mark> ห้องปฏิบัติการ
                                </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-four-equipment-tab" data-toggle="pill" href="#custom-tabs-four-equipment" role="tab" aria-controls="custom-tabs-four-equipment" aria-selected="false">
									<mark>ส่วนที่ 3</mark> เครื่องมือ 
									<span class="badge badge-primary">
										{{ $equipment_count }}
									</span>
                                </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-four-productLab-tab" data-toggle="pill" href="#custom-tabs-four-productLab" role="tab" aria-controls="custom-tabs-four-productLab" aria-selected="false">
									<mark>ส่วนที่ 4</mark> รายการทดสอบ 
									<span class="badge badge-primary">
										{{ $productLab_count }}
									</span>
                                </a>
							</li>
						</ul>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content" id="custom-tabs-four-tabContent">
							<div class="tab-pane fade" id="custom-tabs-four-org" role="tabpanel" aria-labelledby="custom-tabs-four-org-tab">
								<table class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<th class="" style="width: 30%;">Ref.รหัสเอกสาร : {{ $lab->organization->id }}</th>
											<td>
												<mark>ปรับปรุงข้อมูลล่าสุด</mark> : <i class="far fa-clock"></i> {{ $lab->organization->updated_at }}
											</td>
										</tr>
										{{-- Ref.รหัสเอกสาร --}}
										<tr>
											<th class="" style="width: 30%;">1.1 ชื่อหน่วยงาน :</th>
											<td>{{ $lab->organization->org_name }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">ชื่อหน่วยงานย่อย ระดับที่ 1 :</th>
											<td>{{ $lab->organization->org_name_level_1 }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">ชื่อหน่วยงานย่อย ระดับที่ 2 :</th>
											<td>{{ $lab->organization->org_name_level_2 }}</td>
										</tr>
										{{-- 1.1 --}}
										<tr>
											<th class="" style="width: 30%;">1.2 รหัสหน่วยงาน (AABCC) :</th>
											<td>{{ $lab->organization->org_code }}</td>
										</tr>
										{{-- 1.2 --}}
										<tr>
											<th class="" style="width: 30%;">1.3 หมายเลขประจำหน่วยงาน :</th>
											<td>{{ $lab->organization->org_number }}</td>
										</tr>
										{{-- 1.3 --}}
										<tr>
											<th class="" style="width: 30%;">1.4 ที่อยู่ :</th>
											<td>{{ __('') }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">อาคาร</th>
											<td>{{ $lab->organization->org_building }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">ชั้น</th>
											<td>{{ $lab->organization->org_floor }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">เลขที่</th>
											<td>{{ $lab->organization->org_address }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">ซอย</th>
											<td>{{ $lab->organization->org_soi }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">ถนน</th>
											<td>{{ $lab->organization->org_road }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">แขวง/ตำบล</th>
											<td>{{ $lab->organization->provinceInfoTa->tambon_t }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">เขต/อำเภอ</th>
											<td>{{ $lab->organization->provinceInfoAm->amphoe_t }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">จังหวัด</th>
											<td>{{ $lab->organization->provinceInfoCh->changwat_t }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">รหัสไปรษณีย์</th>
											<td>{{ $lab->organization->org_postcode }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">โทรศัพท์</th>
											<td>{{ $lab->organization->org_phone }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">โทรสาร</th>
											<td>{{ $lab->organization->org_fax }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">อีเมล</th>
											<td>{{ $lab->organization->org_email }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">เว็บไซต์</th>
											<td><a href="{{ $lab->organization->org_website }}" target="_bank">{{ $lab->organization->org_website }}</a></td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">ละติจูด</th>
											<td>{{ $lab->organization->org_lat }}</td>
										</tr>
										<tr>
											<th class="pl-5" style="width: 30%;">ลองจิจูด</th>
											<td>{{ $lab->organization->org_long }}</td>
										</tr>
										{{-- 1.4 --}}
										<tr>
											<th class="" style="width: 30%;">1.5 ทุนจดทะเบียน (ล้านบาท) :</th>
											<td>{{ number_format($lab->organization->org_capital) }}</td>
										</tr>
										{{-- 1.5 --}}
										<tr>
											<th class="" style="width: 30%;">1.6 จำนวนบุคลากร (คน) :</th>
											<td>{{ number_format($lab->organization->org_employee_amount) }}</td>
										</tr>
										{{-- 1.6 --}}
										<tr>
											<th class="" style="width: 30%;">1.7 การจำหน่าย/ส่งออกสินค้า/บริการ :</th>
											<td>
												@forelse ($lab->organization->saleProducts as $item)
													<li>{{ $item->sale_product_name }}</li>
												@empty
													
												@endforelse
												<ol>
													@forelse ($lab->organization->countrys as $item)
														<li>{{ $item->country_name_thai }}</li>
													@empty
			
													@endforelse
												</ol>
											</td>
										</tr>
										{{-- 1.7 --}}
										<tr>
											<th class="" style="width: 30%;">1.8 ประเภทองค์กร :</th>
											<td>
												@if (($lab->organization->organisationType->id) != 5)
													{{ $lab->organization->organisationType->org_type_name }}
												@else
													
												@endif
												@switch(5)
													@case($lab->organization->organisationType->id)
														{{ $lab->organization->organisation_type_other }}
														@break
													@default
														
												@endswitch
											</td>
										</tr>
										{{-- 1.8 --}}
										<tr>
											<th class="" style="width: 30%;">1.9 ประเภทกิจการ :</th>
											<td>{{ $lab->organization->businessType->business_type_name }}</td>
										</tr>
										{{-- 1.9 --}}
										<tr>
											<th class="" style="width: 30%;">1.10 ประเภทอุตสาหกรรม :</th>
											<td>
												@forelse ($lab->organization->industrialTypes as $item)
													@if (($item->id) != 39)
														<li>{{ $item->industrial_type_name }}</li>
													@else
														
													@endif
													
												@empty
													
												@endforelse
												@if ($lab->organization->industrial_type_other != null)
													<li>{{ $lab->organization->industrial_type_other }}</li>
												@endif
											</td>
										</tr>
										{{-- 1.10 --}}
										<tr>
											<th class="" style="width: 30%;">1.11 ข้อมูลระบบคุณภาพของหน่วยงาน :</th>
											<td>{{ __('') }}</td>
										</tr>
										{{-- 1.11 --}}
										<tr>
											<th class="pl-5" style="width: 30%;">1.11.1 ISO 9000 series</th>
											<td>
												@forelse ($lab->organization->qualitySystemIso9000s as $item)
													<div class="row">
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">การดำเนินการ :</strong><hr>
																@if (!empty($item->operation))                                                        
																<span class="description-text text-success">{{ $item->operation->operation_name }}</span>
																@else
																	
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ขอบข่าย :</strong><hr>
																<span class="description-text text-success">{{ $item->scoped }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">หน่วยงานรับรอง :</strong><hr>
																<span class="description-text text-success">{{ $item->certification_agency }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ปีที่ได้รับการรับรอง :</strong><hr>
																<span class="description-text text-success">{{ $item->accredited }}</span>
															</div>
															<!-- /.description-block -->
														</div>
													</div>
													{{-- /.row --}}
												@empty
													
												@endforelse 
											</td>
										</tr>
										{{-- 1.11.1 ISO 9000 series --}}
										<tr>
											<th class="pl-5" style="width: 30%;">1.11.2 ISO 14000</th>
											<td>
												@forelse ($lab->organization->qualitySystemIso14000s as $item)
													<div class="row">
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">การดำเนินการ :</strong><hr>
																@if (!empty($item->operation))                                                        
																<span class="description-text text-success">{{ $item->operation->operation_name }}</span>
																@else
																	
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ขอบข่าย :</strong><hr>
																<span class="description-text text-success">{{ $item->scoped }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">หน่วยงานรับรอง :</strong><hr>
																<span class="description-text text-success">{{ $item->certification_agency }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ปีที่ได้รับการรับรอง :</strong><hr>
																<span class="description-text text-success">{{ $item->accredited }}</span>
															</div>
															<!-- /.description-block -->
														</div>
													</div>
													{{-- /.row --}}
												@empty
													
												@endforelse
											</td>
										</tr>
										{{-- 1.11.2 ISO 14000 --}}
										<tr>
											<th class="pl-5" style="width: 30%;">1.11.3 ISO HACCP</th>
											<td>
												@forelse ($lab->organization->qualitySystemIsoHaccps as $item)
													<div class="row">
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">การดำเนินการ :</strong><hr>
																@if (!empty($item->operation))                                                        
																<span class="description-text text-success">{{ $item->operation->operation_name }}</span>
																@else
																	
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ขอบข่าย :</strong><hr>
																<span class="description-text text-success">{{ $item->scoped }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">หน่วยงานรับรอง :</strong><hr>
																<span class="description-text text-success">{{ $item->certification_agency }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ปีที่ได้รับการรับรอง :</strong><hr>
																<span class="description-text text-success">{{ $item->accredited }}</span>
															</div>
															<!-- /.description-block -->
														</div>
													</div>
													{{-- /.row --}}
												@empty
													
												@endforelse
											</td>
										</tr>
										{{-- 1.11.3 ISO HACCP --}}
										<tr>
											<th class="pl-5" style="width: 30%;">1.11.4 อื่นๆ</th>
											<td>{{ $lab->organization->quality_system_other }}</td>
										</tr>
										{{-- 1.11.4 อื่นๆ : --}}
									</tbody>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade active show" id="custom-tabs-four-lab" role="tabpanel" aria-labelledby="custom-tabs-four-lab-tab">								
								<table class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<th class="" style="width: 30%;">Ref.รหัสเอกสาร : {{ $lab->id }}</th>
											<td>
												<mark>ปรับปรุงข้อมูลล่าสุด</mark> : <i class="far fa-clock"></i> {{ $lab->updated_at }}
												<strong>|</strong>
												<mark>สถานะ</mark> :
												@switch($lab->survey_status_id)
													@case(1)
														<small class="badge badge-secondary">
															{{ $lab->surveyStatus->survey_status_name_th }}
														</small>
														@break
													@case(2)
														<small class="badge badge-primary">
															{{ $lab->surveyStatus->survey_status_name_th }}
														</small>
														@break
													@case(3)
														<small class="badge badge-info">
															{{ $lab->surveyStatus->survey_status_name_th }}
														</small>
														@break
													@case(4)
														<small class="badge badge-success">
															{{ $lab->surveyStatus->survey_status_name_th }}
														</small>
														@break
													@case(5)
														<small class="badge badge-warning">
															{{ $lab->surveyStatus->survey_status_name_th }}
														</small>
														@break
													@default
												@endswitch
											</td>
										</tr>
										{{-- Ref.รหัสเอกสาร --}}
										<tr>
											<th class="" style="width: 35%;">องค์กร :</th>
											<td>
												{{ $lab->organization->org_name }}
												@if(!empty($lab->organization->org_name_level_1)){{' : '.$lab->organization->org_name_level_1}}@else @endif 
												@if(!empty($lab->organization->org_name_level_2)){{' : '.$lab->organization->org_name_level_2}}@else @endif
												| {{ $lab->organization->org_code }}
											</td>
										</tr>
										{{-- องค์กร : --}}
										<tr>
											<th class="" style="width: 35%;">2.1 ชื่อห้องปฎิบัติการ :</th>
											<td>{{ $lab->lab_name }}</td>
										</tr>
										{{-- 2.1 ชื่อห้องปฎิบัติการ : --}}
										<tr>
											<th class="" style="width: 35%;">2.2 รหัสห้องปฏิบัติการ (AABCC-MNN) :</th>
											<td>{{ $lab->lab_code }}</td>
										</tr>
										{{-- 2.2 รหัสห้องปฏิบัติการ (AABCC-MNN) : --}}
										<tr>
											<th class="" style="width: 35%;">2.3 ที่ตั้งห้องปฏิบัติการ :</th>                                
											@if (!empty($lab->locationLab))
											<td>{{ $lab->locationLab->location_name }}</td>
											@else
												
											@endif
										</tr>
										{{-- 2.3 ที่ตั้งห้องปฏิบัติการ : --}}
										<tr>
											<th class="" style="width: 35%;">2.4 ประเภทห้องปฏิบัติการ :</th>                                
											<td>{{ $lab->laboratoryType->lab_type_name }}</td>
										</tr>
										{{-- 2.4 ประเภทห้องปฏิบัติการ : --}}
										<tr>
											<th class="" style="width: 35%;">2.5 ขอบเขตการให้บริการห้องปฏิบัติการ :</th>                                
											<td>{{ $lab->areaService->area_service_name }}</td>
										</tr>
										{{-- 2.5 ขอบเขตการให้บริการห้องปฏิบัติการ : --}}
										<tr>
											<th class="" style="width: 35%;">2.6 จำนวนเจ้าหน้าที่ในห้องปฏิบัติการ (คน) :</th>                                
											<td>{{ $lab->lab_employee_amount }}</td>
										</tr>
										{{-- 2.6 จำนวนเจ้าหน้าที่ในห้องปฏิบัติการ (คน) :--}}
										<tr>
											<th class="" style="width: 35%;">2.7 ระดับการศึกษาของเจ้าหน้าที่ในห้องปฏิบัติการ :</th>
											<td>
												@forelse ($lab->educationLevelLabs as $item)
													<div class="row">
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ประถม (คน) :</strong><hr>
																<span class="description-text text-success">{{ $item->education_primary_amount }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">มัธยม (คน) :</strong><hr>
																<span class="description-text text-success">{{ $item->education_secondary_amount }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ปวช. (คน) :</strong><hr>
																<span class="description-text text-success">{{ $item->education_vocational_amount }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ปวส. (คน) :</strong><hr>
																<span class="description-text text-success">{{ $item->education_high_vocational_amount }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ปริญญาตรี (คน) :</strong><hr>
																<span class="description-text text-success">{{ $item->education_bachelor_amount }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ปริญญาโท (คน) :</strong><hr>
																<span class="description-text text-success">{{ $item->education_master_amount }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ปริญญาเอก (คน) :</strong><hr>
																<span class="description-text text-success">{{ $item->education_doctor_amount }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-3 col-6">
															<div class="description-block">
																<strong class="description-percentage ">อื่นๆ :</strong><hr>
																<span class="description-text text-success">{{ $item->education_other }}</span>
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													{{-- ./row --}}
												@empty
													
												@endforelse
											</td>
										</tr>
										{{-- 2.7 ระดับการศึกษาของเจ้าหน้าที่ในห้องปฏิบัติการ :--}}
										<tr>
											<th class="" style="width: 35%;">2.8 ต้นทุนคงที่ (Fix cost) ของห้องปฏิบัติการต่อปี :</th>                                
											<td>
												@if (!empty($lab->fixed_cost_id))
													{{ $lab->fixedCost->fixed_cost_name }}
												@endif
											</td>
										</tr>
										{{-- 2.8 ต้นทุนคงที่ (Fix cost) ของห้องปฏิบัติการต่อปี :--}}
										<tr>
											<th class="" style="width: 35%;">2.9 รายได้รวมของห้องปฏิบัติการต่อปี :</th>                                
											<td>
												@if (!empty($lab->income_per_year_id))
													{{ $lab->incomePerYear->income_detail }}
												@endif
											</td>
										</tr>
										{{-- 2.9 รายได้รวมของห้องปฏิบัติการต่อปี :--}}
										<tr>
											<th class="" colspan="2" style="">2.10 ข้อมูลการพัฒนาห้องปฏิบัติการ :</th>
										</tr>
										<tr>
											<th class="pl-5" colspan="2" style="">2.10.1 เจ้าหน้าที่ได้รับการฝึกอบรมเพื่อการพัฒนาห้องปฏิบัติการหรือไม่อย่างไร :</th>
										</tr>
										<tr>
											<th class="pl-5" style="width: 35%;">- ISO/IEC17025 :</th>                                
											<td>
												@forelse ($lab->isoIec17025s as $item)
													<div class="row">
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ได้รับการอบรม (คน) :</strong><hr>
																@if (!empty($item->development_amount))
																<span class="description-text text-success">{{ $item->development_amount }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">จำนวน (วัน) :</strong><hr>
																@if (!empty($item->development_day))                                                    
																<span class="description-text text-success">{{ $item->development_day }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ความสนใจในการฝึกอบรม :</strong><hr>                                                    
																@if (!empty($item->development_interested))
																<span class="description-text text-success">สนใจเข้าอบรม</span>
																@else
																<span class="description-text">- ไม่ระบุ -</span>
																@endif                                                    
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													{{-- ./row --}}
												@empty
													
												@endforelse
											</td>
										</tr>
										{{-- ISO/IEC17025 --}}
										<tr>
											<th class="pl-5" style="width: 35%;">- ความไม่แน่นอนในการวัด :</th>                                
											<td>
												@forelse ($lab->uncertaintys as $item)
													<div class="row">
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ได้รับการอบรม (คน) :</strong><hr>
																@if (!empty($item->development_amount))
																<span class="description-text text-success">{{ $item->development_amount }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">จำนวน (วัน) :</strong><hr>
																@if (!empty($item->development_day))                                                    
																<span class="description-text text-success">{{ $item->development_day }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ความสนใจในการฝึกอบรม :</strong><hr>                                                    
																@if (!empty($item->development_interested))
																<span class="description-text text-success">สนใจเข้าอบรม</span>
																@else
																<span class="description-text">- ไม่ระบุ -</span>
																@endif                                                    
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													{{-- /.row --}}
												@empty
													
												@endforelse
											</td>
										</tr>
										{{-- ความไม่แน่นอนในการวัด --}}
										<tr>
											<th class="pl-5" style="width: 35%;">- Method Validation :</th>                                
											<td>
												@forelse ($lab->methods as $item)
													<div class="row">
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ได้รับการอบรม (คน) :</strong><hr>
																@if (!empty($item->development_amount))
																<span class="description-text text-success">{{ $item->development_amount }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">จำนวน (วัน) :</strong><hr>
																@if (!empty($item->development_day))                                                    
																<span class="description-text text-success">{{ $item->development_day }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ความสนใจในการฝึกอบรม :</strong><hr>                                                    
																@if (!empty($item->development_interested))
																<span class="description-text text-success">สนใจเข้าอบรม</span>
																@else
																<span class="description-text">- ไม่ระบุ -</span>
																@endif                                                    
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													{{-- /.row --}}
												@empty
													
												@endforelse
											</td>
										</tr>
										{{-- Method Validation --}}
										<tr>
											<th class="pl-5" style="width: 35%;">- การควบคุมคุณภาพภายใน :</th>                                
											<td>
												@forelse ($lab->internals as $item)
													<div class="row">
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ได้รับการอบรม (คน) :</strong><hr>
																@if (!empty($item->development_amount))
																<span class="description-text text-success">{{ $item->development_amount }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">จำนวน (วัน) :</strong><hr>
																@if (!empty($item->development_day))                                                    
																<span class="description-text text-success">{{ $item->development_day }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ความสนใจในการฝึกอบรม :</strong><hr>                                                    
																@if (!empty($item->development_interested))
																<span class="description-text text-success">สนใจเข้าอบรม</span>
																@else
																<span class="description-text">- ไม่ระบุ -</span>
																@endif                                                    
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													{{-- /.row --}}
												@empty
													
												@endforelse
											</td>
										</tr>
										{{-- การควบคุมคุณภาพภายใน --}}
										<tr>
											<th class="pl-5" style="width: 35%;">- สถิติสำหรับงานทดสอบ :</th>                                
											<td>
												@forelse ($lab->statistics as $item)
													<div class="row">
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ได้รับการอบรม (คน) :</strong><hr>
																@if (!empty($item->development_amount))
																<span class="description-text text-success">{{ $item->development_amount }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">จำนวน (วัน) :</strong><hr>
																@if (!empty($item->development_day))                                                    
																<span class="description-text text-success">{{ $item->development_day }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ความสนใจในการฝึกอบรม :</strong><hr>                                                    
																@if (!empty($item->development_interested))
																<span class="description-text text-success">สนใจเข้าอบรม</span>
																@else
																<span class="description-text">- ไม่ระบุ -</span>
																@endif                                                    
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													{{-- /.row --}}
												@empty
													
												@endforelse
											</td>
										</tr>
										{{-- สถิติสำหรับงานทดสอบ --}}
										<tr>
											<th class="pl-5" style="width: 35%;">- เทคนิคในการใช้เครื่องมือวิทยาศาสตร์ :</th>                                
											<td>
												@forelse ($lab->techniques as $item)
													<div class="row">
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ได้รับการอบรม (คน) :</strong><hr>
																@if (!empty($item->development_amount))
																<span class="description-text text-success">{{ $item->development_amount }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">จำนวน (วัน) :</strong><hr>
																@if (!empty($item->development_day))                                                    
																<span class="description-text text-success">{{ $item->development_day }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ความสนใจในการฝึกอบรม :</strong><hr>                                                    
																@if (!empty($item->development_interested))
																<span class="description-text text-success">สนใจเข้าอบรม</span>
																@else
																<span class="description-text">- ไม่ระบุ -</span>
																@endif                                                    
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													{{-- /.row --}}
												@empty
													
												@endforelse
											</td>
										</tr>
										{{-- เทคนิคในการใช้เครื่องมือวิทยาศาสตร์ --}}
										<tr>
											<th class="pl-5" style="width: 35%;">- ความปลอดภัยในห้องปฏิบัติการ :</th>                                
											<td>
												@forelse ($lab->safetys as $item)
													<div class="row">
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ได้รับการอบรม (คน) :</strong><hr>
																@if (!empty($item->development_amount))
																<span class="description-text text-success">{{ $item->development_amount }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">จำนวน (วัน) :</strong><hr>
																@if (!empty($item->development_day))                                                    
																<span class="description-text text-success">{{ $item->development_day }}</span>
																@else
																<span class="description-text">0</span>
																@endif
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 col-6">
															<div class="description-block">
																<strong class="description-percentage ">ความสนใจในการฝึกอบรม :</strong><hr>                                                    
																@if (!empty($item->development_interested))
																<span class="description-text text-success">สนใจเข้าอบรม</span>
																@else
																<span class="description-text">- ไม่ระบุ -</span>
																@endif                                                    
															</div>
															<!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													{{-- /.row --}}
												@empty
													
												@endforelse
											</td>
										</tr>
										{{-- ความปลอดภัยในห้องปฏิบัติการ --}}
										<tr>
											<th class="pl-5" style="width: 35%;">- อื่น ๆ :</th>                                
											<td>{{ $lab->lab_development_other }}</td>
										</tr>
										{{-- อื่น ๆ --}}
										{{-- 2.10.1 --}}
										<tr>
											<th class="pl-5" style="width: 35%;">2.10.2 เจ้าหน้าที่ห้องปฏิบัติการได้รับการฝึกอบรมเฉลี่ยต่อปี :</th>                                
											<td>{{ $lab->employeeTraining->emp_training_detail }}</td>
										</tr>
										{{-- 2.10.2 --}}
										<tr>
											<th class="pl-5" style="width: 35%;">2.10.3 ห้องปฏิบัติการของท่านมีการจัดการทางด้านสิ่งแวดล้อมในสถานที่ทำงานอย่างไรบ้าง :</th>                                
											<td>{{ $lab->lab_environmental_management }}</td>
										</tr>
										{{-- 2.10.3 --}}
										<tr>
											<th class="pl-5" style="width: 35%;">2.10.4 ปัญหาและอุปสรรคที่พบในการพัฒนาห้องปฏิบัติการทดสอบ :</th>                                
											<td>{{ $lab->lab_development_problem }}</td>
										</tr>
										{{-- 2.10.4 --}}
										<tr>
											<th class="pl-5" style="width: 35%;">2.10.5 ความต้องการที่จะได้รับการสนับสนุนเพื่อพัฒนาห้องปฏิบัติการทดสอบ :</th>                                
											<td>{{ $lab->lab_development_request }}</td>
										</tr>
										{{-- 2.10.5 --}}
										<tr>
											<th class="pl-5" style="width: 35%;">2.10.6 ข้อเสนอแนะอื่น ๆ :</th>                                
											<td>{{ $lab->lab_development_suggestion }}</td>
										</tr>
										{{-- 2.10.6 --}}
										{{-- 2.10 ข้อมูลการพัฒนาห้องปฏิบัติการ :--}}                            
									</tbody>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade" id="custom-tabs-four-equipment" role="tabpanel" aria-labelledby="custom-tabs-four-equipment-tab">
								<div class="accordion" id="accordionEquipment">
									@php
										$i = 1;
									@endphp
									@foreach ($lab->equipments as $equipment)
									@if ($equipment->completed != 1)
                                    <div class="card mb-0">
                                        <div class="card-header" id="heading{{ $equipment->id }}">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $equipment->id }}" aria-expanded="true" aria-controls="collapse{{ $equipment->id }}">
													<span class="badge badge-primary">{{$i++}}</span>
													@if ($equipment->scienceTool->id != 308)
														{{ $equipment->equipment_code }} : 
														{{ $equipment->scienceTool->science_tool_name }}
													@else
														{{ $equipment->equipment_code }} : 
														{{ $equipment->science_tool_other_name }}
													@endif                                                    
                                                </button>
                                            </h2>
                                        </div>
                                        <!-- /.card-header -->
                                        <div id="collapse{{ $equipment->id }}" class="collapse" aria-labelledby="heading{{ $equipment->id }}" data-parent="#accordionEquipment">
                                            <div class="card-body">
												<table class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<th class="" style="width: 40%;">Ref.รหัสเอกสาร : {{ $equipment->id }}</th>
															<td>																
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
															</td>
														</tr>
														{{-- Ref.รหัสเอกสาร --}}
														<tr>
															<th class="" style="width: 40%;">ห้องปฏิบัติการ :</th>
															<td>{{ $equipment->lab->lab_name }} | {{ $equipment->lab->lab_code }}</td>
														</tr>
														{{-- ห้องปฏิบัติการ --}}
														<tr>
															<th class="" style="width: 40%;">3.1 รหัสเครื่องมือ (AABCC-MNN-RRRSS) :</th>
															<td>{{ $equipment->equipment_code }}</td>
														</tr>
														{{-- 3.1 รหัสเครื่องมือ --}}
														<tr>
															<th class="" style="width: 40%;">3.2 ชื่อเครื่องมือ (ภาษาอังกฤษ)</th>
															@if (!empty($equipment->scienceTool->id))
																<td>{{ $equipment->scienceTool->science_tool_name }}</td>   
															@else
																<td>{{ $equipment->science_tool_other_name }} : {{ $equipment->science_tool_other_abbr }} </td>
															@endif
														</tr>
														{{-- 3.2 ชื่อเครื่องมือ --}}
														<tr>
															<th class="" style="width: 40%;">3.3 ชื่อเครื่องมือ (ภาษาไทย) :</th>
															<td>{{ $equipment->equipment_name_th }}</td>
														</tr>
														{{-- 3.3 ชื่อเครื่องมือ (ภาษาไทย) --}}
														<tr>
															<th class="" style="width: 40%;">3.4 ยี่ห้อเครื่องมือ :</th>
															<td>{{ $equipment->equipment_brand }}</td>
														</tr>
														{{-- 3.4 ยี่ห้อเครื่องมือ --}}
														<tr>
															<th class="" style="width: 40%;">3.5 รุ่นของเครื่องมือ :</th>
															<td>{{ $equipment->equipment_model }}</td>
														</tr>
														{{-- 3.5 รุ่นของเครื่องมือ --}}
														<tr>
															<th class="" style="width: 40%;">3.6 รหัสเครื่องมือของหน่วยงาน :</th>
															<td>{{ $equipment->equipment_number }}</td>
														</tr>
														{{-- 3.6 รหัสเครื่องมือของหน่วยงาน --}}
														<tr>
															<th class="" style="width: 40%;">3.7 ปีที่ซื้อเครื่องมือ :</th>
															<td>{{ $equipment->equipment_year }}</td>
														</tr>
														{{-- 3.7 ปีที่ซื้อเครื่องมือ --}}
														<tr>
															<th class="" style="width: 40%;">3.8 มูลค่าเครื่องมือ (บาท) :</th>
															<td>{{ number_format($equipment->equipment_price) }}</td>
														</tr>
														{{-- 3.8 มูลค่าเครื่องมือ --}}
														<tr>
															<th class="" style="width: 40%;">3.9 บริษัทที่จำหน่าย :</th>
															<td>{{ $equipment->equipment_supplier }}</td>
														</tr>
														{{-- 3.9 บริษัทที่จำหน่าย --}}
														<tr>
															<th class="" style="width: 40%;">3.10 สาขาเทคโนโลยี :</th>
															<td>
																@foreach ($equipment->majorTechnologies as $item)
																<li>{{ $item->major_tech_name }}</li>
																@endforeach
																<ul>
																	@if (!empty($equipment->major_technology_other))
																	<li>{{ $equipment->major_technology_other }}</li>
																	@else
																		
																	@endif
																</ul>               
															</td>
														</tr>
														{{-- 3.10 สาขาเทคโนโลยี --}}
														<tr>
															<th class="" style="width: 40%;">3.11 วัตถุประสงค์การใช้งาน :</th>
															<td>
																@forelse ($equipment->objectiveUsages as $item)
																<li>{{ $item->obj_usage_name }}</li>
																@empty
							
																@endforelse
															</td>
														</tr>
														{{-- 3.11 วัตถุประสงค์การใช้งาน --}}
														<tr>
															<th class="" style="width: 40%;">3.12 ขอบเขตการใช้เครื่องมือ :</th>
															<td> {{$equipment->equipmentUsage->equipment_usage_name}} </td>
														</tr>
														{{-- 3.12 ขอบเขตการใช้เครื่องมือ --}}
														<tr>
															<th class="" style="width: 40%;">3.13 ความสามารถของเครื่อง/ความละเอียด :</th>
															<td>{{ $equipment->equipment_ability }}</td>
														</tr>
														{{-- 3.13 ความสามารถของเครื่อง/ความละเอียด --}}
														<tr>
															<th class="" style="width: 40%;">3.14 รูปภาพเครื่องมือ :</th>
															<td>
																@if (!empty($equipment->equipment_image))
																<img class="img-fluid rounded" src="{{ asset("storage/equipment_image/$equipment->equipment_image") }}" alt="Photo">
																@else
																<img class="img-fluid rounded" src="{{ asset('storage/equipment_image/noimage.jpg') }}" alt="Photo">
																@endif
																
															</td>
														</tr>
														{{-- 3.14 รูปภาพเครื่องมือ --}}
														<tr>
															<th class="" style="width: 40%;">3.15 การสอบเทียบ :</th>
															<td> 
																@if ($equipment->equipment_calibration_id == 1)
																ไม่มี
																@elseif($equipment->equipment_calibration_id == 2)
																<mark>ชื่อหน่วยงานสอบเทียบ</mark> : {{ $equipment->equipment_calibration_by }}
																<hr>
																<mark>วัน เดือน ปี</mark> : {{$equipment->equipment_calibration_year}}
																@endif 
															</td>
														</tr>
														{{-- 3.15 การสอบเทียบ --}}
														<tr>
															<th class="" style="width: 40%;">3.16 การตรวจเช็ค/บำรุงรักษาเครื่องมือ :</th>
															<td> 
																@if ($equipment->equipment_maintenance_id == 6)
																{{ $equipment->equipment_maintenance_other }} 
																@else
																{{ $equipment->equipmentMaintenance->equipment_maintenance_name }}
																@endif
																
															</td>
														</tr>
														{{-- 3.16 การตรวจเช็ค/บำรุงรักษาเครื่องมือ --}}
														<tr>
															<th class="" style="width: 40%;">3.17 งบประมาณในการบำรุงรักษา/สอบเทียบ (บาท) :</th>
															<td>{{ number_format($equipment->equipment_maintenance_budget) }}</td>
														</tr>
														{{-- 3.17 งบประมาณในการบำรุงรักษา/สอบเทียบ --}}
														<tr>
															<th class="" style="" colspan="2">3.18 ผู้ดูแลเครื่องมือ</th>                                
														</tr>
														<tr>
															<th class="pl-5" style="width: 40%;">ชื่อ :</th>
															<td>{{ $equipment->equipment_admin_name }} </td>
														</tr>
														<tr>
															<th class="pl-5" style="width: 40%;">หมายเลขโทรศัพท์ :</th>
															<td>{{ $equipment->equipment_admin_phone }} </td>
														</tr>
														<tr>
															<th class="pl-5" style="width: 40%;">อีเมล :</th>
															<td>{{ $equipment->equipment_admin_email }} </td>
														</tr>
														{{-- 3.18 ผู้ดูแลเครื่องมือ --}}
														<tr>
															<th class="" style="width: 40%;">3.19 คู่มือการใช้งาน :</th>
															<td> 
																@if ($equipment->equipment_manual_id == 1)
																ไม่มี
																@elseif($equipment->equipment_manual_id == 2)
																<mark>ชื่อคู่มือ/รหัสคู่มือ</mark> : {{ $equipment->equipment_manual_name }}
																<hr>
																<mark>สถานที่เก็บ/ลิงค์ดาวน์โหลด</mark> : {{ $equipment->equipment_manual_location }} 
																@endif 
															</td>
														</tr>
														{{-- 3.19 คู่มือการใช้งาน --}}
														<tr>
															<th class="" style="width: 40%;">3.20 การให้เช่าใช้เครื่องมือ :</th>
															<td> 
																@if ($equipment->equipment_rent_id == 1)
																	ไม่ให้บุคคลภายนอกเช่าใช้
																@else
																	<mark>ค่าบริการต่อครั้ง (บาท)</mark> : {{ $equipment->equipment_rent_fee }}
																	<hr>
																	<mark>เงื่อนไขการขอยืม/ใช้งานเครื่องมือ</mark> : {{ $equipment->equipment_rent_detail }} 
																@endif 
															</td>
														</tr>
														{{-- 3.20 การให้เช่าใช้เครื่องมือ --}}
													</tbody>					
												</table>
											</div>
											<!-- /.card-body -->
										</div>
										<!-- /.collapse -->
                                    </div>										
									@endif
                                    @endforeach
								</div>
								<!-- /.accordion -->
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade" id="custom-tabs-four-productLab" role="tabpanel" aria-labelledby="custom-tabs-four-productLab-tab">
								<div class="accordion" id="accordionProductLab">
									@php
										$i = 1;
									@endphp
									@foreach ($lab->productLabs as $productLab)
									@if ($productLab->completed != 1)
                                    <div class="card mb-0">
                                        <div class="card-header" id="heading{{ $productLab->id }}">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $productLab->id }}" aria-expanded="true" aria-controls="collapse{{ $productLab->id }}">
                                                    <span class="badge badge-primary">{{$i++}}</span>
													{{ $productLab->product_lab_name }}													
                                                </button>
                                            </h2>
                                        </div>
                                        <!-- /.card-header -->
                                        <div id="collapse{{ $productLab->id }}" class="collapse" aria-labelledby="heading{{ $productLab->id }}" data-parent="#accordionProductLab">
                                            <div class="card-body">
												<table class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<th class="" style="width: 35%;">Ref.รหัสเอกสาร : {{ $productLab->id }}</th>
															<td>																 
																<mark>ปรับปรุงข้อมูลล่าสุด</mark> : <i class="far fa-clock"></i> {{ $productLab->updated_at }}
																<strong>|</strong>
																<mark>สถานะ</mark> :
																@switch($productLab->lab->survey_status_id)
																	@case(1)
																		<small class="badge badge-secondary">
																			{{ $productLab->lab->surveyStatus->survey_status_name_th }}
																		</small>
																		@break
																	@case(2)
																		<small class="badge badge-primary">
																			{{ $productLab->lab->surveyStatus->survey_status_name_th }}
																		</small>
																		@break
																	@case(3)
																		<small class="badge badge-info">
																			{{ $productLab->lab->surveyStatus->survey_status_name_th }}
																		</small>
																		@break
																	@case(4)
																		<small class="badge badge-success">
																			{{ $productLab->lab->surveyStatus->survey_status_name_th }}
																		</small>
																		@break
																	@case(5)
																		<small class="badge badge-warning">
																			{{ $productLab->lab->surveyStatus->survey_status_name_th }}
																		</small>
																		@break
																	@default
																@endswitch
															</td>
														</tr>
														{{-- Ref.รหัสเอกสาร --}}
														<tr>
															<th class="" style="width: 35%;">ห้องปฏิบัติการ :</th>
															<td>{{ $productLab->lab->lab_name }} | {{ $productLab->lab->lab_code }}</td>
														</tr>
														{{-- ห้องปฏิบัติการ --}}
														<tr>
															<th class="" style="width: 35%;">4.1 ชื่อผลิตภัณฑ์ที่วิจัย/ทดสอบ/สอบเทียบ :</th>
															<td>{{ $productLab->product_lab_name }}</td>
														</tr>
														{{-- 4.1 ชื่อผลิตภัณฑ์ที่วิจัย/ทดสอบ/สอบเทียบ : --}}
														<tr>
															<th class="" style="width: 35%;">4.2 ประเภทผลิตภัณฑ์ :</th>
															<td>
																@foreach ($productLab->productTypes as $item)
																	@if ($item->id != 39)
																	<li>{{ $item->product_type_name }}</li>                                                
																	@endif
																@endforeach
																@if ($productLab->product_type_other != null)
																	<li>{{ $productLab->product_type_other }}</li>
																@endif
															</td>
														</tr>
														{{-- 4.2 ประเภทผลิตภัณฑ์ : --}}
														<tr>
															<th class="" style="width: 35%;">4.3 มาตราฐานผลิตภัณฑ์ :</th>
															<td>{{ $productLab->product_lab_standard }}</td>
														</tr>
														{{-- 4.3 มาตราฐานผลิตภัณฑ์ : --}}
														<tr>
															<th class="" style="width: 35%;">4.4 ชื่อรายการวิจัย/ทดสอบ/สอบเทียบ :</th>
															<td>{{ $productLab->product_lab_test_name }}</td>
														</tr>
														{{-- 4.4 ชื่อรายการวิจัย/ทดสอบ/สอบเทียบ : --}}
														<tr>
															<th class="" style="width: 35%;">4.5 เครื่องมือที่ใช้วิจัย/ทดสอบ/สอบเทียบ :</th>
															<td>
																@foreach ($productLab->equipments as $item)
																	@if ($item->scienceTool->id != 308)
																		<li>{{ $item->equipment_code }} : {{ $item->scienceTool->science_tool_name }}</li>                                                
																	@endif
																	@if (!empty($item->science_tool_other_name))
																		<li>{{ $item->equipment_code }} : {{ $item->science_tool_other_name }}</li>                                                
																	@endif
																@endforeach
															</td>
														</tr>
														{{-- 4.5 เครื่องมือที่ใช้วิจัย/ทดสอบ/สอบเทียบ : --}}
														<tr>
															<th class="" style="width: 35%;">4.6 ประเภทรายการวิจัย/ทดสอบ/สอบเทียบ :</th>
															<td>{{ $productLab->testingCalibratingList->testing_list_name }}</td>
														</tr>
														{{-- 4.6 ประเภทรายการวิจัย/ทดสอบ/สอบเทียบ : --}}
														<tr>
															<th class="" style="width: 35%;">4.7 ประเภทการวิจัย/ทดสอบ/สอบเทียบ :</th>
															<td>
																@if ($productLab->testingCalibratingType->id != 6)
																	{{ $productLab->testingCalibratingType->testing_calibrating_type_name }}
																@else
																	{{ $productLab->testing_calibrating_type_other }}
																@endif
															</td>
														</tr>
														{{-- 4.7 ประเภทการวิจัย/ทดสอบ/สอบเทียบ : --}}
														<tr>
															<th class="" style="width: 35%;">4.8 วิธีวิจัย/ทดสอบ/สอบเทียบตามมาตรฐาน :</th>
															<td>
																{{ $productLab->testingCalibratingMethod->testing_method_name }} : 
																{{ $productLab->testing_calibrating_method_detail }}
															</td>
														</tr>
														{{-- 4.8 วิธีวิจัย/ทดสอบ/สอบเทียบตามมาตรฐาน : --}}
														<tr>
															<th class="" style="width: 35%;">4.9 ช่วงความสามารถของการวัด :</th>
															<td>{{ $productLab->product_lab_test_unit }}</td>
														</tr>
														{{-- 4.9 ช่วงความสามารถของการวัด : --}}
														<tr>
															<th class="" style="width: 35%;">4.10 ระยะเวลาการวิจัย/ทดสอบ/สอบเทียบ <br>(วัน โดย 1 วัน = 8 ชั่วโมง) :</th>
															<td>{{ $productLab->product_lab_test_duration }}</td>
														</tr>
														{{-- 4.10 ระยะเวลาการวิจัย/ทดสอบ/สอบเทียบ (วัน โดย 1 วัน = 8 ชั่วโมง) : --}}
														<tr>
															<th class="" style="width: 35%;">4.11 ค่าธรรมเนียมการวิจัย/ทดสอบ/สอบเทียบ (บาท) :</th>
															<td>{{ $productLab->product_lab_test_fee }}</td>
														</tr>
														{{-- 4.11 ค่าธรรมเนียมการวิจัย/ทดสอบ/สอบเทียบ (บาท) : --}}
														<tr>
															<th class="" style="width: 35%;">4.12 วัสดุอ้างอิงที่ใช้ :</th>
															<td>{{ $productLab->product_lab_material_ref }}</td>
														</tr>
														{{-- 4.12 วัสดุอ้างอิงที่ใช้ : --}}
														<tr>
															<th class="" style="width: 35%;">4.13 แหล่งที่มาของวัสดุอ้างอิง :</th>
															<td>{{ $productLab->product_lab_material_ref_from }}</td>
														</tr>
														{{-- 4.13 แหล่งที่มาของวัสดุอ้างอิง : --}}
														<tr>
															<th class="" style="width: 35%;">4.14 การควบคุมคุณภาพผลการทดสอบภายใน :</th>
															<td>
																@foreach ($productLab->resultControls as $item)
																	@if ($item->id != 7)
																	<li>{{ $item->result_control_name }}</li>                                                
																	@endif
																@endforeach
																@if ($productLab->result_control_other != null)
																	<li>{{ $productLab->result_control_other }}</li>
																@endif
															</td>
														</tr>
														{{-- 4.14 การควบคุมคุณภาพผลการทดสอบภายใน : --}}
														<tr>
															<th class="" style="width: 35%;">4.15 การทดสอบความสามารถห้องปฏิบัติการ (Proficiency Testing, PT) :</th>
															<td>
																@if ($productLab->proficiency_testing_id == 1)
																	ไม่มี
																@else
																	<mark>ชื่อผู้จัด</mark> : {{ $productLab->proficiency_testing_by }}<br>
																	<mark>ปีที่เข้าร่วม</mark> : {{ $productLab->proficiency_testing_year }}
																@endif
															</td>
														</tr>
														{{-- 4.15 การทดสอบความสามารถห้องปฏิบัติการ (Proficiency Testing, PT) : --}}
														<tr>
															<th class="" style="width: 35%;">4.16 การรับรองความสามารถห้องปฏิบัติการ :</th>
															<td>{{ $productLab->certifyLaboratory->cert_lab_name }}</td>
														</tr>
														{{-- 4.16 การรับรองความสามารถห้องปฏิบัติการ : --}}
													</tbody>
												</table>
											</div>
											<!-- /.card-body -->
										</div>
										<!-- /.collapse -->
                                    </div>										
									@endif
                                    @endforeach
								</div>
								<!-- /.accordion -->
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<a href="/bstiadmin-questionnaire/{{$lab->user_id}}" class="btn btn-secondary btn-xs">
                            <i class="fas fa-undo"></i> ย้อนกลับ
						</a>
						@if ($lab->survey_status_id == 2)
							<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-approve">
								อนุมัติข้อมูลส่งงานได้
							</button>
							<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-reject">
								ตรวจสอบข้อมูลแล้วขอให้แก้ไข
							</button>
						@endif    
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.card-body -->			
		</div>
		<!--/.card -->
		<div class="card bg-light">
			<div class="card-body">
                <blockquote class="quote-secondary m-0">           
                    <div class="d-flex flex-row justify-content-between">
                        @foreach ($surveyStatus as $item)
                            @switch($item->id)
                                @case(1)
                                    <span class="mr-2">
                                        <mark><i class="fas fa-square text-secondary"></i></mark>{{ $item->survey_status_name_th }}
                                    </span>
                                    @break
                                @case(2)
                                    <span class="mr-2">
                                        <mark><i class="fas fa-square text-primary"></i></mark>{{ $item->survey_status_name_th }}
                                    </span>
                                    @break
                                @case(3)
                                    <span class="mr-2">
                                        <mark><i class="fas fa-square text-info"></i></mark>{{ $item->survey_status_name_th }}
                                    </span>
                                    @break
                                @case(4)
                                    <span class="mr-2">
                                        <mark><i class="fas fa-square text-success"></i></mark>{{ $item->survey_status_name_th }}
                                    </span>
                                    @break
                                @case(5)
                                    <span class="mr-2">
                                        <mark><i class="fas fa-square text-warning"></i></mark>{{ $item->survey_status_name_th }}
                                    </span>
                                    @break
                                @default                                    
                            @endswitch
                        @endforeach
                    </div>
                    <!-- /.d-flex -->
                </blockquote>
			</div>
			<!-- /.card-body -->
		</div>
		<!--/.card -->			
	</div>
	<!--/.col -->
</div>
<!--/.row -->
@endsection

@section('modal')
<div class="modal fade" id="modal-approve" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">อนุมัติข้อมูลส่งงานได้?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/bstiadmin-questionnaire/{{ $lab->id }}" method="POST" role="form">
				@csrf
				@method('PUT')
				<input type="hidden" name="survey_status_id" value="{{ $lab->survey_status_id }}">
				<div class="modal-body">
                    <div class="d-flex flex-row justify-content-start">
                        <span class="mr-2">
                            <mark>คุณต้องการอนุมัติชุดข้อมูล รหัสห้องปฏิบัติการ</mark> : {{ $lab->lab_code }} ใช่หรือไม่?
                        </span>                     
                    </div>
                    <!-- /.d-flex -->
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
					@if ($lab->survey_status_id == 2)
						<button type="submit" class="btn btn-success">อนุมัติ</button>
					@endif
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-reject" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">ตรวจสอบข้อมูลแล้วขอให้แก้ไข?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/bstiadmin-questionnaire/{{ $lab->id }}" method="POST" role="form">
				@csrf
				@method('PUT')
				<input type="hidden" name="user_id" value="{{ $lab->user_id }}">
				<input type="hidden" name="lab_id" value="{{ $lab->id }}">
				<input type="hidden" name="survey_status_id" value="5">
				<div class="modal-body">
                    <p><mark>คุณต้องการขอให้แก้ไขชุดข้อมูล รหัสห้องปฏิบัติการ</mark> : {{ $lab->lab_code }} ใช่หรือไม่?</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>โปรดระบุเหตุผล</label>
                                <textarea class="form-control" name="comment_lab_detail" rows="3" placeholder="Enter ..." required></textarea>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
					@if ($lab->survey_status_id == 2)
						<button type="submit" class="btn btn-warning">ขอให้แก้ไข</button>
					@endif
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section('scripts')

@endsection


