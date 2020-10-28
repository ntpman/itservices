<li class="nav-item has-treeview {{ Request::is('admin/users*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
        <p>
            ผู้ใช้งานระบบ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/admin/users" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}">
                <i class="fas fa-users nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/admin/users/create" class="nav-link {{ Request::is('admin/users/create') ? 'active' : '' }}">
                <i class="fas fa-user-edit nav-icon"></i>
                <p>Create</p>
            </a>
        </li>
    </ul>
</li>