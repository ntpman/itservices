@extends('layouts.adminlte')

@section('page_name')
    | Asset Index
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">All Assets</h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/assets/asset/create"><i class="fas fa-edit"></i>เพิ่มข้อมูล</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="" class="table table-bordered table-striped table-sm datatables">
                            @if (count($assets) > 0)
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>หมายเลขครุภัณฑ์</th>
                                        <th>ปีที่จัดซื้อ</th>
                                        <th>หมายเลขประจำเครื่อง</th>
                                        <th>recived_asset</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($assets as $item)                                  
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->asset_number }}</td>
                                            <td>{{ $item->purchase_year }}</td>
                                            <td>{{ $item->serial_number }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                    <!-- /.card-body-->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection