<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="building_id">รหัสชื่ออาคารที่ติดตั้งใช้งาน <span><sup class="text-danger">*</sup></span> </label>
            <select class="form-control select2bs4 @error('building_id') is-invalid @enderror" 
                style="width: 100%;"
                name="building_id"
                id="building_id"
                data-placeholder="building_id">
                    <option value="" selected></option>
                @foreach ($buildings as $item)
                    <option value="{{ $item->id }}" {{ (old('building_id') == $item->id) ? 'selected' : '' }}>
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
            <label for="location_floor">ชั้นที่ติดตั้งใช้งาน <span><sup class="text-danger">*</sup></span> </label>
            <input type="text" class="form-control form-control-sm @error('location_floor') is-invalid @enderror" name="location_floor" id="location_floor" value="{{ old('location_floor') }}">
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
            <label for="location_room">ห้องที่ติดตั้งใช้งาน <span><sup class="text-danger">*</sup></span> </label>
            <input type="text" class="form-control form-control-sm @error('location_room') is-invalid @enderror" name="location_room" id="location_room" value="{{ old('location_room') }}">
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