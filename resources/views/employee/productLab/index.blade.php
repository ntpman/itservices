@extends('layouts.admin')

@section('page')
    Product Lab
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    {{-- productLab Active --}}
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-folder-open"></i> ข้อมูลผลิตภัณฑ์ และรายการวิจัย/ทดสอบ/สอบเทียบ</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="" class="table table-bordered table-hover table-sm display productlabTable" cellspacing="0" width="100%">
                        @if (count($productLabs) > 0)
                            <thead>                  
                                <tr>
                                    {{-- <th style="width: 10px;">ลำดับ</th> --}}
                                    <th>ห้องปฏิบัติการ</th>
                                    <th>ชื่อผลิตภัณฑ์ และรายการวิจัย/ทดสอบ/สอบเทียบ</th>
                                    <th>สถานะ</th>
                                    <th><i class="fas fa-user-clock"></i></th>
                                </tr>
                            </thead>
                            <tbody class="items">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($productLabs as $productLab)
                                <tr>
                                    {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                    {{-- <td>{{ $productLab->lab->lab_name }}</td> --}}
                                    <td>
                                        {{ $productLab->organization->org_name }}
                                        @if(!empty($productLab->organization->org_name_level_1)){{ ' : '.$productLab->organization->org_name_level_1 }}@else @endif 
										@if(!empty($productLab->organization->org_name_level_2)){{ ' : '.$productLab->organization->org_name_level_2 }}@else @endif
                                        | <mark>{{ $productLab->lab->lab_name }} : {{ $productLab->lab->lab_code }}</mark>
                                    </td>
                                    <td>                                    
                                        <a href="/productlab/{{ $productLab->id }}">
                                            <i class="far fa-hand-point-right"></i>
                                            {{ $productLab->product_lab_name }}
                                        </a>
                                    </td>
                                    <td>
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
                                    <td>{{ $productLab->updated_at }}</td>                        
                                </tr>                                
                                @endforeach
                            </tbody>
                        @endif                        
                    </table>
                </div>
                <!--/.card-body -->
                <div class="card-footer clearfix">
                    <a href="/lab">
                        <i class="far fa-edit"></i> เพิ่มข้อมูลผลิตภัณฑ์ และรายการวิจัย/ทดสอบ/สอบเทียบ
                    </a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->

    {{-- productLab Disabled --}}
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-danger card-outline">
                    <h3 class="card-title"><i class="fas fa-trash-alt"></i> รายการที่ถูกยกเลิก </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="" class="table table-bordered table-hover table-sm display productlabTable" cellspacing="0" width="100%">
                        @if (count($productLabsDel) > 0)
                            <thead>                  
                                <tr>
                                    {{-- <th style="width: 10px;">ลำดับ</th> --}}
                                    <th>ห้องปฏิบัติการ</th>
                                    <th>ชื่อผลิตภัณฑ์ และรายการวิจัย/ทดสอบ/สอบเทียบ</th>
                                    <th>สถานะ</th>
                                    <th><i class="fas fa-user-clock"></i></th>
                                </tr>
                            </thead>
                            <tbody class="items">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($productLabsDel as $productLab)
                                <tr>
                                    {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                    {{-- <td>{{ $productLab->lab->lab_name }}</td> --}}
                                    <td>
                                        {{ $productLab->organization->org_name }}
                                        @if(!empty($productLab->organization->org_name_level_1)){{ ' : '.$productLab->organization->org_name_level_1 }}@else @endif 
										@if(!empty($productLab->organization->org_name_level_2)){{ ' : '.$productLab->organization->org_name_level_2 }}@else @endif
                                        | <mark>{{ $productLab->lab->lab_name }} : {{ $productLab->lab->lab_code }}</mark>
                                    </td>
                                    <td>                                    
                                        {{ $productLab->product_lab_name }}
                                    </td>
                                    <td>
                                        <small class="badge badge-danger">
                                            รายการที่ถูกยกเลิก
                                        </small>
                                    </td>									
                                    <td>{{ $productLab->updated_at }}</td>                        
                                </tr>                                
                                @endforeach
                            </tbody>
                        @endif                        
                    </table>
                </div>
                <!--/.card-body -->
                <div class="card-footer clearfix">
                    
                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/custom-datatable/product-lab.js') }}"></script>
@endsection

