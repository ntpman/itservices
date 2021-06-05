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
              <h3 class="card-title">แก้ไขข้อมูลแบบสั่งซ่อม/ทำสิ่งของ เลขที่ {{ $requestDetail->request_number }}</h3>
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
          {!! Form::open(['action' => 'Helpdesks\FormController@update', 'method' => 'PUT', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
          <div class="row">
            <div class="form-group col col-md-3">
              {{ Form::label('dateCreate','วันที่จัดทำ')}}
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="request_date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ date ('d-m-Y', strtotime(old('request_date', optional($requestDetail)->request_date))) }}" required>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
            
            <div class="form-group col col-md-2">
              {{ Form::label('org_responsible', 'เสนอ: ') }}
              <br>
              <label class="radio-inline">
                {{ Form::radio('org_responsible', 'ผสท.', ($requestDetail->org_responsible == 'ผสท.' ? "checked" : "")) }} ผสท.
              </label>
              <label class="radio-inline">
                {{ Form::radio('org_responsible', 'ลสล.', ($requestDetail->org_responsible == 'ลสล.') ? "checked" : "") }} ลสล.
              </label> 
            </div>

            <div class="form-group col col-md-7">
              {{ Form::label('chain_of_command','ผ่าน')}}
              {{ Form::text('chain_of_command', $requestDetail->chain_of_command, ['class' => 'form-control','id'=>'chain_of_command','placeholder'=>"ระบุสายบังคับบัญชา",]) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col col-md-4">
              {{ Form::label('request_owner','ชื่อผู้แจ้ง')}}
              {{ Form::text('request_owner', $requestDetail->request_owner, ['class' => 'form-control', 'id'=>'request_owner', 'required']) }}
            </div>
            <div class="form-group col col-md-4">
              {{ Form::label('division','สำนัก/กอง')}}
              {{ Form::text('division', $requestDetail->division, ['class' => 'form-control', 'id'=>'division', 'required']) }}
            </div>
            <div class="form-group col col-md-4">
              {{ Form::label('sub_division','กลุ่มงาน')}}
              {{ Form::text('sub_division',$requestDetail->sub_division, ['class' => 'form-control', 'id'=>'division', 'required']) }}
            </div>
          </div>
            <div class="row">
              <div class="form-group col col-md-3">
                {{ Form::label('building','อาคาร')}}
                {{ Form::text('building',$requestDetail->building,['class' => 'form-control', 'id'=>'building', 'required']) }}
              </div>
              <div class="form-group col col-md-1">
                {{ Form::label('floor','ชั้น')}}
                {{ Form::text('floor',$requestDetail->floor,['class' => 'form-control', 'id'=>'floor',]) }}
              </div>
              <div class="form-group col col-md-3">
                {{ Form::label('room','ห้อง')}}
                {{ Form::text('room',$requestDetail->room,['class' => 'form-control', 'id'=>'room',]) }}
              </div>
              <div class="form-group col col-md-2">
                {{ Form::label('phone','โทรศัพท์')}}
                {{ Form::text('phone',$requestDetail->phone, ['class' => 'form-control', 'id'=>'phone',]) }}
              </div>
              <div class="form-group col col-md-3">
                {{ Form::label('email','อีเมล')}}
                {{ Form::email('email', $requestDetail->email, ['class' => 'form-control','id'=>'email','placeholder'=>"ระบุอีเมลผู้แจ้ง",]) }}
              </div>
            </div>
            <div class="row">
              <div class="form-group col col-md-2">
                {{ Form::label('request_type','มีความประสงค์')}}
                <br>
                <label class="radio-inline">
                  {{ Form::radio('request_type', "ซ่อม", ($requestDetail->request_type == "ซ่อม") ? "checked" : "") }} ซ่อม
                </label>
                <label class="radio-inline">
                  {{ Form::radio('request_type', "ทำ", ($requestDetail->request_type == "ทำ") ? "checked" : "") }} ทำ
                </label> 
                <label class="radio-inline">
                  {{ Form::radio('request_type', "อื่น ๆ", ($requestDetail->request_type == "อื่น ๆ") ? "checked" : "") }} อื่น ๆ
                </label> 
              </div>
              <div class="form-group col col-md-7">
                {{ Form::label('request_objective','ความประสงค์ที่ต้องการให้ดำเนินการ')}}
                {{ Form::textarea('request_objective', $requestDetail->request_objective, ['class' => 'form-control','id'=>'request_objective', 'rows'=> 2,'placeholder'=>"ระบุความประสงค์ที่ต้องการให้ดำเนินการ",'required']) }}
              </div>
            {{-- </div>
            <div class="row"> --}}
              <div class="form-group col col-md-3">
                {{ Form::label('inv_number','หมายเลขครุภัณฑ์ (ถ้ามี)')}}
                {{ Form::textarea('inv_number', $requestDetail->inv_number, ['class' => 'form-control','id'=>'inv_number', 'rows' => 2,'placeholder'=>"ระบุหมายเลขครุภัณฑ์ (ถ้ามี)",]) }}
              </div>
            </div>
            <div class="row">
              <div class="form-group col col-md-12">
                {{ Form::label('request_detail','เนื่องจาก')}}
                {{ Form::textarea('request_detail', $requestDetail->request_detail, ['class' => 'form-control','id'=>'request_detail','rows'=> 2,'placeholder'=>"ระบุปัญหา หรือความต้องการ",'required']) }}
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                {{ Form::label('request_number','เลขที่เอกสารกลุ่ม')}}
                {{ Form::text('request_number', $requestDetail->request_number, ['class' => 'form-control','id'=>'request_number','placeholder'=>"ระบุเลขที่เอกสารของฝ่าย", 'required']) }}
              </div>
              <div class="col-md-3">
                {{ Form::label('dateCreate','วันที่รับเอกสาร')}}
                    <div class="input-group date" id="request_recieved" data-target-input="nearest">
                        <input type="text" name="request_recieved" class="form-control datetimepicker-input" data-target="#request_recieved" value="{{ date ('d-m-Y', strtotime (old('request_recieved', optional($requestDetail)->request_recieved))) }}" required>
                        <div class="input-group-append" data-target="#request_recieved" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              </div>
              <div class="col-md-6">
                {{ Form::hidden ('existingFile', Str::substr($requestDetail->request_file,15,25)) }}
                {{ Form::label('request_file','ไฟล์ใบแจ้งปัญหา')}}
                  <a href="{{ asset('/')}}{{ $requestDetail->request_file }}" class="btn btn-danger btn-xs" target="_new">{{ Str::substr($requestDetail->request_file,15,25) }}</a> 
                {{ Form::file('request_file', ['class' => 'form-control', 'id' => 'request_file', 'accept' => '.pdf', ]) }}
              </div>
            </div>
            <div class="card-footer">
              <div class="col" style="text-align: center">
                {{ Form::submit('ปรับปรุงข้อมูล', ['class' => 'btn btn-warning ']) }}
              </div>
            </div>
            {{ Form::hidden('id',$requestDetail->id) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

{{-- @section('scripts')
<script>
  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    url: '{{ route('update') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="request_file[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="request_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($requestDetail) && $requestDetail->request_file)
        var files =
          {!! json_encode($requestDetail->request_file) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="request_file[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }
</script>
@stop --}}
