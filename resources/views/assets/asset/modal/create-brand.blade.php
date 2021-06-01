<div class="modal fade" id="create-brand_id" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="far fa-edit"></i> Create Brand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- /.modal-header -->
            <!-- form start -->
            <form action="/basics/brand" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brandFullName">ชื่อเต็มยี่ห้อผลิตภัณฑ์</label>
                        <input type="text" class="form-control @error('brandFullName') is-invalid @enderror" name="brandFullName" value="{{ old('brandFullName') }}">
                        @error('brandFullName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="brandAbbrName">ชื่อย่อยี่ห้อผลิตภัณฑ์</label>
                        <input type="text" class="form-control @error('brandAbbrName') is-invalid @enderror" name="brandAbbrName" value="{{ old('brandAbbrName') }}">
                        @error('brandAbbrName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- /.modal-body -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <input type="hidden" name="create-brand_id" value="1">
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