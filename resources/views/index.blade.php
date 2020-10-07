@extends('layouts.app')

@section('content') 
<img class="img-fluid " src={{ asset('images/banner_1_0.png') }} alt="">
<div class="row-12 text-center h5">
    <a href="{{ asset('file/DSSLabSurveyManual_V03_63014.pdf') }}" class="nav-link" target="_blank">
        <i class="nav-icon fas fa-file-pdf"></i>
        <p>| คู่มือการใช้งานระบบบันทึกข้อมูลการสำรวจห้องปฏิบัติการ |</p>
    </a>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
    </div>
</div> --}}
@endsection
