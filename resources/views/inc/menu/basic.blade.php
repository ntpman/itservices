<li class="nav-item has-treeview {{ Request::is('basic*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('basic*') ? 'active' : '' }}">
        <p>
            ข้อมูลพื้นฐานของระบบ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/basic/brand" class="nav-link {{ Request::is('basic/brand') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ยี่ห้อผลิตภัณฑ์</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basic/model" class="nav-link {{ Request::is('basic/model') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>รุ่นของผลิตภัณฑ์</p>
            </a>
        </li>
    </ul>
</li>