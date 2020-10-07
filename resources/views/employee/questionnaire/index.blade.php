@extends('layouts.admin')

@section('page')
	Questionnaire
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-primary card-outline">
				<h3 class="card-title"><i class="far fa-folder-open"></i> ข้อมูลสำหรับตรวจสอบและส่งข้อมูล</h3>
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
								<a class="nav-link active" id="custom-tabs-four-lab-tab" data-toggle="pill" href="#custom-tabs-four-lab" role="tab" aria-controls="custom-tabs-four-lab" aria-selected="true">
									รายการสถานะทั้งหมด
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-four-labJuly-tab" data-toggle="pill" href="#custom-tabs-four-labJuly" role="tab" aria-controls="custom-tabs-four-labJuly" aria-selected="false">
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
							<div class="tab-pane fade active show" id="custom-tabs-four-lab" role="tabpanel" aria-labelledby="custom-tabs-four-lab-tab">
								<table id="dt1" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
									@if (count($labs) > 0)
										<thead>                  
											<tr>
												<th style="width: 10px;">ลำดับ</th>
												<th style="width: 60%;">ชื่อหน่วยงาน : รายการชุดข้อมูลห้องปฏิบัติการ</th>
												<th>สถานะ</th>
												<th>วันที่ส่งข้อมูล</th>
												{{-- <th><i class="fas fa-user-cog"></i></th> --}}
											</tr>
										</thead>
										<tbody id="items">
											@php
												$i = 1;
											@endphp
											@foreach ($labs as $lab)
											<tr>
												<td class="text-center">{{ $i++ }}</td>
												<td>
													{{ $lab->organization->org_name }}
													@if(!empty($lab->organization->org_name_level_1)){{ ' : '.$lab->organization->org_name_level_1 }}@else @endif 
													@if(!empty($lab->organization->org_name_level_2)){{ ' : '.$lab->organization->org_name_level_2 }}@else @endif
													<mark>
														<a href="/questionnaire/{{$lab->id}}">
															รหัสห้องปฏิบัติการ: {{ $lab->lab_code }}
														</a>
													</mark>
												</td>
												<td>
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
												<td>{{ $lab->send_date }}</td>
												{{-- <td>
													@if ($lab->surveyStatus->id == 1 || $lab->surveyStatus->id == 3)
														<a href="/questionnaire/{{$lab->id}}">
															<i class="far fa-share-square"></i> ส่งข้อมูล
														</a>
													@endif													
												</td> --}}
											</tr>                                
											@endforeach
										</tbody>						
									@endif						
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade" id="custom-tabs-four-labJuly" role="tabpanel" aria-labelledby="custom-tabs-four-labJuly-tab">
								<table id="" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
									@if (count($labJuly) > 0)
										<thead>                  
											<tr>
												<th style="width: 10px;">ลำดับ</th>
												<th style="width: 50%;">ชื่อหน่วยงาน : รายการชุดข้อมูลห้องปฏิบัติการ</th>
												<th>สถานะ</th>
												<th>วันที่ส่งข้อมูล</th>
												<th>วันที่อนุมัติข้อมูล</th>
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
													{{ $lab->organization->org_name }}
													@if(!empty($lab->organization->org_name_level_1)){{ ' : '.$lab->organization->org_name_level_1 }}@else @endif 
													@if(!empty($lab->organization->org_name_level_2)){{ ' : '.$lab->organization->org_name_level_2 }}@else @endif
													<mark>
														<a href="/questionnaire/{{$lab->id}}">
															รหัสห้องปฏิบัติการ: {{ $lab->lab_code }}
														</a>
													</mark>
												</td>
												<td>
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
												<td>{{ $lab->send_date }}</td>
												<td>{{ $lab->approve_date }}</td>
											</tr>                                
											@endforeach
										</tbody>						
									@endif						
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade" id="custom-tabs-four-labAugust" role="tabpanel" aria-labelledby="custom-tabs-four-labAugust-tab">
								<table id="" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
									@if (count($labAugust) > 0)
										<thead>                  
											<tr>
												<th style="width: 10px;">ลำดับ</th>
												<th style="width: 50%;">ชื่อหน่วยงาน : รายการชุดข้อมูลห้องปฏิบัติการ</th>
												<th>สถานะ</th>
												<th>วันที่ส่งข้อมูล</th>
												<th>วันที่อนุมัติข้อมูล</th>
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
													{{ $lab->organization->org_name }}
													@if(!empty($lab->organization->org_name_level_1)){{ ' : '.$lab->organization->org_name_level_1 }}@else @endif 
													@if(!empty($lab->organization->org_name_level_2)){{ ' : '.$lab->organization->org_name_level_2 }}@else @endif
													<mark>
														<a href="/questionnaire/{{$lab->id}}">
															รหัสห้องปฏิบัติการ: {{ $lab->lab_code }}
														</a>
													</mark>
												</td>
												<td>
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
												<td>{{ $lab->send_date }}</td>
												<td>{{ $lab->approve_date }}</td>
											</tr>                                
											@endforeach
										</tbody>						
									@endif						
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade" id="custom-tabs-four-labSeptember" role="tabpanel" aria-labelledby="custom-tabs-four-labSeptember-tab">
								<table id="" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
									@if (count($labSeptember) > 0)
										<thead>                  
											<tr>
												<th style="width: 10px;">ลำดับ</th>
												<th style="width: 50%;">ชื่อหน่วยงาน : รายการชุดข้อมูลห้องปฏิบัติการ</th>
												<th>สถานะ</th>
												<th>วันที่ส่งข้อมูล</th>
												<th>วันที่อนุมัติข้อมูล</th>
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
													{{ $lab->organization->org_name }}
													@if(!empty($lab->organization->org_name_level_1)){{ ' : '.$lab->organization->org_name_level_1 }}@else @endif 
													@if(!empty($lab->organization->org_name_level_2)){{ ' : '.$lab->organization->org_name_level_2 }}@else @endif
													<mark>
														<a href="/questionnaire/{{$lab->id}}">
															รหัสห้องปฏิบัติการ: {{ $lab->lab_code }}
														</a>
													</mark>
												</td>
												<td>
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
												<td>{{ $lab->send_date }}</td>
												<td>{{ $lab->approve_date }}</td>
											</tr>                                
											@endforeach
										</tbody>						
									@endif						
								</table>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
				@if (count($logCommentLabs) > 0)
                <p>
                    <i class="fas fa-tag text-warning"></i>
                    <mark><cite title="Source Title">รายละเอียดสำหรับการแก้ไขข้อมูลห้องปฏิบัติการ</cite></mark>
                </p>
                <div class="card">
					<div class="table-responsive">
						<table id="" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
							<thead>                  
								<tr>
									<th style="width: 10px;">ลำดับ</th>
									<th>รายการ</th>
									{{-- <th>สถานะ</th> --}}
									<th>รายละเอียด</th>
									<th>วันที่ขอให้แก้ไข</th>
									<th>เอกสารแนบ</th>
								</tr>
							</thead>
							<tbody id="items">
								@php
									$i = 1;
									$files = 1;
								@endphp
								@foreach ($logCommentLabs as $logCommentLab)
								<tr>
									<td class="text-center">{{ $i++ }}</td>
									<td>{{ $logCommentLab->lab->lab_code }}</td>
									{{-- <td>{{ $logCommentLab->surveyStatus->survey_status_name_th }}</td> --}}
									<td>{{ $logCommentLab->comment_lab_detail }}</td>
									<td>{{ $logCommentLab->reject_date }}</td>
									<td>
										<div class="d-flex flex-column">
											@foreach ($logCommentLab->logCommentLabFiles as $item)
												<a href="{{ asset("storage/file_comment_lab/$item->file") }}" target="_blank">
													Download {{$files++}}
												</a>
											@endforeach
										</div>
										<!-- /.d-flex -->
									</td>
								</tr>                                
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
                </div>
                @endif
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

@endsection

@section('scripts')

@endsection


