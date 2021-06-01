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
    <div class="col col-sm-10 col-md-12" style="margin-top: 1px">
      <div class="card">
        <div class="card-body">
          {!! Form::open(['action' => 'Helpdesks\FormController@store', 'method' => 'POST', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
          <div class="row">
            <div class="form-group col col-md-3">
              {{ Form::label('dateCreate','วันที่จัดทำ')}}
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="request_date" class="form-control datetimepicker-input" data-target="#reservationdate" required>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
            <div class="form-group col col-md-3">
              {{ Form::label('org_responsible','เสนอ')}}
              <select name="org_responsible" id="org_responsible" class="form-control" required>
                <option value="">ระบุ ผอ. ที่รับผิดชอบ</option>
                <option value="ผสท.">ผสท.</option>
                <option value="ลสล.">ลสล.</option>
              </select>
            </div>
            <div class="form-group col col-md-6">
              {{ Form::label('chain_of_command','ผ่าน')}}
              {{ Form::text('chain_of_command', null, ['class' => 'form-control','id'=>'chain_of_command','placeholder'=>"ระบุสายบังคับบัญชา",]) }}
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="input-group">
                {{ Form::label('request_owner','ชื่อผู้แจ้ง')}}
              </div>
              <div class="input-group">
                <input type="text" name="request_owner" id="request_owner" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group">
                {{ Form::label('division','สำนัก/กอง')}}
              </div>
              <div class="input-group">
                <input type="text" name="division" id="division" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group">
                {{ Form::label('sub_division','กลุ่มงาน')}}
              </div>
              <div class="input-group">
                <input type="text" name="sub_division" id="sub_division" class="form-control" required>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-md-3">
                {{ Form::label('building','อาคาร')}}
                <div class="input-group">
                  <input type="text" name="building" id="building" class="form-control" required>
                </div>
              </div>
              <div class="col-md-1">
                {{ Form::label('floor','ชั้น')}}
                <div class="input-group">
                  <input type="text" name="floor" id="floor" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                {{ Form::label('room','ห้อง')}}
                <div class="input-group">
                  <input type="text" name="room" id="room" class="form-control">
                </div>
              </div>
              <div class="col-md-2">
                {{ Form::label('phone','โทรศัพท์')}}
                <div class="input-group">
                  <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
              </div>
              <div class="col-md-3">
                {{ Form::label('email','อีเมล')}}
                <div class="input-group">
                  {{ Form::email('email', null, ['class' => 'form-control','id'=>'email','placeholder'=>"ระบุอีเมลผู้แจ้ง",]) }}
                </div>
              </div>
            </div>
            {{ Form::label('request_type','มีความประสงค์')}}
            <div class="row">
              <div class="form-group col col-md-3">
                <select name="request_type" class="form-control" required>
                  <option value="">ระบุความประสงค์...</option>
                  <option value="ซ่อม">ซ่อม</option>
                  <option value="ทำ">ทำ</option>
                  <option value="อื่นๆ">อื่น ๆ</option>
                </select>
              </div>
              <div class="form-group col-md-9">
                {{ Form::textarea('request_objective', null, ['class' => 'form-control','id'=>'request_objective', 'rows'=> 2,'placeholder'=>"ระบุความประสงค์ที่ต้องการให้ดำเนินการ",'required']) }}
              </div>
            </div>
            <div class="row">
              <div class="form-group col col-md-12">
                {{ Form::label('inv_number','หมายเลขครุภัณฑ์ (ถ้ามี)')}}
                {{ Form::text('inv_number', null, ['class' => 'form-control','id'=>'inv_number','placeholder'=>"ระบุหมายเลขครุภัณฑ์ (ถ้ามี)",]) }}
              </div>
            </div>
            <div class="row">
              <div class="form-group col col-md-12">
                {{ Form::label('request_detail','เนื่องจาก')}}
                {{ Form::textarea('request_detail', null, ['class' => 'form-control','id'=>'request_detail','rows'=> 2,'placeholder'=>"ระบุปัญหา หรือความต้องการ",'required']) }}
              </div>
            </div>
            <div class="row">
              <div class="form-group col col-md-3">
                {{ Form::label('request_number','เลขที่เอกสารกลุ่ม')}}
                {{ Form::text('request_number', null, ['class' => 'form-control','id'=>'request_number','placeholder'=>"ระบุเลขที่เอกสารของฝ่าย", 'required']) }}
              </div>
              <div class="form-group col col-md-3">
                {{ Form::label('dateCreate','วันที่รับเอกสาร')}}
                    <div class="input-group date" id="request_recieved" data-target-input="nearest">
                        <input type="text" name="request_recieved" class="form-control datetimepicker-input" data-target="#request_recieved">
                        <div class="input-group-append" data-target="#request_recieved" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              </div>
              <div class="form-group col  col-md-6">
                {{ Form::label('request_file','ไฟล์ใบแจ้งปัญหา')}}
                <input type="file" name="request_file" class="form-control"  accept=".pdf" required>
              </div>
            </div>
            <div class="card-footer">
              <div class="form-group col col-md-7" style="text-align: right">
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

