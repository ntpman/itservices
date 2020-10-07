@extends('layouts.admin')

@section('page')
    Organization
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    {{-- active organization --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-folder-open"></i> ข้อมูลองค์กร</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dt1" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
                        @if (count($orgs) > 0)
                            <thead>                  
                                <tr>
                                    <th style="width: 10px;">ลำดับ</th>
                                    <th>ชื่อองค์กร : รหัสองค์กร</th>
                                    <th><i class="fas fa-user-clock"></i></th>
                                    <th><i class="fas fa-user-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($orgs as $org)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>
                                        <a href="/organization/{{ $org->id }}">
                                            <i class="far fa-hand-point-right"></i> 
                                            {{ $org->org_name }} 
                                            @if(!empty($org->org_name_level_1)){{ ' : '.$org->org_name_level_1 }}@else @endif 
                                            @if(!empty($org->org_name_level_2)){{ ' : '.$org->org_name_level_2 }}@else @endif
                                            : <mark>{{ $org->org_code }}</mark>                                  
                                        </a>
                                    </td>									
									<td>{{ $org->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('lab.create-org-id', $org->id) }}">
                                            <i class="far fa-edit"></i> เพิ่มห้องปฏิบัติการ
                                        </a>
                                    </td>
                                </tr>                                
                                @endforeach
                            </tbody>
                        @else
                        @endif                        
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="/organization/create">
                        <i class="far fa-edit"></i></i> เพิ่มข้อมูลองค์กร
                    </a>
                </div>
                <!--/.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->

    {{-- disabled organization --}}
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
                    <table id="dt1" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
                        @if (count($orgsDel) > 0)
                            <thead>                  
                                <tr>
                                    <th style="width: 10px;">ลำดับ</th>
                                    <th>ชื่อองค์กร : รหัสองค์กร</th>
                                    <th>สถานะ</i></th>
                                    <th><i class="fas fa-user-clock"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($orgsDel as $org)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>
                                        {{ $org->org_name }} 
                                        @if(!empty($org->org_name_level_1)){{ ' : '.$org->org_name_level_1 }}@else @endif 
                                        @if(!empty($org->org_name_level_2)){{ ' : '.$org->org_name_level_2 }}@else @endif
                                        : <mark>{{ $org->org_code }}</mark>                                  
                                    </td>									
                                    <td>
                                        <small class="badge badge-danger">
                                            รายการที่ถูกยกเลิก
                                        </small>
                                    </td>
                                    <td>{{ $org->updated_at }}</td>
                                </tr>                                
                                @endforeach
                            </tbody>
                        @else
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

