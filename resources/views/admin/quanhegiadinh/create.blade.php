@extends('layouts.master')
@section('title')
Thêm mới quan hệ gia đình
@endsection
@section('custom-css')
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.quanhegiadinh.index')}}">Danh sách quan hệ gia đình</a></li>
    <li class="breadcrumb-item active">Thêm mới quan hệ gia đình</li>
</ol>
@endsection
@section('content')
<div class="container-flu" ng-controller="trinhdothemmoiController">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-cyan h1 font-weight-bold">Thêm mới quan hệ gia đình</div>
                <div class="card-body">
                    <form name="frmCreate" id="frmCreate" method="POST" action="{{route('admin.quanhegiadinh.store')}}" novalidate>
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên nhân viên : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <select name="nv_ma" id="nv_ma" ng-class="frmCreate.nv_ma.$touched?frmCreate.nv_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="nv_ma" ng-required="true">
                                    @foreach($danhsachnhanvien as $nhanvien)
                                    <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.nv_ma.$error.required">Bạn phải chọn nhân viên</span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Họ và tên : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="qhgd_ten" id="qhgd_ten" value="{{old('qhgd_ten')}}" ng-class="frmCreate.qhgd_ten.$touched?frmCreate.qhgd_ten.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="qhgd_ten" ng-required="true" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.qhgd_ten.$error.required">Bạn phải điền tên quan hệ</span>
                                    <span ng-show="frmCreate.qhgd_ten.$error.minlength">Tên quan hệ quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmCreate.qhgd_ten.$error.maxlength">Tên quan hệ quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Loại quan hệ : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="qhgd_moiQuanHe" id="qhgd_moiQuanHe" value="{{old('qhgd_moiQuanHe')}}" ng-class="frmCreate.qhgd_moiQuanHe.$touched?frmCreate.qhgd_moiQuanHe.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="qhgd_moiQuanHe" ng-required="true" ng-minlength="2" ng-maxlength="30">
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.qhgd_moiQuanHe.$error.required">Bạn phải điền mối quan hệ</span>
                                    <span ng-show="frmCreate.qhgd_moiQuanHe.$error.minlength">Mối quan hệ quá ngắn, phải chứa ít nhất 2 ký tự</span>
                                    <span ng-show="frmCreate.qhgd_moiQuanHe.$error.maxlength">Mối quan hệ quá dài, chỉ chứa nhiều nhất 30 ký tự</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Năm sinh : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="qhgd_namSinh" id="qhgd_namSinh" value="{{old('qhgd_namSinh')}}" ng-class="frmCreate.qhgd_namSinh.$touched?frmCreate.qhgd_namSinh.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="qhgd_namSinh" ng-required="true" ng-minlength="4" ng-maxlength="4">
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.qhgd_namSinh.$error.required">Bạn phải điền năm sinh</span>
                                    <span ng-show="frmCreate.qhgd_namSinh.$error.minlength">Năm sinh quá ngắn, phải chứa ít nhất 4 ký tự</span>
                                    <span ng-show="frmCreate.qhgd_namSinh.$error.maxlength">Năm sinh quá dài, chỉ chứa nhiều nhất 4 ký tự</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Địa chỉ : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="qhgd_diaChi" id="qhgd_diaChi" value="{{old('qhgd_diaChi')}}" ng-class="frmCreate.qhgd_diaChi.$touched?frmCreate.qhgd_diaChi.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="qhgd_diaChi" ng-required="true" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.qhgd_diaChi.$error.required">Bạn phải điền địa chỉ</span>
                                    <span ng-show="frmCreate.qhgd_diaChi.$error.minlength">Địa chỉ quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmCreate.qhgd_diaChi.$error.maxlength">Địa chỉ quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nghề nghiệp : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="qhgd_ngheNghiep" id="qhgd_ngheNghiep" value="{{old('qhgd_ngheNghiep')}}" ng-class="frmCreate.qhgd_ngheNghiep.$touched?frmCreate.qhgd_ngheNghiep.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="qhgd_ngheNghiep" ng-required="true" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.qhgd_ngheNghiep.$error.required">Bạn phải điền nghề nghiệp</span>
                                    <span ng-show="frmCreate.qhgd_ngheNghiep.$error.minlength">Nghề nghiệp quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmCreate.qhgd_ngheNghiep.$error.maxlength">Nghề nghiệp quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nước ngoài : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <select name="qhgd_nuocNgoai" id="qhgd_nuocNgoai" value="{{old('qhgd_nuocNgoai')}}" ng-class="frmCreate.qhgd_nuocNgoai.$touched?frmCreate.qhgd_nuocNgoai.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="qhgd_nuocNgoai" ng-required="true">
                                    <option value="1">Sống ở nước ngoài</option>
                                    <option value="0">Sống ở trong nước</option>
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.qhgd_nuocNgoai.$error.required">Bạn phải chọn mối quan hệ ở nước ngoài</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmCreate.$invalid">Thêm mới</button>
                            <a href="{{route('admin.quanhegiadinh.index')}}" class="btn btn-secondary">Trở về</a>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('custom-scripts')
<script>
    $('.toast').toast('show');
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    app.controller('trinhdothemmoiController', function($scope, $http) {});
</script>
@endsection