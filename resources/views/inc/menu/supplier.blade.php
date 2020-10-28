<li class="nav-item has-treeview {{ Request::is('supplier*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('supplier*') ? 'active' : '' }}">
        <p>
            ผู้แทนจำหน่าย
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/supplier" class="nav-link {{ Request::is('supplier') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/supplier/create" class="nav-link {{ Request::is('supplier/create') ? 'active' : '' }}">
                <i class="fas fa-edit nav-icon"></i>
                <p>Create</p>
            </a>
        </li>
    </ul>
</li>