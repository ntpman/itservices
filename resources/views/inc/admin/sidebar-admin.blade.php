{{-- Menu for Admin --}}
{{-- Survey Status --}}
<li class="nav-item has-treeview {{ Request::is ('role*') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="#" class="nav-link {{ Request::is ('role*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-search"></i>
            <p>สิทธิ์การใช้งาน <i class="right fas fa-angle-left"></i></p>
    </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                {{-- active --}}
                    <a href="{{ url('/roleList') }}" class="nav-link {{ Request::is('roleList') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>รายชื่อสิทธิ์การใช้งาน</p>
                    </a>
                    <a href="{{ url('/roleList/create') }}" class="nav-link {{ Request::is ('roleList/create') ? 'active' : '' }}">
                        <i class="fas fa-plus-circle nav-icon"></i>
                        <p>เพิ่มข้อมูลสิทธิ์การใช้งาน</p>
                    </a>
                </li>
            </ul>
</li>