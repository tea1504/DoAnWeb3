@extends('layouts.master')
@section('title')
Thêm khen thưởng
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<style>
    table#myTable {
        height: 540px;
        width: 100%;
    }

    table#myTable td {
        width: 500px;
    }

    .my-card {
        transition: .2s;
    }

    .my-card:hover {
        transform: scale(1.05, 1.05);
        z-index: 9999;
        box-shadow: 0px 0px 20px #000;
    }

    .avatar {
        background-color: #fff;
    }
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.khenthuong.index')}}">Danh sách khen thưởng</a></li>
    <li class="breadcrumb-item active">Thêm mới danh sách khen thưởng</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="khenthuongthemmoiController">
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
                <div class="card-header bg-cyan h1 font-weight-bold">Thêm mới khen thưởng</div>
                <div class="card-body">
                    <form name="frmCreate" id="frmCreate" method="POST" action="{{route('admin.khenthuong.store')}}" novalidate>
                        {{ csrf_field() }}
                        <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên nhân viên : </label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <select name="nv_ma" id="nv_ma" ng-class="frmCreate.nv_ma.$touched?frmCreate.nv_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="nv_ma" ng-required="true">
                                    @foreach($danhsachnhanvien as $nhanvien)
                                    <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                                    @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <span ng-show="frmCreate.nv_ma.$error.required">Bạn phải chọn nhân viên</span>
                                    </div>
                                </div>
                                
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="date" id="kt_ngayKy" name="kt_ngayKy"  ng-class="frmCreate.kt_ngayKy.$touched?frmCreate.kt_ngayKy.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="kt_ngayKy" ng-required="true" >
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.kt_ngayKy.$error.required">Bạn phải ngày ký</span>
                                </div>
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Người ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <select name="kt_nguoiKy" id="kt_nguoiKy" ng-class="frmCreate.kt_nguoiKy.$touched?frmCreate.kt_nguoiKy.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="kt_nguoiKy" ng-required="true">
                                    @foreach($danhsachnhanvien as $nhanvien)
                                    <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="invalid-feedback">
                                <span ng-show="frmCreate.kt_nguoiKy.$error.required">Bạn phải chọn nhân viên</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Lý do : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" name="kt_lyDo" id="kt_lyDo" ng-class="frmCreate.kt_lyDo.$touched?frmCreate.kt_lyDo.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" value="{{old('kt_lyDo')}}" ng-model="kt_lyDo" ng-required="true" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmCreate.kt_lyDo.$error.required">Bạn phải lý do được thưởng</span>
                                    <span ng-show="frmCreate.kt_lyDo.$error.minlength">Lý quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                </div>                            
                            </div>
                        </div>                    
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmCreate.$invalid">Thêm mới</button>
                            <a href="{{route('admin.khenthuong.index')}}" class="btn btn-secondary">Trở về</a>
                        </div>
                    </form>
                       
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('custom-scripts')
<script src="{{ asset('themes/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>
<script>
    $('.toast').toast('show');
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    app.controller('khenthuongthemmoiController', function($scope, $http) {});
</script>

@endsection