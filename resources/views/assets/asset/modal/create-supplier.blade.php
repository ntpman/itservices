<div class="modal fade" id="modal-create-supplier_id" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="far fa-edit"></i> Create Supplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- /.modal-header -->
            <!-- form start -->
            <form action="/supplier" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supplier_name">ชื่อผู้จำหน่ายสินค้า</label>
                                <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" name="supplier_name" id="supplier_name" value="{{ old('supplier_name') }}" placeholder="supplier_name">
                                @error('supplier_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supplier_address">ที่อยู่</label>
                                <input type="text" class="form-control @error('supplier_address') is-invalid @enderror" name="supplier_address" id="supplier_address" value="{{ old('supplier_address') }}" placeholder="supplier_address">
                                @error('supplier_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supplier_province_id">จังหวัด</label>
                                <select class="form-control select2bs4 @error('supplier_province_id') is-invalid @enderror" 
                                    style="width: 100%;" 
                                    name="supplier_province_id" 
                                    id="supplier_province_id" 
                                    data-value="{{ old('supplier_province_id') }}" 
                                    data-placeholder="supplier_province_id">
                                        <option value="" selected></option>
                                </select>
                                @error('supplier_province_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supplier_district_id">เขต/อำเภอ</label>
                                <select class="form-control select2bs4 @error('supplier_district_id') is-invalid @enderror" 
                                    style="width: 100%;" 
                                    name="supplier_district_id" 
                                    id="supplier_district_id" 
                                    data-value="{{ old('supplier_district_id') }}" 
                                    data-placeholder="supplier_district_id">
                                        <option value="" selected></option>
                                </select>
                                @error('supplier_district_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supplier_subdistrict_id">แขวง/ตำบล</label>
                                <select class="form-control select2bs4 @error('supplier_subdistrict_id') is-invalid @enderror" 
                                    style="width: 100%;" 
                                    name="supplier_subdistrict_id" 
                                    id="supplier_subdistrict_id" 
                                    data-value="{{ old('supplier_subdistrict_id') }}" 
                                    data-placeholder="supplier_subdistrict_id">
                                        <option value="" selected></option>
                                </select>
                                @error('supplier_subdistrict_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supplier_postcode">รหัสไปรษณีย์</label>
                                <input type="text" class="form-control @error('supplier_postcode') is-invalid @enderror" name="supplier_postcode" id="supplier_postcode" value="{{ old('supplier_postcode') }}" placeholder="supplier_postcode">
                                @error('supplier_postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supplier_phone">หมายเลขโทรศัพท์</label>
                                <input type="text" class="form-control @error('supplier_phone') is-invalid @enderror" name="supplier_phone" id="supplier_phone" value="{{ old('supplier_phone') }}" placeholder="supplier_phone">
                                @error('supplier_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supplier_email">อีเมล</label>
                                <input type="email" class="form-control @error('supplier_email') is-invalid @enderror" name="supplier_email" id="supplier_email" value="{{ old('supplier_email') }}" placeholder="supplier_email">
                                @error('supplier_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supplier_contact">ผู้ติดต่อ</label>
                                <input type="text" class="form-control @error('supplier_contact') is-invalid @enderror" name="supplier_contact" id="supplier_contact" value="{{ old('supplier_contact') }}" placeholder="supplier_contact">
                                @error('supplier_contact')
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
                    <input type="hidden" name="asset-add-supplier" value="1">
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