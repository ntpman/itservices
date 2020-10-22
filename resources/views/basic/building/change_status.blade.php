@extends('layouts.adminlte')

@section('page_name')
    | Buildings Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">แก้ไขสถานะการใช้งานข้อมูล <i class="far fa-edit"></i></h5>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basic\BuildingController@update', $editBuilding->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
							{{ Form::label('title','ชื่อรุ่นผลิตภัณฑ์')}}
							{{ Form::text('buildingName', $editBuilding->building_name, ['class' => 'form-control','disabled']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                            {{ Form::select('buildingStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editBuilding->building_status, ['class'=>'form-control']) 
                            }}
                        </div>
                        <a href="/basic/building" class="btn btn-secondary">ย้อนกลับ</a>
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

@section('scripts')
    
@endsection