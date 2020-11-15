<li class="nav-item has-treeview {{ Request::is('assets*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('assets*') ? 'active' : '' }}">
        <p>
            คลังครุภัณฑ์
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/assets/asset" class="nav-link {{ Request::is('assets/asset') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/assets/asset/create" class="nav-link {{ Request::is('assets/asset/create') ? 'active' : '' }}">
                <i class="fas fa-plus nav-icon"></i>
                <p>Create</p>
            </a>
        </li>
    </ul>
</li>