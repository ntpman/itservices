<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="asset_detail_description">รายละเอียดครุภัณฑ์ <span><sup class="text-danger">*</sup></span> </label>
            <textarea class="form-control form-control-sm @error('asset_detail_description') is-invalid @enderror" name="asset_detail_description" placeholder="asset_detail_description" rows="3">{{ old('asset_detail_description') }}</textarea>
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
            <label for="asset_detail_amont">จำนวนหน่วย <span><sup class="text-danger">*</sup></span> </label>
            <input type="text" class="form-control form-control-sm @error('asset_detail_amont') is-invalid @enderror" name="asset_detail_amont" placeholder="asset_detail_amont" value="{{ old('asset_detail_amont') }}" placeholder="asset_detail_amont">
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
            <textarea class="form-control form-control-sm @error('asset_detail_comment') is-invalid @enderror" name="asset_detail_comment" placeholder="asset_detail_comment" rows="3">{{ old('asset_detail_comment') }}</textarea>
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