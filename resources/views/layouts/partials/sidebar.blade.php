<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('welcome')}}" class="brand-link">
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
                <a href="{{route('user.index')}}" class="d-block">{{$user->nv_hoTen}}</a>
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
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
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
            @can('viewAny', App\NhanVien::class)
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
                        <a href="{{route('admin.thongtinchung.create')}}" class="nav-link">
                            <i class="fas fa-user-plus nav-icon"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('view', App\User::class)
            <li class="nav-header">Quản lý thông tin nhân viên</li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/thongtinchung')||request()->is('admin/thongtinchung/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Thông tin chung
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.thongtinchung.index')}}" class="{{ request()->is('admin/thongtinchung')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.thongtinchung.create')}}" class="{{ request()->is('admin/thongtinchung/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('admin')
            <li class="nav-item has-treeview">
                <a href="#" class="{{ (request()->is('admin/quanhegiadinh'))?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Quan hệ gia đình
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.quanhegiadinh.index')}}" class="{{ request()->is('admin/quanhegiadinh')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.quanhegiadinh.create')}}" class="{{ request()->is('admin/quanhegiadinh/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('admin')
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
            @endcan
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
            @can('viewAny', App\QuaTrinhCongTac::class)
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/quatrinhcongtac')||request()->is('admin/quatrinhcongtac/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-briefcase"></i>
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
            @endcan
            @can('viewAny', App\TuyenDung::class)
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/tuyendung')||request()->is('admin/tuyendung/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        Tuyển dụng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.tuyendung.index')}}" class="{{ request()->is('admin/tuyendung')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.tuyendung.create')}}" class="{{ request()->is('admin/tuyendung/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('view', App\QueQuan::class)
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/quequan')||request()->is('admin/quequan/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-map-marker-alt"></i>
                    <p>
                        Quê quán
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.quequan.index')}}" class="{{ request()->is('admin/quequan')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.quequan.create')}}" class="{{ request()->is('admin/quequan/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('view', App\NoiSinh::class)
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/noisinh')||request()->is('admin/noisinh/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-baby"></i>
                    <p>
                        Nơi sinh
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.noisinh.index')}}" class="{{ request()->is('admin/noisinh')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.noisinh.create')}}" class="{{ request()->is('admin/noisinh/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('view', App\LichSuBanThan::class)
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/lichsubanthan')||request()->is('admin/lichsubanthan/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-history"></i>
                    <p>
                        Lịch sử bản thân
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.lichsubanthan.index')}}" class="{{ request()->is('admin/lichsubanthan')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.lichsubanthan.create')}}" class="{{ request()->is('admin/lichsubanthan/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('admin')
            <li class="nav-header">Quản lý thông tin chung</li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/chucvu')||request()->is('admin/chucvu/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Chức vụ
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.chucvu.index')}}" class="{{ request()->is('admin/chucvu')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.chucvu.create')}}" class="{{ request()->is('admin/chucvu/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/congviec')||request()->is('admin/congviec/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Công việc
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.congviec.index')}}" class="{{ request()->is('admin/congviec')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.congviec.create')}}" class="{{ request()->is('admin/congviec/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/dantoc')||request()->is('admin/dantoc/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Dân tộc
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.dantoc.index')}}" class="{{ request()->is('admin/dantoc')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.dantoc.create')}}" class="{{ request()->is('admin/dantoc/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/tongiao')||request()->is('admin/tongiao/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Tôn giáo
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.tongiao.index')}}" class="{{ request()->is('admin/tongiao')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.tongiao.create')}}" class="{{ request()->is('admin/tongiao/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/donvi')||request()->is('admin/donvi/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Đơn vị
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.donvi.index')}}" class="{{ request()->is('admin/donvi')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.donvi.create')}}" class="{{ request()->is('admin/donvi/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/donviquanly')||request()->is('admin/donviquanly/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Đơn vị quản lý
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.donviquanly.index')}}" class="{{ request()->is('admin/donviquanly')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.donviquanly.create')}}" class="{{ request()->is('admin/donviquanly/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/tinh')||request()->is('admin/tinh/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Tỉnh
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.tinh.index')}}" class="{{ request()->is('admin/tinh')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.tinh.create')}}" class="{{ request()->is('admin/tinh/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/huyen')||request()->is('admin/huyen/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Huyện
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.huyen.index')}}" class="{{ request()->is('admin/huyen')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.huyen.create')}}" class="{{ request()->is('admin/huyen/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/xa')||request()->is('admin/xa/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Xã
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.xa.index')}}" class="{{ request()->is('admin/xa')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.xa.create')}}" class="{{ request()->is('admin/xa/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/loaivbcc')||request()->is('admin/loaivbccxa/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Loại văn bằng chứng chỉ
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.loaivbcc.index')}}" class="{{ request()->is('admin/loaivbcc')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.loaivbcc.create')}}" class="{{ request()->is('admin/loaivbcc/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/phucap')||request()->is('admin/phucap/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Phụ cấp
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.phucap.index')}}" class="{{ request()->is('admin/phucap')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.phucap.create')}}" class="{{ request()->is('admin/phucap/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="{{ request()->is('admin/role')||request()->is('admin/role/*')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Role
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.role.index')}}" class="{{ request()->is('admin/role')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.role.create')}}" class="{{ request()->is('admin/role/*')?'active nav-link':'nav-link' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('admin')
            <li class="nav-header">Thống kê thông tin nhân viên</li>
            <li class="nav-item">
                <a href="{{route('admin.thongke.index')}}" class="{{ request()->is('admin/thongke')?'active nav-link':'nav-link' }}">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        Thống kê
                    </p>
                </a>
            </li>
            @endcan
            <li class="nav-header">Liên hệ với quản trị viên</li>
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