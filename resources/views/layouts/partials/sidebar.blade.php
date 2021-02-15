<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('storage/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light h3"><b>Shin</b>HRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                if (Session::has('user')) :
                    $user = Session::get('user')[0];;
                ?>
                    <img src="{{ Storage::exists('public/avatar/' . $user->nv_anh) ? asset('storage/avatar/' . $user->nv_anh) : asset('storage/avatar/default.png') }}" class="img-circle elevation-2 bg-white" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$user->nv_hoTen}}</a>
            </div>
        <?php
                else :
        ?>
            <img src="#" class="img-circle elevation-2 bg-white" alt="User">
        </div>
        <div class="info">
            <a href="#" class="d-block"></a>
        </div>
    <?php
                endif;
    ?>
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
            @can('viewAny', App\VBCC::class)
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/nhanvien')||request()->is('admin/nhanvien/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Nhân viên
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.nhanvien.index') }}" class="{{ request()->is('admin/nhanvien')?'active nav-link':'nav-link' }}">
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
                </ul>
            </li>
            @endcan
            <li class="nav-item has-treeview">
                <a href="#" class="{{ (request()->is('admin/quanhegiadinh'))?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-medal"></i>
                    <p>
                        Quan hệ gia đình
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.quanhegiadinh.index') }}" class="{{ request()->is('admin/quanhegiadinh')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>Quan hệ gia đình</p>
                            <i class="right ple ple-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.quanhegiadinh.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/flot.html" class="nav-link">
                                    <i class="nav-icon fas fa-plus-circle"></i>
                                    <p>Thêm mới</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ (request()->is('admin/khenthuong')||request()->is('admin/kyluat'))||(request()->is('admin/khenthuong/*')||request()->is('admin/kyluat/*'))?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-medal"></i>
                    <p>
                        Khen thưởng/kỷ luật
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.khenthuong.index') }}" class="{{ request()->is('admin/khenthuong')||request()->is('admin/khenthuong/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>Khen thưởng
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.khenthuong.index') }}" class="{{ request()->is('admin/khenthuong')?'active nav-link':'nav-link' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.khenthuong.create') }}" class="{{ request()->is('admin/khenthuong/create')?'active nav-link':'nav-link' }}">
                                    <i class="nav-icon fas fa-plus-circle"></i>
                                    <p>Thêm mới</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.kyluat.index') }}" class="{{ request()->is('admin/kyluat')||request()->is('admin/kyluat/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-exclamation-circle"></i>
                            <p>Kỷ luật
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.kyluat.index') }}" class="{{ request()->is('admin/kyluat')?'active nav-link':'nav-link' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.kyluat.create') }}" class="{{ request()->is('admin/kyluat/create')?'active nav-link':'nav-link' }}">
                                    <i class="nav-icon fas fa-plus-circle"></i>
                                    <p>Thêm mới</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @can('viewAny', App\VBCC::class)
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/vanbang')||request()->is('admin/vanbang/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Văn bằng/Chứng chỉ
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.vanbang.index')}}" class="{{ request()->is('admin/vanbang')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.vanbang.create_id')}}" class="{{ request()->is('admin/vanbang/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('view', App\Luong::class)
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/luong')||request()->is('admin/luong/*')?'active nav-link':'nav-link' }}">
                <i class="nav-icon fas fa-money-bill-wave"></i>
                    <p>
                        Lương/phụ cấp
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.luong.index')}}" class="{{ request()->is('admin/luong')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.luong.create')}}" class="{{ request()->is('admin/luong/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/quatrinhcongtac')||request()->is('admin/quatrinhcongtac/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Quá trình công tác
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.quatrinhcongtac.index')}}" class="{{ request()->is('admin/quatrinhcongtac')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.quatrinhcongtac.create_id')}}" class="{{ request()->is('admin/quatrinhcongtac/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @can('xemThongKe')
            <li class="nav-item">
                <a href="#" class="{{ request()->is('admin/thongke')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        Thống kê
                    </p>
                </a>
            </li>
            @endcan
            <li class="nav-item">
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