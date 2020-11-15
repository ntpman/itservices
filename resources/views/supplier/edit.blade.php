@extends('layouts.adminlte')

@section('page_name')
    | Suppliers Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> Edit Supplier ผู้จำหน่ายสินค้า</h3>
                    </div>
                    <!-- form start -->
                    <form action="/supplier/{{ $supplier->id }}" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_name">
                                            ชื่อผู้จำหน่ายสินค้า 
                                            <a href="#" data-toggle="modal" data-target="#edit-supplier_name">
                                                <i class="far fa-edit"></i> Edit
                                            </a> 
                                        </label>
                                        <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" name="" id="" value="{{ $supplier->supplier_name }}" placeholder="supplier_name" readonly>
                                        @error('supplier_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_address">ที่อยู่</label>
                                        <input type="text" class="form-control @error('supplier_address') is-invalid @enderror" name="supplier_address" id="supplier_address" value="{{ $supplier->supplier_address }}" placeholder="supplier_address" required>
                                        @error('supplier_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_province_id">จังหวัด</label>
                                        <select class="form-control select2bs4 @error('supplier_province_id') is-invalid @enderror" 
                                            style="width: 100%;" 
                                            name="supplier_province_id" 
                                            id="supplier_province_id" 
                                            data-value="{{ $supplier->supplier_province_id }}" 
                                            data-placeholder="supplier_province_id" required>
                                                <option value="" selected></option>
                                        </select>
                                        @error('supplier_province_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_district_id">เขต/อำเภอ</label>
                                        <select class="form-control select2bs4 @error('supplier_district_id') is-invalid @enderror" 
                                            style="width: 100%;" 
                                            name="supplier_district_id" 
                                            id="supplier_district_id" 
                                            data-value="{{ $supplier->supplier_district_id }}" 
                                            data-placeholder="supplier_district_id" required>
                                                <option value="" selected></option>
                                        </select>
                                        @error('supplier_district_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_subdistrict_id">แขวง/ตำบล</label>
                                        <select class="form-control select2bs4 @error('supplier_subdistrict_id') is-invalid @enderror" 
                                            style="width: 100%;" 
                                            name="supplier_subdistrict_id" 
                                            id="supplier_subdistrict_id" 
                                            data-value="{{ $supplier->supplier_subdistrict_id }}" 
                                            data-placeholder="supplier_subdistrict_id">
                                                <option value="" selected></option>
                                        </select>
                                        @error('supplier_subdistrict_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_postcode">รหัสไปรษณีย์</label>
                                        <input type="text" class="form-control @error('supplier_postcode') is-invalid @enderror" name="supplier_postcode" id="supplier_postcode" value="{{ $supplier->supplier_postcode }}" placeholder="supplier_postcode" required>
                                        @error('supplier_postcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_phone">หมายเลขโทรศัพท์</label>
                                        <input type="text" class="form-control @error('supplier_phone') is-invalid @enderror" name="supplier_phone" id="supplier_phone" value="{{ $supplier->supplier_phone }}" placeholder="supplier_phone" required>
                                        @error('supplier_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_email">อีเมล</label>
                                        <input type="email" class="form-control @error('supplier_email') is-invalid @enderror" name="supplier_email" id="supplier_email" value="{{ $supplier->supplier_email }}" placeholder="supplier_email" required>
                                        @error('supplier_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_contact">ผู้ติดต่อ</label>
                                        <input type="text" class="form-control @error('supplier_contact') is-invalid @enderror" name="supplier_contact" id="supplier_contact" value="{{ $supplier->supplier_contact }}" placeholder="supplier_contact" required>
                                        @error('supplier_contact')
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
                            <a href="/supplier" class="btn btn-secondary">Cancel</a>
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

@section('modal')
    @include('supplier.modal.edit-supplier-name')
@endsection

@section('scripts')
    <script src="{{ asset('/js/supplier.js') }}"></script>
@endsection