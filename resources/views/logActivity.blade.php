@extends('layouts.admin')

@section('content_header')
	<h1>Log Activity Lists</h1>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card mb-2">
					<div class="card-body">
						<table class="table table-bordered" id="dt1">
							<thead>
								<tr>
									<th>No</th>
									<th>Subject</th>
									<th>URL</th>
									<th>Method</th>
									<th>Ip</th>
									<th width="300px">User Agent</th>
									<th>User Id</th>
									{{-- <th>Action</th> --}}
								</tr>
							</thead>
							<tbody>
								@if($logs->count())
									@foreach($logs as $key => $log)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{ $log->subject }}</td>
									<td class="text-success">{{ $log->url }}</td>
									<td><label class="label label-info">{{ $log->method }}</label></td>
									<td class="text-warning">{{ $log->ip }}</td>
									<td class="text-danger">{{ $log->agent }}</td>
									<td>{{ $log->user_id }}</td>
									{{-- <td><button class="btn btn-danger btn-sm">Delete</button></td> --}}
								</tr>
									@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

