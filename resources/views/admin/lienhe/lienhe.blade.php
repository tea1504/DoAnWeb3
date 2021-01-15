@extends('layouts.master')
@section('title')
Liên hệ
@endsection
@section('custom-css')
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Liên hệ</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="lienHeController">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form name="frmLienHe" novalidate ng-submit="submitForm()">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="email" class="col-lg-2 col-md-3 col-sm-4">Nhập địa chỉ email</label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="email" name="email" id="email" ng-model="email" class="form-control" ng-class="frmLienHe.email.$touched ? ( frmLienHe.email.$invalid ? 'is-invalid' : 'is-valid') : ''" placeholder="Email ..." ng-required=true ng-pattern="/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/">
                                <div class="valid-feedback">
                                    Nhập hợp lệ
                                </div>
                                <div class="invalid-feedback">
                                    <span ng-show="frmLienHe.email.$error.required">Bạn phải nhập email</span>
                                    <span ng-show="frmLienHe.email.$error.pattern">Bạn phải nhập đúng định dạng email</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mes" class="col-lg-2 col-md-3 col-sm-4">Nhập tin nhắn</label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <textarea name="mes" id="mes" ng-model="mes" cols="30" rows="10" class="form-control" ng-class="frmLienHe.mes.$touched ? ( frmLienHe.mes.$valid ? 'is-valid' : 'is-invalid') : ''" placeholder="Message ..." ng-required=true ng-minlength="5" ng-maxlength="500"></textarea>
                                <div class="valid-feedback">
                                    Nhập hợp lệ
                                </div>
                                <div class="invalid-feedback">
                                    <span ng-show="frmLienHe.mes.$error.required">Bạn phải nhập tin nhắn</span>
                                    <span ng-show="frmLienHe.mes.$error.minlength">Tin nhắn phải chứa ít nhất 5 ký tự</span>
                                    <span ng-show="frmLienHe.mes.$error.maxlength">Tin nhắn chỉ chứa 500 ký tự </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 offset-lg-2 offset-md-3 offset-sm-4">
                            <button class="btn btn-primary" ng-disabled="frmLienHe.$invalid">Gửi tin nhắn</button>
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
    app.controller('lienHeController', function($scope, $http) {
        $scope.submitForm = function() {
            if ($scope.frmLienHe.$valid) {
                Swal.fire({
                    position: 'top-end',
                    title: 'Đã thực hiện gửi',
                    showConfirmButton: false,
                    timer: 1500
                })
                var dataSend = {
                    "email": $scope.frmLienHe.email.$viewValue,
                    "mes": $scope.frmLienHe.mes.$viewValue,
                    "_token": "{{ csrf_token() }}",
                };
                $http({
                        url: "{{ route('admin.lienhe.guiloinhan') }}",
                        method: "POST",
                        data: JSON.stringify(dataSend)
                    })
                    .then(
                        function successCallback(response) {
                            swal.fire('Gửi mail thành công!', 'Chúng tôi sẽ trả lời trong thời gian sớm nhất!', 'success');
                        },
                        function errorCallback(response) {
                            swal.fire('Có lỗi trong quá trình gởi mail!', 'Vui lòng thử lại sau vài phút.', 'error');
                            console.log(response);
                        }
                    );
            }
        }
    });
</script>
@endsection