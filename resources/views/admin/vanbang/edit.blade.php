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
<div class="container-fluid" ng-controller="trinhdothemmoiController">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Thêm mới văn bằng chứng chỉ</div>
                <div class="card-body">
                    <form name="frmCreate" id="frmCreate" method="POST" action="{{route('admin.vanbang.store')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nv_ma">Tên nhân viên:</label>
                            <select name="nv_ma" id="nv_ma" class="form-control">
                                <option value=""></option>
                                @if(old('nv_ma')==null)
                                @if(isset($id))
                                @foreach($dsnv as $nv)
                                <option value="{{$nv->nv_ma}}" {{$nv->nv_ma==$id?'selected':''}}>{{$nv->nv_hoTen}}</option>
                                @endforeach
                                @else
                                @foreach($dsnv as $nv)
                                <option value="{{$nv->nv_ma}}">{{$nv->nv_hoTen}}</option>
                                @endforeach
                                @endif
                                @else
                                @foreach($dsnv as $nv)
                                <option value="{{$nv->nv_ma}}" {{old('nv_ma')==$nv->nv_ma?'selected':''}}>{{$nv->nv_hoTen}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="vbcc_ten">Tên văn bằng:</label>
                                <input type="text" name="vbcc_ten" id="vbcc_id" value="{{old('vbcc_ten')}}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="lvbcc_ma">Loại văn bằng:</label>
                                <select name="lvbcc_ma" id="lvbcc_ma" class="form-control">
                                    <option value=""></option>
                                    @foreach($dslvbcc as $lvbcc)
                                    <option value="{{$lvbcc->lvbcc_ma}}" {{old('lvbcc_ma')==$lvbcc->lvbcc_ma?'selected':''}}>{{$lvbcc->lvbcc_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="vbcc_tuNgay">Từ ngày:</label>
                                <input type="text" class="form-control" name="vbcc_tuNgay" id="vbcc_tuNgay" value="{{old('vbcc_tuNgay')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="vbcc_denNgay">Đến ngày:</label>
                                <input type="text" class="form-control" name="vbcc_denNgay" id="vbcc_denNgay" value="{{old('vbcc_denNgay')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="vbcc_trinhDo">Trình độ:</label>
                                <input type="text" class="form-control" name="vbcc_trinhDo" id="vbcc_trinhDo" value="{{old('vbcc_trinhDo')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="vbcc_hinhThuc">Hình thức đào tạo:</label>
                                <input type="text" class="form-control" name="vbcc_hinhThuc" id="vbcc_hinhThuc" value="{{old('vbcc_hinhThuc')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vbcc_tenTruong">Tên trường:</label>
                            <input type="text" name="vbcc_tenTruong" id="vbcc_tenTruong" class="form-control" value="{{old('vbcc_tenTruong')}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Thêm mới</button>
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
    app.controller('trinhdothemmoiController', function($scope, $http) {});
</script>
@endsection