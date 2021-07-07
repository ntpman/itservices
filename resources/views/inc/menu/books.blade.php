<li class="nav-item has-treeview {{ Request::is('books*') ? 'menu-open' : '' }} " style="background-color:rgb(9, 44, 109)" >
    <a href="#" class="nav-link {{ Request::is('books*') ? 'active' : '' }}">
        <p>
            ทะเบียนรับหนังสือ ทส.สท.
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="background-color:rgb(61, 72, 121)">
        <li class="nav-item" >
            <a href="/books/listAllBooks" class="nav-link {{ Request::is('books/listAllBooks') ? 'active' : '' }}">
                <i class="far fa-file-alt nav-icon"></i>
                <p>แสดงหนังสือทั้งหมด</p>
            </a>
        </li>
    @if (Auth::user()->position=='หัวหน้างานธุรการ' || Auth::user()->position == 'ธุรการกลุ่ม')
        <li class="nav-item">
            <a href="/books/addNewBooks" class="nav-link {{ Request::is('books/addNewBooks') ? 'active' : '' }}">
                <i class="far fa-plus-square nav-icon"></i>
                <p>ลงทะเบียนรับหนังสือ</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/books/editBooks" class="nav-link {{ Request::is('books/editBooks') ? 'active' : '' }}">
                <i class="far fa-edit nav-icon"></i>
                <p>แก้ไขข้อมูล</p>
            </a>
        </li>
    @endif
    </ul>
</li>