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
                        <h5 class="m-0">แก้ไขข้อมูลยี่ห้อผลิตภัณฑ์ <i class="far fa-edit"></i></h5>
                    </div>
                    <!-- form start -->
                    {!! Form::open(['action' => ['Basic\BrandController@update', $editBrand->id], 'method'=>'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title','ชื่อเต็มยี่ห้อผลิตภัณฑ์') }}
                            {{ Form::text('brandFullName', $editBrand->brand_full_name, ['class'=>'form-control','required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title','ชื่อย่อยี่ห้อผลิตภัณฑ์') }}
                            {{ Form::text('brandAbbrName',$editBrand->brand_abbr_name,['class'=>'form-control']) }}
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