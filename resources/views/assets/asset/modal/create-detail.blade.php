<div class="modal fade" id="modal-create-detail" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="far fa-edit"></i> Create Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- /.modal-header -->
            <!-- form start -->
            <form action="/assets/detail" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="asset_detail_description">รายละเอียดครุภัณฑ์</label>
                                <textarea class="form-control form-control-sm @error('asset_detail_description') is-invalid @enderror" name="asset_detail_description" id="" rows="3" placeholder="asset_detail_description">{{ old('asset_detail_description') }}</textarea>
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
                                <input type="text" class="form-control form-control-sm @error('asset_detail_amont') is-invalid @enderror" name="asset_detail_amont" id="" value="{{ old('asset_detail_amont') }}" placeholder="asset_detail_amont">
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
                                <textarea class="form-control form-control-sm @error('asset_detail_comment') is-invalid @enderror" name="asset_detail_comment" id="" rows="3" placeholder="asset_detail_comment">{{ old('asset_detail_comment') }}</textarea>
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
                <!-- /.modal-body -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <input type="hidden" name="asset_id" id="" value="{{ $asset->id }}">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
                <!-- /.modal-footer -->
            </form>
            <!-- end start -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->