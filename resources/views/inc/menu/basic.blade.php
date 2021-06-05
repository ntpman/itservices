@if (Auth::user()->position == 'รก.หก.ทส.' || Auth::user()->position == 'ธุรการกลุ่ม')
<li class="nav-item has-treeview {{ Request::is('basics*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('basics*') ? 'active' : '' }}">
        <p>
            ข้อมูลพื้นฐานของระบบ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/basics/brand" class="nav-link {{ Request::is('basics/brand', 'basics/brand/*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ยี่ห้อผลิตภัณฑ์</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basics/brandmodel" class="nav-link {{ Request::is('basics/brandmodel', 'basics/brandmodel/*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>รุ่นผลิตภัณฑ์</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basics/building" class="nav-link {{ Request::is('basics/building', 'basics/building/*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ชื่ออาคาร</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basics/common" class="nav-link {{ Request::is('basics/common' , 'basics/common/*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ชื่อครุภัณฑ์</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basics/type" class="nav-link {{ Request::is('basics/type', 'basics/type/*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ประเภทครุภัณฑ์</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basics/subtype" class="nav-link {{ Request::is('basics/subtype', 'basics/subtype/*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>ประเภทครุภัณฑ์ย่อย</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/basics/usage" class="nav-link {{ Request::is('basics/usage', 'basics/usage/*') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>การใช้งานครุภัณฑ์</p>
            </a>
        </li>
    </ul>
</li>
@endif