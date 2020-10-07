{{-- Menu for Super user --}}
<li class="nav-header">ตรวจสอบข้อมูลผู้เข้าร่วมโครงการ</li>
{{-- All Applicants Menu--}} 
<li class="nav-item has-treeview {{ Request::is('viewRegisterEmployee') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/viewRegisterEmployee') }}" class="nav-link {{ Request::is('viewRegisterEmployee') ? 'active' : '' }}">
        <i class="fa fa-user-cog nav-icon"></i>
        <p>รายชื่อผู้ใช้งานระบบทั้งหมด</p>
    </a>
</li>
{{-- View User Menu--}}
<li class="nav-item has-treeview {{ Request::is('showRegisterEmployee') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/showRegisterEmployee') }}" class="nav-link {{ Request::is('showRegisterEmployee') ? 'active' : '' }}">
        <i class="fa fa-user-friends nav-icon"></i>
        <p>รายชื่อผู้ปฏิบัติงานในโครงการ</p>
    </a>
</li>
{{-- View User Login Menu --}}
<li class="nav-item has-treeview {{ Request::is('showLoginEmployee') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/showLoginEmployee') }}" class="nav-link {{ Request::is('showLoginEmployee') ? 'active' : '' }}">
        <i class="nav-icon fa fa-sign-in-alt"></i>
        <p>รายชื่อผู้ที่ล็อกอินเข้าระบบแล้ว</p>
    </a>
</li>
{{-- View User Unlogin Menu --}}
<li class="nav-item has-treeview {{ Request::is('showUnloginEmployee') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/showUnloginEmployee') }}" class="nav-link {{ Request::is('showUnloginEmployee') ? 'active' : '' }}">
        <i class="nav-icon fas fa-frown-open"></i>
        <p>รายชื่อผู้ที่ยังไม่ล็อกอิน</p>
    </a>
</li>
{{-- approver --}}
<li class="nav-item has-treeview {{ Request::is('bstiadmin-questionnaire') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('bstiadmin-questionnaire') }}" class="nav-link {{ Request::is('bstiadmin-questionnaire') ? 'active' : '' }}">
        <i class="nav-icon far fa-list-alt"></i>
        <p>ตรวจสอบและอนุมัติข้อมูล</p>
    </a>
</li>