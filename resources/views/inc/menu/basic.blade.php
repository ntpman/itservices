<li class="nav-item has-treeview {{ Request::is('basic*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('basic*') ? 'active' : '' }}">
        <p>
            ข้อมูลพื้นฐานของระบบ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/basic/building" class="nav-link {{ Request::is('basic/building') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ชื่ออาคาร</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basic/brand" class="nav-link {{ Request::is('basic/brand*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ยี่ห้อผลิตภัณฑ์</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basic/model" class="nav-link {{ Request::is('basic/model*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>รุ่นผลิตภัณฑ์</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basic/type" class="nav-link {{ Request::is('basic/type*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ประเภทครุภัณฑ์</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basic/sub_type" class="nav-link {{ Request::is('basic/sub_type*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ประเภทครุภัณฑ์ย่อย</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basic/common_name" class="nav-link {{ Request::is('basic/common_name*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ชื่อครุภัณฑ์</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basic/usage" class="nav-link {{ Request::is('basic/usage*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>การใช้งานครุภัณฑ์</p>
            </a>
        </li>
    </ul>
</li>