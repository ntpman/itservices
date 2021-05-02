@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk Main Page
@endsection

@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">ข้อมูลแบบสั่งซ่อม/ทำสิ่งของ (F-CD0-071) ที่รอการมอบหมายผู้ปฏิบัติงาน</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills nav-fill ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active btn-warning" href="/helpdesk/unAssignWorker"><i class="fas fa-tools"></i></i> มอบหมายผู้ปฏิบัติงาน</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::open(['action' => 'Helpdesks\RequestAssignController@saveWorker', 'method' => 'POST', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
                    {{ Form::label('worker','ผู้ปฏิบัติงาน')}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control select2bs4 @error('worker') is-invalid @enderror" 
                                        style="width: 100%;" name="worker" id="worker"
                                        data-placeholder="ระบุผู้ปฏิบัติงาน" required>
                                        <option value="" selected></option>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>        
                                            @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            @foreach ($requestInfos as $requestInfo)
                                {{Form::hidden('request_info_id', $requestInfo->id ) }}
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group col col-md-7" style="text-align: right">
                            {{ Form::submit('บันทึกข้อมูล', ['class' => 'btn btn-primary ']) }}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection

