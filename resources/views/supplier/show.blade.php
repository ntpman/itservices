@extends('layouts.adminlte')

@section('page_name')
    | Suppliers Show
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-book"></i> Show Supplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul>
                            <li>id: {{ $supplier->id }}</li>
                            <li>supplier_name: {{ $supplier->supplier_name }}</li>
                            <li>supplier_address: {{ $supplier->supplier_address }}</li>
                            <li>tambon_t: {{ $supplier->provinceTa->tambon_t }}</li>
                            <li>amphoe_t: {{ $supplier->provinceAm->amphoe_t }}</li>
                            <li>changwat_t: {{ $supplier->provinceCh->changwat_t }}</li>
                            <li>supplier_postcode: {{ $supplier->supplier_postcode }}</li>
                            <li>supplier_phone: {{ $supplier->supplier_phone }}</li>
                            <li>supplier_email: {{ $supplier->supplier_email }}</li>
                            <li>supplier_contact: {{ $supplier->supplier_contact }}</li>
                            <li>created_by: {{ $supplier->created_by }}</li>
                            <li>updated_by: {{ $supplier->updated_by }}</li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('modal')

@endsection

@section('scripts')

@endsection