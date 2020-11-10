@extends('layouts.adminlte')

@section('page_name')
    | Asset Create
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> Asset Create</h3>
                    </div>
                    <!-- form start -->
                    <form action="/assets/asset" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="item-progress-bar">
                                
                                <ul class="nav nav-pills nav-fill justify-content-between" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-basic-tab" data-toggle="pill" href="#pills-basic" role="tab" aria-controls="pills-basic" aria-selected="true"><i class="fas fa-tags"></i> ข้อมูลพื้นฐาน <span class="badge badge-light">Step 1</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-asset-tab" data-toggle="pill" href="#pills-asset" role="tab" aria-controls="pills-asset" aria-selected="false"><i class="far fa-file"></i> รายละเอียดครุภัณฑ์ <span class="badge badge-light">Step 2</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-location-tab" data-toggle="pill" href="#pills-location" role="tab" aria-controls="pills-location" aria-selected="false"><i class="fas fa-map-marker-alt"></i> อาคารที่ติดตั้งใช้งาน <span class="badge badge-light">Step 3</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-owner-tab" data-toggle="pill" href="#pills-owner" role="tab" aria-controls="pills-owner" aria-selected="false"><i class="fas fa-user"></i> ผู้รับผิดชอบครุภัณฑ์ <span class="badge badge-light">Step 4</span></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.item-progress-bar -->
                            <hr>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab">
                                    @include('assets.asset.inc.basic')
                                </div>
                                <div class="tab-pane fade" id="pills-asset" role="tabpanel" aria-labelledby="pills-asset-tab">
                                    @include('assets.asset.inc.asset')
                                </div>
                                <div class="tab-pane fade" id="pills-location" role="tabpanel" aria-labelledby="pills-location-tab">
                                    LOCATION
                                </div>
                                <div class="tab-pane fade" id="pills-owner" role="tabpanel" aria-labelledby="pills-owner-tab">
                                    OWNER
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.card-body -->
                    </form>
                    <!-- end start -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('modal')
    @include('assets.asset.modal.create-supplier')
@endsection

@section('scripts')
    <script src="{{ asset('/js/supplier.js') }}"></script>
@endsection