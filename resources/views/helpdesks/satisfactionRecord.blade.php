@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk Evaluate Page
@endsection

@section('content')
    
<div class="container">
  <div class="row">
    <div class="col col-md-12">
      <div class="card card-primary card-outline">
          <div class="card-header">
              <h3 class="card-title">บันทึกข้อมูลการประเมินความพึงพอใจ</h3>
              <div class="card-tools">
                  <ul class="nav nav-pills nav-fill ml-auto">
                      <li class="nav-item">
                          <a class="nav-link active btn btn-danger" href="/helpdesk/satisfactionList"><i class="fas fa-tasks"></i> งานที่ยังไม่ได้ประเมินความพึงพอใจ</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col col-sm-10 col-md-12" style="margin-top: 5px">
      <div class="card">
        <div class="card-body">
          {!! Form::open(['action' => 'Helpdesks\WorkerController@saveSatisfaction', 'method' => 'POST', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
          <div class="row">
            @foreach ($requestInfos as $request)
                
            @endforeach
            {{ Form::hidden('request_info_id', $request->id)}}
            <div class="form-group col col-md-4">
              {{ Form::label('delivery_date','วันที่ส่งมอบงาน')}}
              <div class="input-group date" id="delivery_date" data-target-input="nearest">
                <input type="text" name="delivery_date" class="form-control datetimepicker-input" data-target="#delivery_date" required>
                <div class="input-group-append" data-target="#delivery_date" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
            <div class="form-group col col-md-5">
              {{ Form::label('request_consignee','ชื่อผู้รับมอบงาน')}}
              {{ Form::text('request_consignee', null, ['class' => 'form-control','id'=>'request_consignee','placeholder'=>"ระบุชื่อผู้รับมอบงาน",'required']) }}
            </div>
            <div class="form-group col col-md-3">
              {{ Form::label('satisfy_score','ความพึงพอใจ')}}
              <select name="satisfy_score" class="form-control" required>
                <option value="">ระบุความพึงพอใจ......</option>
                <option value="5">ดีมาก</option>
                <option value="4">ดี</option>
                <option value="3">ปานกลาง</option>
                <option value="2">พอใช้</option>
                <option value="1">น้อย</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col col-md-12">
              {{ Form::label('suggestion','ข้อเสนอแนะ')}}
              {{ Form::textarea('suggestion', null, ['class' => 'form-control','id'=>'suggestion','rows'=>3,'placeholder'=>"ระบุข้อเสนอแนะ (ถ้ามี)",]) }}
            </div>
          </div>
          <div class="card-footer">
            <div class="form-group col-md-12" style="text-align: center">
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

