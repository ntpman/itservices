@extends('layouts.admin')

@section('page')
    Show Lab 
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-file-alt"></i> รายละเอียด</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <tbody>
                                <tr>
                                    <th class="" style="width: 30%;">Ref.รหัสเอกสาร : {{ $lab->id }}</th>
                                    <td>
                                        <mark>ปรับปรุงข้อมูลล่าสุด</mark> : <i class="far fa-clock"></i> 
                                        {{ $lab->updated_at }}
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
                        <!-- /.table -->
                    </div>
                    <!-- /.table-responsive -->                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    @if (!Auth::guest())                            
                        @if (Auth::user()->id == $lab->user_id)
                            <a href="/lab" class="btn btn-secondary btn-sm">
                                <i class="fas fa-undo"></i> ย้อนกลับ
                            </a>
                            @switch($lab->survey_status_id)
                                @case(1)
                                    <a href="/lab/{{ $lab->id }}/edit" class="btn btn-info btn-sm">
                                        <i class="fas fa-user-edit"></i> แก้ไขข้อมูล
                                    </a>
                                    <a href="/equipment/create-lab-id/{{ $lab->id }}" class="btn btn-primary btn-sm">
                                        <i class="far fa-edit"></i> เพิ่มเครื่องมือวิทยาศาสตร์
                                    </a>
                                    <a href="/productlab/create-lab-id/{{ $lab->id }}" class="btn btn-primary btn-sm">
                                        <i class="far fa-edit"></i> เพิ่มผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
                                        ยกเลิกข้อมูล
                                    </button>
                                    @break
                                @case(3)
                                    <a href="/lab/{{ $lab->id }}/edit" class="btn btn-info btn-sm">
                                        <i class="fas fa-user-edit"></i> แก้ไขข้อมูล
                                    </a>
                                    <a href="/equipment/create-lab-id/{{ $lab->id }}" class="btn btn-primary btn-sm">
                                        <i class="far fa-edit"></i> เพิ่มเครื่องมือวิทยาศาสตร์
                                    </a>
                                    <a href="/productlab/create-lab-id/{{ $lab->id }}" class="btn btn-primary btn-sm">
                                        <i class="far fa-edit"></i> เพิ่มผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
                                        ยกเลิกข้อมูล
                                    </button>
                                    @break
                                @case(5)
                                    <a href="/lab/{{ $lab->id }}/edit" class="btn btn-info btn-sm">
                                        <i class="fas fa-user-edit"></i> แก้ไขข้อมูล
                                    </a>
                                    <a href="/equipment/create-lab-id/{{ $lab->id }}" class="btn btn-primary btn-sm">
                                        <i class="far fa-edit"></i> เพิ่มเครื่องมือวิทยาศาสตร์
                                    </a>
                                    <a href="/productlab/create-lab-id/{{ $lab->id }}" class="btn btn-primary btn-sm">
                                        <i class="far fa-edit"></i> เพิ่มผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
                                        ยกเลิกข้อมูล
                                    </button>
                                    @break
                                @default
                            @endswitch                            
                        @endif
                    @endif
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->        
    </div>
    <!-- /.row -->
@endsection

@section('modal')
<div class="modal fade" id="modal-delete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h4 class="modal-title">ยืนยันยกเลิกข้อมูล ?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/lab-changeStatus/{{ $lab->id }}" method="POST" role="form">
				@csrf
				@method('PUT')
				<div class="modal-body">
                    <div class="d-flex flex-row justify-content-start">
                        <span class="mr-2">
                            คุณต้องการยกเลิกห้องปฏิบัติการ :<mark> {{ $lab->lab_code }} </mark> ใช่หรือไม่?
                        </span>                      
                    </div>
                    <!-- /.d-flex -->
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
					<button type="submit" class="btn btn-danger">ยืนยันการยกเลิกข้อมูล</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection