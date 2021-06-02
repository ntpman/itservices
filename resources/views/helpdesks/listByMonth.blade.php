@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk List All Page
@endsection

@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">ข้อมูลแบบ F-CD0-071 ที่ดำเนินการแล้วเสร็จในแต่ละเดือน</h3>
                <div class="card-tools">
                        <ul class="nav nav-pills nav-fill ml-auto">
                            @if (Auth::user() != '')
                                {{-- @if (Auth::user()->position == 'ธุรการกลุ่ม')
                                    <li class="nav-item">
                                        <a class="nav-link active btn btn-primary" href="/helpdesk/create"><i class="fas fa-tools"></i></i>เพิ่มข้อมูลใบสั่ง</a>
                                    </li>
                                @endif --}}
                                @if (Auth::user() != '')
                                    <li class="nav-item">
                                        <a class="nav-link active btn btn-warning" href="/helpdesk/listByCriteria"><i class="fas fa-tools"></i></i> ค้นหาข้อมูลงานที่แล้วเสร็จประจำเดือน</a>
                                    </li>
                                @endif
                                {{-- @if (Auth::user()->position == 'รก.หก.ทส.')
                                    <li class="nav-item">
                                        <a class="nav-link active btn btn-success" href="/helpdesk/unAssignSupervisor"><i class="fas fa-tasks"></i></i> มอบหมายหัวหน้างาน</a>
                                </li>&nbsp;
                                @endif --}}
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- /.card-header -->
                {{-- <div class="card-body">
                    {!! Form::open(['action' => 'Helpdesks\WorkerController@listWorkByCriteria', 'method' => 'GET', 'class' => 'was-validate','enctype'=>'multipart/form-data']) !!}
                    {{ Form::label('workByMonth','ระบุเงื่อนไขการเรียกดูข้อมูล')}}
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-control select2bs4 @error('workByMonth') is-invalid @enderror" 
                                        style="width: 100%;" name="workByMonth" id="workByMonth"
                                        data-placeholder="ระบุเดือนที่ต้องการ" required>
                                        <option value=""></option>
                                        <option value="01">มกราคม</option>
                                        <option value="02">กุมภาพันธ์</option>        
                                        <option value="03">มีนาคม</option>        
                                        <option value="04">เมษายน</option>        
                                        <option value="05">พฤษภาคม</option>        
                                        <option value="06">มิถุนายน</option>        
                                        <option value="07">กรกฎาคม</option>        
                                        <option value="08">สิงหาคม</option>        
                                        <option value="09">กันยายน</option>        
                                        <option value="10">ตุลาคม</option>        
                                        <option value="11">พฤศจิกายน</option>        
                                        <option value="12">ธันวาคม</option>        
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group col col-md-7" style="text-align: right">
                            {{ Form::submit('ค้นหา', ['class' => 'btn btn-primary ']) }}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div> --}}

                <div>
                    ใบงานที่รับแจ้งประจำเดือน {{ $monthName }} จำนวน {{ count($listWorkByMonths) }} ใบ
                </div>
                <div>
                    ใบงานที่ยังไม่แล้วเสร็จสะสมจนถึงสิ้นเดือน {{ $monthName }} จำนวน {{ count($listUnfinishWorks) }} ใบ
                </div>
                <div>
                    ใบงานที่แล้วเสร็จทั้งหมดประจำเดือน {{ $monthName }} จำนวน {{ count($listFinishWorkByMonths) }} ใบ คิดเป็น {{ ( count($listFinishWorkByMonths)  / (count ($listUnfinishWorks) + count ($listFinishWorkByMonths))) * 100}} เปอร์เซ็นต์ ของงานทั้งหมด
                </div>
                <div>
                    ใบงานของเดือน {{ $monthName }} ที่แล้วเสร็จ  จำนวน {{ count($listFinishWorkOfMonths) }} ใบ คิดเป็น {{ ( count($listFinishWorkOfMonths) / count ($listWorkByMonths) ) * 100}} เปอร์เซ็นต์ ของงานประจำเดือน
                </div>
                <div>
                    ค่าเฉลี่ยคะแนนความพึงพอใจ {{ $score }} จาก 5 คะแนน คิดเป็น {{ ($score / 5 ) * 100}} เปอร์เซ็นต์
                </div>
                <div class="card-body table-responsive">
                    <table id="allRequest" class="table table-bordered table-striped table-sm datatables">
                        @if (count($listFinishWorkByMonths) > 0)
                            <thead>
                                <tr>
                                    <th style="text-align: center">ผู้รับผิดชอบ</th>
                                    <th style="text-align: center" width="100px">เลขที่</th>
                                    <th style="text-align: center" width="80px">วันที่รับ</th>
                                    <th style="text-align: center" width="ึ80px">วันที่แล้วเสร็จ</th>
                                    {{-- <th style="text-align: center" width="400px">ความประสงค์</th> --}}
                                    <th style="text-align: center" width="250px">รายละเอียดการปฏิบัติงาน</th>
                                    <th style="text-align: center" width="100px">ผลการประเมิน</th>
                                    <th style="text-align: center" width="150px">ผู้รับมอบงาน</th>
                                    <th style="text-align: center" width="60px">เอกสาร</i></th>
                                </tr>
                            </thead>
                            <tbody id="items">
                                @foreach ($listFinishWorkByMonths as $item)                                  
                                    <tr>
                                        <td>{{ $item->user->name}}</td>
                                        <td>{{ $item->request_number }}</td>
                                        <td>{{ date ('d-m-Y', strtotime( $item->request_recieved ))}}</td>
                                        <td>{{ date ('d-m-Y', strtotime ($item->delivery_date ))}}</td>
                                        {{-- <td>{{ $item->request_type }} {{ $item->request_objective }}</td> --}}
                                        <td>{{ $item->work_detail }}</td>
                                        <td style="text-align: center">{{ $item->satisfy_score }}</td>
                                        <td>{{ $item->request_consignee }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ asset('/')}}{{ $item->done_file }}" class="btn btn-success btn-xs" target="_new"> <i class="far fa-file-pdf"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
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

@section('scripts')
    <script src="{{ asset('/js/group-table.js') }}" ></script>
@endsection

