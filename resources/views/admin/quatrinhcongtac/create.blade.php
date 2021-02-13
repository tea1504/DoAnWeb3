@extends('layouts.master')
@section('title')
Thêm mới quá trình công tác
@endsection
@section('custom-css')
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.quatrinhcongtac.index')}}">Danh sách quá trình công tác</a></li>
    <li class="breadcrumb-item active">Thêm mới quá trình công tác</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="quatrinhcongtacthemoiController" ng-init="nv_ma = '{{old('nv_ma',$id)}}'; dv_ma = '{{old('dv_ma')}}'; cvu_ma = '{{old('cvu_ma')}}'; ng_ma = '{{old('ng_ma')}}'; b_ma = '{{old('b_ma')}}'; qtct_tuNgay = '{{old('qtct_tuNgay')}}'; qtct_denNgay = '{{old('qtct_denNgay')}}';">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Thêm mới quá trình công tác</div>
                <div class="card-body">
                    <form name="frmCreate" id="frmCreate" method="POST" action="{{route('admin.quatrinhcongtac.store')}}" novalidate>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nv_ma">Tên nhân viên:</label>
                            <select name="nv_ma" id="nv_ma" class="form-control" ng-model="nv_ma">
                                <option value=""></option>
                                @foreach($dsnv as $nv)
                                <option value="{{$nv->nv_ma}}">{{$nv->nv_hoTen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="qtct_tuNgay">Từ ngày:</label>
                                <input type="text" class="form-control" name="qtct_tuNgay" id="qtct_tuNgay" ng-model="qtct_tuNgay" data-toggle="tooltip" data-placement="top" title="Điền theo định dạng tháng/năm. VD: 02/2020" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"></div></div>'>
                            </div>
                            <div class="col-md-6">
                                <label for="qtct_denNgay">Đến ngày:</label>
                                <input type="text" class="form-control" name="qtct_denNgay" id="qtct_denNgay" ng-model="qtct_denNgay" data-toggle="tooltip" data-placement="top" title="Điền theo định dạng tháng/năm. VD: 02/2020" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"></div></div>'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="cvu_ma">Chức vụ:</label>
                                <select name="cvu_ma" id="cvu_ma" class="form-control" ng-model="cvu_ma">
                                    <option value=""></option>
                                    @foreach($dscvu as $cvu)
                                    <option value="{{$cvu->cvu_ma}}">{{$cvu->cvu_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="dv_ma">Đơn vị:</label>
                                <select name="dv_ma" id="dv_ma" class="form-control" ng-model="dv_ma">
                                    <option value=""></option>
                                    @foreach($dsdv as $dv)
                                    <option value="{{$dv->dv_ma}}">{{$dv->dv_ten}}, {{$dv->donViQuanLy->dvql_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="ng_ma">Ngạch lương:</label>
                                <select name="ng_ma" id="ng_ma" value="{{old('ng_ma')}}" class="form-control" ng-model="ng_ma" ng-change="getBac()">
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
                                <select name="b_ma" id="b_ma" value="{{old('b_ma')}}" class="form-control" ng-model="b_ma">
                                    <option value=""></option>
                                    <option ng-repeat="bac in dsbac" value="<%bac.b_ma%>"><%bac.b_ten%></option>
                                </select>
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.b_ma.$error.required">Bạn phải chọn bậc lương</span>
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
                            <button class="btn btn-primary">Thêm mới</button>
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
    app.controller('quatrinhcongtacthemoiController', function($scope, $http) {
        $scope.getBac = function() {
            $http({
                method: 'GET',
                url: "{{route('api.ngach.bac')}}?ng_ma=" + $('#ng_ma').val()
            }).then(function successCallback(response) {
                // console.log(response.data);
                $scope.dsbac = response.data.result;
            }, function errorCallback(response) {});
        }
        $http({
            method: 'GET',
            url: "{{route('api.ngach.bac')}}?ng_ma=" + $('#ng_ma').val()
        }).then(function successCallback(response) {
            // console.log(response.data);
            $scope.dsbac = response.data.result;
        }, function errorCallback(response) {});
    });
</script>
@endsection