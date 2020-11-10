<div class="modal fade" id="modal-create-location" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="far fa-edit"></i> Add location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- form start -->
            {!! Form::open(['action' => ['LocationController@store'], 'method' => 'POST']) !!}
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