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
                        <h5 class="m-0">แก้ไขข้อมูลประเภทครุภัณฑ์ย่อย <i class="far fa-edit"></i></h5>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basic\SubTypeController@update', $editSubType->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title','ยี่ห้อผลิตภัณฑ์') }}
                            {{ Form::select('typeName', $allType, $editSubType->asset_type_id, ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
							{{ Form::label('title','ชื่อรุ่นผลิตภัณฑ์')}}
							{{ Form::text('subTypeName', $editSubType->subtype_name, ['class' => 'form-control','required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                            {{ Form::select('subTypeStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editSubType->subtype_status, ['class'=>'form-control','disabled']) 
                            }}
                        </div>
                        <a href="/basic/sub_type" class="btn btn-secondary">ย้อนกลับ</a>
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