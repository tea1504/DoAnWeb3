@extends('layouts.master')
@section('title')
Chỉnh sửa văn bằng chứng chỉ
@endsection
@section('custom-css')
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.vanbang.index')}}">Danh sách văn bằng chứng chỉ</a></li>
    <li class="breadcrumb-item active">Chỉnh sửa văn bằng chứng chỉ</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="trinhdocapnhatController">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Chỉnh sửa văn bằng chứng chỉ</div>
                <div class="card-body">
                    <form name="frmEdit" id="frmEdit" method="POST" action="{{route('admin.vanbang.update', ['id' => $vb->vbcc_ma])}}" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="nv_ma" id="nv_ma" value="{{$vb->nv_ma}}">
                        <div class="form-group">
                            <label for="nv_ma2">Tên nhân viên:</label>
                            <select name="nv_ma2" id="nv_ma2" class="form-control" disabled>
                                <option value=""></option>
                                @foreach($dsnv as $nv)
                                <option value="{{$nv->nv_ma}}" {{old('nv_ma', $vb->nv_ma)==$nv->nv_ma?'selected':''}}>{{$nv->nv_hoTen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="vbcc_ten">Tên văn bằng:</label>
                                <input type="text" name="vbcc_ten" id="vbcc_id" value="{{old('vbcc_ten',$vb->vbcc_ten)}}" ng-class="frmEdit.vbcc_ten.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="vbcc_ten" ng-required="true" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.vbcc_ten.$error.required">Bạn phải điền tên văn bằng</span>
                                    <span ng-show="frmEdit.vbcc_ten.$error.minlength">Tên văn bằng quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmEdit.vbcc_ten.$error.maxlength">Tên văn bằng quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="lvbcc_ma">Loại văn bằng:</label>
                                <select name="lvbcc_ma" id="lvbcc_ma" ng-class="frmEdit.lvbcc_ma.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="lvbcc_ma" ng-required="true">
                                    <option value=""></option>
                                    @foreach($dslvbcc as $lvbcc)
                                    <option value="{{$lvbcc->lvbcc_ma}}" {{old('lvbcc_ma', $vb->lvbcc_ma)==$lvbcc->lvbcc_ma?'selected':''}}>{{$lvbcc->lvbcc_ten}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.lvbcc_ma.$error.required">Bạn phải chọn loại văn bằng</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="vbcc_tuNgay">Từ ngày:</label>
                                <input type="text" ng-class="frmEdit.vbcc_tuNgay.$invalid?'form-control is-invalid':'form-control is-valid'" name="vbcc_tuNgay" id="vbcc_tuNgay" value="{{old('vbcc_tuNgay', $vb->vbcc_tuNgay)}}" ng-model="vbcc_tuNgay" ng-required="true" ng-minlength="7" ng-maxlength="7" ng-pattern="/^[0-9]{2}\/[0-9]{4}/" data-toggle="tooltip" data-placement="top" title="Điền theo định dạng tháng/năm. VD: 02/2020" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"></div></div>'>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.vbcc_tuNgay.$error.required">Bạn phải điền từ ngày</span>
                                    <span ng-show="frmEdit.vbcc_tuNgay.$error.minlength">Giá trị quá ngắn</span>
                                    <span ng-show="frmEdit.vbcc_tuNgay.$error.maxlength">Giá trị quá dài</span>
                                    <span ng-show="frmEdit.vbcc_tuNgay.$error.pattern&&!(frmEdit.vbcc_tuNgay.$error.minlength||frmEdit.vbcc_tuNgay.$error.maxlength)">Từ ngày không hợp lệ</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="vbcc_denNgay">Đến ngày:</label>
                                <input type="text" ng-class="frmEdit.vbcc_denNgay.$invalid?'form-control is-invalid':'form-control is-valid'" name="vbcc_denNgay" id="vbcc_denNgay" value="{{old('vbcc_denNgay', $vb->vbcc_denNgay)}}" ng-model="vbcc_denNgay" ng-required="true" ng-minlength="7" ng-maxlength="7" ng-pattern="/^[0-9]{2}\/[0-9]{4}/" data-toggle="tooltip" data-placement="top" title="Điền theo định dạng tháng/năm. VD: 02/2020" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"></div></div>'>
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.vbcc_denNgay.$error.required">Bạn phải điền đến ngày</span>
                                    <span ng-show="frmEdit.vbcc_denNgay.$error.minlength">Giá trị quá ngắn</span>
                                    <span ng-show="frmEdit.vbcc_denNgay.$error.maxlength">Giá trị quá dài</span>
                                    <span ng-show="frmEdit.vbcc_denNgay.$error.pattern&&!(frmEdit.vbcc_denNgay.$error.minlength||frmEdit.vbcc_denNgay.$error.maxlength)">Đến ngày không hợp lệ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="vbcc_trinhDo">Trình độ:</label>
                                <input type="text" ng-class="frmEdit.vbcc_trinhDo.$invalid?'form-control is-invalid':'form-control is-valid'" name="vbcc_trinhDo" id="vbcc_trinhDo" value="{{old('vbcc_trinhDo', $vb->vbcc_trinhDo)}}" ng-model="vbcc_trinhDo" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.vbcc_trinhDo.$error.minlength">Tên trình độ quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmEdit.vbcc_trinhDo.$error.maxlength">Tên trình độ quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="vbcc_hinhThuc">Hình thức đào tạo:</label>
                                <input type="text" ng-class="frmEdit.vbcc_hinhThuc.$touched?frmEdit.vbcc_hinhThuc.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" name="vbcc_hinhThuc" id="vbcc_hinhThuc" value="{{old('vbcc_hinhThuc', $vb->vbcc_hinhThuc)}}" ng-model="vbcc_hinhThuc" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.vbcc_hinhThuc.$error.minlength">Tên hình thức quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmEdit.vbcc_hinhThuc.$error.maxlength">Tên hình thức quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vbcc_tenTruong">Tên trường:</label>
                            <input type="text" name="vbcc_tenTruong" id="vbcc_tenTruong" ng-class="frmEdit.vbcc_tenTruong.$invalid?'form-control is-invalid':'form-control is-valid'" value="{{old('vbcc_tenTruong', $vb->vbcc_tenTruong)}}" ng-model="vbcc_tenTruong" ng-required="true" ng-minlength="3" ng-maxlength="100">
                            <div class="invalid-feedback">
                                <span ng-show="frmEdit.vbcc_tenTruong.$error.required">Bạn phải điền tên trường</span>
                                <span ng-show="frmEdit.vbcc_tenTruong.$error.minlength">Tên trường quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                <span ng-show="frmEdit.vbcc_tenTruong.$error.maxlength">Tên trường quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmEdit.$invalid">Cập nhật</button>
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
<script>
    $('.toast').toast('show');
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    app.controller('trinhdocapnhatController', function($scope, $http) {
        $scope.vbcc_ten = '{{$vb->vbcc_ten}}';
        $scope.lvbcc_ma = '{{$vb->lvbcc_ma}}';
        $scope.vbcc_tuNgay = '{{$vb->vbcc_tuNgay}}';
        $scope.vbcc_denNgay = '{{$vb->vbcc_denNgay}}';
        $scope.vbcc_trinhDo = '{{$vb->vbcc_trinhDo}}';
        $scope.vbcc_hinhThuc = '{{$vb->vbcc_hinhThuc}}';
        $scope.vbcc_tenTruong = '{{$vb->vbcc_tenTruong}}';
    });
</script>
@endsection