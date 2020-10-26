@extends('layouts.adminlte')

@section('page_name')
    | Sub Types Index
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">All Sub Types</h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/basic/sub_type/create"><i class="fas fa-edit"></i>เพิ่มข้อมูล</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-sm datatables">
                            @if (count($showAllSubType) > 0)
                                <thead>
                                    <tr>
                                        <th style="width:80px;">ลำดับที่</th>
                                        <th class="text-center">ประเภทครุภัณฑ์</th>
                                        <th class="text-center">ชื่อครุภัณฑ์ย่อย</th>
                                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($showAllSubType as $subType)
                                    <tr>
                                        <td class="text-center">{{ $subType->id }}</td>
                                        <td>{{ $subType->assetType->asset_type_name }}</td>
                                        <td>{{ $subType->subtype_name }}</td>
                                        <td class="text-center">{{ $subType->subtype_status }}</td>
                                        <td>
                                            <br />
                                            <a href="/basic/sub_type/{{ $subType->id }}/edit" class="bth btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> แก้ไข
                                            </a>
                                            <br />
                                            <br />
                                            <a href="/basic/sub_type/{{ $subType->id }}/change_status" class="bth btn-danger btn-sm">
                                                <i class="fas fa-edit"></i> เปลี่ยนสถานะ
                                            </a>
                                            <br />
                                            <br />
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <p>ไม่พบข้อมูล</p>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('scripts')
    
@endsection
