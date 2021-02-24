@extends('layouts.master')
@section('title')
Cập nhật xã
@endsection
@section('custom-css')
<link href="{{ asset('themes/AdminLTE/plugins/summernote/summernote-bs4.css') }}" media="all" rel="stylesheet" type="text/css" />
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.xa.index')}}">Danh sách xã</a></li>
    <li class="breadcrumb-item active">Cập nhật xã</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="quanlythemmoiController" ng-init="x_ten = '{{old('x_ten', $x->x_ten)}}'; h_ma = '{{old('h_ma', $x->h_ma)}}'">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Cập nhật xã</div>
                <div class="card-body">
                    <form name="frmEdit" id="frmEdit" method="POST" action="{{route('admin.xa.update', ['id' => $x->x_ma])}}" enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="x_ten">Tên xã :</label>
                            <input type="text" name="x_ten" id="x_ten" ng-model="x_ten" ng-class="['form-control', frmEdit.x_ten.$invalid?'is-invalid':'is-valid']" ng-model="x_ten" ng-required="true" ng-minlength="3" ng-maxlength="50">
                            <div class="invalid-feedback">
                                <span ng-if="frmEdit.x_ten.$error.required">Bạn phải nhập vào trường này</span>
                                <span ng-if="frmEdit.x_ten.$error.minlength">Bạn nhập quá ngắn</span>
                                <span ng-if="frmEdit.x_ten.$error.maxlength">Bạn nhập quá dài</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="h_ma">Tên huyện, tỉnh :</label>
                            <select name="h_ma" id="h_ma" ng-model="h_ma" ng-class="['form-control', frmEdit.h_ma.$invalid?'is-invalid':'is-valid']" ng-required="true">
                                <option value=""></option>
                                @foreach($dsh as $h)
                                <option value="{{$h->h_ma}}">{{$h->h_ten}}, {{$h->tinh->t_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmEdit.$invalid">Cập nhật</button>
                            <a href="{{route('admin.xa.index')}}" class="btn btn-secondary">Trở về</a>
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
    app.controller('quanlythemmoiController', function($scope, $http) {});
</script>
@endsection