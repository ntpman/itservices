@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk Main Page
@endsection

@section('content')
    
<div class="container">
  <div class="row">
    <div class="col col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="/helpdesk" class="btn btn-danger">กลับหน้าหลัก</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12" style="background-color: #2375fa;">
      <h3 style="margin:20px; color:#FFFFFF">แบบสั่งซ่อม/ทำสิ่งของ</h3>
    </div>

    <div class="col-sm-1 col-md-1" style="margin-top: 30px"></div>
    <div class="col col-sm-10 col-md-10" style="margin-top: 30px">
      <div class="card">
        <div class="card-body">
          {!! Form::open(['action' => 'Helpdesks\FormController@store', 'method' => 'POST', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
            <div class="form-group col col-md-7">
              {{ Form::label('dateCreate','วันที่จัดทำแบบ F-CD0-071')}}
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input type="text" name="request_date" class="form-control datetimepicker-input" data-target="#reservationdate">
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
            </div>
            <div class="form-group col col-md-7">
              {{ Form::label('director','เสนอ')}}
              <select name="director" id="director" class="form-control">
                <option value="">Choose...</option>
                <option value="ผสท.">ผสท.</option>
                <option value="ลสล.">ลสล.</option>
              </select>
            </div>
            <div class="form-group col col-md-7">
              {{ Form::label('document_route','ผ่าน')}}
              {{ Form::text('document_route', null, ['class' => 'form-control','id'=>'document_route','placeholder'=>"ระบุสายบังคับบัญชา",]) }}
            </div>
            <div class="form-group col col-md-12">
              {{ Form::label('request_name','รายละเอียดของผู้แจ้ง')}}
              <div class="row">
                <div class="col-md-4">
                  <div class="input-group">
                  {{ Form::label('request_owner','ชื่อผู้แจ้ง')}}
                  </div>
                  <div class="input-group">
                    <input type="text" name="request_owner" id="request_owner" class="form-control">
                  </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      {{ Form::label('division','สำนัก/กอง')}}
                    </div>
                    <div class="input-group">
                      <input type="text" name="division" id="division" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      {{ Form::label('sub_division','กลุ่มงาน')}}
                    </div>
                    <div class="input-group">
                      <input type="text" name="sub_division" id="sub_division" class="form-control">
                    </div>
                  </div>
                </div>
                {{ Form::label('building','อาคาร')}}
                <div class="input-group">
                  <input type="text" name="building" id="building" class="form-control">
                </div>
                {{ Form::label('floor','ชั้น')}}
                <div class="input-group">
                  <input type="text" name="floor" id="floor" class="form-control">
                </div>
                {{ Form::label('room','ห้อง')}}
                <div class="input-group">
                  <input type="text" name="room" id="room" class="form-control">
                </div>
                {{ Form::label('phone','โทรศัพท์')}}
                <div class="input-group">
                  <input type="text" name="phone" id="phone" class="form-control">
                </div>
                {{ Form::label('email','อีเมล')}}
                <div class="input-group">
                  {{ Form::text('email', null, ['class' => 'form-control','id'=>'email','placeholder'=>"อีเมลผู้แจ้ง",]) }}
                </div>
              </div>
            </div>
            <div class="form-group col col-md-7">
              {{ Form::label('request_type','มีความประสงค์')}}
              <select name="request_type" class="form-control" required>
                <option value="">Choose...</option>
                <option value="ซ่อม">ซ่อม</option>
                <option value="ทำ">ทำ</option>
                <option value="อื่นๆ">อื่น ๆ</option>
              </select>
              {{ Form::textarea('request_objective', null, ['class' => 'form-control','id'=>'request_objective', 'rows'=> 2,'placeholder'=>"ระบุความประสงค์ที่ต้องการให้ดำเนินการ",'required']) }}
            </div>
            <div class="form-group col col-md-7">
              {{ Form::label('inv_number','หมายเลขครุภัณฑ์ (ถ้ามี)')}}
              {{ Form::text('inv_number', null, ['class' => 'form-control','id'=>'inv_number','placeholder'=>"ระบุหมายเลขครุภัณฑ์ (ถ้ามี)",]) }}
            </div>
            <div class="form-group col col-md-7">
              {{ Form::label('request_detail','เนื่องจาก')}}
              {{ Form::textarea('request_detail', null, ['class' => 'form-control','id'=>'request_detail','rows'=> 4,'placeholder'=>"ระบุปัญหา หรือความต้องการ",'required']) }}
            </div>
            <div class="form-group col col-md-7">
              {{ Form::label('dateCreate','วันที่รับเอกสาร')}}
                  <div class="input-group date" id="request_recieved" data-target-input="nearest">
                      <input type="text" name="request_recieved" class="form-control datetimepicker-input" data-target="#request_recieved">
                      <div class="input-group-append" data-target="#request_recieved" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
            </div>
            <div class="form-group col col-md-7">
              {{ Form::label('time_recieved','เวลาลงรับเอกสาร')}}
              {{ Form::text('time_recieved', null, ['class' => 'form-control','id'=>'time_recieved','placeholder'=>"ระบุเวลาลงรับเอกสาร",]) }}
            </div>
            <div class="form-group col col-md-7">
              {{ Form::label('request_number','เลขที่เอกสารของฝ่าย')}}
              {{ Form::text('request_number', null, ['class' => 'form-control','id'=>'request_number','placeholder'=>"ระบุเลขที่เอกสารของฝ่าย", 'required']) }}
            </div>
            <div class="form-group col  col-md-7">
              {{ Form::label('request_file','ไฟล์ใบแจ้งปัญหา')}}
              <input type="file" name="request_file" class="form-control"  accept=".pdf" required>
            </div>
            <div class="form-group col col-md-5">
              {{ Form::submit('บันทึกข้อมูล', ['class' => 'btn btn-primary']) }}
            </div>
          {!! Form::close() !!}
        </div>
        </div>
    </div>
  </div>
  </div>

@endsection

