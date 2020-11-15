@extends('layouts.adminlte')

@section('page_name')
    | Asset Create
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> Asset Create ครุภัณฑ์</h3>
                    </div>
                    <!-- form start -->
                    <form action="/assets/asset" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="wizard mb-3">
                                        <div class="connecting-line"></div>
                                        <ul class="nav nav-tabs justify-content-between round-tab" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#step1" class="btn btn-default" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true">
                                                    <i class="fas fa-copyright"></i> Basic
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step2" class="btn btn-default" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false">
                                                    <i class="fas fa-book"></i> Asset
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step3" class="btn btn-default" data-toggle="tab" aria-controls="step3" role="tab">
                                                    <i class="fas fa-comment-alt"></i> Detail
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step4" class="btn btn-default" data-toggle="tab" aria-controls="step4" role="tab">
                                                    <i class="fas fa-user"></i> Owner
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step5" class="btn btn-default" data-toggle="tab" aria-controls="step5" role="tab">
                                                    <i class="fas fa-images"></i> Picture
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step6" class="btn btn-default" data-toggle="tab" aria-controls="step6" role="tab">
                                                    <i class="fas fa-map-marker-alt"></i> Location
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content" id="main_form">
                                        <div class="tab-pane active" role="tabpanel" id="step1">
                                            {{-- BASIC --}}
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
                                                                <option value="{{ $item->id }}" {{ ( old('type_id') == $item->id) ? 'selected' : '' }}>
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
                                                                <option value="{{ $item->id }}" {{ ( old('subtype_id') == $item->id) ? 'selected' : '' }}>
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
                                                                <option value="{{ $item->id }}" {{ ( old('brand_id') == $item->id) ? 'selected' : '' }}>
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
                                                                <option value="{{ $item->id }}" {{ ( old('brand_model_id') == $item->id) ? 'selected' : '' }}>
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
                                                                <option value="{{ $item->id }}" {{ ( old('common_id') == $item->id) ? 'selected' : '' }}>
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
                                                                <option value="{{ $item->id }}" {{ ( old('usage_id') == $item->id) ? 'selected' : '' }}>
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
                                                        <a href="#" data-toggle="modal" data-target="#create-supplier_id">
                                                            <i class="fas fa-plus"></i> Supplier
                                                        </a>
                                                        <select class="form-control select2bs4 @error('supplier_id') is-invalid @enderror" 
                                                            style="width: 100%;"
                                                            name="supplier_id"
                                                            id="supplier_id"
                                                            data-placeholder="supplier_id">
                                                                <option value="" selected></option>
                                                            @foreach ($suppliers as $item)
                                                                <option value="{{ $item->id }}" {{ ( old('supplier_id') == $item->id) ? 'selected' : '' }}>
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
                                            <!-- /.row -->
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-success next-step">Continue to next step</button></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step2">
                                            {{-- ASSET --}}
                                            <div class="row">
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
                                                        <label for="asset_serial_number">หมายเลขประจำเครื่อง</label>
                                                        <input type="text" class="form-control form-control-sm @error('asset_serial_number') is-invalid @enderror" name="asset_serial_number" id="asset_serial_number" value="{{ old('asset_serial_number') }}" placeholder="asset_serial_number">
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
                                                        <input type="text" class="form-control form-control-sm @error('asset_purchase_year') is-invalid @enderror" name="asset_purchase_year" id="asset_purchase_year" value="{{ old('asset_purchase_year') }}" placeholder="2563" data-inputmask='"mask": "9999"' data-mask>
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
                                                        <input type="text" class="form-control form-control-sm @error('asset_warranty_period') is-invalid @enderror" name="asset_warranty_period" id="asset_warranty_period" value="{{ old('asset_warranty_period') }}" placeholder="asset_warranty_period">
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
                                                        <input type="text" class="form-control form-control-sm @error('asset_recived') is-invalid @enderror" name="asset_recived" id="asset_recived" value="{{ old('asset_recived') }}" placeholder="2020-05-05" data-inputmask='"mask": "9999-99-99"' data-mask>
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
                                                        <input type="text" class="form-control form-control-sm @error('asset_retired') is-invalid @enderror" name="asset_retired" id="asset_retired" value="{{ old('asset_retired') }}" placeholder="2020-05-05" data-inputmask='"mask": "9999-99-99"' data-mask readonly>
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
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-secondary prev-step">Back</button></li>
                                                <li><button type="button" class="btn btn-block btn-outline-success next-step">Continue</button></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step3">
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-secondary prev-step">Back</button></li>
                                                <li><button type="button" class="btn btn-block btn-outline-success next-step">Continue</button></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step4">
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-secondary prev-step">Back</button></li>
                                                <li><button type="button" class="btn btn-block btn-outline-success next-step">Continue</button></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step5">
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-secondary prev-step">Back</button></li>
                                                <li><button type="button" class="btn btn-block btn-outline-success next-step">Continue</button></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step6">
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-secondary prev-step">Back</button></li>
                                                <li><button type="submit" class="btn btn-block btn-outline-success">Submit</button></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
    @include('assets.asset.modal.create-supplier')
@endsection

@section('scripts')
    <script src="{{ asset('/js/supplier.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection