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
                    {!! Form::open(['action' => ['Basics\BrandController@update', $editBrand->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title','ชื่อเต็มยี่ห้อผลิตภัณฑ์') }}
                            <a href="#" data-toggle="modal" data-target="#edit-brandFullName">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            {{ Form::text('', $editBrand->brand_full_name, ['class'=>'form-control','readonly']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title','ชื่อย่อยี่ห้อผลิตภัณฑ์') }}
                            <a href="#" data-toggle="modal" data-target="#edit-brandAbbrName">
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
                        <a href="/basics/brand" class="btn btn-secondary">ย้อนกลับ</a>
                        <input type="hidden" name="edit-brandStatus" value="1">
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

    @include('basics.brand.modal.edit-full-name')

    @include('basics.brand.modal.edit-abbr-name')
    
@endsection

@section('scripts')
    
@endsection