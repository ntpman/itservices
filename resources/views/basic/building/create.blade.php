@extends('layouts.adminlte')

@section('page_name')
    | Buildings Create
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">เพิ่มข้อมูลอาคาร <i class="far fa-edit"></i></h5>
                    </div>
					<!-- form start -->
					{!! Form::open(['action' => 'Basic\BuildingController@store', 'method' => 'POST', 'class' => 'was-validate']) !!}
					<div class="card-body">
						<div class="form-group">
							{{ Form::label('title','ชื่ออาคาร')}}
							{{ Form::text('buildingName', '', ['class' => 'form-control','required']) }}
						</div>
						<a href="/basic/building" class="btn btn-secondary">ย้อนกลับ</a>
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