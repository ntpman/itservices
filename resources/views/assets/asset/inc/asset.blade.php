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