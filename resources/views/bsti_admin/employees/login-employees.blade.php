@extends('layouts.admin')

@section('title','Dashboard | Employment Login Details')
    
@section('content_header')
    <h1>รายชื่อผู้เข้าร่วมโครงการที่ล็อกอินเข้าสู่ระบบแล้ว</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showLoginEmployee) > 0)
                  <table class="table" id="registerTable">
                    <thead>
                      <tr>
                        <th>ภูมิภาคที่ปฏิบัติงาน</th>
                        <th style="width:100px;">รหัสผู้ใช้ (ID)</th>
                        <th class="text-center">ชื่อ - นามสกุล</th>
                        <th style="width:180px;">อีเมล</th>
                      </tr>
                    </thead>
                    <tbody id="items">
                      @foreach ($showLoginEmployee as $loginEmployee)
                          <tr>
                            <td>{{$loginEmployee->region->region_name}}</td>
                            <td class="text-center">{{$loginEmployee->user_code}}</td>
                            <td>{{$loginEmployee->name}}</td>
                            <td>{{$loginEmployee->email}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                    <p>ไม่พบข้อมูล</p>
              @endif
            </div>
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
