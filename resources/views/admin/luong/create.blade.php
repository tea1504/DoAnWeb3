@extends('layouts.master')
@section('title')
Thêm mới lương/phụ cấp
@endsection
@section('custom-css')
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.luong.index')}}">Danh sách lương/phụ cấp</a></li>
    <li class="breadcrumb-item active">Thêm mới lương/phụ cấp</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="luongthemmoiController" ng-init="nv_ma='{{old('nv_ma')}}';ng_ma='{{old('ng_ma')}}';b_ma='{{old('b_ma')}}';pc_ma='{{old('pc_ma')}}';">
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
                <div class="card-header bg-cyan h1 font-weight-bold">
                    Thêm mới lương/phụ cấp
                </div>
                <div class="card-body">
                    <form name="frmCreate" id="frmCreate" method="POST" action="{{route('admin.luong.store')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nv_ma">Nhân viên:</label>
                            <select name="nv_ma" id="nv_ma" ng-class="frmCreate.nv_ma.$touched?frmCreate.nv_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="nv_ma" ng-required="true">
                                <option value=""></option>
                                @foreach($dsnv as $nv)
                                <option value="{{$nv->nv_ma}}">{{$nv->nv_hoTen}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <span ng-show="frmCreate.nv_ma.$error.required">Bạn phải chọn nhân viên</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="ng_ma">Ngạch lương:</label>
                                <select name="ng_ma" id="ng_ma" value="{{old('ng_ma')}}" ng-class="frmCreate.ng_ma.$touched?frmCreate.ng_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="ng_ma" ng-change="getBac()" ng-required="true">
                                    <option value=""></option>
                                    @foreach($dsn as $n)
                                    <option value="{{$n->ng_ma}}">{{$n->ng_ten}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.ng_ma.$error.required">Bạn phải chọn ngạch lương</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="b_ma">Bậc lương:</label>
                                <select name="b_ma" id="b_ma" value="{{old('b_ma')}}" ng-class="frmCreate.b_ma.$touched?frmCreate.b_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="b_ma" ng-disabled="!ng_ma" ng-required="true">
                                    <option value=""></option>
                                    <option ng-repeat="bac in dsbac" value="<%bac.b_ma%>"><%bac.b_ten%></option>
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.b_ma.$error.required">Bạn phải chọn bậc lương</span>
                                </div>
                                <small class="form-text text-muted" ng-if="!ng_ma">
                                    Bạn phải chọn ngạch trước mới có thể chọn bậc
                                </small>
                                <small class="form-text text-muted" ng-if="b_ma">
                                    <strong>Hệ số lương là: </strong> <%dsbac[b_ma-1].nb_heSoLuong%>
                                </small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pc_ma">Phụ cấp:</label>
                            <select name="pc_ma" id="pc_ma" value="{{old('pc_ma')}}" ng-class="frmCreate.pc_ma.$touched?frmCreate.pc_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="pc_ma" ng-required="true">
                                <option value=""></option>
                                @foreach($dspc as $pc)
                                <option value="{{$pc->pc_ma}}">{{$pc->pc_ten}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <span ng-show="frmCreate.pc_ma.$error.required">Bạn phải chọn phụ cấp</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmCreate.$invalid">Thêm mới</button>
                            <a href="{{route('admin.luong.index')}}" class="btn btn-secondary">Trở về</a>
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
    app.controller('luongthemmoiController', function($scope, $http) {
        $scope.getBac = function() {
            $http({
                method: 'GET',
                url: "{{route('api.ngach.bac')}}?ng_ma=" + $('#ng_ma').val()
            }).then(function successCallback(response) {
                // console.log(response.data);
                $scope.dsbac = response.data.result;
            }, function errorCallback(response) {});
        }
    });
</script>
@endsection