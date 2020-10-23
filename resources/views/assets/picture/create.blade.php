@extends('layouts.adminlte')

@section('page_name')
    | Pictures Create
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-edit"></i> Create Pictures</h3>
                    </div>
                    <!-- form start -->
                    <form action="/assets/picture" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control custom-select" style="width: 100%;" name="role" id="role">
                                            <option value="1" {{ old('role') ==  1 ? 'selected' : '' }}>General</option>
                                            <option value="2" {{ old('role') ==  2 ? 'selected' : '' }}>Maneger</option>
                                            <option value="3" {{ old('role') ==  3 ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col --> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="picture_name">File input Pictures</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('picture_name') is-invalid @enderror" name="picture_name" id="picture_name">
                                            <label class="custom-file-label text-muted" for="picture_name">
                                                Choose file Pictures Type [ .jpg .jpeg .png ]
                                            </label>
                                            @error('picture_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col --> 
                            </div>
                            <!-- /.row --> 
                        </div>
                        <!-- /.card-body -->        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/assets/picture" class="btn btn-secondary">Cancel</a>
                        </div>
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

@section('scripts')
    
@endsection