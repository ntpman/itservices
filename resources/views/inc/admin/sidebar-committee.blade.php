<li class="nav-header">ข้อมูลการส่งงานของผู้สำรวจข้อมูล</li>
{{-- Committee Menu--}}
<li class="nav-item has-treeview {{ Request::is('committee-questionnaire') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/committee-questionnaire') }}" class="nav-link {{ Request::is('committee-questionnaire') ? 'active' : '' }}">
        <i class="nav-icon fas fa-spell-check"></i>
        <p>ตรวจสอบสถานะการส่งงาน</p>
    </a>
</li>
