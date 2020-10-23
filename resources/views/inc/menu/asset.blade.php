<li class="nav-item has-treeview {{ Request::is('assets*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('assets*') ? 'active' : '' }}">
        <p>
            Asset
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/assets/asset" class="nav-link {{ Request::is('asset/asset') ? 'active' : '' }}">
                <i class="fas fa-database nav-icon"></i>
                <p>Asset</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/assets/picture" class="nav-link {{ Request::is('asset/picture') ? 'active' : '' }}">
                <i class="far fa-images nav-icon"></i>
                <p>Picture</p>
            </a>
        </li>
    </ul>
</li>