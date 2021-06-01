@extends('layouts.adminlte')

@section('page_name')
    | Usages Create
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> เพิ่มข้อมูลการใช้งานภัณฑ์</h3>
                    </div>
					<!-- form start -->
					{!! Form::open(['action' => 'Basics\UsageController@store', 'method' => 'POST', 'class' => 'was-validate']) !!}
					<div class="card-body">
						<div class="form-group">
							{{ Form::label('title','การใช้งานครุภัณฑ์')}}
							{{ Form::text('usageName', '', ['class' => 'form-control']) }}
						</div>
						<a href="/basics/usage" class="btn btn-secondary">ย้อนกลับ</a>
						{{ Form::submit('บันทึก', ['class' => 'btn btn-primary']) }}
					</div>
					{!! Form::close() !!}
                    <!-- end start -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('scripts')
    
@endsection