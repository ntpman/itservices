@extends('layouts.adminlte')

@section('page_name')
    | Type Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> แก้ไขข้อมูลประเภทครุภัณฑ์</h3>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basics\TypeController@update', $editType->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title','ชื่อประเภทครุภัณฑ์')}}
                            <a href="#" data-toggle="modal" data-target="#modal-typeName">
                                <i class="far fa-edit"></i> Edit
                            </a>
							{{ Form::text('', $editType->type_name, ['class' => 'form-control', 'readonly']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                            {{ Form::select('typeStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editType->type_status, ['class'=>'form-control']) 
                            }}
                        </div>
                        <a href="/basics/type" class="btn btn-secondary">ย้อนกลับ</a>
                        <input type="hidden" name="edit-typeStatus" value="1">
                        {{ Form::hidden('_method','PUT') }}
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

    @include('basics.type.modal.edit-type-name')

@endsection

@section('scripts')
    
@endsection