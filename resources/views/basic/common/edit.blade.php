@extends('layouts.adminlte')

@section('page_name')
    | Common Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> แก้ไขข้อมูลชื่อครุภัณฑ์</h3>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basic\CommonController@update', $editCommon->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
							{{ Form::label('title','ชื่อครุภัณฑ์')}}
							{{ Form::text('commonName', $editCommon->common_name, ['class' => 'form-control','required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                            <a href="#" data-toggle="modal" data-target="#modal-commonStatus">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            {{ Form::select('commonStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editCommon->common_status, ['class'=>'form-control','disabled']) 
                            }}
                        </div>
                        <a href="/basic/common" class="btn btn-secondary">ย้อนกลับ</a>
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
    <div class="modal fade" id="modal-commonStatus" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Edit Common Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                {!! Form::open(['action' => ['Basic\CommonController@update', $editCommon->id], 'method'=>'PUT']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                        {{ Form::select('commonStatus', [
                                'A' => 'Active',
                                'D' => 'Disable',
                            ], $editCommon->common_status, ['class'=>'form-control']) 
                        }}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::hidden('_name','edit-commonStatus') }}
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
@endsection

@section('scripts')
    
@endsection