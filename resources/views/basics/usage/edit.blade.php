@extends('layouts.adminlte')

@section('page_name')
    | Usages Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> แก้ไขข้อมูลการใช้งานครุภัณฑ์</h3>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basics\UsageController@update', $editUsage->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title','ชื่อการใช้งานครุภัณฑ์')}}
                            <a href="#" data-toggle="modal" data-target="#edit-usageName">
                                <i class="far fa-edit"></i> Edit
                            </a>
							{{ Form::text('', $editUsage->usage_name, ['class' => 'form-control','readonly']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                            {{ Form::select('usageStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editUsage->usage_status, ['class'=>'form-control']) 
                            }}
                        </div>
                        <a href="/basics/usage" class="btn btn-secondary">ย้อนกลับ</a>
                        <input type="hidden" name="edit-usageStatus" value="1">
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

    @include('basics.usage.modal.edit-usage-name')

@endsection

@section('scripts')
    
@endsection