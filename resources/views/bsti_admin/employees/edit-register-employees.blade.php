@extends('layouts.admin')

@section('title','Dashboard | Edit Employee Account')
    
@section('content_header')
    <h1>แก้ไขข้อมูลผู้เข้าร่วมโครงการ</h1>
@stop

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
        {!!Form::open(['action' => ['Employee\EmployeeController@update',$editRegisterEmployee->id],'method'=>'PUT'])!!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('userCode','รหัสประจำตัวผู้ใช้ (ID)')}}
            {{Form::text('userCode',$editRegisterEmployee->user_code,['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('userName','ชื่อ - นามสกุล')}}
            {{Form::text('userName',$editRegisterEmployee->name,['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('userEmail','อีเมล')}}
            {{Form::text('userEmail',$editRegisterEmployee->email,['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('userRegion','ภูมิภาคที่ปฏิบัติงาน')}}
            {{-- {{Form::text('userRegion',$editRegisterEmployee->region->region_name,['class'=>'form-control','required'])}} --}}
            {{Form::select('userRegion',$allRegion->pluck('region_name', 'id'),$editRegisterEmployee->region->id,['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{ Form::label ('userStatus','สถานะการจ้างงาน')}}
            {{ Form::select('userStatus',['A' => 'Active','D' => 'Disable'],$editRegisterEmployee->status,['class'=>'form-control','required'])}}
          </div>
          <a href="/viewRegisterEmployee" class="btn btn-secondary">ย้อนกลับ</a>
          {{Form::hidden('_method','PUT')}}
          {{Form::submit('บันทึก',['class'=>'btn btn-primary'])}}
        </div>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log('Hi!');</script>
@stop


@section('scripts')
    <script src="{{ asset('js/custom-datatable/register-employees.js')}}"></script>
@endsection

