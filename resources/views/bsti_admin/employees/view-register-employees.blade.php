@extends('layouts.admin')

@section('title','Dashboard | View All Register Employee')
    
@section('content_header')
    <h1>รายชื่อผู้เข้าร่วมโครงการ</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($viewAllRegisterEmployee) > 0)
                  <table class="table" id="dt1">
                    <thead>
                      <tr>
                        <th style="width:120px;">รหัสผู้ใช้ (User Code)</th>
                        <th class="text-center">ชื่อ - นามสกุล</th>
                        <th style="width:180px;">อีเมล</th>
                        <th>ภูมิภาคที่ปฏิบัติงาน</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="items">
                      @foreach ($viewAllRegisterEmployee as $allRegisterEmployee)
                          <tr>
                            <td class="text-center">{{$allRegisterEmployee->user_code}}</td>
                            <td>{{$allRegisterEmployee->name}}</td>
                            <td>{{$allRegisterEmployee->email}}</td>
                            <td>{{$allRegisterEmployee->region->region_name}}</td>
                            <td><a href="/editRegisterEmployee/{{$allRegisterEmployee->id}}" class="bth btn-primary btn-sm">แก้ไข</a></td>
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


{{-- @section('scripts')
    <script src="{{ asset('js/custom-datatable/register-employees.js')}}"></script>
@endsection --}}

