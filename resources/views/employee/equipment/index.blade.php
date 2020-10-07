@extends('layouts.admin')

@section('page')
    Equipment
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    {{-- equipment active --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-folder-open"></i> ข้อมูลเครื่องมือวิทยาศาสตร์</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="" class="table table-bordered table-hover table-sm display equipmentTable" cellspacing="0" width="100%">
                        @if (count($equipments) > 0)
                            <thead>                  
                                <tr>
                                    {{-- <th style="width: 10px;" class="text-center">ลำดับ</th> --}}
                                    <th>ห้องปฏิบัติการ</th>
                                    <th>รหัสเครื่องมือ : ชื่อเครื่องมือวิทยาศาสตร์</th>
                                    <th>สถานะ</th>
                                    <th><i class="fas fa-user-clock"></i></th>
                                </tr>
                            </thead>
                            <tbody class="items">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($equipments as $equipment)
                                    @if ($equipment->organization->completed == 0 && $equipment->lab->completed == 0)    
                                        <tr>
                                            {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                            <td>
                                                {{ $equipment->organization->org_name }}
                                                @if(!empty($equipment->organization->org_name_level_1)){{ ' : '.$equipment->organization->org_name_level_1 }}@else @endif 
                                                @if(!empty($equipment->organization->org_name_level_2)){{ ' : '.$equipment->organization->org_name_level_2 }}@else @endif
                                                | <mark>{{ $equipment->lab->lab_name }} : {{ $equipment->lab->lab_code }}</mark>
                                            </td>
                                            <td>                                    
                                                <a href="/equipment/{{ $equipment->id }}">
                                                    <i class="far fa-hand-point-right"></i>
                                                    @if ($equipment->science_tool_other_name == null )
                                                        {{ $equipment->equipment_code }} : {{ $equipment->scienceTool->science_tool_name }}
                                                    @else
                                                        {{ $equipment->equipment_code }} : {{ $equipment->science_tool_other_name }}
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
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
                                            <td>{{ $equipment->updated_at }}</td>
                                        </tr>                                
                                    @endif
                                @endforeach
                            </tbody>
                        @endif                        
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="/lab">
                        <i class="far fa-edit"></i> เพิ่มข้อมูลเครื่องมือวิทยาศาสตร์
                    </a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->

    {{-- equipment disabled --}}
    <div class="row">
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
                    <table id="" class="table table-bordered table-hover table-sm display equipmentTable" cellspacing="0" width="100%">
                        @if (count($equipmentsDel) > 0)
                            <thead>                  
                                <tr>
                                    {{-- <th style="width: 10px;" class="text-center">ลำดับ</th> --}}
                                    <th>ห้องปฏิบัติการ</th>
                                    <th>รหัสเครื่องมือ : ชื่อเครื่องมือวิทยาศาสตร์</th>
                                    <th>สถานะ</th>
                                    <th><i class="fas fa-user-clock"></i></th>
                                </tr>
                            </thead>
                            <tbody class="items">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($equipmentsDel as $equipment)
                                <tr>
                                    {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                    <td>
                                        {{ $equipment->organization->org_name }}
                                        @if(!empty($equipment->organization->org_name_level_1)){{ ' : '.$equipment->organization->org_name_level_1 }}@else @endif 
										@if(!empty($equipment->organization->org_name_level_2)){{ ' : '.$equipment->organization->org_name_level_2 }}@else @endif
                                        | <mark>{{ $equipment->lab->lab_name }} : {{ $equipment->lab->lab_code }}</mark>
                                    </td>
                                    <td>                                    
                                        @if ($equipment->science_tool_other_name == null )
                                            {{ $equipment->equipment_code }} : {{ $equipment->scienceTool->science_tool_name }}
                                        @else
                                            {{ $equipment->equipment_code }} : {{ $equipment->science_tool_other_name }}
                                        @endif
                                    </td>
                                    <td>
                                        <small class="badge badge-danger">
                                            รายการที่ถูกยกเลิก
                                        </small>
                                    </td>									
                                    <td>{{ $equipment->updated_at }}</td>
                                </tr>                                
                                @endforeach
                            </tbody>
                        @endif                        
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                
                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection

@section('scripts')
    <script src="{{ asset('js/custom-datatable/equipment.js') }}"></script>
@endsection

