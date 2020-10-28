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
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th style="width: 25%;">รหัสประเภทครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->type->type_name }}</td>
                                    <th style="width: 25%;">รหัสประเภทครุภัณฑ์ย่อย</th>
                                    <td style="width: 25%;">
                                        @if (!empty($asset->subtype_id))
                                            {{ $asset->subtype->subtype_name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">รหัสยี่ห้อครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->brand->brand_full_name }}</td>
                                    <th style="width: 25%;">รหัสรุ่นครุภัณฑ์</th>
                                    <td style="width: 25%;">
                                        @if (!empty($asset->brand_model_id))
                                            {{ $asset->brandModel->brand_model_name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">รหัสชื่อครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->common->common_name }}</td>
                                    <th style="width: 25%;">รหัสสถานะการใช้งานครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->usage->usage_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 25%;">รหัสผู้แทนจำหน่ายครุภัณฑ์</th>
                                    <td style="width: 25%;">{{ $asset->supplier->supplier_name }}</td>
                                    <th></th>
                                    <td></td>
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
                        <table class="table table-bordered table-hover">
                            <tbody>
                                @if (count($asset->locations) > 0)
                                    <tr>
                                        <td colspan="2">
                                            <i class="fas fa-map-marker-alt"></i> Location
                                            <a href="#" data-toggle="modal" data-target="#modal-edit-location">
                                                <i class="far fa-edit"></i> edit
                                            </a>
                                        </td>
                                    </tr>
                                    @foreach ($asset->locations as $item)
                                    <tr>
                                        <th style="width: 25%;">รหัสชื่ออาคารที่ติดตั้งใช้งาน</th>
                                        <td>
                                            {{ $item->building->building_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 25%;">ชั้นที่ติดตั้งใช้งาน</th>
                                        <td>
                                            {{ $item->location_floor }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 25%;">ห้องที่ติดตั้งใช้งาน</th>
                                        <td>
                                            {{ $item->location_room }}
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <th>
                                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-location">
                                            <i class="fas fa-plus"></i> location
                                        </a>
                                    </th>
                                    <td style="width: 25%;"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="/assets/asset" class="btn btn-secondary">Back</a>
                        <a href="/assets/asset/{{ $asset->id }}/edit" class="btn btn-info">Edit</a>
                        <a href="/assets/asset/create" class="btn btn-success">Create</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
                @if (count($asset->locations) > 0)                        
                <div class="card card-outline card-dark">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-cog"></i> TEXT</h3>                   
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
                        CONTENT
                    </div>
                    <!-- /.card-body -->
                </div>
                @endif
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('modal')
    <div class="modal fade" id="modal-location" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Add location</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                {!! Form::open(['action' => ['LocationController@store', $asset->id], 'method' => 'POST']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="building_id">รหัสชื่ออาคารที่ติดตั้งใช้งาน</label>
                        <select class="form-control select2bs4 @error('building_id') is-invalid @enderror" 
                            style="width: 100%;"
                            name="building_id"
                            id="building_id"
                            data-placeholder="building_id" required>
                                <option value="" selected></option>
                            @foreach ($buildings as $item)
                                <option value="{{ $item->id }}" {{ ( old('building_id') == $item->id) ? 'selected' : '' }}>
                                    {{ $item->building_name }}
                                </option>                                         
                            @endforeach
                        </select>
                        @error('building_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location_floor">ชั้นที่ติดตั้งใช้งาน</label>
                        <input type="text" class="form-control form-control-sm @error('location_floor') is-invalid @enderror" name="location_floor" id="location_floor" value="{{ old('location_floor') }}" required>
                        @error('location_floor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location_room">ห้องที่ติดตั้งใช้งาน</label>
                        <input type="text" class="form-control form-control-sm @error('location_room') is-invalid @enderror" name="location_room" id="location_room" value="{{ old('location_room') }}" required>
                        @error('location_room')
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
    @if (count($asset->locations) > 0)
    <div class="modal fade" id="modal-edit-location" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Edit location</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                @foreach ($asset->locations as $location)
                {!! Form::open(['action' => ['LocationController@update', $location->id], 'method' => 'PUT']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="building_id">รหัสชื่ออาคารที่ติดตั้งใช้งาน</label>
                        <select class="form-control select2bs4 @error('building_id') is-invalid @enderror" 
                            style="width: 100%;"
                            name="building_id"
                            id="building_id"
                            data-placeholder="building_id" required>
                                <option value="" selected></option>
                            @foreach ($buildings as $item)
                                <option value="{{ $item->id }}" {{ ( $location->building_id == $item->id) ? 'selected' : '' }}>
                                    {{ $item->building_name }}
                                </option>                                         
                            @endforeach
                        </select>
                        @error('building_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location_floor">ชั้นที่ติดตั้งใช้งาน</label>
                        <input type="text" class="form-control form-control-sm @error('location_floor') is-invalid @enderror" name="location_floor" id="location_floor" value="{{ $location->location_floor }}" required>
                        @error('location_floor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location_room">ห้องที่ติดตั้งใช้งาน</label>
                        <input type="text" class="form-control form-control-sm @error('location_room') is-invalid @enderror" name="location_room" id="location_room" value="{{ $location->location_room }}" required>
                        @error('location_room')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <input type="hidden" name="asset_id" value="{{ $location->asset_id }}">
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