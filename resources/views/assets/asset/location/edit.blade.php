@extends('layouts.adminlte')

@section('page_name')
    | Location Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> Location</h3>
                    </div>
                    <!-- form start -->
                    <form action="/location/{{ $location->id }}" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="building_id">รหัสชื่ออาคารที่ติดตั้งใช้งาน</label>
                                        <select class="form-control select2bs4 @error('building_id') is-invalid @enderror" 
                                            style="width: 100%;"
                                            name="building_id"
                                            id="building_id"
                                            data-placeholder="building_id" required>
                                                <option value="" selected></option>
                                            @foreach ($buildings as $item)
                                                <option value="{{ $item->id }}" {{ ($location->building_id == $item->id) ? 'selected' : '' }}>
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
                                </div>
                                <!-- /.col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="location_floor">ชั้นที่ติดตั้งใช้งาน</label>
                                        <input type="text" class="form-control form-control-sm @error('location_floor') is-invalid @enderror" name="location_floor" id="location_floor" value="{{ $location->location_floor }}" required>
                                        @error('location_floor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-12">
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
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->        
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary">Cancel</a>
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

@endsection

@section('scripts')

@endsection