@extends('layouts.master')
@section('title')
Thêm mới thông tin chung
@endsection
@section('custom-css')
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.vanbang.index')}}">Danh sách thông tin chung</a></li>
    <li class="breadcrumb-item active">Thêm mới thông tin chung</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="thongtinthemmoiController" ng-init="nv_ma = '{{old('nv_ma')}}';">
    @if (Session::has('alert'))
    <div aria-live="polite" aria-atomic="true" class="flex-column justify-content-center align-items-center" style="position: fixed; top:0; right:0; z-index: 100000;">
        <div class="toast bg-success m-2" data-delay="2000" role="alert" aria-live="assertive" aria-atomic="true" style="width: 400px;">
            <div class="toast-header">
                <img src="{{asset('storage/images/shin.gif')}}" class="rounded mr-2 bg-light" height="30px" alt="...">
                <strong class="mr-auto">Thành công</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{Session::get('alert')}}
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-cyan h1 font-weight-bold">Thêm mới thông tin chung</div>
                <div class="card-body">
                    <form name="frmCreate" id="frmCreate" method="POST" action="{{route('admin.thongtinchung.store')}}" novalidate>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nv_ma">Mã cán bộ :</label>
                            <input type="text" id="nv_ma" name="nv_ma" ng-model="nv_ma" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hình đại diện :</label>
                            <div class="file-loading">
                                <input id="nv_anh" type="file" name="nv_anh" ng-model="nv_anh">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_hoTen">Họ và tên :</label>
                            <input type="text" id="nv_hoTen" name="nv_hoTen" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nv_tenGoiKhac">Tên gọi khác :</label>
                            <input type="text" id="nv_tenGoiKhac" name="nv_tenGoiKhac" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nv_trinhDoChuyenMon">Trình độ chuyên môn :</label>
                            <input type="text" id="nv_trinhDoChuyenMon" name="nv_trinhDoChuyenMon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nv_ngaySinh">Ngày sinh :</label>
                            <input type="date" id="nv_ngaySinh" name="nv_ngaySinh" class="form-control">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="dt_ma">Dân tộc :</label>
                                <select name="dt_ma" id="dt_ma" class="form-control">
                                    <option value=""></option>
                                    @foreach($dsdt as $dt)
                                    <option value="{{$dt->dt_ma}}">{{$dt->dt_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tg_ma">Tôn giáo :</label>
                                <select name="tg_ma" id="tg_ma" class="form-control">
                                    <option value=""></option>
                                    @foreach($dstg as $tg)
                                    <option value="{{$tg->tg_ma}}">{{$tg->tg_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_hoKhauThuongTru">Hộ khẩu thường trú :</label>
                            <input type="text" id="nv_hoKhauThuongTru" name="nv_hoKhauThuongTru" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nv_noiOHienNay">Nơi ở hiện nay :</label>
                            <input type="text" id="nv_noiOHienNay" name="nv_noiOHienNay" class="form-control">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="nv_ngayVaoDang">Ngày vào Đảng :</label>
                                <input type="date" id="nv_ngayVaoDang" name="nv_ngayVaoDang" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="nv_ngayVaoDangChinhThuc">Ngày vào Đảng chính thức :</label>
                                <input type="date" id="nv_ngayVaoDangChinhThuc" name="nv_ngayVaoDangChinhThuc" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="nv_ngayNhapNgu">Ngày nhập ngũ :</label>
                                <input type="date" id="nv_ngayNhapNgu" name="nv_ngayNhapNgu" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="nv_ngayXuatNgu">Ngày xuất ngũ :</label>
                                <input type="date" id="nv_ngayXuatNgu" name="nv_ngayXuatNgu" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="nv_quanHam">Quân hàm :</label>
                                <input type="text" id="nv_quanHam" name="nv_quanHam" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="nv_sucKhoe">Sức khỏe :</label>
                                <input type="text" id="nv_sucKhoe" name="nv_sucKhoe" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="nv_chieuCao">Chiều cao :</label>
                                <input type="text" id="nv_chieuCao" name="nv_chieuCao" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="nv_canNang">Cân nặng :</label>
                                <input type="text" id="nv_canNang" name="nv_canNang" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="nm_ma">Nhóm máu :</label>
                                <select name="nm_ma" id="nm_ma" class="form-control">
                                    <option value=""></option>
                                    @foreach($dsnm as $nm)
                                    <option value="{{$nm->nm_ma}}">{{$nm->nm_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_hangThuongBinh">Hạng thương binh :</label>
                            <input type="text" id="nv_hangThuongBinh" name="nv_hangThuongBinh" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nv_giaDinhChinhSach">Gia đình chính sách :</label>
                            <input list="giaDinhChinhSach" id="nv_giaDinhChinhSach" name="nv_giaDinhChinhSach" class="form-control">
                            <datalist id="giaDinhChinhSach">
                                <option value="Con thương binh">
                                <option value="Con liệt sĩ">
                                <option value="Người nhiễm chất độc da cam Dioxin">
                            </datalist>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="nv_cmnd">CMND/CCCD :</label>
                                <input type="text" id="nv_cmnd" name="nv_cmnd" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="nv_cmndNgayCap">Ngày cấp :</label>
                                <input type="date" id="nv_cmndNgayCap" name="nv_cmndNgayCap" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_bhxh">Bảo hiểm xã hội :</label>
                            <input type="text" id="nv_bhxh" name="nv_bhxh" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="td_ma">Trình độ :</label>
                            <select name="td_ma" id="td_ma" class="form-control">
                                <option value=""></option>
                                @foreach($dstd as $td)
                                <option value="{{$td->td_ma}}">{{$td->td_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="username">Tên đăng nhập :</label>
                                <input type="text" id="username" name="username" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="password">Mật khẩu ban đầu :</label>
                                <input type="text" id="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="nv_sdt">Số điện thoại :</label>
                                <input type="text" id="nv_sdt" name="nv_sdt" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="nv_email">Email :</label>
                                <input type="text" id="nv_email" name="nv_email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role_ma">Quyền :</label>
                            <select id="role_ma" name="role_ma" class="form-control">
                                <option value=""></option>
                                @foreach($dsrole as $role)
                                <option value="{{$role->role_ma}}">{{$role->role_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cvu_ma">Chức vụ :</label>
                            <select id="cvu_ma" name="cvu_ma" class="form-control">
                                <option value=""></option>
                                @foreach($dscvu as $cvu)
                                <option value="{{$cvu->cvu_ma}}">{{$cvu->cvu_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nv_gioiTinh">Giới tính :</label>
                            <select id="nv_gioiTinh" name="nv_gioiTinh" class="form-control">
                                <option value=""></option>
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmCreate.$invalid">Thêm mới</button>
                            <a href="{{route('admin.vanbang.index')}}" class="btn btn-secondary">Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
<script>
    $('.toast').toast('show');
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $(document).ready(function() {
        $("#nv_anh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
        });
    });
    app.controller('thongtinthemmoiController', function($scope, $http) {});
</script>
@endsection