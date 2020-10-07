@extends('layouts.admin')

@section('page')
	Laboratory
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
	{{-- active lab --}}
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title"><i class="far fa-folder-open"></i> ข้อมูลห้องปฏิบัติการ</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="" class="table table-bordered table-hover table-sm display labTable" cellspacing="0" width="100%">
						@if (count($labs) > 0)
							<thead>                  
								<tr>
									{{-- <th style="width: 10px;">ลำดับ</th> --}}
									<th>ชื่อองค์กร</th>
									<th>ชื่อห้องปฏิบัติการ : รหัสห้องปฏิบัติการ</th>
									<th>สถานะ</th>
									<th><i class="fas fa-user-clock"></i></th>
									<th><i class="fas fa-user-cog"></i></th>
									<th><i class="fas fa-user-cog"></i></th>
								</tr>
							</thead>
							<tbody class="items">
								@php
									$i = 1;
								@endphp
								@foreach ($labs as $lab)
									@if ($lab->organization->completed == 0)
										<tr>
											{{-- <td class="text-center">{{ $i++ }}</td> --}}
											<td>
												{{ $lab->organization->org_name }} 
												@if(!empty($lab->organization->org_name_level_1)){{ ' : '.$lab->organization->org_name_level_1 }}@else @endif 
												@if(!empty($lab->organization->org_name_level_2)){{ ' : '.$lab->organization->org_name_level_2 }}@else @endif
												: <mark>{{ $lab->organization->org_code }}</mark>
											</td>
											<td>
												<a href="/lab/{{ $lab->id }}">
													<i class="far fa-hand-point-right"></i> {{ $lab->lab_name }} 
													: <mark>{{ $lab->lab_code }}</mark>
												</a>
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
											<td>{{ $lab->updated_at }}</td>									
											<td>
												@switch($lab->survey_status_id)
													@case(1)
														<a href="{{ route('equipment.create-lab-id', $lab->id) }}">
															<i class="far fa-edit"></i> เพิ่มเครื่องมือวิทยาศาสตร์
														</a>
														@break
													@case(3)
														<a href="{{ route('equipment.create-lab-id', $lab->id) }}">
															<i class="far fa-edit"></i> เพิ่มเครื่องมือวิทยาศาสตร์
														</a>
														@break
													@case(5)
														<a href="{{ route('equipment.create-lab-id', $lab->id) }}">
															<i class="far fa-edit"></i> เพิ่มเครื่องมือวิทยาศาสตร์
														</a>
														@break
													@default												
												@endswitch										
											</td>
											<td>
												@if (count($lab->equipments) > 0)
													@switch($lab->survey_status_id)
														@case(1)
															<a href="{{ route('productlab.create-lab-id', $lab->id) }}">
																<i class="far fa-edit"></i> เพิ่มผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ
															</a>
															@break
														@case(3)
															<a href="{{ route('productlab.create-lab-id', $lab->id) }}">
																<i class="far fa-edit"></i> เพิ่มผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ
															</a>
															@break
														@case(5)
															<a href="{{ route('productlab.create-lab-id', $lab->id) }}">
																<i class="far fa-edit"></i> เพิ่มผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ
															</a>
															@break
														@default												
													@endswitch										
												@endif										
											</td>
										</tr>                                
									@endif
								@endforeach
							</tbody>						
						@endif		
					</table>
				</div>
				<!-- /.card-body -->
				<div class="card-footer clearfix">
                    <a href="/organization">
                        <i class="far fa-edit"></i> เพิ่มข้อมูลห้องปฏิบัติการ
                    </a>
                </div>
                <!--/.card-footer -->
			</div>
			<!--/.card -->
		</div>
		<!--/.col -->
	</div>
	<!--/.row -->

	{{-- disabled lab --}}
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-danger card-outline">
					<h3 class="card-title"><i class="far fa-trash-alt"></i> รายการที่ถูกยกเลิก</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="" class="table table-bordered table-hover table-sm display labTable" cellspacing="0" width="100%">
						@if (count($labsDel) > 0)
							<thead>                  
								<tr>
									{{-- <th style="width: 10px;">ลำดับ</th> --}}
									<th>ชื่อองค์กร</th>
									<th>ชื่อห้องปฏิบัติการ : รหัสห้องปฏิบัติการ</th>
									<th>สถานะ</th>
									<th><i class="fas fa-user-clock"></i></th>
								</tr>
							</thead>
							<tbody class="items">
								@php
									$i = 1;
								@endphp
								@foreach ($labsDel as $lab)
									<tr>
										{{-- <td class="text-center">{{ $i++ }}</td> --}}
										<td>
											{{ $lab->organization->org_name }} 
											@if(!empty($lab->organization->org_name_level_1)){{ ' : '.$lab->organization->org_name_level_1 }}@else @endif 
											@if(!empty($lab->organization->org_name_level_2)){{ ' : '.$lab->organization->org_name_level_2 }}@else @endif
											: <mark>{{ $lab->organization->org_code }}</mark>
										</td>
										<td>
											{{ $lab->lab_name }} : <mark>{{ $lab->lab_code }}</mark>
										</td>
										<td>
											<small class="badge badge-danger">
												รายการที่ถูกยกเลิก
											</small>
										</td>
										<td>{{ $lab->updated_at }}</td>		
									</tr>                                
								@endforeach
							</tbody>						
						@endif		
					</table>
				</div>
				<!-- /.card-body -->
				<div class="card-footer clearfix">
                    
                </div>
                <!--/.card-footer -->
			</div>
			<!--/.card -->
		</div>
		<!--/.col -->
	</div>
	<!--/.row -->
@endsection

@section('scripts')
    <script src="{{ asset('js/custom-datatable/lab.js') }}"></script>
@endsection


