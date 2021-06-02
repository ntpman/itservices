@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk Assign Supervisor Page
@endsection

@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">แบบสั่งซ่อม/ทำสิ่งของ (F-CD0-071) ที่รอการมอบหมายหัวหน้างาน</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills nav-fill ml-auto">
                            <li class="nav-item">
                                {{-- <a class="nav-link active btn-danger" href="/helpdesk"><i class="fas fa-home"></i></i> กลับหน้าหลัก</a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="" class="table table-bordered table-striped table-sm datatables">
                        @if (count($requestInfos) > 0)
                            <thead>
                                <tr>
                                    <th style="text-align: center" width="60px">เลขที่</th>
                                    <th style="text-align: center" width="60px">วันที่รับ</th>
                                    <th style="text-align: center">ผู้แจ้ง</th>
                                    <th style="text-align: center">ความประสงค์</th>
                                    <th style="text-align: center" width="100px">มอบหมายงาน</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requestInfos as $item)                                  
                                    <tr>
                                        <td>{{ $item->request_number }}</td>
                                        <td>{{ date ('d-m-Y', strtotime($item->request_recieved)) }}</td>
                                        <td>{{ $item->request_owner }}</td>
                                        <td>{{ $item->request_type }} {{ $item->request_objective }}</td>
                                        <td style="text-align: center">
                                            <a href="/helpdesk/assignSupervisor/{{ $item->id}}" class="btn btn-info btn-xs"> <i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection

