@extends('layouts.master')
@section('title')
Sửa đổi quan hệ gia đình
@endsection
@section('custom-css')
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.quanhegiadinh.index')}}">Danh sách quan hệ gia đình</a></li>
    <li class="breadcrumb-item active">Sửa đổi quan hệ gia đình</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="quanhecapnhatController" ng-init="qhgd_ten = '{{old('qhgd_ten', $qhgd->qhgd_ten)}}'; qhgd_nuocNgoai = '{{old('qhgd_nuocNgoai', $qhgd->qhgd_nuocNgoai)}}'">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Sửa đổi quan hệ gia đình</div>
                <div class="card-body">
                    <form name="frmEdit" id="frmEdit" method="POST" action="{{route('admin.quanhegiadinh.update', ['id' => $qhgd->qhgd_ma])}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="nv_ma" id="nv_ma" value="{{$qhgd->nv_ma}}">
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên nhân viên : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <select name="nv_ma2" id="nv_ma2" class="form-control" disabled>
                                    <option value=""></option>
                                    @foreach($danhsachnhanvien as $nv)
                                    <option value="{{$nv->nv_ma}}" {{old('nv_ma', $qhgd->nv_ma)==$nv->nv_ma?'selected':''}}>{{$nv->nv_hoTen}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.nv_ma.$error.required">Bạn phải chọn nhân viên</span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Họ và tên : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="qhgd_ten" id="qhgd_ten" ng-class="frmEdit.qhgd_ten.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_ten" ng-required="true" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_ten.$error.required">Bạn phải điền tên quan hệ</span>
                                    <span ng-show="frmEdit.qhgd_ten.$error.minlength">Tên quan hệ quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmEdit.qhgd_ten.$error.maxlength">Tên quan hệ quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Mối quan hệ : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="qhgd_moiQuanHe" id="qhgd_moiQuanHe" value="{{old('qhgd_moiQuanHe',$qhgd->qhgd_moiQuanHe)}}" ng-class="frmEdit.qhgd_moiQuanHe.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_moiQuanHe" ng-required="true" ng-minlength="2" ng-maxlength="30">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_moiQuanHe.$error.required">Bạn phải điền mối quan hệ</span>
                                    <span ng-show="frmEdit.qhgd_moiQuanHe.$error.minlength">Mối quan hệ quá ngắn, phải chứa ít nhất 2 ký tự</span>
                                    <span ng-show="frmEdit.qhgd_moiQuanHe.$error.maxlength">Mối quan hệ quá dài, chỉ chứa nhiều nhất 30 ký tự</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Năm sinh : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="qhgd_namSinh" id="qhgd_namSinh" value="{{old('qhgd_namSinh',$qhgd->qhgd_namSinh)}}" ng-class="frmEdit.qhgd_moiQuanHe.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_namSinh" ng-required="true" ng-minlength="4" ng-maxlength="4">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_namSinh.$error.required">Bạn phải điền năm sinh</span>
                                    <span ng-show="frmEdit.qhgd_namSinh.$error.minlength">Năm sinh quá ngắn, phải chứa ít nhất 4 ký tự</span>
                                    <span ng-show="frmEdit.qhgd_namSinh.$error.maxlength">Năm sinh quá dài, chỉ chứa nhiều nhất 4 ký tự</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Địa chỉ : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="qhgd_diaChi" id="qhgd_diaChi" value="{{old('qhgd_diaChi',$qhgd->qhgd_diaChi)}}" ng-class="frmEdit.qhgd_moiQuanHe.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_diaChi" ng-required="true" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_diaChi.$error.required">Bạn phải điền địa chỉ</span>
                                    <span ng-show="frmEdit.qhgd_diaChi.$error.minlength">Địa chỉ quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmEdit.qhgd_diaChi.$error.maxlength">Địa chỉ quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nghề nghiệp : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="qhgd_ngheNghiep" id="qhgd_ngheNghiep" value="{{old('qhgd_ngheNghiep',$qhgd->qhgd_ngheNghiep)}}" ng-class="frmEdit.qhgd_ngheNghiep.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_ngheNghiep" ng-model="qhgd_ngheNghiep" ng-required="true" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_ngheNghiep.$error.required">Bạn phải điền nghề nghiệp</span>
                                    <span ng-show="frmEdit.qhgd_ngheNghiep.$error.minlength">Nghề nghiệp quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmEdit.qhgd_ngheNghiep.$error.maxlength">Nghề nghiệp quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nước ngoài : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <select name="qhgd_nuocNgoai" id="qhgd_nuocNgoai" value="{{old('qhgd_nuocNgoai',$qhgd->qhgd_nuocNgoai)}}" ng-class="frmEdit.qhgd_nuocNgoai.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_nuocNgoai" ng-required="true">
                                    <option value="1">Có quan hệ ở nước ngoài</option>
                                    <option value="0">Không có quan hệ ở nước ngoài</option>
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_nuocNgoai.$error.required">Bạn phải chọn quan hệ ở nước ngoài</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" ng-disabled="frmEdit.$invalid">Cập nhật</button>
                            <a href="{{route('admin.quanhegiadinh.index')}}" class="btn btn-secondary">Trở về</a>
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
    app.controller('quanhecapnhatController', function($scope, $http) {
        $scope.qhgd_moiQuanHe = '{{$qhgd->qhgd_moiQuanHe}}';
        $scope.qhgd_namSinh = '{{$qhgd->qhgd_namSinh}}';
        $scope.qhgd_diaChi = '{{$qhgd->qhgd_diaChi}}';
        $scope.qhgd_ngheNghiep = '{{$qhgd->qhgd_ngheNghiep}}';
    });
</script>
@endsection