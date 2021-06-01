<li class="nav-item has-treeview {{ Request::is('public*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('public*') ? 'active' : '' }}">
        <p>สำหรับเจ้าหน้าที่ ทส.
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="http://tucker.dss.local/itservices/" target="_blank" class="nav-link {{ Request::is('public/itservices') ? 'active' : '' }}">
                <i class="fas fa-wifi nav-icon"></i>
                <p>เพิ่มบัญชี WiFi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="http://sean.dss.local/it-wiki/" target="_blank" class="nav-link {{ Request::is('public/it-wiki') ? 'active' : '' }}">
                <i class="fab fa-leanpub nav-icon"></i>
                <p>คู่มือปฏิบัติงานด้านไอที</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="http://watson.dss.local/cacti/" target="_blank" class="nav-link {{ Request::is('public/cacti') ? 'active' : '' }}">
                <i class="fas fa-network-wired nav-icon"></i>
                <p>Network Monitoring</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="http://jiffy.dss.local/" class="nav-link {{ Request::is('public/vSphere') ? 'active' : '' }}">
                <i class="fas fa-server nav-icon"></i>
                <p>vSphere Web Client</p>
            </a>
        </li>
    </ul>
</li>