@extends('layouts.adminlte')

@section('page_name')
    | Assets Index
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">All Assets ครุภัณฑ์</h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/assets/asset/create"><i class="fas fa-plus"></i> Create</a>
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
                                        <th>หมายเลขครุภัณฑ์</th>
                                        <th>หมายเลขประจำเครื่อง</th>
                                        <th>ปีที่จัดซื้อ</th>
                                        <th>ผู้สร้างรายการ</th>
                                        <th>ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assets as $item)                                  
                                        <tr>
                                            <td><a href="/assets/asset/{{ $item->id }}">{{ $item->asset_number }}</a></td>
                                            <td>{{ $item->asset_serial_number }}</td>
                                            <td>{{ $item->asset_purchase_year }}</td>
                                            <td>{{ $item->created_by }}</td>
                                            <td>
                                                <a href="/assets/asset/{{ $item->id }}/edit" class="btn btn-primary btn-xs">
                                                    <i class="fas fa-edit"></i> แก้ไข
                                                </a>
                                            </td>
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