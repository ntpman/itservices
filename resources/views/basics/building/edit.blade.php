@extends('layouts.adminlte')

@section('page_name')
    | แก้ไขข้อมูลชื่ออาคาร
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> แก้ไขข้อมูลอาคาร</h3>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basics\BuildingController@update', $editBuilding->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title','ชื่อเต็มของอาคาร')}}
                            <a href="#" data-toggle="modal" data-target="#edit-buildingFullName">
                                <i class="far fa-edit"></i> Edit
                            </a>
							{{ Form::text('', $editBuilding->building_full_name, ['class' => 'form-control', 'readonly']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title','ชื่อย่อของอาคาร')}}
                            <a href="#" data-toggle="modal" data-target="#edit-buildingAbbrName">
                                <i class="far fa-edit"></i> Edit
                            </a>
							{{ Form::text('', $editBuilding->building_abbr_name, ['class' => 'form-control', 'readonly']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                            {{ Form::select('buildingStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editBuilding->building_status, ['class' => 'form-control']) 
                            }}
                        </div>
                        <a href="/basics/building" class="btn btn-secondary">ย้อนกลับ</a>
                        <input type="hidden" name="edit" value="1">
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

    @include('basics.building.modal.edit-building-name')
    @include('basics.building.modal.edit-building-abbr-name')

@endsection

@section('scripts')
    
@endsection