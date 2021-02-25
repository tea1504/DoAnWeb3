@extends('layouts.master')
@section('title')
Cập nhật đơn vị
@endsection
@section('custom-css')
<link href="{{ asset('themes/AdminLTE/plugins/summernote/summernote-bs4.css') }}" media="all" rel="stylesheet" type="text/css" />
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.donvi.index')}}">Danh sách đơn vị</a></li>
    <li class="breadcrumb-item active">Cập nhật đơn vị</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="quanlythemmoiController" ng-init="dv_ten = '{{old('dv_ten', $dv->dv_ten)}}'; dvql_ma = '{{old('dvql_ma', $dv->dvql_ma)}}'">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Cập nhật đơn vị</div>
                <div class="card-body">
                    <form name="frmEdit" id="frmEdit" method="POST" action="{{route('admin.donvi.update', ['id' => $dv->dv_ma])}}" enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="dv_ten">Tên đơn vị :</label>
                            <input type="text" name="dv_ten" id="dv_ten" ng-model="dv_ten" ng-class="['form-control', frmEdit.dv_ten.$touched?frmEdit.dv_ten.$invalid?'is-invalid':'is-valid':'']" ng-model="dv_ten" ng-required="true" ng-minlength="3" ng-maxlength="50">
                            <div class="invalid-feedback">
                                <span ng-if="frmEdit.dv_ten.$error.required">Bạn phải nhập vào trường này</span>
                                <span ng-if="frmEdit.dv_ten.$error.minlength">Bạn nhập quá ngắn</span>
                                <span ng-if="frmEdit.dv_ten.$error.maxlength">Bạn nhập quá dài</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dvql_ma">Đơn vị quản lý :</label>
                            <select name="dvql_ma" id="dvql_ma" ng-model="dvql_ma" ng-class="['form-control', frmEdit.dvql_ma.$touched?frmEdit.dvql_ma.$invalid?'is-invalid':'is-valid':'']" ng-required="true">
                                <option value=""></option>
                                @foreach($dsdvql as $dvql)
                                <option value="{{$dvql->dvql_ma}}">{{$dvql->dvql_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmEdit.$invalid">Cập nhật</button>
                            <a href="{{route('admin.donvi.index')}}" class="btn btn-secondary">Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script src="{{ asset('themes/AdminLTE/plugins/summernote/summernote-bs4.min.js') }}" type="text/javascript"></script>
<script>
    $('.toast').toast('show');
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $('.textarea').summernote({
        height: 200, //set editable area's height
        codemirror: { // codemirror options
            theme: 'monokai'
        }
    })
    app.controller('quanlythemmoiController', function($scope, $http) {});
</script>
@endsection