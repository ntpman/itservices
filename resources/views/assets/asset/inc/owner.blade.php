<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="asset_owner_name">ผู้รับผิดชอบครุภัณฑ์ <span><sup class="text-danger">*</sup></span> </label>
            <input type="text" class="form-control form-control-sm @error('asset_owner_name') is-invalid @enderror" name="asset_owner_name" id="asset_owner_name" value="{{ old('asset_owner_name') }}" placeholder="asset_owner_name" >
            @error('asset_owner_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="asset_owner_started">วันที่รับมอบครุภัณฑ์ <span><sup class="text-danger">*</sup></span> </label>
            <input type="text" class="form-control form-control-sm @error('asset_owner_started') is-invalid @enderror" name="asset_owner_started" id="asset_owner_started" value="{{ old('asset_owner_started') }}" placeholder="2020-05-05" data-inputmask='"mask": "9999-99-99"' data-mask>
            @error('asset_owner_started')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="asset_owner_ended">วันที่ส่งคืนครุภัณฑ์</label>
            <input type="text" class="form-control form-control-sm @error('asset_owner_ended') is-invalid @enderror" name="asset_owner_ended" id="asset_owner_ended" value="{{ old('asset_owner_ended') }}" placeholder="2020-05-05" data-inputmask='"mask": "9999-99-99"' data-mask readonly>
            @error('asset_owner_ended')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<!-- /.row -->