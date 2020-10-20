<li class="nav-item has-treeview {{ Request::is('asset*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('asset*') ? 'active' : '' }}">
        <p>
            Asset
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/asset" class="nav-link {{ Request::is('asset') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/asset/create" class="nav-link {{ Request::is('asset/create') ? 'active' : '' }}">
                <i class="fas fa-edit nav-icon"></i>
                <p>Create</p>
            </a>
        </li>
    </ul>
</li>