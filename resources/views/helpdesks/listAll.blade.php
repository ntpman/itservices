@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk List All Page
@endsection

@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">แบบสั่งซ่อม/ทำสิ่งของ (F-CD0-071) ทั้งหมด</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="allRequest" class="table table-bordered table-striped table-sm datatables">
                        @if (count($requestAlls) > 0)
                            <thead>
                                <tr>
                                    <th style="text-align: center">ผู้รับผิดชอบ</th>
                                    <th style="text-align: center" width="50px">เลขที่</th>
                                    <th style="text-align: center" width="60px">วันที่รับ</th>
                                    <th style="text-align: center" width="120px">ผู้แจ้ง</th>
                                    <th style="text-align: center" width="200px">ความประสงค์</th>
                                    <th style="text-align: center" width="90px">วันที่จ่ายงาน</th>
                                    <th style="text-align: center" width="100px">สถานะ</th>
                                    <th style="text-align: center" width="40px">เอกสาร</i></th>
                                </tr>
                            </thead>
                            <tbody id="items">
                                @foreach ($requestAlls as $item)                                  
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
    <script src="{{ asset('/js/group-table.js') }}" ></script>
@endsection

