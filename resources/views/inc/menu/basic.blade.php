<li class="nav-item has-treeview {{ Request::is('basic*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('basic*') ? 'active' : '' }}">
        <p>
            ข้อมูลพื้นฐานของระบบ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/brand" class="nav-link {{ Request::is('basic') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/model" class="nav-link {{ Request::is('basic/create') ? 'active' : '' }}">
                <i class="fas fa-edit nav-icon"></i>
                <p>Create</p>
            </a>
        </li>
    </ul>
</li>