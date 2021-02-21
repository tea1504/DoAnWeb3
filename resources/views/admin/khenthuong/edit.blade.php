@extends('layouts.master')
@section('title')
Chỉnh sửa khen thưởng
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
                                <input type="text" id="kt_ngayKy" name="kt_ngayKy" value="{{ old('kt_ngayKy', $kt->kt_ngayKy) }}" ng-class="frmEdit.kt_ngayKy.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="kt_ngayKy" ng-required="true">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.kt_ngayKy.$error.required">Bạn phải điền tên mối quan hệ</span>
                                </div>   
                            </div>
                        </div>
                            <!-- ------------------------------------------------------- -->
                            
                        
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Người ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <select name="nv_ma" id="kt_nguoiKy" ng-class="frmEdit.kt_nguoiKy.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="kt_nguoiKy" ng-required="true">
                                    @foreach($danhsachnhanvien as $nhanvien)
                                        @if($nhanvien->nv_ma == $kt->kt_nguoiKy)
                                        <option value="{{ $nhanvien->nv_ma }}" selected>{{ $nhanvien->nv_hoTen }}</option>
                                        @else
                                        <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                 <div class="invalid-feedback">
                                        <span ng-show="frmEdit.kt_nguoiKy.$error.required">Bạn phải chọn nhân viên</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Lý do : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="kt_lyDo" name="kt_lyDo" value="{{ old('$kt_lyDo', $kt->kt_lyDo) }}" ng-class="frmEdit.kt_lyDo.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="kt_lyDo" ng-required="true" ng-minlength="3" ng-maxlength="100">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.kt_lyDo.$error.required">Bạn phải điền tên văn bằng</span>
                                    <span ng-show="frmEdit.kt_lyDo.$error.minlength">Tên văn bằng quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmEdit.kt_lyDo.$error.maxlength">Tên văn bằng quá dài, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div>
                            </div>
                        </div>                       
                        <button type="sumbit" class="btn btn-primary">Cập nhật</button>
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
    app.controller('khenthuongcapnhatController', function($scope, $http) {
        $scope.kt_ngayKy = '{{$kt->kt_ngayKy}}';
        $scope.kt_nguoiKy = '{{$kt->kt_nguoiKy}}';
        $scope.kt_lyDo = '{{$kt->kt_lyDo}}';

    });
</script>
@endsection