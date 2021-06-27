@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk Main Page
@endsection

@section('content')
    
<div class="container">
  <div class="row">
    <div class="col col-md-12">
      <div class="card card-primary card-outline">
          <div class="card-header">
              <h3 class="card-title">บันทึกข้อมูลแบบสั่งซ่อม/ทำสิ่งของ (F-CD0-071)</h3>
              <div class="card-tools">
                  <ul class="nav nav-pills nav-fill ml-auto">
                      <li class="nav-item">
                          {{-- <a class="nav-link active btn btn-danger" href="/helpdesk"><i class="fas fa-home"></i> กลับหน้าหลัก</a> --}}
                      </li>
                  </ul>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col col-sm-10 col-md-12" style="margin-top: 0.5px">
      <div class="card">
        <div class="card-body">
          {!! Form::open(['action' => 'Helpdesks\FormController@store', 'method' => 'POST', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
          <div class="row">
            <div class="form-group col col-md-3">
              {{ Form::label('dateCreate','วันที่จัดทำ')}}
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="request_date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('request_date') }}" required>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
            
            <div class="form-group col col-md-2">
              {{ Form::label('org_responsible', 'เสนอ: ') }}
              <br>
              <label class="radio-inline">
                {{ Form::radio('org_responsible', "ผสท.", null,['required']) }} ผสท.
              </label>
              <label class="radio-inline">
                {{ Form::radio('org_responsible', "ลสล.", null) }} ลสล.
              </label> 
            </div>

            <div class="form-group col col-md-7">
              {{ Form::label('chain_of_command','ผ่าน')}}
              {{ Form::text('chain_of_command', null, ['class' => 'form-control','id'=>'chain_of_command','placeholder'=>"ระบุสายบังคับบัญชา",]) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col col-md-4">
              {{ Form::label('request_owner','ชื่อผู้แจ้ง')}}
              {{ Form::text('request_owner',null,['class' => 'form-control', 'id'=>'request_owner', 'required']) }}
            </div>
            <div class="form-group col col-md-4">
              {{ Form::label('division','สำนัก/กอง')}}
              {{ Form::text('division',null,['class' => 'form-control', 'id'=>'division', 'required']) }}
            </div>
            <div class="form-group col col-md-4">
              {{ Form::label('sub_division','กลุ่มงาน')}}
              {{ Form::text('sub_division',null,['class' => 'form-control', 'id'=>'division', 'required']) }}
            </div>
          </div>
            <div class="row">
              <div class="form-group col col-md-3">
                {{ Form::label('building_id','อาคาร')}}
                {{ Form::select('building_id', $buildingOptions, null, ['class' => 'form-control', 'id'=>'building_id','placeholder'=>"ระบุชื่ออาคาร", 'required']) }}
              </div>
              <div class="form-group col col-md-1">
                {{ Form::label('floor','ชั้น')}}
                {{ Form::text('floor',null,['class' => 'form-control', 'id'=>'floor',]) }}
              </div>
              <div class="form-group col col-md-3">
                {{ Form::label('room','ห้อง')}}
                {{ Form::text('room',null,['class' => 'form-control', 'id'=>'room',]) }}
              </div>
              <div class="form-group col col-md-2">
                {{ Form::label('phone','โทรศัพท์')}}
                {{ Form::text('phone',null,['class' => 'form-control', 'id'=>'phone', 'required']) }}
              </div>
              <div class="form-group col col-md-3">
                {{ Form::label('email','อีเมล')}}
                {{ Form::email('email', null, ['class' => 'form-control','id'=>'email','placeholder'=>"ระบุอีเมลผู้แจ้ง",]) }}
              </div>
            </div>
            <div class="row">
              <div class="form-group col col-md-2">
                {{ Form::label('request_type','มีความประสงค์')}}
                <br>
                <label class="radio-inline">
                  {{ Form::radio('request_type', "ซ่อม", null,['required']) }} ซ่อม
                </label>
                <label class="radio-inline">
                  {{ Form::radio('request_type', "ทำ", null) }} ทำ
                </label> 
                <label class="radio-inline">
                  {{ Form::radio('request_type', "อื่น ๆ", null) }} อื่น ๆ
                </label> 
              </div>
              <div class="form-group col col-md-7">
                {{ Form::label('request_objective','ความประสงค์ที่ต้องการให้ดำเนินการ')}}
                {{ Form::textarea('request_objective', null, ['class' => 'form-control','id'=>'request_objective', 'rows'=> 2,'placeholder'=>"ระบุความประสงค์ที่ต้องการให้ดำเนินการ",'required']) }}
              </div>
            {{-- </div>
            <div class="row"> --}}
              <div class="form-group col col-md-3">
                {{ Form::label('inv_number','หมายเลขครุภัณฑ์ (ถ้ามี)')}}
                {{ Form::textarea('inv_number', null, ['class' => 'form-control','id'=>'inv_number', 'rows' => 2,'placeholder'=>"ระบุหมายเลขครุภัณฑ์ (ถ้ามี)",]) }}
              </div>
            </div>
            <div class="row">
              <div class="form-group col col-md-12">
                {{ Form::label('request_detail','เนื่องจาก')}}
                {{ Form::textarea('request_detail', null, ['class' => 'form-control','id'=>'request_detail','rows'=> 2,'placeholder'=>"ระบุปัญหา หรือความต้องการ",'required']) }}
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                {{ Form::label('request_number','เลขที่เอกสารกลุ่ม')}}
                {{ Form::text('request_number', null, ['class' => 'form-control','id'=>'request_number','placeholder'=>"ระบุเลขที่เอกสารของฝ่าย", 'required']) }}
              </div>
              <div class="col-md-3">
                {{ Form::label('dateCreate','วันที่รับเอกสาร')}}
                    <div class="input-group date" id="request_recieved" data-target-input="nearest">
                        <input type="text" name="request_recieved" class="form-control datetimepicker-input" data-target="#request_recieved" value="{{ old('request_recieved') }}" required>
                        <div class="input-group-append" data-target="#request_recieved" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              </div>
              <div class="col-md-6">
                  {{ Form::label('request_file','ไฟล์ใบแจ้งปัญหา')}} 
                  {{ Form::file('request_file', ['class' => 'form-control', 'id' => 'request_file', 'accept' => '.pdf', 'required']) }}
              </div>
            </div>
            <div class="card-footer">
              <div class="col" style="text-align: center">
                {{ Form::submit('บันทึกข้อมูล', ['class' => 'btn btn-primary ']) }}
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

