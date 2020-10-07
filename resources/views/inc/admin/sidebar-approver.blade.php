{{-- Menu for Verify and Approve --}}
<li class="nav-header">สำหรับผู้ตรวจสอบและอนุมัติข้อมูล</li>
{{-- Approve & Check Data Menu --}}
<li class="nav-item has-treeview {{ Request::is('officer-questionnaire') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('officer-questionnaire') }}" class="nav-link {{ Request::is('officer-questionnaire') ? 'active' : '' }}">
        <i class="nav-icon far fa-list-alt"></i>
        <p>ตรวจสอบและอนุมัติข้อมูล</p>
    </a>
</li>

