@extends('layouts.adminlte')

@section('page_name')
    | Detail Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> Detail Edit</h3>
                    </div>
                    <!-- form start -->
                    <form action="{{ route('detail.update', $assetDetail->id) }}" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="asset_detail_description">รายละเอียดครุภัณฑ์</label>
                                        <textarea class="form-control form-control-sm @error('asset_detail_description') is-invalid @enderror" name="asset_detail_description" id="" rows="3" placeholder="asset_detail_description">{{ $assetDetail->asset_detail_description }}</textarea>
                                        @error('asset_detail_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="asset_detail_amont">จำนวนหน่วย</label>
                                        <input type="text" class="form-control form-control-sm @error('asset_detail_amont') is-invalid @enderror" name="asset_detail_amont" id="" value="{{ $assetDetail->asset_detail_amont }}" placeholder="asset_detail_amont">
                                        @error('asset_detail_amont')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="asset_detail_comment">หมายเหตุ</label>
                                        <textarea class="form-control form-control-sm @error('asset_detail_comment') is-invalid @enderror" name="asset_detail_comment" id="" rows="3" placeholder="asset_detail_comment">{{ $assetDetail->asset_detail_comment }}</textarea>
                                        @error('asset_detail_comment')
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