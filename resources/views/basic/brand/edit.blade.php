@extends('layouts.adminlte')

@section('page_name')
    | Brands Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> แก้ไขข้อมูลยี่ห้อผลิตภัณฑ์</h3>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basic\BrandController@update', $editBrand->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title','ชื่อเต็มยี่ห้อผลิตภัณฑ์') }}
                            <a href="#" data-toggle="modal" data-target="#modal-brandFullName">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            {{ Form::text('', $editBrand->brand_full_name, ['class'=>'form-control','readonly']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title','ชื่อย่อยี่ห้อผลิตภัณฑ์') }}
                            <a href="#" data-toggle="modal" data-target="#modal-brandAbbrName">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            {{ Form::text('',$editBrand->brand_abbr_name, ['class'=>'form-control', 'readonly']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'สถานะการใช้งานข้อมูล') }}
                            {{ Form::select('brandStatus', [
                                    'A' => 'Active',
                                    'D' => 'Disable',
                                ], $editBrand->brand_status, ['class'=>'form-control']) 
                            }}
                        </div>
                        <a href="/basic/brand" class="btn btn-secondary">ย้อนกลับ</a>
                        {{ Form::hidden('_method','PUT') }}
                        {{ Form::hidden('_name','edit-brandStatus') }}
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
    <div class="modal fade" id="modal-brandFullName" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Edit Brand Full Name</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                {!! Form::open(['action' => ['Basic\BrandController@update', $editBrand->id], 'method' => 'PUT']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('title','ชื่อเต็มยี่ห้อผลิตภัณฑ์') }}
                        {{ Form::text('brandFullName', $editBrand->brand_full_name, ['class'=>'form-control', 'required']) }}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::hidden('_name','edit-brandFullName') }}
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
    <div class="modal fade" id="modal-brandAbbrName" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Edit Brand Abbr Name</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                {!! Form::open(['action' => ['Basic\BrandController@update', $editBrand->id], 'method' => 'PUT']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('title','ชื่อย่อยี่ห้อผลิตภัณฑ์') }}
                        {{ Form::text('brandAbbrName', $editBrand->brand_abbr_name, ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::hidden('_name','edit-brandAbbrName') }}
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