@extends('layouts.adminlte')

@section('page_name')
    | Asset Show
@endsection

@section('content-header')
    <a href="/assets/asset" class="btn btn-secondary"><i class="fas fa-backward"></i> Back</a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-file"></i> Asset Show
                            <a href="/assets/asset/{{ $asset->id }}/edit" class="btn btn-primary btn-xs"><i class="far fa-edit"></i> Edit</a>
                            <a href="/assets/asset/create" class="btn btn-primary btn-xs"><i class="fas fa-plus"></i> Asset</a>
                        </h3>
                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            <!-- This will cause the card to collapse when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover table-sm">
                            <tbody>
                                <tr>
                                    <th style="width: 25%;">รหัสเอกสาร</th>
                                    <td style="width: 25%;">{{ $asset->id }}</td>
                                    <th style="width: 25%;">รหัสประเภทครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->type->type_name }}</td>
                                    
                                </tr>
                                <tr>
                                    <th style="width: 25%;">รหัสยี่ห้อครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->brand->brand_full_name }}</td>
                                    <th style="width: 25%;">รหัสประเภทครุภัณฑ์ย่อย</th>
                                    <td style="width: 25%;">
                                        @if (!empty($asset->subtype_id))
                                            {{ $asset->subtype->subtype_name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">รหัสรุ่นครุภัณฑ์</th>
                                    <td style="width: 25%;">
                                        @if (!empty($asset->brand_model_id))
                                            {{ $asset->brandModel->brand_model_name }}
                                        @endif
                                    </td>
                                    <th style="width: 25%;">รหัสชื่อครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->common->common_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">รหัสสถานะการใช้งานครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->usage->usage_name }}</td>
                                    <th style="width: 25%;">รหัสผู้แทนจำหน่ายครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->supplier->supplier_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">หมายเลขครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->asset_number }}</td>
                                    <th style="width: 25%;">หมายเลขประจำเครื่อง</th>
                                    <td style="width: 25%;">{{ $asset->asset_serial_number }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">ปีที่จัดซื้อ</th>
                                    <td style="width: 25%;">{{ $asset->asset_purchase_year }}</td>
                                    <th style="width: 25%;">ระยะเวลาการรับประกัน</th>
                                    <td style="width: 25%;">{{ $asset->asset_warranty_period }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">วันที่ตรวจรับครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->asset_recived }}</td>
                                    <th style="width: 25%;">วันที่แจ้งจำหน่ายครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->asset_retired }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table class="table table-bordered table-hover table-sm">
                            <tbody>
                                @if (count($asset->assetOwners) > 0)
                                    <tr>
                                        <td colspan="2">
                                            <i class="fas fa-user"></i> Owner
                                            <a href="#" data-toggle="modal" data-target="#modal-edit-owner">
                                                <i class="far fa-edit"></i> edit
                                            </a>
                                        </td>
                                    </tr>
                                    @foreach ($asset->assetOwners as $item)
                                    <tr>
                                        <th style="width: 25%;">ผู้รับผิดชอบครุภัณฑ์</th>
                                        <td>
                                            {{ $item->asset_owner_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 25%;">วันที่รับมอบครุภัณฑ์</th>
                                        <td>
                                            {{ $item->asset_owner_started }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 25%;">วันที่ส่งคืนครุภัณฑ์</th>
                                        <td>
                                            {{ $item->asset_owner_ended }}
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <th>
                                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-owner">
                                            <i class="fas fa-plus"></i> Owner
                                        </a>
                                    </th>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->                       
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-sticky-note"></i> Detail
                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-create-detail">
                                <i class="fas fa-plus"></i> Detail
                            </a>
                        </h3>                   
                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            <!-- This will cause the card to collapse when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-sm">
                            <tbody>
                                @if (count($asset->assetDetails) > 0)
                                    <thead>
                                        <tr>
                                            <th style="width: 25%;">รายละเอียดครุภัณฑ์</th>
                                            <th style="width: 25%;">จำนวนหน่วย</th>
                                            <th style="width: 25%;">หมายเหตุ</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($asset->assetDetails as $detail)                                  
                                        <tr>
                                            <td>{{ $detail->asset_detail_description }}</td>
                                            <td>{{ $detail->asset_detail_amont }}</td>
                                            <td>{{ $detail->asset_detail_comment }}</td>
                                            <td><a href="{{ route('detail.edit', $detail->id) }}"><i class="far fa-edit"></i> Edit</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @endif
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-map-marker-alt"></i> Location
                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-create-location">
                                <i class="fas fa-plus"></i> Location
                            </a>
                        </h3>                   
                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            <!-- This will cause the card to collapse when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-sm">
                            <tbody>
                                @if (count($asset->locations) > 0)
                                    <thead>
                                        <tr>
                                            <th style="width: 25%;">รหัสชื่ออาคารที่ติดตั้งใช้งาน</th>
                                            <th style="width: 25%;">ชั้นที่ติดตั้งใช้งาน</th>
                                            <th style="width: 25%;">ห้องที่ติดตั้งใช้งาน</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($asset->locations as $location)                                  
                                        <tr>
                                            <td>{{ $location->building->building_name }}</td>
                                            <td>{{ $location->location_floor }}</td>
                                            <td>{{ $location->location_room }}</td>
                                            <td><a href="/location/{{ $location->id }}/edit"><i class="far fa-edit"></i> Edit</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @endif
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('modal')
    @include('assets.asset.modal.create-location')
    {{-- create location --}}
    @include('assets.asset.modal.create-detail')
    {{-- create detail --}}
    

    {{-- owner --}}
    <div class="modal fade" id="modal-owner" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Add owner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                {!! Form::open(['action' => ['Assets\AssetOwnerController@store'], 'method' => 'POST']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="asset_owner_name">ผู้รับผิดชอบครุภัณฑ์</label>
                        <input type="text" class="form-control form-control-sm @error('asset_owner_name') is-invalid @enderror" name="asset_owner_name" id="asset_owner_name" value="{{ old('asset_owner_name') }}" placeholder="asset_owner_name" required>
                        @error('asset_owner_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="asset_owner_started">วันที่รับมอบครุภัณฑ์</label>
                        <input type="text" class="form-control form-control-sm @error('asset_owner_started') is-invalid @enderror" name="asset_owner_started" id="asset_owner_started" value="{{ old('asset_owner_started') }}" placeholder="2020-05-05" data-inputmask='"mask": "9999-99-99"' data-mask required>
                        @error('asset_owner_started')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="asset_owner_ended">วันที่ส่งคืนครุภัณฑ์</label>
                        <input type="text" class="form-control form-control-sm @error('asset_owner_ended') is-invalid @enderror" name="asset_owner_ended" id="asset_owner_ended" value="{{ old('asset_owner_ended') }}" placeholder="2020-05-05" data-inputmask='"mask": "9999-99-99"' data-mask>
                        @error('asset_owner_ended')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary btn-sm']) }}
                </div>
                {!! Form::close() !!}
                <!-- end start -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @if (count($asset->assetOwners) > 0)
    <div class="modal fade" id="modal-edit-owner" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Edit owner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                @foreach ($asset->assetOwners as $owner)
                {!! Form::open(['action' => ['Assets\AssetOwnerController@update', $owner->id], 'method' => 'PUT']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="asset_owner_name">ผู้รับผิดชอบครุภัณฑ์</label>
                        <input type="text" class="form-control form-control-sm @error('asset_owner_name') is-invalid @enderror" name="asset_owner_name" id="asset_owner_name" value="{{ $owner->asset_owner_name }}" placeholder="asset_owner_name" required>
                        @error('asset_owner_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="asset_owner_started">วันที่รับมอบครุภัณฑ์</label>
                        <input type="text" class="form-control form-control-sm @error('asset_owner_started') is-invalid @enderror" name="asset_owner_started" id="asset_owner_started" value="{{ $owner->asset_owner_started }}" placeholder="2020-05-05" data-inputmask='"mask": "9999-99-99"' data-mask required>
                        @error('asset_owner_started')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="asset_owner_ended">วันที่ส่งคืนครุภัณฑ์</label>
                        <input type="text" class="form-control form-control-sm @error('asset_owner_ended') is-invalid @enderror" name="asset_owner_ended" id="asset_owner_ended" value="{{ $owner->asset_owner_ended }}" placeholder="2020-05-05" data-inputmask='"mask": "9999-99-99"' data-mask>
                        @error('asset_owner_ended')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::submit('Save', ['class' => 'btn btn-primary btn-sm']) }}
                </div>
                {!! Form::close() !!}
                @endforeach
                <!-- end start -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endif
    <!-- /.modal -->
@endsection