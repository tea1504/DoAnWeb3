@extends('layouts.master')
@section('title')
Cập nhật quá trình công tác
@endsection
@section('custom-css')
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.quatrinhcongtac.index')}}">Danh sách quá trình công tác</a></li>
    <li class="breadcrumb-item active">Cập nhật quá trình công tác</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="quatrinhcongtaccapnhatController" ng-init="">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Cập nhật quá trình công tác</div>
                <div class="card-body">
                    <form name="frmCreate" id="frmCreate" method="POST" action="{{route('admin.quatrinhcongtac.update', ['id' => $qt->qtct_ma])}}" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="nv_ma" value="{{$qt->nv_ma}}" >
                        <div class="form-group">
                            <label for="nv_ma1">Tên nhân viên:</label>
                            <select name="nv_ma1" id="nv_ma1" class="form-control" ng-model="nv_ma1" disabled>
                                <option value=""></option>
                                @foreach($dsnv as $nv)
                                <option value="{{$nv->nv_ma}}">{{$nv->nv_hoTen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="qtct_tuNgay">Từ ngày:</label>
                                <input type="text" ng-class="frmCreate.qtct_tuNgay.$touched?frmCreate.qtct_tuNgay.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" name="qtct_tuNgay" id="qtct_tuNgay" ng-model="qtct_tuNgay" ng-required="true" ng-pattern="/^[0-9]{2}\/[0-9]{4}/" data-toggle="tooltip" data-placement="top" title="Điền theo định dạng tháng/năm. VD: 02/2020" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"></div></div>'>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.qtct_tuNgay.$error.required">Bạn phải điền từ ngày</span>
                                    <span ng-show="frmCreate.qtct_tuNgay.$error.pattern">Nhập chưa đúng định dạng</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="qtct_denNgay">Đến ngày:</label>
                                <input type="text" ng-class="frmCreate.qtct_denNgay.$touched?frmCreate.qtct_denNgay.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" name="qtct_denNgay" id="qtct_denNgay" ng-model="qtct_denNgay" ng-required="true" ng-pattern="/^[0-9]{2}\/[0-9]{4}/" data-toggle="tooltip" data-placement="top" title="Điền theo định dạng tháng/năm. VD: 02/2020" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"></div></div>'>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.qtct_denNgay.$error.required">Bạn phải điền từ ngày</span>
                                    <span ng-show="frmCreate.qtct_denNgay.$error.pattern">Nhập chưa đúng định dạng</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="cvu_ma">Chức vụ:</label>
                                <select name="cvu_ma" id="cvu_ma" ng-class="frmCreate.cvu_ma.$touched?frmCreate.cvu_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="cvu_ma" ng-required="true">
                                    <option value=""></option>
                                    @foreach($dscvu as $cvu)
                                    <option value="{{$cvu->cvu_ma}}">{{$cvu->cvu_ten}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.cvu_ma.$error.required">Bạn phải chọn nhân viên</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="dv_ma">Đơn vị:</label>
                                <select name="dv_ma" id="dv_ma" ng-class="frmCreate.dv_ma.$touched?frmCreate.dv_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="dv_ma" ng-required="true">
                                    <option value=""></option>
                                    @foreach($dsdv as $dv)
                                    <option value="{{$dv->dv_ma}}">{{$dv->dv_ten}}, {{$dv->donViQuanLy->dvql_ten}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.cvu_ma.$error.required">Bạn phải chọn nhân viên</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="ng_ma">Ngạch lương:</label>
                                <select name="ng_ma" id="ng_ma" ng-class="frmCreate.ng_ma.$touched?frmCreate.ng_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="ng_ma" ng-change="getBac()" ng-required="true">
                                    <option value=""></option>
                                    @foreach($dsng as $n)
                                    <option value="{{$n->ng_ma}}">{{$n->ng_ten}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.ng_ma.$error.required">Bạn phải chọn ngạch lương</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="b_ma">Bậc lương:</label>
                                <select name="b_ma" id="b_ma" ng-class="frmCreate.b_ma.$touched?frmCreate.b_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="b_ma" ng-required="true" ng-disabled="!ng_ma">
                                    <option value=""></option>
                                    <option ng-repeat="bac in dsbac" value="<%bac.b_ma%>"><%bac.b_ten%></option>
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.b_ma.$error.required" ng-if="ng_ma">Bạn phải chọn bậc lương</span>
                                </div>
                                <small id="b_ma" class="form-text text-muted" ng-if="!ng_ma">
                                    Bạn phải chọn ngạch trước mới có thể chọn bậc
                                </small>
                                <small id="b_ma" class="form-text text-muted" ng-if="b_ma">
                                    <strong>Hệ số lương là: </strong> <%dsbac[b_ma-1].nb_heSoLuong%>
                                </small>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmCreate.$invalid">Cập nhật</button>
                            <a href="{{route('admin.quatrinhcongtac.index')}}" class="btn btn-secondary">Trở về</a>
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
    app.controller('quatrinhcongtaccapnhatController', function($scope, $http) {
        $scope.getBac = function() {
            $http({
                method: 'GET',
                url: "{{route('api.ngach.bac')}}?ng_ma=" + $('#ng_ma').val()
            }).then(function successCallback(response) {
                // console.log(response.data);
                $scope.dsbac = response.data.result;
            }, function errorCallback(response) {});
        }
        $scope.ng_ma = "{{old('ng_ma', $qt->nb_qtct->ng_ma)}}";
        $http({
            method: 'GET',
            url: "{{route('api.ngach.bac')}}?ng_ma=" + $scope.ng_ma
        }).then(function successCallback(response) {
            // console.log(response.data);
            $scope.dsbac = response.data.result;
        }, function errorCallback(response) {});
        $scope.nv_ma1 = "{{old('nv_ma', $qt->nv_ma)}}";
        $scope.qtct_tuNgay = "{{old('qtct_tuNgay', $qt->qtct_tuNgay)}}";
        $scope.qtct_denNgay = "{{old('qtct_denNgay', $qt->qtct_denNgay)}}";
        $scope.cvu_ma = "{{old('cvu_ma', $qt->cvu_ma)}}";
        $scope.dv_ma = "{{old('dv_ma', $qt->dv_ma)}}";
        $scope.b_ma = "{{old('b_ma', $qt->nb_qtct->b_ma)}}";
    });
</script>
@endsection