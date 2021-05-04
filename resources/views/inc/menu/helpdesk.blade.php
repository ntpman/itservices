<li class="nav-item has-treeview {{ Request::is('helpdesk*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('helpdesk*') ? 'active' : '' }}">
        <p>
            จัดการแบบสั่งซ่อม/ทำสิ่งของ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
    {{-- @if (Auth::user()->position != 'ผู้ปฏิบัติงานด้านฮาร์ดแวร์' && Auth::user()->position != 'ผู้ปฏิบัติงานด้านซอฟต์แวร์') --}}
    @if (Auth::user())
        <li class="nav-item">
            <a href="/helpdesk/listAll" class="nav-link {{ Request::is('helpdesk/listAll') ? 'active' : '' }}">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>แสดงข้อมูลทั้งหมด</p>
            </a>
        </li>
        @endif
    @if (Auth::user()->position == 'หัวหน้างานฮาร์ดแวร์' || Auth::user()->position == 'หัวหน้างานซอฟต์แวร์')
        <li class="nav-item">
            <a href="/helpdesk/unAssignWorker" class="nav-link {{ Request::is('helpdesk/unAssignWorker') ? 'active' : '' }}">
                <i class="fas fa-file-signature nav-icon"></i>
                <p>มอบหมายผู้ปฏิบัติงาน</p>
            </a>
        </li>
    @endif
    @if (Auth::user()->position == 'ผู้ปฏิบัติงานด้านฮาร์ดแวร์' || Auth::user()->position == 'ผู้ปฏิบัติงานด้านซอฟต์แวร์'
        || Auth::user()->position == 'หัวหน้างานฮาร์ดแวร์' || Auth::user()->position == 'หัวหน้างานซอฟต์แวร์')
        <li class="nav-item">
            <a href="/helpdesk/workOwner" class="nav-link {{ Request::is('helpdesk/workOwner') ? 'active' : '' }}">
                <i class="fas fa-file-contract nav-icon"></i>
                <p>งานที่รับผิดชอบ</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/helpdesk/workList" class="nav-link {{ Request::is('helpdesk/workList') ? 'active' : '' }}">
                <i class="fas fa-wrench nav-icon"></i>
                <p>งานที่กำลังดำเนินการ</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/helpdesk/satisfactionList" class="nav-link {{ Request::is('helpdesk/satisfactionList') ? 'active' : '' }}">
                <i class="fas fa-smile nav-icon"></i>
                <p>ประเมินความพึงพอใจ</p>
            </a>
        </li>
    @endif
    @if (Auth::user()->position == 'ธุรการกลุ่ม')
        <li class="nav-item">
            <a href="/helpdesk/newRequest" class="nav-link {{ Request::is('helpdesk/newRequest') ? 'active' : '' }}">
                <i class="fas fa-file-upload nav-icon"></i>
                <p>รายการข้อมูลใหม่</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/helpdesk/create" class="nav-link {{ Request::is('helpdesk/create') ? 'active' : '' }}">
                <i class="fas fa-plus-square nav-icon"></i>
                <p>เพิ่มข้อมูล</p>
            </a>
        </li>
    @endif
    @if (Auth::user()->position == 'รก.หก.ทส.')
        <li class="nav-item">
            <a href="/helpdesk/unAssignSupervisor" class="nav-link {{ Request::is('helpdesk/unAssignSupervisor') ? 'active' : '' }}">
                <i class="fas fa-tasks nav-icon"></i>
                <p>มอบหมายหัวหน้างาน</p>
            </a>
        </li>
    @endif
    </ul>
</li>