@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk Main Page
@endsection

@section('content')
    
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">แบบสั่งซ่อม/ทำสิ่งของ (F-CD0-071) ที่อยู่ระหว่างดำเนินการ</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills nav-fill ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active btn btn-info" href="/helpdesk/create"><i class="fas fa-plus"></i> เพิ่มข้อมูล</a>
                            </li>&nbsp;
                            <li class="nav-item">
                                <a class="nav-link active btn btn-success" href="/helpdesk/unAssignSupervisor"><i class="fas fa-tasks"></i></i> มอบหมายหัวหน้างาน</a>
                            </li>&nbsp;
                            <li class="nav-item">
                                <a class="nav-link active btn btn-warning" href="/helpdesk/unAssignWorker"><i class="fas fa-tools"></i></i> มอบหมายผู้ปฏิบัติงาน</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="" class="table table-bordered table-striped table-sm datatables">
                        @if (count($requests) > 0)
                            <thead>
                                <tr>
                                    <th style="text-align: center" width="50px">เลขที่</th>
                                    <th style="text-align: center" width="60px">วันที่รับ</th>
                                    <th style="text-align: center">ผู้แจ้ง</th>
                                    <th style="text-align: center">ความประสงค์</th>
                                    <th style="text-align: center">ผู้รับผิดชอบ</th>
                                    <th style="text-align: center" width="ึ60px">วันที่มอบหมาย</th>
                                    <th style="text-align: center">สถานะ</th>
                                    <th style="text-align: center">ไฟล์แนบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requests as $item)                                  
                                    <tr>
                                        <td>{{ $item->request_number }}</td>
                                        <td>{{ date ('d-m-Y', strtotime( $item->request_recieved ))}}</td>
                                        <td>{{ $item->request_owner }}</td>
                                        <td>{{ $item->request_objective }}</td>
                                        <td>{{ $item->user->name}}</td>
                                        <td>{{date ('d-m-Y', strtotime ($item->updated_at ))}}</td>
                                        <td>{{ $item->request_status }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ asset('/')}}{{ $item->request_file }}" class="btn btn-info btn-xs"> <i class="fas fa-search"></i> รายละเอียด </a>
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

