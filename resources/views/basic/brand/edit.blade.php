@extends('layouts.adminlte')

@section('title', 'Dashboard | Brands')

@section('content_header')
    <h1>แก้ไขข้อมูลยี่ห้อผลิตภัณฑ์</h1>
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col">
          @if (count($errors) > 0)
              @foreach ($errors as $error)
                  <div class="alert alert-danger">
                    {{$error}}
                  </div>
              @endforeach
          @endif
          <div class="card">
            {!!Form::open(['action' => ['Basic\BrandController@update',$editBrand->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('little','ชื่อเต็มยี่ห้อผลิตภัณฑ์')}}
                {{Form::text('brandFullName',$editBrand->brand_full_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('little','ชื่อย่อยี่ห้อผลิตภัณฑ์')}}
                {{Form::text('brandAbbrName',$editBrand->brand_abbr_name,['class'=>'form-control'])}}
              </div>
              <div class="form-group">
                {{Form::label('title', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('brandStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editBrand->brand_status,['class'=>'form-control'])}}
              </div>
              <a href="/basic/brand" class="btn btn-secondary">ย้อนกลับ</a>
              {{Form::hidden('_method','PUT')}}
              {{Form::submit('บันทึก',['class'=>'btn btn-primary'])}}
            </div>
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script>console.log('Hi!');</script>
@endsection