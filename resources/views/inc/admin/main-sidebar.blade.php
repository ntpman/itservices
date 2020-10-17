<aside class="main-sidebar elevation-4 sidebar-dark-success">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app_name', 'DSS IT Services') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (Route::has('login'))
                @auth
                    <div class="image">
                        <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                    @else
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">My Username.</a>
                    </div>
                @endauth
            @endif
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-header d-none">Display None</li>
                {{-- Basic Informations Menu  --}}
            {{-- <li class="nav-header">Role : {!! auth()->user()->role_id !!}</li> --}}

            {{-- Management Menu --}}
            <li class="nav-header">ข้อมูลการจัดการระบบ</li>
                {{-- Register Sub-menu --}}
                <li class="nav-item has-treeview {{ Request::is('register*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('register*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>สิทธิ์การใช้งานระบบ<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ route('register') }}" class="nav-link {{ Request::is('register') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ลงทะเบียนผู้ใช้งานระบบ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- Log Activity Sub-menu --}}
                <li class="nav-item has-treeview {{ Request::is('logActivity*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('logActivity*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>ประวัติการใช้งานระบบ <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/logActivity') }}" class="nav-link {{ Request::is('logActivity') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>การใช้งานระบบทั้งหมด</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- เมนูข้อมูลพื้นฐานของระบบ --}}
                    <li class="nav-header">ข้อมูลพื้นฐานของระบบ</li>
                        @include('inc.admin.sidebarBasicInfos')

                {{-- Extra Admin Menu --}}
                    @include('inc.admin.sidebar-admin')
                
                {{-- Menu for Employee --}}
                    <li class="nav-header">ข้อมูลเครื่อง/อุปกรณ์</li>
                        @include('inc.admin.sidebarAsset')

                {{-- Approver Menu --}}
                    @include('inc.admin.sidebar-approver')

                {{-- BSIT Admin Menu --}}
                    @include('inc.admin.sidebar-bsti-admin')

                {{-- Committee Menu --}}
                    @include('inc.admin.sidebar-committee')
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>