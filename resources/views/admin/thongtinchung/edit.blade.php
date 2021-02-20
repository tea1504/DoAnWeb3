@extends('layouts.master')
@section('title')
Cập nhật thông tin chung
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
    <li class="breadcrumb-item"><a href="{{route('admin.thongtinchung.index')}}">Danh sách thông tin chung</a></li>
    <li class="breadcrumb-item active">Cập nhật thông tin chung</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="thongtinthemmoiController" ng-init="nv_hoTen = '{{old('nv_hoTen', $ttc->nv_hoTen)}}'; nv_tenGoiKhac = '{{old('nv_tenGoiKhac', $ttc->nv_tenGoiKhac)}}'; nv_trinhDoChuyenMon = '{{old('nv_trinhDoChuyenMon', $ttc->nv_trinhDoChuyenMon)}}'; dt_ma = '{{old('dt_ma', $ttc->dt_ma)}}'; tg_ma = '{{old('tg_ma', $ttc->tg_ma)}}'; nv_hoKhauThuongTru = '{{old('nv_hoKhauThuongTru', $ttc->nv_hoKhauThuongTru)}}'; nv_noiOHienNay = '{{old('nv_noiOHienNay', $ttc->nv_noiOHienNay)}}'; nv_quanHam = '{{old('nv_quanHam', $ttc->nv_quanHam)}}'; nv_sucKhoe = '{{old('nv_sucKhoe', $ttc->nv_sucKhoe)}}'; nv_chieuCao = '{{old('nv_chieuCao', $ttc->nv_chieuCao)}}'; nv_canNang = '{{old('nv_canNang', $ttc->nv_canNang)}}'; nm_ma = '{{old('nm_ma', $ttc->nm_ma)}}'; nv_hangThuongBinh = '{{old('nv_hangThuongBinh', $ttc->nv_hangThuongBinh)}}'; nv_giaDinhChinhSach = '{{old('nv_giaDinhChinhSach', $ttc->nv_giaDinhChinhSach)}}'; nv_cmnd = '{{old('nv_cmnd', $ttc->nv_cmnd)}}';  nv_bhxh = '{{old('nv_bhxh', $ttc->nv_bhxh)}}'; td_ma = '{{old('td_ma', $ttc->td_ma)}}'; username = '{{old('username', $ttc->username)}}'; password = '{{old('password', $ttc->password)}}'; nv_sdt = '{{old('nv_sdt', $ttc->nv_sdt)}}'; nv_email = '{{old('nv_email', $ttc->nv_email)}}'; role_ma = '{{old('role_ma', $ttc->role_ma)}}'; cvu_ma = '{{old('cvu_ma', $ttc->cvu_ma)}}'; nv_gioiTinh = '{{old('nv_gioiTinh', $ttc->nv_gioiTinh)}}';">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Cập nhật thông tin chung</div>
                <div class="card-body">
                    <form name="frmEdit" id="frmEdit" method="POST" action="{{route('admin.thongtinchung.update', ['id'=>$ttc->nv_ma])}}" enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="nv_ma" value="{{$ttc->nv_ma}}">
                        <div class="form-group">
                            <label for="nv_ma">Mã cán bộ :</label>
                            <input type="text" value="{{$ttc->nv_ma}}" class="form-control" disabled>
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_ma.$error.required">Bạn phải nhập vào trường này</span>
                                <span ng-show="frmEdit.nv_ma.$error.pattern || frmEdit.nv_ma.$error.maxlength">Bạn nhập sai định dạng</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <img src="{{ Storage::exists('public/avatar/' . $ttc->nv_anh) && ($ttc->nv_anh!=null) ? asset('storage/avatar/' . $ttc->nv_anh) : asset('storage/avatar/default.png') }}" class="border bg-white img-fluid" height="100px" alt="User Image">
                            </div>
                            <div class="col-md-9">
                                <label>Hình đại diện :</label>
                                <div class="file-loading">
                                    <input type="file" id="nv_anh" name="nv_anh">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_hoTen">Họ và tên :</label>
                            <input type="text" id="nv_hoTen" name="nv_hoTen" ng-model="nv_hoTen" ng-class="['form-control', frmEdit.nv_hoTen.$valid?'is-valid':'is-invalid']" ng-required="true" ng-minlength="3" ng-maxlength="50">
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_hoTen.$error.required">Bạn phải nhập vào trường này</span>
                                <span ng-show="frmEdit.nv_hoTen.$error.maxlength">Bạn nhập quá dài</span>
                                <span ng-show="frmEdit.nv_hoTen.$error.minlength">Bạn nhập quá ngắn</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_tenGoiKhac">Tên gọi khác :</label>
                            <input type="text" id="nv_tenGoiKhac" name="nv_tenGoiKhac" ng-model="nv_tenGoiKhac" ng-class="['form-control', frmEdit.nv_tenGoiKhac.$valid?'is-valid':'is-invalid']" ng-minlength="3" ng-maxlength="50">
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_tenGoiKhac.$error.maxlength">Bạn nhập quá dài</span>
                                <span ng-show="frmEdit.nv_tenGoiKhac.$error.minlength">Bạn nhập quá ngắn</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_trinhDoChuyenMon">Trình độ chuyên môn :</label>
                            <input type="text" id="nv_trinhDoChuyenMon" name="nv_trinhDoChuyenMon" ng-model="nv_trinhDoChuyenMon" ng-class="['form-control', frmEdit.nv_trinhDoChuyenMon.$valid?'is-valid':'is-invalid']" ng-minlength="3" ng-maxlength="255">
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_trinhDoChuyenMon.$error.maxlength">Bạn nhập quá dài</span>
                                <span ng-show="frmEdit.nv_trinhDoChuyenMon.$error.minlength">Bạn nhập quá ngắn</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_ngaySinh">Ngày sinh :</label>
                            <input type="date" id="nv_ngaySinh" name="nv_ngaySinh" ng-model="nv_ngaySinh" ng-class="['form-control', frmEdit.nv_ngaySinh.$valid?'is-valid':'is-invalid']" ng-required="true">
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_ngaySinh.$error.required">Bạn phải nhập vào trường này</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="dt_ma">Dân tộc :</label>
                                <select name="dt_ma" id="dt_ma" ng-model="dt_ma" ng-class="['form-control', frmEdit.dt_ma.$valid?'is-valid':'is-invalid']" ng-required="true">
                                    <option value=""></option>
                                    @foreach($dsdt as $dt)
                                    <option value="{{$dt->dt_ma}}">{{$dt->dt_ten}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.dt_ma.$error.required">Bạn phải nhập vào trường này</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="tg_ma">Tôn giáo :</label>
                                <select name="tg_ma" id="tg_ma" ng-model="tg_ma" ng-class="['form-control', frmEdit.tg_ma.$valid?'is-valid':'is-invalid']" ng-required="true">
                                    <option value=""></option>
                                    @foreach($dstg as $tg)
                                    <option value="{{$tg->tg_ma}}">{{$tg->tg_ten}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.tg_ma.$error.required">Bạn phải nhập vào trường này</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_hoKhauThuongTru">Hộ khẩu thường trú :</label>
                            <input type="text" id="nv_hoKhauThuongTru" name="nv_hoKhauThuongTru" ng-model="nv_hoKhauThuongTru" ng-class="['form-control', frmEdit.nv_hoKhauThuongTru.$valid?'is-valid':'is-invalid']" ng-required="true" ng-minlength="3" ng-maxlength="200">
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_hoKhauThuongTru.$error.required">Bạn phải nhập vào trường này</span>
                                <span ng-show="frmEdit.nv_hoKhauThuongTru.$error.maxlength">Bạn nhập quá dài</span>
                                <span ng-show="frmEdit.nv_hoKhauThuongTru.$error.minlength">Bạn nhập quá ngắn</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_noiOHienNay">Nơi ở hiện nay :</label>
                            <input type="text" id="nv_noiOHienNay" ng-model="nv_noiOHienNay" name="nv_noiOHienNay" ng-class="['form-control', frmEdit.nv_noiOHienNay.$valid?'is-valid':'is-invalid']" ng-required="true" ng-minlength="3" ng-maxlength="200">
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_noiOHienNay.$error.required">Bạn phải nhập vào trường này</span>
                                <span ng-show="frmEdit.nv_noiOHienNay.$error.maxlength">Bạn nhập quá dài</span>
                                <span ng-show="frmEdit.nv_noiOHienNay.$error.minlength">Bạn nhập quá ngắn</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="nv_ngayVaoDang">Ngày vào Đảng :</label>
                                <input type="date" id="nv_ngayVaoDang" name="nv_ngayVaoDang" ng-model="nv_ngayVaoDang" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="nv_ngayVaoDangChinhThuc">Ngày vào Đảng chính thức :</label>
                                <input type="date" id="nv_ngayVaoDangChinhThuc" name="nv_ngayVaoDangChinhThuc" ng-model="nv_ngayVaoDangChinhThuc" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="nv_ngayNhapNgu">Ngày nhập ngũ :</label>
                                <input type="date" id="nv_ngayNhapNgu" name="nv_ngayNhapNgu" ng-model="nv_ngayNhapNgu" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="nv_ngayXuatNgu">Ngày xuất ngũ :</label>
                                <input type="date" id="nv_ngayXuatNgu" name="nv_ngayXuatNgu" ng-model="nv_ngayXuatNgu" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="nv_quanHam">Quân hàm :</label>
                                <input type="text" id="nv_quanHam" name="nv_quanHam" ng-model="nv_quanHam" ng-class="['form-control', frmEdit.nv_quanHam.$valid?'is-valid':'is-invalid']" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.nv_quanHam.$error.maxlength">Bạn nhập quá dài</span>
                                    <span ng-show="frmEdit.nv_quanHam.$error.minlength">Bạn nhập quá ngắn</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="nv_sucKhoe">Sức khỏe :</label>
                                <input type="text" id="nv_sucKhoe" name="nv_sucKhoe" ng-model="nv_sucKhoe" ng-class="['form-control', frmEdit.nv_sucKhoe.$valid?'is-valid':'is-invalid']" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.nv_sucKhoe.$error.maxlength">Bạn nhập quá dài</span>
                                    <span ng-show="frmEdit.nv_sucKhoe.$error.minlength">Bạn nhập quá ngắn</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="nv_chieuCao">Chiều cao :</label>
                                <input type="text" id="nv_chieuCao" name="nv_chieuCao" ng-model="nv_chieuCao" ng-class="['form-control', frmEdit.nv_chieuCao.$valid?'is-valid':'is-invalid']" ng-required="true" ng-pattern="/^((\d+(\.\d*)?)|(\.\d+))$/">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.nv_chieuCao.$error.required">Bạn phải nhập vào trường này</span>
                                    <span ng-show="frmEdit.nv_chieuCao.$error.pattern">Bạn nhập sai định dạng</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="nv_canNang">Cân nặng :</label>
                                <input type="text" id="nv_canNang" name="nv_canNang" ng-model="nv_canNang" ng-class="['form-control', frmEdit.nv_canNang.$valid?'is-valid':'is-invalid']" ng-required="true" ng-pattern="/^((\d+(\.\d*)?)|(\.\d+))$/">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.nv_canNang.$error.required">Bạn phải nhập vào trường này</span>
                                    <span ng-show="frmEdit.nv_canNang.$error.pattern">Bạn nhập sai định dạng</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="nm_ma">Nhóm máu :</label>
                                <select name="nm_ma" id="nm_ma" ng-model="nm_ma" ng-class="['form-control', frmEdit.nm_ma.$valid?'is-valid':'is-invalid']" ng-required="true">
                                    <option value=""></option>
                                    @foreach($dsnm as $nm)
                                    <option value="{{$nm->nm_ma}}">{{$nm->nm_ten}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.nm_ma.$error.required">Bạn phải nhập vào trường này</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_hangThuongBinh">Hạng thương binh :</label>
                            <input type="text" id="nv_hangThuongBinh" name="nv_hangThuongBinh" ng-model="nv_hangThuongBinh" ng-class="['form-control', frmEdit.nv_hangThuongBinh.$valid?'is-valid':'is-invalid']" ng-minlength="3" ng-maxlength="100">
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_hangThuongBinh.$error.maxlength">Bạn nhập quá dài</span>
                                <span ng-show="frmEdit.nv_hangThuongBinh.$error.minlength">Bạn nhập quá ngắn</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_giaDinhChinhSach">Gia đình chính sách :</label>
                            <input list="giaDinhChinhSach" id="nv_giaDinhChinhSach" name="nv_giaDinhChinhSach" ng-model="nv_giaDinhChinhSach" ng-class="['form-control', frmEdit.nv_giaDinhChinhSach.$valid?'is-valid':'is-invalid']" ng-minlength="3" ng-maxlength="100">
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_giaDinhChinhSach.$error.maxlength">Bạn nhập quá dài</span>
                                <span ng-show="frmEdit.nv_giaDinhChinhSach.$error.minlength">Bạn nhập quá ngắn</span>
                            </div>
                            <datalist id="giaDinhChinhSach">
                                <option value="Con thương binh">
                                <option value="Con liệt sĩ">
                                <option value="Người nhiễm chất độc da cam Dioxin">
                            </datalist>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="nv_cmnd">CMND/CCCD :</label>
                                <input type="text" id="nv_cmnd" name="nv_cmnd" ng-model="nv_cmnd" ng-class="['form-control', frmEdit.nv_cmnd.$valid?'is-valid':'is-invalid']" ng-required="true" ng-pattern="/^\d{12}$/" data-toggle="tooltip" data-placement="top" title="Điền vào 12 chữ số" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"></div></div>'>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.nv_cmnd.$error.required">Bạn phải nhập vào trường này</span>
                                    <span ng-show="frmEdit.nv_cmnd.$error.pattern">Bạn nhập sai định dạng</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="nv_cmndNgayCap">Ngày cấp :</label>
                                <input type="date" id="nv_cmndNgayCap" name="nv_cmndNgayCap" ng-model="nv_cmndNgayCap" ng-class="['form-control', frmEdit.nv_cmndNgayCap.$valid?'is-valid':'is-invalid']" ng-required="true">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.nv_cmndNgayCap.$error.required">Bạn phải nhập vào trường này</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_bhxh">Bảo hiểm xã hội :</label>
                            <input type="text" id="nv_bhxh" name="nv_bhxh" ng-model="nv_bhxh" ng-class="['form-control', frmEdit.nv_bhxh.$valid?'is-valid':'is-invalid']" ng-required="true" ng-pattern="/^\d{10}$/" data-toggle="tooltip" data-placement="top" title="Điền vào 10 chữ số" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"></div></div>'>
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_bhxh.$error.required">Bạn phải nhập vào trường này</span>
                                <span ng-show="frmEdit.nv_bhxh.$error.pattern">Bạn nhập sai định dạng</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="td_ma">Trình độ :</label>
                            <select name="td_ma" id="td_ma" ng-model="td_ma" ng-class="['form-control', frmEdit.td_ma.$valid?'is-valid':'is-invalid']" ng-required="true">
                                <option value=""></option>
                                @foreach($dstd as $td)
                                <option value="{{$td->td_ma}}">{{$td->td_ten}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.td_ma.$error.required">Bạn phải nhập vào trường này</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="nv_sdt">Số điện thoại :</label>
                                <input type="text" id="nv_sdt" name="nv_sdt" ng-model="nv_sdt" ng-class="['form-control', frmEdit.nv_sdt.$valid?'is-valid':'is-invalid']" ng-required="true" ng-pattern="/^0\d{9}$/" data-toggle="tooltip" data-placement="top" title="Điền vào 10 chữ số và số 0 đứng đầu" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"></div></div>'>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.nv_sdt.$error.required">Bạn phải nhập vào trường này</span>
                                    <span ng-show="frmEdit.nv_sdt.$error.pattern">Bạn nhập sai định dạng</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="nv_email">Email :</label>
                                <input type="text" id="nv_email" name="nv_email" ng-model="nv_email" ng-class="['form-control', frmEdit.nv_email.$valid?'is-valid':'is-invalid']" ng-required="true" ng-pattern="/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i" data-toggle="tooltip" data-placement="top" title="Nhập đúng định dạng email" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"></div></div>'>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.nv_email.$error.required">Bạn phải nhập vào trường này</span>
                                    <span ng-show="frmEdit.nv_email.$error.pattern">Bạn nhập sai định dạng</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role_ma">Quyền :</label>
                            <select id="role_ma" name="role_ma" ng-model="role_ma" ng-class="['form-control', frmEdit.role_ma.$valid?'is-valid':'is-invalid']" ng-required="true">
                                <option value=""></option>
                                @foreach($dsrole as $role)
                                <option value="{{$role->role_ma}}">{{$role->role_ten}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.role_ma.$error.required">Bạn phải nhập vào trường này</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cvu_ma">Chức vụ :</label>
                            <select id="cvu_ma" name="cvu_ma" ng-model="cvu_ma" ng-class="['form-control', frmEdit.cvu_ma.$valid?'is-valid':'is-invalid']" ng-required="true">
                                <option value=""></option>
                                @foreach($dscvu as $cvu)
                                <option value="{{$cvu->cvu_ma}}">{{$cvu->cvu_ten}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.cvu_ma.$error.required">Bạn phải nhập vào trường này</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nv_gioiTinh">Giới tính :</label>
                            <select id="nv_gioiTinh" name="nv_gioiTinh" ng-model="nv_gioiTinh" ng-class="['form-control', frmEdit.nv_gioiTinh.$valid?'is-valid':'is-invalid']" ng-required="true">
                                <option value=""></option>
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.nv_gioiTinh.$error.required">Bạn phải nhập vào trường này</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmEdit.$invalid">Cập nhật</button>
                            <a href="{{route('admin.thongtinchung.index')}}" class="btn btn-secondary">Trở về</a>
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
    app.controller('thongtinthemmoiController', function($scope, $http) {
        $scope.nv_ngaySinh = new Date("{{old('nv_ngaySinh', $ttc->nv_ngaySinh)}}");
        $scope.nv_ngayVaoDang = new Date("{{old('nv_ngayVaoDang', $ttc->nv_ngayVaoDang)}}");
        $scope.nv_ngayVaoDangChinhThuc = new Date("{{old('nv_ngayVaoDangChinhThuc', $ttc->nv_ngayVaoDangChinhThuc)}}");
        $scope.nv_ngayNhapNgu = new Date("{{old('nv_ngayNhapNgu', $ttc->nv_ngayNhapNgu)}}");
        $scope.nv_ngayXuatNgu = new Date("{{old('nv_ngayXuatNgu', $ttc->nv_ngayXuatNgu)}}");
        $scope.nv_cmndNgayCap = new Date("{{old('nv_cmndNgayCap', $ttc->nv_cmndNgayCap)}}");
    });
</script>
@endsection