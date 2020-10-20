<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light" >{{ config('app.name', '') }}</span>
    </a>

    <!-- Sidebar --> 
    <div class="sidebar">
        @guest
        @else
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if (Auth::user()->image != '')
                        @php
                            $img = Auth::user()->image;
                        @endphp
                        <img src="{{ asset("/storage/image_users/$img") }}" class="img-circle elevation-2" alt="User Image">
                    @else
                        <img src="{{ asset('/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
                <div class="info">
                    <a href="/" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>
            <!-- /.sidebar user panel (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    
                    <!-- Include flie menu -->

                    {{-- Setting --}}
                    @include('inc.menu.setting')

                    {{-- Basic Infos --}}
                    @include('inc.menu.basic')

                    {{-- Asset --}}
                    @include('inc.menu.asset')

                    <!-- /.include flie menu -->
                    
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        @endguest
    </div>
    <!-- /.sidebar -->
</aside>