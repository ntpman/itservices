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
                    {{-- <div class="card-tools">
                        <ul class="nav nav-pills nav-fill ml-auto">
                            @if (Auth::user() != '')
                                @if (Auth::user()->position == 'ธุรการกลุ่ม')
                                    <li class="nav-item">
                                        <a class="nav-link active btn btn-primary" href="/helpdesk/create"><i class="fas fa-tools"></i></i>เพิ่มข้อมูลใบสั่ง</a>
                                    </li>
                                @endif
                                @if (Auth::user()->position == 'หัวหน้างาน')
                                    <li class="nav-item">
                                        <a class="nav-link active btn btn-warning" href="/helpdesk/unAssignWorker"><i class="fas fa-tools"></i></i> มอบหมายผู้ปฏิบัติงาน</a>
                                    </li>
                                @endif
                                @if (Auth::user()->position == 'รก.หก.ทส.')
                                    <li class="nav-item">
                                        <a class="nav-link active btn btn-success" href="/helpdesk/unAssignSupervisor"><i class="fas fa-tasks"></i></i> มอบหมายหัวหน้างาน</a>
                                </li>&nbsp;
                                @endif
                            @endif
                        </ul>
                    </div> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="allRequest" class="table table-bordered table-striped table-sm datatables">
                        @if (count($requests) > 0)
                            <thead>
                                <tr>
                                    <th style="text-align: center">ผู้รับผิดชอบ</th>
                                    <th style="text-align: center" width="50px">เลขที่</th>
                                    <th style="text-align: center" width="60px">วันที่รับ</th>
                                    <th style="text-align: center">ผู้แจ้ง</th>
                                    <th style="text-align: center">ความประสงค์</th>
                                    <th style="text-align: center" width="ึ60px">วันที่จ่ายงาน</th>
                                    <th style="text-align: center">สถานะ</th>
                                    <th style="text-align: center" width="40px">เอกสาร</i></th>
                                </tr>
                            </thead>
                            <tbody id="items">
                                @foreach ($requests as $item)                                  
                                    <tr>
                                        <td>{{ $item->user->name}}</td>
                                        <td>{{ $item->request_number }}</td>
                                        <td>{{ date ('d-m-Y', strtotime( $item->request_recieved ))}}</td>
                                        <td>{{ $item->request_owner }}</td>
                                        <td>{{ $item->request_type }} {{ $item->request_objective }}</td>
                                        <td>{{date ('d-m-Y', strtotime ($item->updated_at ))}}</td>
                                        <td>{{ $item->request_status }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ asset('/')}}{{ $item->request_file }}" class="btn btn-danger btn-xs" target="_new"> <i class="far fa-file-pdf"></i></a>
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

@section('scripts')
    <script src="{{ asset('/js/group-table.js') }}"></script>
@endsection