@extends('layouts.adminlte')

@section('page_name')
    | Users Index
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">All Users</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-sm datatables">
                            @if (count($users) > 0)
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($users as $item)                                  
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                @if ($item->role === 3)
                                                    Admin
                                                @elseif($item->role === 2)
                                                    Maneger
                                                @else
                                                    General
                                                @endif
                                            </td>
                                            <td>{{ $item->status === 1 ? 'Active' : 'Not Active' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('scripts')
    
@endsection