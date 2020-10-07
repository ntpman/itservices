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
                <form action="/ask" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-question-circle"></i> ถามคำถามเลย !</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="question" id="question" class="form-control" value="" required>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="/ask" class="btn btn-secondary btn-sm">
                        <i class="fas fa-undo"></i> ย้อนกลับ
                    </a>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-save"></i> ส่งคำถาม
                    </button>
                </div>
                <!--/.card-footer -->
                </form>
                {{-- end form --}}
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection

