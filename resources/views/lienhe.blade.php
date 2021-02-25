<!DOCTYPE html>
<html lang="vn" ng-app="appLienHe">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShinHRM | Liên hệ</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/images/shin.png') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}"><!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Source Sans Pro';
        }

        body {
            background-color: blanchedalmond;
            overflow: hidden;
        }
    </style>
</head>

<body ng-controller="lienHeController">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header bg-cyan h1 font-weight-bold">
                        Liên hệ với quản trị viên
                    </div>
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
                                <a class="btn btn-secondary" href="{{route('welcome')}}">Quay về</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d477.11909647680113!2d105.7799370891295!3d10.033521500704943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0881fa25557af%3A0x350619b0d40fc3b4!2zS2h1IDMgLSDEkOG6oWkgaOG7jWMgQ-G6p24gVGjGoQ!5e0!3m2!1svi!2s!4v1614266739055!5m2!1svi!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" class="shadow-lg"></iframe>
            </div>
        </div>
    </div>
    <script src="{{ asset('themes/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <!-- daterangepicker -->
    <script src="{{ asset('themes/AdminLTE/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('themes/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('themes/AdminLTE/plugins/moment/moment.min.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('themes/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- AngularJS -->
    <script src="{{ asset('vendor/angularjs/angular.min.js')}}"></script>
    <!-- Sweet Alert 2 -->
    <script src="{{ asset('themes/AdminLTE/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{asset('vendor/animejs/anime.min.js')}}"></script>
    <script>
        anime({
            targets: 'iframe',
            translateY: [100, 0],
            opacity: [0, 1],
            scale: [2, 1],
            easing: 'easeOutElastic',
            duration: 1500,
            delay: 1000,
        });
        var app = angular.module('appLienHe', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
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
                    $scope.email = '';
                    $scope.mes = '';
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
</body>

</html>