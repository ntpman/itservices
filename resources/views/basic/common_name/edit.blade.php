@extends('layouts.adminlte')

@section('page_name')
    | Common Names Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">แก้ไขข้อมูลชื่อครุภัณฑ์ <i class="far fa-edit"></i></h5>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basic\CommonNameController@update', $editCommonName->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
							{{ Form::label('title','ชื่อครุภัณฑ์')}}
							{{ Form::text('commonName', $editCommonName->common_name, ['class' => 'form-control','required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                            {{ Form::select('commonNameStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editCommonName->common_name_status, ['class'=>'form-control','disabled']) 
                            }}
                        </div>
                        <a href="/basic/common_name" class="btn btn-secondary">ย้อนกลับ</a>
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

@section('scripts')
    
@endsection