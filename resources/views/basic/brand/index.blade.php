@extends('layouts.adminlte')

@section('title','Dashboard | Brands')
    
@section('content_header')
    <h1>ข้อมูลยี่ห้อผลิตภัณฑ์</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllBrand) > 0)
                  <table class="table" id="dt1">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">ชื่อเต็มยี่ห้อผลิตภัณฑ์</th>
                        <th class="text-center">ชื่อย่อยี่ห้อผลิตภัณฑ์</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllBrand as $brand)
                          <tr>
                            <td class="text-center">{{$brand->id}}</td>
                            <td>{{$brand->brand_full_name}}</td>
                            <td>{{$brand->brand_abbr_name}}</td>
                            <td class="text-center">{{$brand->brand_status}}</td>
                            <td><a href="/basic/brand/{{$brand->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
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
