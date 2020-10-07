@extends('layouts.admin')

@section('page')
    Q&A
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-question-circle"></i> ถาม - ตอบ</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dt1" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
                        @if (count($asks ?? '') > 0)
                            <thead>                  
                                <tr>
                                    <th style="width: 10px;">ลำดับ</th>
                                    <th>คำถาม</th>
                                    <th>คำตอบ</th>
                                    <th>Update at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($asks ?? '' as $ask)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>
                                        {{ $ask->question }}
                                    </td>									
									<td>
                                        {{ $ask->answer }}
                                    </td>
									<td>
                                        {{ \Carbon\Carbon::parse($ask->updated_at)->format('d/m/Y')}}
                                        {{-- {{ $ask->updated_at->format('d/m/Y')}} --}}
                                    </td>
                                </tr>                                
                                @endforeach
                            </tbody>
                        @else
                        @endif                        
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="/ask/create">
                        <i class="far fa-edit"></i></i> ถามคำถาม
                    </a>
                </div>
                <!--/.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection

