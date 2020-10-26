@extends('layouts.adminlte')

@section('page_name')
    | Sub Types Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> แก้ไขข้อมูลประเภทครุภัณฑ์ย่อย </h3>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basic\SubtypeController@update', $editSubType], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title','ยี่ห้อผลิตภัณฑ์') }}                            
                            {{ Form::select('typeId', $allType, $editSubType->type_id, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title','ชื่อรุ่นผลิตภัณฑ์')}}
                            <a href="#" data-toggle="modal" data-target="#modal-subTypeName">
                                <i class="far fa-edit"></i> Edit
                            </a>
							{{ Form::text('', $editSubType->subtype_name, ['class' => 'form-control','readonly']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}>
                            {{ Form::select('subTypeStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editSubType->subtype_status, ['class'=>'form-control']) 
                            }}
                        </div>
                        <a href="/basic/subtype" class="btn btn-secondary">ย้อนกลับ</a>
                        {{ Form::hidden('_method','PUT') }}
                        {{ Form::hidden('_name','edit') }}
                        {{ Form::submit('บันทึก', ['class'=>'btn btn-primary']) }}
                    </div>
                    {!! Form::close() !!}
                    <!-- end start -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('modal')
    <div class="modal fade" id="modal-subTypeName" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Edit Sub Type Id</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                {!! Form::open(['action' => ['Basic\SubtypeController@update', $editSubType->id], 'method'=>'PUT']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('title','ชื่อรุ่นผลิตภัณฑ์')}}
                        {{ Form::text('subTypeName', $editSubType->subtype_name, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::hidden('_name','edit-subTypeName') }}
                    {{ Form::submit('บันทึก', ['class'=>'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
                <!-- end start -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('scripts')
    
@endsection