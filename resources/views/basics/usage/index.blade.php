@extends('layouts.adminlte')

@section('page_name')
    | Usages Index
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">All Usages สถานะการใช้งานครุภัณฑ์</h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/basics/usage/create"><i class="fas fa-plus"></i> เพิ่มข้อมูล</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-sm datatables">
                            @if (count($showAllUsage) > 0)
                                <thead>
                                    <tr>
                                        <th style="width:80px;">ลำดับที่</th>
                                        <th class="text-center">การใช้งานครุภัณฑ์</th>
                                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                                        <th>ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($showAllUsage as $usage)
                                    <tr>
                                        <td class="text-center">{{ $usage->id }}</td>
                                        <td>{{ $usage->usage_name }}</td>
                                        <td class="text-center">{{ $usage->usage_status }}</td>
                                        <td>
                                            <a href="/basics/usage/{{ $usage->id }}/edit" class="bth btn-info btn-sm">
                                                <i class="fas fa-edit"></i> แก้ไข
                                            </a>
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
