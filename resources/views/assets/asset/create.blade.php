@extends('layouts.adminlte')

@section('page_name')
    | Asset Create
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> Asset Create ครุภัณฑ์</h3>
                    </div>
                    <!-- form start -->
                    <form action="/assets/asset" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="wizard mb-3">
                                        <div class="connecting-line"></div>
                                        <ul class="nav nav-tabs justify-content-between round-tab" role="tablist">
                                            <li role="presentation" class="active">                                                
                                                <a href="#step1" class="btn btn-block btn-outline-success active" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true">
                                                    <span class="badge badge-light">Step1</span><br>
                                                    <i class="fas fa-copyright"></i> Basic
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step2" class="btn btn-block btn-outline-success" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false">
                                                    <span class="badge badge-light">Step2</span><br>
                                                    <i class="fas fa-book"></i> Asset
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step3" class="btn btn-block btn-outline-success" data-toggle="tab" aria-controls="step3" role="tab">
                                                    <span class="badge badge-light">Step3</span><br>
                                                    <i class="fas fa-comment-alt"></i> Detail
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step4" class="btn btn-block btn-outline-success" data-toggle="tab" aria-controls="step4" role="tab">
                                                    <span class="badge badge-light">Step4</span><br>
                                                    <i class="fas fa-user"></i> Owner
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step5" class="btn btn-block btn-outline-success" data-toggle="tab" aria-controls="step5" role="tab">
                                                    <span class="badge badge-light">Step5</span><br>
                                                    <i class="fas fa-images"></i> Picture
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step6" class="btn btn-block btn-outline-success" data-toggle="tab" aria-controls="step6" role="tab">
                                                    <span class="badge badge-light">Step6</span><br>
                                                    <i class="fas fa-map-marker-alt"></i> Location
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content" id="main_form">
                                        <div class="tab-pane active" role="tabpanel" id="step1">
                                            {{-- Basic --}}
                                            @include('assets.asset.inc.basic')
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-success next-step">Continue to next step</button></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step2">
                                            {{-- Asset --}}
                                            @include('assets.asset.inc.asset')
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-secondary prev-step">Back</button></li>
                                                <li><button type="button" class="btn btn-block btn-outline-success next-step">Continue</button></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step3">
                                            {{-- Detail --}}
                                            @include('assets.asset.inc.detail')
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-secondary prev-step">Back</button></li>
                                                <li><button type="button" class="btn btn-block btn-outline-success next-step">Continue</button></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step4">
                                            {{-- Owner --}}
                                            @include('assets.asset.inc.owner')
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-secondary prev-step">Back</button></li>
                                                <li><button type="button" class="btn btn-block btn-outline-success next-step">Continue</button></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step5">
                                            {{-- Picture --}}
                                            @include('assets.asset.inc.picture')
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-secondary prev-step">Back</button></li>
                                                <li><button type="button" class="btn btn-block btn-outline-success next-step">Continue</button></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step6">
                                            {{-- Location --}}
                                            @include('assets.asset.inc.location')
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-block btn-outline-secondary prev-step">Back</button></li>
                                                <li><button type="submit" class="btn btn-block btn-success">Submit</button></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection