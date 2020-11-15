<li class="nav-item has-treeview {{ Request::is('assets/supplier*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('assets/supplier*') ? 'active' : '' }}">
        <p>
            ผู้แทนจำหน่าย
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/assets/supplier" class="nav-link {{ Request::is('assets/supplier') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/assets/supplier/create" class="nav-link {{ Request::is('assets/supplier/create') ? 'active' : '' }}">
                <i class="fas fa-plus nav-icon"></i>
                <p>Create</p>
            </a>
        </li>
    </ul>
</li>