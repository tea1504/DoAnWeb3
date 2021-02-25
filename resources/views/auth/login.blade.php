<!DOCTYPE html>
<html lang="vn" ng-app="appDangNhap">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShinHRM | Đăng nhập</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}"><!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/dist/css/adminlte.min.css') }}">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(to left bottom, #0000, #fff), url("https://cdn.myxteam.com/uploads/human_resources_management-1024x683.jpeg");
            background-size: cover;
        }

        #body {
            border-radius: 10px;
            background-color: #fff5;
        }

        img {
            transition: 1s;
        }

        #infor-user img {
            border-radius: 50%;
            background-color: #ccc;
        }

        #password,
        #username {
            border-radius: 25px;
            padding: 25px;
        }

        #password::placeholder,
        #username::placeholder {
            color: #aaa;
            font-weight: bold;
            transition: .3s;
        }

        #password:focus-visible::placeholder,
        #username:focus-visible::placeholder {
            color: #ddd;
        }
    </style>
</head>

<body>
    <div id="body" class="container p-5" ng-controller="DangNhapController" ng-init="hideshow = false">
        <div class="row">
            <div class="col-md-12">
                <div id="infor-user" class="text-center">
                    <img ng-src="/storage/avatar/<%anh%>" alt="User Image" fallback-src="/storage/avatar/default.png" height="128px">
                    <p class="text-center mt-3 text-bold"><%ten%></p>
                </div>
                <div>
                    <form method="POST" action="{{ route('login') }}" name="dangNhap" novalidate>
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <div class="col-md-10 offset-md-1">
                                <input id="username" type="text" ng-class="dangNhap.username.$touched?dangNhap.username.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" name="username" ng-model="username" placeholder="Tên tài khoản" value="{{ old('username') }}" ng-change="tenUser()" ng-required="true" ng-maxlength="50" ng-minlength="3">
                                <div class="invalid-feedback">
                                    <span ng-show="dangNhap.username.$error.required">
                                        Chưa nhập tên đăng nhập
                                    </span>
                                    <span ng-show="dangNhap.username.$error.minlength">
                                        Tên đăng nhập quá ngắn
                                    </span>
                                    <span ng-show="dangNhap.username.$error.maxlength">
                                        Tên đăng nhập quá dài
                                    </span>
                                </div>
                                @if ($errors->has('username'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-10 offset-md-1" style="position: relative;">
                                <input id="password" type="password" ng-class="dangNhap.password.$touched?dangNhap.password.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" name="password" ng-model="password" placeholder="Mật khẩu" ng-required="true" ng-maxlength="100" ng-minlength="3" ng-show="!hideshow">
                                <input id="showpassword" type="text" ng-class="dangNhap.password.$touched?dangNhap.password.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" name="showpassword" ng-model="password" placeholder="Mật khẩu" ng-required="true" ng-maxlength="100" ng-minlength="3" style="border-radius: 25px;padding: 25px;" ng-show="hideshow">
                                <label for="hideshow" style="position: absolute; top: 13px; right:40px;">
                                    <i class="fas fa-eye" ng-if="!hideshow"></i>
                                    <i class="fas fa-eye-slash" ng-if="hideshow"></i>
                                </label>
                                <input type="checkbox" name="hideshow" id="hideshow" ng-model="hideshow" ng-show="false">
                                <div class="invalid-feedback">
                                    <span ng-show="dangNhap.password.$error.required">
                                        Chưa nhập mật khẩu
                                    </span>
                                    <span ng-show="dangNhap.password.$error.minlength">
                                        Mật khẩu quá ngắn
                                    </span>
                                    <span ng-show="dangNhap.password.$error.maxlength">
                                        Mật khẩu quá dài
                                    </span>
                                </div>
                                @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 offset-md-1">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="nv_ghinhodangnhap" {{ old('nv_ghinhodangnhap') ? 'checked' : '' }}> Ghi nhớ đăng nhập
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 offset-md-1">
                                <button type="submit" class="btn btn-primary" ng-disabled="dangNhap.$invalid">
                                    Đăng nhập
                                </button>
                                <a class="btn btn-link" href="{{route('lienhe')}}">
                                    Liên hệ với quản trị viên để được cấp tài khoản mới.
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
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
    <script>
        var app = angular.module('appDangNhap', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
        app.directive('fallbackSrc', function() {
            return {
                link: function postLink(scope, element, attrs) {
                    element.bind('error', function() {
                        angular.element(this).attr("src", attrs.fallbackSrc);
                    });
                }
            }
        });
        app.controller('DangNhapController', function($scope, $http) {
            $scope.anh = "default.png";
            $scope.ten = "Đăng nhập";
            $scope.tenUser = function() {
                $http({
                    method: 'GET',
                    url: "{{route('api.ten.nhanvien')}}" + "?username=" + $scope.username
                }).then(function successCallback(response) {
                    // console.table(response.data.result.length);
                    if (response.data.result.length > 0) {
                        $scope.ten = response.data.result[0].nv_hoTen;
                        $scope.anh = response.data.result[0].nv_anh;
                    } else {
                        $scope.anh = "default.png";
                        $scope.ten = "Đăng nhập";
                    }
                }, function errorCallback(response) {
                    console.log(response);
                });
            }
        })
    </script>
</body>

</html>