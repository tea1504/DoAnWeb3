@extends('layouts.master')
@section('title')
Thêm mới văn bằng chứng chỉ
@endsection
@section('custom-css')
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.vanbang.index')}}">Danh sách văn bằng chứng chỉ</a></li>
    <li class="breadcrumb-item active">Thêm mới văn bằng chứng chỉ</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="trinhdothemmoiController">
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
                        <div class="form-group">
                            <label for="vbcc_ten">Tên văn bằng:</label>
                            <input type="text" name="vbcc_ten" id="vbcc_id" value="{{old('vbcc_ten')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lvbcc_ma">Loại văn bằng:</label>
                            <select name="lvbcc_ma" id="lvbcc_ma" class="form-control">
                                <option value=""></option>
                                @foreach($dslvbcc as $lvbcc)
                                <option value="{{$lvbcc->lvbcc_ma}}" {{old('lvbcc_ma')==$lvbcc->lvbcc_ma?'selected':''}}>{{$lvbcc->lvbcc_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Thêm mới</button>
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