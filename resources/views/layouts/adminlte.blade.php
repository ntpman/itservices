<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

    <title>{{ config('app.name', '') }} @yield('page_name')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/adminlte.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset ('/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Google Font: Source -->
    <link rel="stylesheet" href="{{ asset('/css/font.css') }}">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href=" {{ asset('/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    @yield('custom-css')
</head>
<body class="hold-transition sidebar-mini text-sm">
    <div class="wrapper">

        <!-- Navbar -->
        @include('inc.nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('inc.aside')
        <!-- /.main sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"></h1>
                            @yield('content-header')
                        </div><!-- /.col -->
                        <div class="col-sm-6 d-none">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#"></a>
                                </li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div><!-- /.col -->
                        <div class="col-sm-12">
                            {{-- @if (Session::has('success_msg'))
                                <div class="alert alert-success">
                                    {{ session('success_msg') }}
                                </div>
                            @endif --}}

                            @if (count($errors) > 0)
                                <div class="alert alert-danger mt-1 mb-0">
                                    <ol class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            @endif
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div id="app">
                    @yield('content')
                    @yield('modal')
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar hide -->
        <aside class="control-sidebar control-sidebar-dark d-none">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                <i class="far fa-calendar-alt"></i> {{ date('d-m-Y') }} <i class="far fa-clock"></i> {{ date('H:i') }}
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020-2021 @ DSS IT Subdivision. </strong>Version 1.01, All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('/adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('/adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src=" {{ asset('/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- REQUIRED SCRIPTS -->
    @if (Session::has('success_msg'))
        <script type="text/javascript">
            $(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000
                });

                Toast.fire({
                    icon: 'success',
                    title: `<span class="ml-1 font-mitr">{{ session('success_msg') }}</span>`,
                });
            });
        </script>
    @endif
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();

            $('[data-mask]').inputmask()

            // DataTables
            $('.datatables').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'DD-MM-YYYY'
            });

            $('#request_recieved').datetimepicker({
                format: 'DD-MM-YYYY'
            });

            $('#delivery_date').datetimepicker({
                format: 'DD-MM-YYYY'
            });

            $('#survey_date').datetimepicker({
                format: 'DD-MM-YYYY'
            });
            
            $('#estimate_date').datetimepicker({
                format: 'DD-MM-YYYY'
            });

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                allowClear: true,
            }).trigger("change");
        });
    </script>
    @yield('scripts')
</body>
</html>
