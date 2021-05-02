<li class="nav-item has-treeview {{ Request::is('helpdesk*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('helpdesk*') ? 'active' : '' }}">
        <p>
            จัดการแบบสั่งซ่อม/สั่งทำสิ่งของ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/helpdesk" class="nav-link {{ Request::is('helpdesk') ? 'active' : '' }}">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>แสดงข้อมูลทั้งหมด</p>
            </a>
        </li>
    @if (Auth::user()->position == 'ธุรการกลุ่ม')
        <li class="nav-item">
            <a href="/helpdesk/create" class="nav-link {{ Request::is('helpdesk/create') ? 'active' : '' }}">
                <i class="fas fa-plus-square nav-icon"></i>
                <p>เพิ่มข้อมูลใบสั่ง</p>
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
    @if (Auth::user()->position == 'หัวหน้างาน')
        <li class="nav-item">
            <a href="/helpdesk/unAssignWorker" class="nav-link {{ Request::is('helpdesk/unAssignWorker') ? 'active' : '' }}">
                <i class="fas fa-file-signature nav-icon"></i>
                <p>มอบหมายผู้ปฏิบัติงาน</p>
            </a>
        </li>
    @endif
    </ul>
</li>