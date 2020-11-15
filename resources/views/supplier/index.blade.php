@extends('layouts.adminlte')

@section('page_name')
    | Suppliers Index
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">All Suppliers ผู้จำหน่ายสินค้า</h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/supplier/create"><i class="fas fa-plus"></i> Create</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="" class="table table-bordered table-striped table-sm datatables">
                            @if (count($suppliers) > 0)
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ชื่อผู้จำหน่ายสินค้า</th>
                                        <th>หมายเลขโทรศัพท์</th>
                                        <th>อีเมล</th>
                                        <th>ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($suppliers as $item)                                  
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->supplier_name }}</td>
                                            <td>{{ $item->supplier_phone }}</td>
                                            <td>{{ $item->supplier_email }}</td>
                                            <td>
                                                <a href="/supplier/{{ $item->id }}/edit" class="btn btn-info btn-xs">
                                                    <i class="far fa-edit"></i> แก้ไข
                                                </a>
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
    
@endsection