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
                        <h3 class="card-title"><i class="far fa-edit"></i> แก้ไขข้อมูลประเภทครุภัณฑ์ย่อย</h3>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basics\SubtypeController@update', $editSubType], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title','ยี่ห้อผลิตภัณฑ์') }}                            
                            {{ Form::select('typeId', $allType, $editSubType->type_id, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title','ชื่อรุ่นผลิตภัณฑ์')}}
                            <a href="#" data-toggle="modal" data-target="#edit-subTypeName">
                                <i class="far fa-edit"></i> Edit
                            </a>
							{{ Form::text('', $editSubType->subtype_name, ['class' => 'form-control', 'readonly']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                            {{ Form::select('subTypeStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editSubType->subtype_status, ['class'=>'form-control']) 
                            }}
                        </div>
                        <a href="/basics/subtype" class="btn btn-secondary">ย้อนกลับ</a>
                        <input type="hidden" name="edit-subTypeStatus" value="1">
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

    @include('basics.subtype.modal.edit-subtype-name')

@endsection

@section('scripts')
    
@endsection