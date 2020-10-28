@extends('layouts.adminlte')

@section('page_name')
    | Models Create
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> เพิ่มข้อมูลรุ่นของผลิตภัณฑ์</h3>
                    </div>
					<!-- form start -->
					{!! Form::open(['action' => 'Basic\BrandModelController@store', 'method' => 'POST', 'class' => 'was-validate']) !!}
					<div class="card-body">
						<div class="form-group">
							{{ Form::label('title', 'ยี่ห้อผลิตภัณฑ์') }}
							{{ Form::select('brandId', $allBrand, '', ['class' => 'form-control', 'required']) }}
						</div>
						<div class="form-group">
							{{ Form::label('title','ชื่อรุ่นผลิตภัณฑ์')}}
							{{ Form::text('brandModelName', '', ['class' => 'form-control']) }}
						</div>
						<a href="/basic/brandmodel" class="btn btn-secondary">ย้อนกลับ</a>
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