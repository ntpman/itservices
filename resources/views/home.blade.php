@extends('layouts.adminlte')

@section('page_name')
    | Home
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">    
                        You are logged in! {{ Auth::user()->name }}
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <h4 class="">Setting</h4>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>SYSYTEM USERS</h3>
                        <p>Total : 4</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="/admin/users/create" class="small-box-footer">
                        <i class="fas fa-plus"></i> Add User
                    </a>
                </div>
                <!-- /.small-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <h4 class="">Basic</h4>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>BUILDING</h3>
                        <p>Total : 2,000</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-building"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <i class="fas fa-plus"></i> Add Asset
                    </a>
                </div>
                <!-- /.small-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>BRAND</h3>
                        <p>Total : 2,000</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-copyright"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <i class="fas fa-plus"></i> Add
                    </a>
                </div>
                <!-- /.small-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>MODEL</h3>
                        <p>Total : 2,000</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-copyright"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <i class="fas fa-plus"></i> Add
                    </a>
                </div>
                <!-- /.small-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <h4 class="">Asset</h4>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>ASSET</h3>
                        <p>Total : 2,000</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <i class="fas fa-plus"></i> Add
                    </a>
                </div>
                <!-- /.small-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <h4 class="">Supplier</h4>
        <div class="row">            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>SUPPLIER</h3>
                        <p>Total : 150</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="/supplier/create" class="small-box-footer">
                        <i class="fas fa-plus"></i> Add Supplier
                    </a>
                </div>
                <!-- /.small-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('scripts')
    
@endsection
