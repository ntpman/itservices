<div class="modal fade" id="edit-brandModelName" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="far fa-edit"></i> Edit Brand Model Name</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- form start -->
            {!! Form::open(['action' => ['Basics\BrandModelController@update', $editBrandModel->id], 'method'=>'PUT']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {{ Form::label('title','ชื่อรุ่นผลิตภัณฑ์')}}
                    {{ Form::text('brandModelName', $editBrandModel->brand_model_name, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <input type="hidden" name="edit-brandModelName" value="1">
                {{ Form::hidden('_method','PUT') }}
                {{ Form::submit('บันทึก', ['class'=>'btn btn-primary btn-sm']) }}
            </div>
            {!! Form::close() !!}
            <!-- end start -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->