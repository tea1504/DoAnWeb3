@extends('layouts.master')
@section('title')
{{$nv->nv_hoTen}} - {{$nv->nv_ma}}
@endsection
@section('custom-css')
<style>
    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #17a2b8 !important;
        border-color: #17a2b8 !important;
    }
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.nhanvien.index')}}">Danh sách nhân viên</a></li>
    <li class="breadcrumb-item active">{{$nv->nv_hoTen}} - {{$nv->nv_ma}}</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="chitietnhanvienController">
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4">
            <div class="card">
                <div class="card-body p-0">
                    <img src="{{ Storage::exists('public/avatar/' . $nv->nv_anh) ? asset('storage/avatar/' . $nv->nv_anh) : asset('storage/avatar/default.png') }}" class="img-fluid" height="50px" alt="User Image">
                </div>
                <div class="card-footer bg-cyan">
                    <b>{{$nv->nv_hoTen}}</b>
                </div>
            </div>
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active" data-toggle="collapse" data-target="#thongTinChung" aria-controls="thongTinChung">
                    Thông tin chung
                </button>
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#khenThuong" aria-controls="khenThuong">
                    Khen thưởng/Kỷ luật
                </button>
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#trinhDo" aria-controls="trinhDo">
                    Trình độ
                </button>
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#giaDinh" aria-controls="giaDinh">
                    Quan hệ gia đình
                </button>
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#luong" aria-controls="luong">
                    Lương/Phụ cấp
                </button>
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#tuyenDung" aria-controls="tuyenDung">
                    Thông tin tuyển dụng
                </button>
            </div>
        </div>
        <div class="col-xl-10 col-lg-9 col-md-8 accordion pt-sm-0 pt-3" id="vungChua">
            <div class="collapse multi-collapse show" aria-labelledby="headingTwo" id="thongTinChung" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Thông tin chung</div>
                    <div class="card-body">
                        @include('admin.nhanvien.thongtinchung')
                    </div>
                </div>
            </div>
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="khenThuong" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Khen thưởng/Kỷ luật</div>
                    <div class="card-body">
                        @include('admin.nhanvien.khenthuong')
                    </div>
                </div>
            </div>
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="trinhDo" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Trình độ</div>
                    <div class="card-body">
                        @include('admin.nhanvien.trinhdo')
                    </div>
                </div>
            </div>
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="giaDinh" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Quan hệ gia đình</div>
                    <div class="card-body">
                    @include('admin.nhanvien.giadinh')
                    </div>
                </div>
            </div>
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="luong" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Lương/Phụ cấp</div>
                    <div class="card-body">
                    @include('admin.nhanvien.luong')
                    </div>
                </div>
            </div>
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="tuyenDung" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Thông tin tuyển dụng</div>
                    <div class="card-body">
                        @include('admin.nhanvien.tuyendung')
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script>
    $(document).ready(function() {
        $('.list-group button').click(function(e) {
            e.preventDefault();
            $('.list-group button').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
<script>
    app.controller('chitietnhanvienController', function($scope) {

    });
</script>
@endsection