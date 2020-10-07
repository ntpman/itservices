@extends('layouts.admin')

@section('page')
    Bsti Admin Questionnaire Send
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-primary card-outline">
				<h3 class="card-title"><i class="far fa-folder-open"></i> ข้อมูลสำหรับพิมพ์สถานะการส่งข้อมูล</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
                <blockquote class="mx-0 mt-0 bg-light">
                    <h3><i class="fas fa-user-edit"></i> {{ $user->role->role_name }}</h3>          
                    <div class="d-flex flex-row justify-content-between">
                        <span class="mr-2">
                            <mark>รหัสประจำตัว</mark> : {{ $user->user_code }}
                        </span>                     
                        <span class="mr-2">
                            <mark>ชื่อ-สกุล</mark> : {{ $user->name }}
                        </span>                     
                        <span class="mr-2">
                            <mark>อีเมล</mark> : {{ $user->email }}
                        </span>                     
                        <span class="mr-2">
                            <mark>พื้นที่สำรวจข้อมูล</mark> : {{ $user->region->region_name }}
                        </span>                     
                    </div>
                    <!-- /.d-flex -->
                </blockquote>
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-labJuly-tab" data-toggle="pill" href="#custom-tabs-four-labJuly" role="tab" aria-controls="custom-tabs-four-labJuly" aria-selected="false">
                                    รายการสถานะเดือนกรกฎาคม
                                    <span class="badge badge-primary">{{ count($labJuly) }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-labAugust-tab" data-toggle="pill" href="#custom-tabs-four-labAugust" role="tab" aria-controls="custom-tabs-four-labAugust" aria-selected="false">
                                    รายการสถานะเดือนสิงหาคม
                                    <span class="badge badge-primary">{{ count($labAugust) }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-labSeptember-tab" data-toggle="pill" href="#custom-tabs-four-labSeptember" role="tab" aria-controls="custom-tabs-four-labSeptember" aria-selected="false">
                                    รายการสถานะเดือนกันยายน
                                    <span class="badge badge-primary">{{ count($labSeptember) }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">                            
                            <div class="tab-pane fade active show" id="custom-tabs-four-labJuly" role="tabpanel" aria-labelledby="custom-tabs-four-labJuly-tab">
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
                                        @if (count($labJuly) > 0)
                                            <thead>                  
                                                <tr>
                                                    <th style="width: 10px;">ลำดับ</th>
                                                    <th>รายการชุดข้อมูลห้องปฏิบัติการ</th>
                                                    <th>สถานะ</th>
                                                    <th>วันที่ส่งข้อมูล</th>
                                                </tr>
                                            </thead>
                                            <tbody id="items">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($labJuly as $lab)
                                                <tr>
                                                    <td class="text-center">{{ $i++ }}</td>
                                                    <td>
                                                        @switch($lab->survey_status_id)
                                                            @case(1)
                                                                รหัสห้องปฏิบัติการ: <mark>{{ $lab->lab_code }}</mark>
                                                                @break
                                                            @default
                                                                <a href="/bstiadmin-questionnaire-detail/{{$lab->id}}">
                                                                    รหัสห้องปฏิบัติการ: <mark>{{ $lab->lab_code }}</mark>
                                                                </a>
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        <small class="badge badge-success">
                                                            อนุมัติข้อมูลส่งงานได้
                                                        </small>
                                                    </td>
                                                    <td>{{ $lab->send_date }}</td>
                                                </tr>                                
                                                @endforeach
                                            </tbody>						
                                        @endif						
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane fade" id="custom-tabs-four-labAugust" role="tabpanel" aria-labelledby="custom-tabs-four-labAugust-tab">
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
                                        @if (count($labAugust) > 0)
                                            <thead>                  
                                                <tr>
                                                    <th style="width: 10px;">ลำดับ</th>
                                                    <th>รายการชุดข้อมูลห้องปฏิบัติการ</th>
                                                    <th>สถานะ</th>
                                                    <th>วันที่ส่งข้อมูล</th>
                                                </tr>
                                            </thead>
                                            <tbody id="items">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($labAugust as $lab)
                                                <tr>
                                                    <td class="text-center">{{ $i++ }}</td>
                                                    <td>
                                                        @switch($lab->survey_status_id)
                                                            @case(1)
                                                                รหัสห้องปฏิบัติการ: <mark>{{ $lab->lab_code }}</mark>
                                                                @break
                                                            @default
                                                                <a href="/bstiadmin-questionnaire-detail/{{$lab->id}}">
                                                                    รหัสห้องปฏิบัติการ: <mark>{{ $lab->lab_code }}</mark>
                                                                </a>
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        <small class="badge badge-success">
                                                            อนุมัติข้อมูลส่งงานได้
                                                        </small>
                                                    </td>
                                                    <td>{{ $lab->send_date }}</td>
                                                </tr>                                
                                                @endforeach
                                            </tbody>						
                                        @endif						
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane fade" id="custom-tabs-four-labSeptember" role="tabpanel" aria-labelledby="custom-tabs-four-labSeptember-tab">
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
                                        @if (count($labSeptember) > 0)
                                            <thead>                  
                                                <tr>
                                                    <th style="width: 10px;">ลำดับ</th>
                                                    <th>รายการชุดข้อมูลห้องปฏิบัติการ</th>
                                                    <th>สถานะ</th>
                                                    <th>วันที่ส่งข้อมูล</th>
                                                </tr>
                                            </thead>
                                            <tbody id="items">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($labSeptember as $lab)
                                                <tr>
                                                    <td class="text-center">{{ $i++ }}</td>
                                                    <td>
                                                        @switch($lab->survey_status_id)
                                                            @case(1)
                                                                รหัสห้องปฏิบัติการ: <mark>{{ $lab->lab_code }}</mark>
                                                                @break
                                                            @default
                                                                <a href="/bstiadmin-questionnaire-detail/{{$lab->id}}">
                                                                    รหัสห้องปฏิบัติการ: <mark>{{ $lab->lab_code }}</mark>
                                                                </a>
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        <small class="badge badge-success">
                                                            อนุมัติข้อมูลส่งงานได้
                                                        </small>
                                                    </td>
                                                    <td>{{ $lab->send_date }}</td>
                                                </tr>                                
                                                @endforeach
                                            </tbody>						
                                        @endif						
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                    
                </div>
                <!-- /.card -->
			</div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="/bstiadmin-questionnaire/{{$lab->user_id}}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-undo"></i> ย้อนกลับ
                </a>
            </div>
            <!-- /.card-footer -->
		</div>
        <!--/.card -->			
	</div>
	<!--/.col -->
</div>
<!--/.row -->
@endsection

@section('modal')

@endsection

@section('scripts')

@endsection


