<div class="modal fade" id="edit-buildingAbbrName" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="far fa-edit"></i> Edit Building Name</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- form start -->
            {!! Form::open(['action' => ['Basics\BuildingController@update', $editBuilding->id], 'method'=>'PUT']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {{ Form::label('title','ชื่อย่อของอาคาร')}}
                    {{ Form::text('buildingAbbrName', $editBuilding->building_abbr_name, ['class' => 'form-control','required']) }}
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <input type="hidden" name="edit-buildingAbbrName" value="1">
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