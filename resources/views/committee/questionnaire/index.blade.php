@extends('layouts.admin')

@section('page')
Committee Questionnaire
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-primary card-outline">
                <h3 class="card-title"><i class="far fa-folder-open"></i>
                    รายชื่อสำหรับตรวจสอบ
                </h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
                <table id="bstiAdmin" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
                    @if (count($users) > 0)
                        <thead>                  
                            <tr>
                                {{-- <th style="width: 10px;">ลำดับ</th> --}}
                                <td>region_id</td>
                                <th>รหัสประจำตัว : ชื่อ-สกุล</th>
                                <th><span class="badge bg-secondary">Pending</span></th>
                                <th><span class="badge bg-primary">Send</span></th>
                                <th><span class="badge bg-info">Edit</span></th>
                                <th><span class="badge bg-success">Approve</span></th>
                                <th><span class="badge bg-warning">Reject</span></th>
                                <th><i class="fas fa-folder-plus"></i></th>
                            </tr>
                        </thead>
                        <tbody id="items">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                    <td>{{ $user->region->region_name }}</td>
                                    <td>
                                        <a href="/committee-questionnaire/{{ $user->id }}">
                                            <mark>{{ $user->user_code }}</mark> : {{ $user->name }}
                                        </a>                                        
                                    </td>
                                    <td>
                                        @php
                                            $dataPending = [];
                                        @endphp
                                        @foreach ($user->labs as $item)
                                            @if ($item->survey_status_id == 1)
                                                @php
                                                    $dataPending[] = $item->survey_status_id;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            echo count($dataPending)
                                        @endphp                                
                                    </td>
                                    {{-- pending --}}
                                    <td>
                                        @php
                                            $dataSend = [];
                                        @endphp
                                        @foreach ($user->labs as $item)
                                            @if ($item->survey_status_id == 2)
                                                @php
                                                    $dataSend[] = $item->survey_status_id;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            echo count($dataSend)
                                        @endphp                                
                                    </td>
                                    {{-- send --}}
                                    <td>
                                        @php
                                            $dataEdit = [];
                                        @endphp
                                        @foreach ($user->labs as $item)
                                            @if ($item->survey_status_id == 3)
                                                @php
                                                    $dataEdit[] = $item->survey_status_id;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            echo count($dataEdit)
                                        @endphp                                
                                    </td>
                                    {{-- edit --}}
                                    <td>
                                        @php
                                            $dataApprove = [];
                                        @endphp
                                        @foreach ($user->labs as $item)
                                            @if ($item->survey_status_id == 4)
                                                @php
                                                    $dataApprove[] = $item->survey_status_id;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            echo count($dataApprove)
                                        @endphp                                
                                    </td>
                                    {{-- approve --}}
                                    <td>
                                        @php
                                            $dataReject = [];
                                        @endphp
                                        @foreach ($user->labs as $item)
                                            @if ($item->survey_status_id == 5)
                                                @php
                                                    $dataReject[] = $item->survey_status_id;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            echo count($dataReject)
                                        @endphp                                
                                    </td>
                                    {{-- reject --}}
                                    <td>{{ count($user->labs) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif                        
                </table>
			</div>
			<!-- /.card-body -->
		</div>
		<!--/.card -->			
	</div>
	<!--/.col -->
</div>
<!--/.row -->
@endsection

@section('modal')

@endsection

@section('scripts')
    <script src="{{ asset('js/custom-datatable/bsti-admin.js') }}"></script>
@endsection


