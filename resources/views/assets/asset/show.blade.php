@extends('layouts.adminlte')

@section('page_name')
    | Asset Show
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> Asset Show</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover table-sm">
                            <tbody>
                                <tr>
                                    <th style="width: 30%;">รหัสประเภทครุภัณฑ์</th>
                                    <td>{{ $asset->type->type_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">รหัสประเภทครุภัณฑ์ย่อย</th>
                                    <td>
                                        @if (!empty($asset->subtype_id))
                                            {{ $asset->subtype->subtype_name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">รหัสยี่ห้อครุภัณฑ์</th>
                                    <td>{{ $asset->brand->brand_full_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">รหัสรุ่นครุภัณฑ์</th>
                                    <td>
                                        @if (!empty($asset->brand_model_id))
                                            {{ $asset->brandModel->brand_model_name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">รหัสชื่อครุภัณฑ์</th>
                                    <td>{{ $asset->common->common_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">รหัสสถานะการใช้งานครุภัณฑ์</th>
                                    <td>{{ $asset->usage->usage_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">รหัสผู้แทนจำหน่ายครุภัณฑ์</th>
                                    <td>{{ $asset->supplier->supplier_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">หมายเลขครุภัณฑ์</th>
                                    <td>{{ $asset->asset_number }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">หมายเลขประจำเครื่อง</th>
                                    <td>{{ $asset->asset_serial_number }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">ปีที่จัดซื้อ</th>
                                    <td>{{ $asset->asset_purchase_year }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">ระยะเวลาการรับประกัน</th>
                                    <td>{{ $asset->asset_warranty_period }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">วันที่ตรวจรับครุภัณฑ์</th>
                                    <td>{{ $asset->asset_recived }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">วันที่แจ้งจำหน่ายครุภัณฑ์</th>
                                    <td>{{ $asset->asset_retired }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-location">
                            <i class="far fa-edit"></i> สถานที่ติดตั้งครุภัณฑ์
                        </a>
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