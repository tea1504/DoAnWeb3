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
    @if (Session::has('alert-error'))
    <div aria-live="polite" aria-atomic="true" class="flex-column justify-content-center align-items-center" style="position: fixed; top:0; right:0; z-index: 100000;">
        <div class="toast bg-danger m-2" data-delay="10000" role="alert" aria-live="assertive" aria-atomic="true" style="width: 400px;">
            <div class="toast-header">
                <img src="{{asset('storage/images/shin.gif')}}" class="rounded mr-2 bg-light" height="30px" alt="...">
                <strong class="mr-auto">Lỗi</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{Session::get('alert-error')}}
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="btn-group" role="group">
                <a href="{{route('admin.nhanvien.print.chitiet',['id'=>$nv->nv_ma])}}" class="btn btn-secondary">
                    <i class="fas fa-print"></i> in thông tin
                </a>
                <a href="{{route('admin.nhanvien.pdf.chitiet',['id'=>$nv->nv_ma])}}" class="btn btn-warning"><i class="fas fa-file-pdf"></i> xuất file PDF</a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4">
            <div class="card">
                <div class="card-body text-center p-0">
                    <img src="{{ Storage::exists('public/avatar/' . $nv->nv_anh) && isset($nv->nv_anh) ? asset('storage/avatar/' . $nv->nv_anh) : asset('storage/avatar/default.png') }}" class="img-fluid" height="50px" alt="User Image">
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
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#congTac" aria-controls="tuyenDung">
                    Quá trình công tác
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
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="congTac" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Quá trình công tác</div>
                    <div class="card-body">
                        @include('admin.nhanvien.congtac')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script>
    $('.toast').toast('show');
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