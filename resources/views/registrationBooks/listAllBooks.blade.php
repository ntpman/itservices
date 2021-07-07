@extends('layouts.adminlte')

@section('page_name')
    | แสดงรายการหนังสือรับ ทส.สท.
@endsection

@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">รายการหนังสือรับทั้งหมด</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="allRequest" class="table table-bordered table-striped table-sm datatables">
                        @if (count($allBooks) > 0)
                            <thead>
                                <tr>
                                    {{-- <th style="text-align: center">ผู้รับผิดชอบ</th> --}}
                                    <th style="text-align: center" width="60px">เลขที่รับ</th>
                                    <th style="text-align: center" width="60px">วันที่รับ</th>
                                    <th style="text-align: center" width="80px">เลขที่หนังสือ</th>
                                    <th style="text-align: center" width="200px">เรื่อง</th>
                                    <th style="text-align: center" width="100px">คำสั่งการ</th>
                                    <th style="text-align: center" width="100px">วันที่ครบกำหนด</th>
                                    <th style="text-align: center" width="40px">เอกสาร</i></th>
                                </tr>
                            </thead>
                            <tbody id="items">
                                @foreach ($allBooks as $item)                                  
                                    <tr>
                                        {{-- <td>{{ $item->user->name}}</td> --}}
                                        <td style="text-align: center">{{ $item->received_no }}</td>
                                        <td>{{ date ('d-m-Y', strtotime( $item->received_date ))}}</td>
                                        <td>{{ $item->books_no }}</td>
                                        <td>{{ $item->books_subject }}</td>
                                        <td>{{ $item->commands }}</td>
                                        <td style="text-align: center">
                                            @if ( $item->due_date == 0000-00-00)
                                                -
                                            @else
                                                {{ date ('d-m-Y', strtotime ($item->due_date )) }}
                                            @endif
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{ asset('/')}}{{ $item->books_file }}" class="btn btn-danger btn-xs" target="_new"> <i class="far fa-file-pdf"></i></a>
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
    <script src="{{ asset('/js/simple-table.js') }}" ></script>
@endsection

