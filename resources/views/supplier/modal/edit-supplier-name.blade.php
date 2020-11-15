<div class="modal fade" id="edit-supplier_name" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="far fa-edit"></i> Edit Supplier Name</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- form start -->
            <form action="/supplier/{{ $supplier->id }}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="supplier_name">ชื่อผู้จำหน่ายสินค้า</label>
                        <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" name="supplier_name" id="supplier_name" value="{{ $supplier->supplier_name }}" placeholder="supplier_name" required>
                        @error('supplier_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <input type="hidden" name="edit-supplier_name" value="1">
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </form>
            <!-- end start -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->