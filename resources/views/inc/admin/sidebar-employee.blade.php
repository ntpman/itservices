<li class="nav-header">ข้อมูลแบบสำรวจ</li>
{{-- Organization Menu--}}
<li class="nav-item has-treeview {{ Request::is('organization*') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/organization') }}" class="nav-link {{ Request::is('organization*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-database"></i>
        <p>ข้อมูลองค์กร</p>
    </a>
</li>
{{-- Laboratory Menu --}}
<li class="nav-item has-treeview {{ Request::is('lab*') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/lab') }}" class="nav-link {{ Request::is('lab*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-database"></i>
        <p>ข้อมูลห้องปฏิบัติการ</p>
    </a>
</li>
{{-- EquipmentLab Menu --}}
<li class="nav-item has-treeview {{ Request::is('equipment*') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/equipment') }}" class="nav-link {{ Request::is('equipment*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-database"></i>
        <p>ข้อมูลเครื่องมือวิทยาศาสตร์</p>
    </a>
</li>            
{{-- EquipmentLab Menu --}}
<li class="nav-item has-treeview {{ Request::is('productlab*') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/productlab') }}" class="nav-link {{ Request::is('productlab*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-database"></i>
        <p>ข้อมูลผลิตภัณฑ์<br>และรายการวิจัย/ทดสอบ/สอบเทียบ</p>
    </a>
</li>
{{-- Sending & Check Data Menu --}}
<li class="nav-item has-treeview {{ Request::is('questionnaire') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('questionnaire') }}" class="nav-link {{ Request::is('questionnaire') ? 'active' : '' }}">
        <i class="nav-icon fas fa-inbox"></i>
        <p>ตรวจสอบและส่งข้อมูล</p>
    </a>
</li>
{{-- Question & Answer --}}
<li class="nav-item has-treeview {{ Request::is('ask*') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/ask') }}" class="nav-link {{ Request::is('ask*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-question-circle"></i>
        <p>ถาม-ตอบ</p>
    </a>
</li>
<li class="nav-item has-treeview">
    <a href="{{ asset('file/DSSLabSurveyManual_V03_63014.pdf') }}" class="nav-link" target="_blank">
        <i class="nav-icon fas fa-file-pdf"></i>
        <p>คู่มือการใช้งานระบบฯ</p>
    </a>
</li>
