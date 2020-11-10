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
            <a href="#" data-toggle="modal" data-target="#modal-create-supplier_id">
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