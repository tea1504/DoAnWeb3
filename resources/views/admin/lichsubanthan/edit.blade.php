@extends('layouts.master')
@section('title')
Cập nhật nơi sinh
@endsection
@section('custom-css')
<link href="{{ asset('themes/AdminLTE/plugins/summernote/summernote-bs4.css') }}" media="all" rel="stylesheet" type="text/css" />
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.noisinh.index')}}">Danh sách nơi sinh</a></li>
    <li class="breadcrumb-item active">Cập nhật nơi sinh</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="lichsucapnhatController" ng-init="nv_ma = '{{old('nv_ma', $lsbt->nv_ma)}}'">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Cập nhật nơi sinh</div>
                <div class="card-body">
                    <form name="frmEdit" id="frmEdit" method="POST" action="{{route('admin.lichsubanthan.update', ['id' => $lsbt->lsbt_ma])}}" enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="nv_ma">Nhân viên :</label>
                            <select name="nv_ma" id="nv_ma" ng-model="nv_ma" ng-class="['form-control', frmEdit.nv_ma.$valid?'is-valid':'is-invalid']" ng-required="true">
                                <option value=""></option>
                                @foreach($dsnv as $nv)
                                <option value="{{$nv->nv_ma}}">{{$nv->nv_hoTen}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <span ng-show="frmCreate.nv_ma.$error.required">Bạn phải nhập vào trường này</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lsbt_hanhViPhamToi">Khai rõ: bị bắt, bị tù (từ ngày tháng năm nào đến ngày tháng năm nào, ở đâu), đã khai báo cho ai, những vấn đề gì? Bản thân có làm việc trong chế độ cũ (cơ quan, đơn vị nào, địa điểm, chức danh, chức vụ, thời gian làm việc…).</label>
                            <textarea name="lsbt_hanhViPhamToi" id="lsbt_hanhViPhamToi" cols="30" rows="10" class="textarea">{{old('lsbt_hanhViPhamToi', $lsbt->lsbt_hanhViPhamToi)==null?'Không có':old('lsbt_hanhViPhamToi', $lsbt->lsbt_hanhViPhamToi)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="lsbt_thamGiaToChucChinhTri">Thời gian hoặc có quan hệ với các tổ chức chính trị, kinh tế, xã hội nào ở nước ngoài (làm gì, tổ chức nào, đặt trụ sở ở đâu…?)</label>
                            <textarea name="lsbt_thamGiaToChucChinhTri" id="lsbt_thamGiaToChucChinhTri" cols="30" rows="10" class="textarea">{{old('lsbt_thamGiaToChucChinhTri', $lsbt->lsbt_thamGiaToChucChinhTri)==null?'Không có':old('lsbt_thamGiaToChucChinhTri', $lsbt->lsbt_thamGiaToChucChinhTri)}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmEdit.$invalid">Cập nhật</button>
                            <a href="{{route('admin.lichsubanthan.index')}}" class="btn btn-secondary">Trở về</a>
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
        height: 200,   //set editable area's height
        codemirror: { // codemirror options
            theme: 'monokai'
        }
    })
    app.controller('lichsucapnhatController', function($scope, $http) {
        
    });
</script>
@endsection