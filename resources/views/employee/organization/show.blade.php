@extends('layouts.admin')

@section('page')
    Show Organization 
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
                                    <th class="" style="width: 30%;">Ref.รหัสเอกสาร : {{ $org->id }}</th>
                                    <td>
                                        <mark>ปรับปรุงข้อมูลล่าสุด</mark> : <i class="far fa-clock"></i> {{ $org->updated_at }}
                                    </td>
                                </tr>
                                {{-- Ref.รหัสเอกสาร --}}
                                <tr>
                                    <th class="" style="width: 30%;">1.1 ชื่อหน่วยงาน :</th>
                                    <td>{{ $org->org_name }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">ชื่อหน่วยงานย่อย ระดับที่ 1 :</th>
                                    <td>{{ $org->org_name_level_1 }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">ชื่อหน่วยงานย่อย ระดับที่ 2 :</th>
                                    <td>{{ $org->org_name_level_2 }}</td>
                                </tr>
                                {{-- 1.1 --}}
                                <tr>
                                    <th class="" style="width: 30%;">1.2 รหัสหน่วยงาน (AABCC) :</th>
                                    <td>{{ $org->org_code }}</td>
                                </tr>
                                {{-- 1.2 --}}
                                <tr>
                                    <th class="" style="width: 30%;">1.3 หมายเลขประจำหน่วยงาน :</th>
                                    <td>{{ $org->org_number }}</td>
                                </tr>
                                {{-- 1.3 --}}
                                <tr>
                                    <th class="" style="width: 30%;">1.4 ที่อยู่ :</th>
                                    <td>{{ __('') }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">อาคาร</th>
                                    <td>{{ $org->org_building }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">ชั้น</th>
                                    <td>{{ $org->org_floor }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">เลขที่</th>
                                    <td>{{ $org->org_address }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">ซอย</th>
                                    <td>{{ $org->org_soi }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">ถนน</th>
                                    <td>{{ $org->org_road }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">แขวง/ตำบล</th>
                                    <td>{{ $org->provinceInfoTa->tambon_t }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">เขต/อำเภอ</th>
                                    <td>{{ $org->provinceInfoAm->amphoe_t }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">จังหวัด</th>
                                    <td>{{ $org->provinceInfoCh->changwat_t }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">รหัสไปรษณีย์</th>
                                    <td>{{ $org->org_postcode }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">โทรศัพท์</th>
                                    <td>{{ $org->org_phone }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">โทรสาร</th>
                                    <td>{{ $org->org_fax }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">อีเมล</th>
                                    <td>{{ $org->org_email }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">เว็บไซต์</th>
                                    <td><a href="{{ $org->org_website }}" target="_bank">{{ $org->org_website }}</a></td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">ละติจูด</th>
                                    <td>{{ $org->org_lat }}</td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 30%;">ลองจิจูด</th>
                                    <td>{{ $org->org_long }}</td>
                                </tr>
                                {{-- 1.4 --}}
                                <tr>
                                    <th class="" style="width: 30%;">1.5 ทุนจดทะเบียน (ล้านบาท) :</th>
                                    <td>{{ number_format($org->org_capital) }}</td>
                                </tr>
                                {{-- 1.5 --}}
                                <tr>
                                    <th class="" style="width: 30%;">1.6 จำนวนบุคลากร (คน) :</th>
                                    <td>{{ number_format($org->org_employee_amount) }}</td>
                                </tr>
                                {{-- 1.6 --}}
                                <tr>
                                    <th class="" style="width: 30%;">1.7 การจำหน่าย/ส่งออกสินค้า/บริการ :</th>
                                    <td>
                                        @forelse ($org->saleProducts as $item)
                                            <li>{{ $item->sale_product_name }}</li>
                                        @empty
                                            
                                        @endforelse
                                        <ol>
                                            @forelse ($org->countrys as $item)
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
                                        @if (($org->organisationType->id) != 5)
                                            {{ $org->organisationType->org_type_name }}
                                        @else
                                            
                                        @endif
                                        @switch(5)
                                            @case($org->organisationType->id)
                                                {{ $org->organisation_type_other }}
                                                @break
                                            @default
                                                
                                        @endswitch
                                    </td>
                                </tr>
                                {{-- 1.8 --}}
                                <tr>
                                    <th class="" style="width: 30%;">1.9 ประเภทกิจการ :</th>
                                    <td>{{ $org->businessType->business_type_name }}</td>
                                </tr>
                                {{-- 1.9 --}}
                                <tr>
                                    <th class="" style="width: 30%;">1.10 ประเภทอุตสาหกรรม :</th>
                                    <td>
                                        @forelse ($org->industrialTypes as $item)
                                            @if (($item->id) != 39)
                                                <li>{{ $item->industrial_type_name }}</li>
                                            @else
                                                
                                            @endif
                                            
                                        @empty
                                            
                                        @endforelse
                                        @if ($org->industrial_type_other != null)
                                            <li>{{ $org->industrial_type_other }}</li>
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
                                        @forelse ($org->qualitySystemIso9000s as $item)
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
                                        @forelse ($org->qualitySystemIso14000s as $item)
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
                                        @forelse ($org->qualitySystemIsoHaccps as $item)
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
                                    <td>{{ $org->quality_system_other }}</td>
                                </tr>
                                {{-- 1.11.4 อื่นๆ : --}}
                            </tbody>
                            {{-- /.tbody --}}
                        </table>
                        {{-- /.table --}}
                    </div>
                    {{-- /.table-responsive --}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    @if (!Auth::guest())                            
                        @if (Auth::user()->id == $org->user_id)
                            <a href="/organization" class="btn btn-secondary btn-sm">
                                <i class="fas fa-undo"></i> ย้อนกลับ
                            </a>
                            @if ($org->completed == 0)
                            <a href="/organization/{{ $org->id }}/edit" class="btn btn-info btn-sm">
                                <i class="fas fa-user-edit"></i> แก้ไขข้อมูล
                            </a>
                            @endif                            
                            <a href="/lab/create-org-id/{{ $org->id }}" class="btn btn-primary btn-sm">
                                <i class="far fa-edit"></i> เพิ่มข้อมูลห้องปฏิบัติการ
                            </a> 
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
                                ยกเลิกข้อมูล
                            </button>                                                       
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
			<form action="/organization-changeStatus/{{ $org->id }}" method="POST" role="form">
				@csrf
				@method('PUT')
				<div class="modal-body">
                    <div class="d-flex flex-row justify-content-start">
                        <span class="mr-2">
                            คุณต้องการยกเลิกห้องปฏิบัติการ : 
                            <mark>  {{ $org->org_code }}
                                    {{ $org->org_name }} 
                                @if(!empty($org->org_name_level_1)){{ '  '.$org->org_name_level_1 }}@else @endif 
                                @if(!empty($org->org_name_level_2)){{ '  '.$org->org_name_level_2 }}@else @endif
                            </mark> 
                            ใช่หรือไม่?
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