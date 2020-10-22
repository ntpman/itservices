@extends('layouts.adminlte')

@section('page_name')
    | Models Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">แก้ไขข้อมูลรุ่นผลิตภัณฑ์ <i class="far fa-edit"></i></h5>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basic\ModelController@update', $editModel->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        {{ Form::label('title','ยี่ห้อผลิตภัณฑ์') }}
                        <div class="form-row">
                            <div class="col-10">                                
                                {{ Form::select('brandFullName', $allBrand, $editModel->brand_id, ['class' => 'form-control', 'readonly']) }}
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                    Edit
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
							{{ Form::label('title','ชื่อรุ่นผลิตภัณฑ์')}}
							{{ Form::text('modelName', $editModel->model_name, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                            {{ Form::select('modelStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editModel->model_status, ['class'=>'form-control','disabled']) 
                            }}
                        </div>
                        <a href="/basic/model" class="btn btn-secondary">ย้อนกลับ</a>
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ยี่ห้อผลิตภัณฑ์</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                {!! Form::open(['action' => ['Basic\ModelController@update', $editModel->id], 'method'=>'PUT']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('title','ยี่ห้อผลิตภัณฑ์') }}
                        {{ Form::select('brandFullName', $allBrand, $editModel->brand_id, ['class' => 'form-control', 'required']) }}
                    </div>                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::hidden('_name','edit') }}
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