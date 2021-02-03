<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('themes/AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Quản lý nhân sự</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('themes/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('admin') }}" class="{{ request()->is('admin')?'active nav-link':'nav-link' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="{{ request()->is('admin/nhanvien')?'active nav-link':'nav-link' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Nhân viên
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.nhanvien.index') }}" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>                        
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="fas fa-search nav-icon"></i>
                                <p>Tìm kiếm</p>
                            </a>
                        </li>
                    </ul>
                 
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="{{ request()->is('admin/khenthuong')?'active nav-link':'nav-link' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Khen thưởng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.khenthuong.index') }}" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>                        
                    </ul>
                 
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="{{ request()->is('admin/khenthuong')?'active nav-link':'nav-link' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kỷ luật
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.kyluat.index') }}" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>                        
                    </ul>
                 
                </li>
                
               
                
                <li class="nav-item has-treeview">
                    <a href="#" class="{{ request()->is('admin/thongke')?'active nav-link':'nav-link' }}">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Thống kê
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.lienhe') }}" class="{{ request()->is('admin/lienhe')?'active nav-link':'nav-link' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Liên hệ
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>