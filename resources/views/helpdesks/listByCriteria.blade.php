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
                    <h3 class="card-title">ค้นหาข้อมูลแบบ F-CD0-071 ที่ดำเนินการแล้วเสร็จในแต่ละเดือน</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
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
                </div>

                {{-- <div class="card-body table-responsive">
                    <table id="allRequest" class="table table-bordered table-striped table-sm datatables">
                        @if (count($requestAlls) > 0)
                            <thead>
                                <tr>
                                    <th style="text-align: center">ผู้รับผิดชอบ</th>
                                    <th style="text-align: center" width="50px">เลขที่</th>
                                    <th style="text-align: center" width="60px">วันที่รับ</th>
                                    <th style="text-align: center" width="150px">ผู้แจ้ง</th>
                                    <th style="text-align: center" width="400px">ความประสงค์</th>
                                    <th style="text-align: center" width="ึ60px">วันที่จ่ายงาน</th>
                                    <th style="text-align: center" width="120px">สถานะ</th>
                                    <th style="text-align: center" width="40px">เอกสาร</i></th>
                                </tr>
                            </thead>
                            <tbody id="items">
                                @foreach ($requestAlls as $item)                                  
                                    <tr>
                                        <td>{{ $item->user->name}}</td>
                                        <td>{{ $item->request_number }}</td>
                                        <td>{{ date ('d-m-Y', strtotime( $item->request_recieved ))}}</td>
                                        <td>{{ $item->request_owner }}</td>
                                        <td>{{ $item->request_type }} {{ $item->request_objective }}</td>
                                        <td>{{date ('d-m-Y', strtotime ($item->updated_at ))}}</td>
                                        <td>{{ $item->request_status }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ asset('/')}}{{ $item->request_file }}" class="btn btn-danger btn-xs" target="_new"> <i class="far fa-file-pdf"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div> --}}
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

