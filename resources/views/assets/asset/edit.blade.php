@extends('layouts.adminlte')

@section('page_name')
    | Asset Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> Asset Edit</h3>
                    </div>
                    <!-- form start -->
                    <form action="/assets/asset/{{ $asset->id }}" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="type_id">รหัสประเภทครุภัณฑ์</label>
                                        <select class="form-control select2bs4 @error('type_id') is-invalid @enderror" 
                                            style="width: 100%;"
                                            name="type_id"
                                            id="type_id"
                                            data-placeholder="type_id">
                                                <option value="" selected></option>
                                            @foreach ($types as $item)
                                                <option value="{{ $item->id }}" {{ ($asset->type_id == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->type_name }}
                                                </option>                                         
                                            @endforeach
                                        </select>
                                        @error('type_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="subtype_id">รหัสประเภทครุภัณฑ์ย่อย</label>
                                        <select class="form-control select2bs4 @error('subtype_id') is-invalid @enderror" 
                                            style="width: 100%;"
                                            name="subtype_id"
                                            id="subtype_id"
                                            data-placeholder="subtype_id">
                                                <option value="" selected></option>
                                            @foreach ($subtypes as $item)
                                                <option value="{{ $item->id }}" {{ ($asset->subtype_id == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->subtype_name }}
                                                </option>                                         
                                            @endforeach
                                        </select>
                                        @error('subtype_id')
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
                                        <select class="form-control select2bs4 @error('brand_id') is-invalid @enderror" 
                                            style="width: 100%;"
                                            name="brand_id"
                                            id="brand_id"
                                            data-placeholder="brand_id">
                                                <option value="" selected></option>
                                            @foreach ($brands as $item)
                                                <option value="{{ $item->id }}" {{ ($asset->brand_id == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->brand_full_name }}
                                                </option>                                         
                                            @endforeach
                                        </select>
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
                                        <label for="brand_model_id">รหัสรุ่นครุภัณฑ์</label>
                                        <select class="form-control select2bs4 @error('brand_model_id') is-invalid @enderror" 
                                            style="width: 100%;"
                                            name="brand_model_id"
                                            id="brand_model_id"
                                            data-placeholder="brand_model_id">
                                                <option value="" selected></option>
                                            @foreach ($brandModels as $item)
                                                <option value="{{ $item->id }}" {{ ($asset->brand_model_id == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->brand_model_name }}
                                                </option>                                         
                                            @endforeach
                                        </select>
                                        @error('brand_model_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="common_id">รหัสชื่อครุภัณฑ์</label>
                                        <select class="form-control select2bs4 @error('common_id') is-invalid @enderror" 
                                            style="width: 100%;"
                                            name="common_id"
                                            id="common_id"
                                            data-placeholder="common_id">
                                                <option value="" selected></option>
                                            @foreach ($commons as $item)
                                                <option value="{{ $item->id }}" {{ ($asset->common_id == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->common_name }}
                                                </option>                                         
                                            @endforeach
                                        </select>
                                        @error('common_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="usage_id">รหัสสถานะการใช้งานครุภัณฑ์</label>
                                        <select class="form-control select2bs4 @error('usage_id') is-invalid @enderror" 
                                            style="width: 100%;"
                                            name="usage_id"
                                            id="usage_id"
                                            data-placeholder="usage_id">
                                                <option value="" selected></option>
                                            @foreach ($usages as $item)
                                                <option value="{{ $item->id }}" {{ ($asset->usage_id == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->usage_name }}
                                                </option>                                         
                                            @endforeach
                                        </select>
                                        @error('usage_id')
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
                                        <select class="form-control select2bs4 @error('supplier_id') is-invalid @enderror" 
                                            style="width: 100%;"
                                            name="supplier_id"
                                            id="supplier_id"
                                            data-placeholder="supplier_id">
                                                <option value="" selected></option>
                                            @foreach ($suppliers as $item)
                                                <option value="{{ $item->id }}" {{ ($asset->supplier_id == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->supplier_name }}
                                                </option>                                         
                                            @endforeach
                                        </select>
                                        @error('supplier_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <hr>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="asset_number">หมายเลขครุภัณฑ์</label>
                                        <a href="#" data-toggle="modal" data-target="#modal-asset_number">
                                            <i class="far fa-edit"></i> Edit
                                        </a>
                                        <input type="text" class="form-control form-control-sm @error('asset_number') is-invalid @enderror" name="" id="" value="{{ $asset->asset_number }}" placeholder="asset_number" readonly>
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
                                        <label for="asset_serial_number">หมายเลขประจำเครื่อง</label>
                                        <a href="#" data-toggle="modal" data-target="#modal-asset_serial_number">
                                            <i class="far fa-edit"></i> Edit
                                        </a>
                                        <input type="text" class="form-control form-control-sm @error('asset_serial_number') is-invalid @enderror" name="" id="" value="{{ $asset->asset_serial_number }}" placeholder="asset_serial_number" readonly>
                                        @error('asset_serial_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="asset_purchase_year">ปีที่จัดซื้อ</label>
                                        <input type="text" class="form-control form-control-sm @error('asset_purchase_year') is-invalid @enderror" name="asset_purchase_year" id="asset_purchase_year" value="{{ $asset->asset_purchase_year }}" placeholder="2563" data-inputmask='"mask": "9999"' data-mask>
                                        @error('asset_purchase_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="asset_warranty_period">ระยะเวลาการรับประกัน</label>
                                        <input type="text" class="form-control form-control-sm @error('asset_warranty_period') is-invalid @enderror" name="asset_warranty_period" id="asset_warranty_period" value="{{ $asset->asset_warranty_period }}" placeholder="asset_warranty_period">
                                        @error('asset_warranty_period')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="asset_recived">วันที่ตรวจรับครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('asset_recived') is-invalid @enderror" name="asset_recived" id="asset_recived" value="{{ $asset->asset_recived }}" placeholder="2020-05-05" data-inputmask='"mask": "9999-99-99"' data-mask>
                                        @error('asset_recived')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="asset_retired">วันที่แจ้งจำหน่ายครุภัณฑ์</label>
                                        <input type="text" class="form-control form-control-sm @error('asset_retired') is-invalid @enderror" name="asset_retired" id="asset_retired" value="{{ $asset->asset_retired }}" placeholder="2020-05-05" data-inputmask='"mask": "9999-99-99"' data-mask>
                                        @error('asset_retired')
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

@section('modal')
    <div class="modal fade" id="modal-asset_number" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Edit Asset Number</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                {!! Form::open(['action' => ['Assets\AssetController@update', $asset->id], 'method' => 'PUT']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="asset_number">หมายเลขครุภัณฑ์</label>
                        <input type="text" class="form-control form-control-sm @error('asset_number') is-invalid @enderror" name="asset_number" id="asset_number" value="{{ $asset->asset_number }}" placeholder="asset_number" required>
                        @error('asset_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <input type="hidden" name="edit-asset_number" value="1">
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::submit('Save', ['class'=>'btn btn-primary btn-sm']) }}
                </div>
                {!! Form::close() !!}
                <!-- end start -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-asset_serial_number" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Edit Asset Serial Number</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                {!! Form::open(['action' => ['Assets\AssetController@update', $asset->id], 'method' => 'PUT']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="asset_serial_number">หมายเลขประจำเครื่อง</label>
                        <input type="text" class="form-control form-control-sm @error('asset_serial_number') is-invalid @enderror" name="asset_serial_number" id="asset_serial_number" value="{{ $asset->asset_serial_number }}" placeholder="asset_serial_number" required>
                        @error('asset_serial_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <input type="hidden" name="edit-asset_serial_number" value="1">
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::submit('Save', ['class'=>'btn btn-primary btn-sm']) }}
                </div>
                {!! Form::close() !!}
                <!-- end start -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection