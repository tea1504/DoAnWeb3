@extends('layouts.master')
@section('title')
Thêm mới quê quán
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
    <li class="breadcrumb-item"><a href="{{route('admin.noisinh.index')}}">Danh sách quê quán</a></li>
    <li class="breadcrumb-item active">Thêm mới quê quán</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="quequanthemmoiController" ng-init="nv_ma = '{{old('nv_ma')}}'; t_ma = '{{old('t_ma')}}'; qq_diaChi = '{{old('qq_diaChi')}}';">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Thêm mới quê quán</div>
                <div class="card-body">
                    <form name="frmCreate" id="frmCreate" method="POST" action="{{route('admin.quequan.store')}}" enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nv_ma">Nhân viên :</label>
                            <select name="nv_ma" id="nv_ma" ng-model="nv_ma" ng-class="['form-control', frmCreate.nv_ma.$touched?frmCreate.nv_ma.$valid?'is-valid':'is-invalid':'']" ng-required="true">
                                <option value=""></option>
                                @foreach($dsnv as $nv)
                                <option value="{{$nv->nv_ma}}">{{$nv->nv_hoTen}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <span ng-show="frmCreate.nv_ma.$error.required">Bạn phải nhập vào trường này</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="t_ma">Tỉnh :</label>
                                <select name="t_ma" id="t_ma" ng-model="t_ma" ng-change="layHuyen()" ng-class="['form-control', frmCreate.t_ma.$touched?frmCreate.t_ma.$valid?'is-valid':'is-invalid':'']" ng-required="true">
                                    <option value=""></option>
                                    @foreach($dst as $t)
                                    <option value="{{$t->t_ma}}">{{$t->t_ten}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.t_ma.$error.required">Bạn phải nhập vào trường này</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="h_ma">Huyện :</label>
                                <select name="h_ma" id="h_ma" ng-model="h_ma" ng-disabled="!t_ma" ng-change="layXa()" ng-class="['form-control', frmCreate.h_ma.$touched?frmCreate.h_ma.$valid?'is-valid':'is-invalid':'']" ng-required="true">
                                    <option value=""></option>
                                    <option ng-repeat="h in huyen" value="<%h.h_ma%>"><%h.h_ten%></option>
                                </select>
                                <small class="form-text text-muted" ng-if="!t_ma">
                                    Bạn phải chọn tỉnh trước
                                </small>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.h_ma.$error.required">Bạn phải nhập vào trường này</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="x_ma">Xã :</label>
                                <select name="x_ma" id="x_ma" ng-model="x_ma" ng-disabled="!h_ma" ng-class="['form-control', frmCreate.x_ma.$touched?frmCreate.x_ma.$valid?'is-valid':'is-invalid':'']" ng-required="true">
                                    <option value=""></option>
                                    <option ng-repeat="x in xa" value="<%x.x_ma%>"><%x.x_ten%></option>
                                </select>
                                <small class="form-text text-muted" ng-if="!h_ma">
                                    Bạn phải chọn huyện trước
                                </small>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.x_ma.$error.required">Bạn phải nhập vào trường này</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="qq_diaChi">Địa chỉ :</label>
                            <input type="text" name="qq_diaChi" id="qq_diaChi" ng-model="qq_diaChi" ng-class="['form-control', frmCreate.qq_diaChi.$touched?frmCreate.qq_diaChi.$valid?'is-valid':'is-invalid':'']" ng-required="true" ng-minlength="3" ng-maxlength="100">
                            <div class="invalid-feedback">
                                <span ng-show="frmCreate.qq_diaChi.$error.required">Bạn phải nhập vào trường này</span>
                                <span ng-show="frmCreate.qq_diaChi.$error.maxlength">Bạn nhập quá dài</span>
                                <span ng-show="frmCreate.qq_diaChi.$error.minlength">Bạn nhập quá ngắn</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmCreate.$invalid">Thêm mới</button>
                            <a href="{{route('admin.quequan.index')}}" class="btn btn-secondary">Trở về</a>
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
    app.controller('quequanthemmoiController', function($scope, $http) {
        $http({
            method: 'GET',
            url: "{{route('api.huyen')}}?t_ma=" + "{{old('t_ma')}}"
        }).then(function successCallback(response) {
            $scope.huyen = response.data.result;
            $scope.h_ma = "{{old('h_ma')}}";
            $http({
                method: 'GET',
                url: "{{route('api.xa')}}?h_ma=" + "{{old('h_ma')}}"
            }).then(function successCallback(response) {
                $scope.xa = response.data.result;
                $scope.x_ma = "{{old('x_ma')}}";
            }, function errorCallback(response) {});
        }, function errorCallback(response) {});
        $scope.layHuyen = function() {
            var url = "{{route('api.huyen')}}?t_ma=" + $scope.t_ma;
            $http({
                method: 'GET',
                url: url
            }).then(function successCallback(response) {
                $scope.huyen = response.data.result;
            }, function errorCallback(response) {});
        }
        $scope.layXa = function() {
            var url = "{{route('api.xa')}}?h_ma=" + $scope.h_ma;
            $http({
                method: 'GET',
                url: url
            }).then(function successCallback(response) {
                $scope.xa = response.data.result;
            }, function errorCallback(response) {});
        }
    });
</script>
@endsection