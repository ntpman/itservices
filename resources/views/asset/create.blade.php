@extends('layouts.adminlte')

@section('page_name')
    | Asset Create
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Asset Create <i class="far fa-edit"></i></h3>
                    </div>
                    <!-- form start -->
                    <form action="/asset" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="asset_type_id">รหัสประเภทครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('asset_type_id') is-invalid @enderror" name="asset_type_id" id="asset_type_id" value="{{ old('asset_type_id') }}" placeholder="asset_type_id">
                                        @error('asset_type_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="asset_subtype_id">รหัสประเภทครุภัณฑ์ย่อย</label>
                                        <input type="text" class="form-control form-control-sm @error('asset_subtype_id') is-invalid @enderror" name="asset_subtype_id" id="asset_subtype_id" value="{{ old('asset_subtype_id') }}" placeholder="asset_subtype_id">
                                        @error('asset_subtype_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="asset_common_name_id">รหัสชื่อครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('asset_common_name_id') is-invalid @enderror" name="asset_common_name_id" id="asset_common_name_id" value="{{ old('asset_common_name_id') }}" placeholder="asset_common_name_id">
                                        @error('asset_common_name_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="asset_number">หมายเลขครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('asset_number') is-invalid @enderror" name="asset_number" id="asset_number" value="{{ old('asset_number') }}" placeholder="asset_number">
                                        @error('asset_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="purchase_year">ปีที่จัดซื้อ</label>
                                        <input type="text" class="form-control form-control-sm @error('purchase_year') is-invalid @enderror" name="purchase_year" id="purchase_year" value="{{ old('purchase_year') }}" placeholder="purchase_year">
                                        @error('purchase_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="brand_id">รหัสยี่ห้อครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('brand_id') is-invalid @enderror" name="brand_id" id="brand_id" value="{{ old('brand_id') }}" placeholder="brand_id">
                                        @error('brand_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="model_id">รหัสรุ่นครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('model_id') is-invalid @enderror" name="model_id" id="model_id" value="{{ old('model_id') }}" placeholder="model_id">
                                        @error('model_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="serial_number">หมายเลขประจำเครื่อง</label>
                                        <input type="text" class="form-control form-control-sm @error('serial_number') is-invalid @enderror" name="serial_number" id="serial_number" value="{{ old('serial_number') }}" placeholder="serial_number">
                                        @error('serial_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_id">รหัสผู้แทนจำหน่ายครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('supplier_id') is-invalid @enderror" name="supplier_id" id="supplier_id" value="{{ old('supplier_id') }}" placeholder="supplier_id">
                                        @error('supplier_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="recived_asset">วันที่ตรวจรับครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('recived_asset') is-invalid @enderror" name="recived_asset" id="recived_asset" value="{{ old('recived_asset') }}" placeholder="recived_asset">
                                        @error('recived_asset')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="warranty_period">ระยะเวลาการรับประกัน</label>
                                        <input type="text" class="form-control form-control-sm @error('warranty_period') is-invalid @enderror" name="warranty_period" id="warranty_period" value="{{ old('warranty_period') }}" placeholder="warranty_period">
                                        @error('warranty_period')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="asset_usage_id">รหัสสถานะการใช้งานครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('asset_usage_id') is-invalid @enderror" name="asset_usage_id" id="asset_usage_id" value="{{ old('asset_usage_id') }}" placeholder="asset_usage_id">
                                        @error('asset_usage_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="retired_asset">วันที่แจ้งจำหน่ายครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('retired_asset') is-invalid @enderror" name="retired_asset" id="retired_asset" value="{{ old('retired_asset') }}" placeholder="retired_asset">
                                        @error('retired_asset')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- end start -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection