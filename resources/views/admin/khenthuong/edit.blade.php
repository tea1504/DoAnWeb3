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
    <li class="breadcrumb-item"><a href="{{route('admin.khenthuong.index')}}">Danh sách khen thưởng</a></li>
    <li class="breadcrumb-item active">Chỉnh sửa danh sách khen thưởng</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="khenthuongcapnhatController">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Chỉnh sửa danh sách khen thưởng</div>
                <div class="card-body">
                    <form name="frmEdit" id="frmEdit" method="POST" action="{{route('admin.khenthuong.update', ['id' => $kt->kt_ma])}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="nv_ma" id="nv_ma" value="{{$kt->nv_ma}}">
                        <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên nhân viên : </label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <select name="nv_ma" class="form-control" disabled>
                                    @foreach($danhsachnhanvien as $nhanvien)
                                        @if($nhanvien->nv_ma == $kt->nv_ma)
                                        <option value="{{ $nhanvien->nv_ma }}" selected>{{ $nhanvien->nv_hoTen }}</option>
                                        @else
                                        <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                   
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label" >Ngày ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="kt_ngayKy" name="kt_ngayKy" class="form-control" value="{{ old('kt_ngayKy', $kt->kt_ngayKy) }}" data-mask-datetime>
                            </div>
                        </div>
                            <!-- ------------------------------------------------------- -->
                            
                        
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Người ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <select name="nv_ma" class="form-control">
<<<<<<< HEAD
                                    @foreach($danhsachnhanvien as $nhanvien)
                                        @if($nhanvien->nv_ma == $kt->kt_nguoiKy)
                                        <option value="{{ $nhanvien->nv_ma }}" selected>{{ $nhanvien->nv_hoTen }}</option>
                                        @else
                                        <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
=======
                                    @foreach($nv as $dsnv)
                                        @if($dsnv->nv_ma == $kt->kt_nguoiKy)
                                        <option value="{{ $dsnv->nv_ma }}" selected>{{ $dsnv->nv_hoTen }}</option>
                                        @else
                                        <option value="{{ $dsnv->nv_ma }}">{{ $dsnv->nv_hoTen }}</option>
>>>>>>> d8b89c1fd0a2b767a8a01827fbda04e311a6abb6
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Lý do : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="kt_lyDo" name="kt_lyDo" class="form-control" value="{{ old('$kt_lyDo', $kt->kt_lyDo) }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày tạo mới : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="kt_taoMoi" name="kt_taoMoi" class="form-control" value="{{ $mytime }}" data-mask-datetime>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày cập nhật : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="kt_capNhat" name="kt_capNhat" class="form-control" value="{{ $mytime }}" data-mask-datetime>
                            </div>
                        </div>
                        
                        
                        <button type="sumbit" class="btn btn-primary">Thêm mới</button>
                        <a href="{{route('admin.khenthuong.index')}}" class="btn btn-secondary">Trở về</a>

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
    app.controller('khenthuongnhatController', function($scope, $http) {});
</script>
@endsection