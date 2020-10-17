@extends('layouts.admin')

@section('title', 'Dashboard | Edit Role Informations')

@section('content_header')
    <h1>แก้ไขข้อมูลสิทธิ์การใช้งานระบบ</h1>
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
            {!!Form::open(['action' => ['BasicInformations\RoleController@update',$editRole->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('roleName','การควบคุมคุณภาพผลการทดสอบ')}}
                {{Form::text('roleName',$editRole->role_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('roleStatus', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('roleStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editRole->role_status,['class'=>'form-control'])}}
              </div>
              <a href="/roleList" class="btn btn-secondary">ย้อนกลับ</a>
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