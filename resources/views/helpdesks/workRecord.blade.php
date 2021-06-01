@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk Work Record Page
@endsection

@section('content')
    
<div class="container">
  <div class="row">
    <div class="col col-md-12">
      <div class="card card-primary card-outline">
          <div class="card-header">
              <h3 class="card-title">บันทึกข้อมูลการปฏิบัติงาน</h3>
              <div class="card-tools" style="margin-top: 20px">
                  <ul class="nav nav-pills nav-fill ml-auto">
                      <li class="nav-item">
                          <a class="nav-link active btn btn-danger" style="margin-right: 5px" href="/helpdesk/workList"><i class="fas fa-tasks"></i>งานที่รับมอบหมาย</a>
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
          {!! Form::open(['action' => 'Helpdesks\WorkerController@saveSurvey', 'method' => 'POST', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
          <div class="card-body">
            <div class="row">
              <h3 class="card-title btn-warning">วันที่สำรวจหน้างาน</h3>
            </div>
            <div class="row" style="margin-top: 20px">
              <div class="col-md-3" style="text-align: right">
                <b>{{ "เลขที่เอกสาร" }}</b> 
                @foreach ($requestInfos as $request)
                  {{$request->request_number}}
                @endforeach
                {{ Form::hidden('request_info_id', $request->id)}}
              </div>
              <div class="form-group col col-md-3">
                <div class="input-group date" id="survey_date" data-target-input="nearest">
                  <input type="text" name="survey_date" class="form-control datetimepicker-input" data-target="#survey_date" required 
                    @if ($request->survey_date != '')
                      value={{ date ('d-m-Y', strtotime($request->survey_date)) }}
                      readonly
                    @endif
                    >
                  <div class="input-group-append" data-target="#survey_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-2" style="text-align: center">
                @if ($request->survey_date != '')
                  @php 
                    $lockButton = "disabled" 
                  @endphp 
                @else
                  @php 
                    $lockButton = "enabled" 
                  @endphp 
                @endif
                {{ Form::submit('บันทึกวันที่สำรวจหน้างาน', ['class' => 'btn btn-primary ', $lockButton]) }}
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col col-sm-10 col-md-12" style="margin-top: 5px">
      <div class="card">
        {!! Form::open(['action' => 'Helpdesks\WorkerController@prelimAssess', 'method' => 'POST', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
        <div class="card-body">
          <div class="row ">
            <h3 class="card-title btn-warning">การประเมินเบื้องต้น</h3>
          </div>
        {{ Form::hidden('request_info_id', $request->id)}}
        <div class="row" style="margin-top: 20px">
          <div class="form-group col col-md-7">
            <select name="prelim_assess" id="prelim_assess" class="form-control" required>
              <option value="">ระบุผลการประเมินเบื้องต้น...</option>
              <option value="ดำเนินการเองได้ (ระบุวันที่คาดว่าจะแล้วเสร็จ)"
                @if ($request->prelim_assess == "ดำเนินการเองได้ (ระบุวันที่คาดว่าจะแล้วเสร็จ)")
                  @php echo "selected" @endphp
                @endif>ดำเนินการเองได้ (ระบุวันที่คาดว่าจะแล้วเสร็จ)</option>
              <option value="ไม่สามารถดำเนินการได้ ต้องจ้างบุคคลภายนอกดำเนินการ (ระบุหมายเลข PCM)" 
                @if ($request->prelim_assess == "ไม่สามารถดำเนินการได้ ต้องจ้างบุคคลภายนอกดำเนินการ (ระบุหมายเลข PCM)")
                  @php echo "selected" @endphp
                @endif>ไม่สามารถดำเนินการได้ ต้องจ้างบุคคลภายนอกดำเนินการ (ระบุหมายเลข PCM)</option>
              <option value="ไม่สามารถดำเนินการได้ ให้ผู้แจ้งจ้างบุคคลภายนอกดำเนินการ" 
                @if ($request->prelim_assess == "ไม่สามารถดำเนินการได้ ให้ผู้แจ้งจ้างบุคคลภายนอกดำเนินการ")
                  @php echo "selected" @endphp
                @endif>ไม่สามารถดำเนินการได้ ให้ผู้แจ้งจ้างบุคคลภายนอกดำเนินการ</option>
              <option value="ไม่สามารถดำเนินการได้ ต้องตั้งคำของบประมาณ" 
                @if ($request->prelim_assess == "ไม่สามารถดำเนินการได้ ต้องตั้งคำของบประมาณ")
                  @php echo "selected" @endphp
                @endif>ไม่สามารถดำเนินการได้ ต้องตั้งคำของบประมาณ</option>
            </select>
          </div>
          <div class="form-group col col-md-3">
            <div class="input-group date" id="estimate_date" data-target-input="nearest">
              <input type="text" name="estimate_date" class="form-control datetimepicker-input" data-target="#estimate_date" 
                @if ($request->estimate_date != '')
                  value={{ date ('d-m-Y', strtotime($request->estimate_date)) }}
                @endif
                placeholder="วันที่คาดว่าจะเสร็จ">
              <div class="input-group-append" data-target="#estimate_date" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group col col-md-2">
            {{ Form::text('pcm_number', null, ['class' => 'form-control','id'=>'pcm_number','placeholder'=>"หมายเลข PCM",]) }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12" style="text-align: center">
            {{ Form::submit('บันทึกผลการประเมินเบื้องต้น', ['class' => 'btn btn-primary ']) }}
          </div>
        </div>
      </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col col-sm-10 col-md-12" style="margin-top: 5px">
      <div class="card">
        {!! Form::open(['action' => 'Helpdesks\WorkerController@saveWorkDetail', 'method' => 'POST', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
        <div class="card-body">
          <div class="row ">
            <h3 class="card-title btn-warning">ผลการปฏิบัติงาน</h3>
          </div>
          {{ Form::hidden('request_info_id', $request->id)}}
          <div class="row" style="margin-top: 20px">
            <div class="form-group col col-md-12">
              {{ Form::textarea('work_detail', $request->work_detail, ['class' => 'form-control','id'=>'work_detail','rows'=> 4,'placeholder'=>"ระบุรายละเอียดการปฏิบัติงาน","required"]) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col col-md-12" style="text-align: center">
              {{ Form::submit('บันทึกผลการปฏิบัติงาน', ['class' => 'btn btn-primary ']) }}
            </div>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

