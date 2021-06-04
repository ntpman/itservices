@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk Work List Page
@endsection

@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">แบบสั่งซ่อม/ทำสิ่งของที่มอบหมายผู้ปฏิบัติงานแล้ว</h3>
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
                    <table id="allRequest" class="table table-bordered table-striped table-sm datatables">
                        @if (count($requestAssigns) > 0)
                            <thead>
                                <tr>
                                    <th style="text-align: center">ผู้ปฏิบัติงาน</th>
                                    <th style="text-align: center" width="60px">เลขที่</th>
                                    <th style="text-align: center" width="70px">วันที่รับ</th>
                                    <th style="text-align: center">ผู้แจ้ง</th>
                                    <th style="text-align: center">ความประสงค์</th>
                                    <th style="text-align: center">สถานะ</th>
                                    <th style="text-align: center" width="60px">เอกสารแจ้ง</th>
                                    <th style="text-align: center" width="60px">ส่งมอบงานแล้ว</th>
                                </tr>
                            </thead>
                            <tbody id="items">
                                @foreach ($requestAssigns as $item)                                  
                                    <tr>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->requestInfo->request_number }}</td>
                                        <td>{{ date ('d-m-Y', strtotime($item->requestInfo->request_recieved)) }}</td>
                                        <td>{{ $item->requestInfo->request_owner }}</td>
                                        <td>{{ $item->requestInfo->request_type }} {{ $item->requestInfo->request_objective }}</td>
                                        <td>{{ $item->requestInfo->request_status }}</td>
                                        <td style="text-align: center">
                                            <a href="/{{$item->requestInfo->request_file}}" class="btn btn-danger" target="_new"> <i class="fas fa-file-pdf"></i></a>
                                        </td>
                                        <td style="text-align: center">
                                            @if ( $item->requestInfo->done_file != '')
                                                <a href="/{{$item->requestInfo->done_file}}" class="btn btn-success" target="_new"> <i class="fas fa-file-pdf"></i></a>
                                            @else
                                                <i class=" btn btn-dark fas fa-ban"></i>
                                            @endif
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
    <script src="{{ asset('/js/group-table.js') }}" ></script>
@endsection
