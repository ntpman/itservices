@extends('layouts.adminlte')

@section('page_name')
    | ลงทะเบียนรับหนังสือ
@endsection

@section('content')
    
<div class="container">
  <div class="row">
    <div class="col col-md-12">
      <div class="card card-primary card-outline">
          <div class="card-header">
              <h3 class="card-title">บันทึกข้อมูลหนังสือรับ</h3>
              <div class="card-tools">
                  <ul class="nav nav-pills nav-fill ml-auto">
                      <li class="nav-item">
                          {{-- <a class="nav-link active btn btn-danger" href="/helpdesk"><i class="fas fa-home"></i> กลับหน้าหลัก</a> --}}
                          <i style="color: red">*</i> ต้องกรอกข้อมูล
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
          {!! Form::open(['action' => 'RegistrationBooksController@saveNewBooks', 'method' => 'POST', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
          <div class="row">
            <div class="form-group col col-md-3">
              {{ Form::label('received_date','วันที่รับหนังสือ')}} <i style="color: red">*</i>
              <div class="input-group date" id="books_received_date" data-target-input="nearest">
                <input type="text" name="received_date" class="form-control datetimepicker-input" 
                  data-target="#books_received_date" value="{{ old('recieved_date') }}" required>
                <div class="input-group-append" data-target="#books_received_date" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
            
            <div class="form-group col col-md-3">
              {{ Form::label('received_no', 'เลขที่รับหนังสือ') }} <i style="color: red">*</i>
              {{ Form::text('received_no',null,['class' => 'form-control','id' => 'received_no', 'required', ]) }}
            </div>

            <div class="form-group col col-md-3">
              {{ Form::label('books_no','เลขที่หนังสือ')}}
              {{ Form::text('books_no', null, ['class' => 'form-control','id'=>'books_no','placeholder'=>"ถ้ามี",]) }}
            </div>

            <div class="form-group col col-md-3">
              {{ Form::label('books_owner','หน่วยงานเจ้าของหนังสือ')}} <i style="color: red">*</i>
              {{ Form::text('books_owner', null, ['class' => 'form-control','id'=>'books_owner', 'required', ]) }}
            </div>
          </div>

          <div class="row">
            <div class="form-group col col-md-8">
              {{ Form::label('books_subject','ชื่อเรื่องของหนังสือ')}} <i style="color: red">*</i>
              {{ Form::text('books_subject',null,['class' => 'form-control', 'id'=>'books_subject', 'required', ]) }}
            </div>
            <div class="col-md-4">
              {{ Form::label('due_date','วันที่ครบกำหนดตามสั่งการ/ตามหนังสือ')}}
                  <div class="input-group date" id="books_due_date" data-target-input="nearest">
                      <input type="text" name="due_date" class="form-control datetimepicker-input" data-target="#books_due_date" value="{{ old('due_date') }}" 
                          placeholder="ถ้ามี">
                      <div class="input-group-append" data-target="#books_due_date" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
            </div>
          </div>

          <div class="row">
              <div class="form-group col col-md-12">
                {{ Form::label('commands','ข้อสั่งการ')}} <i style="color: red">*</i>
                {{ Form::textarea('commands', null, ['class' => 'form-control','id'=>'commands', 'rows'=> 2,'required']) }}
              </div>
          </div>

          <div class="row">
            <div class="col-md-6">
                {{ Form::label('books_file','ไฟล์หนังสือรับ')}} <i style="color: red">*</i>
                {{ Form::file('books_file', ['class' => 'form-control', 'id' => 'books_file', 'accept' => '.pdf', 'required',]) }}
            </div>
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

@endsection

