@extends('layouts.master')
@section('title')
Dashboard
@endsection
@section('custom-css')
<style>
    .detail {
        opacity: 1;
    }

    .hide-detail {
        opacity: 0;
    }

    .opacity-50 {
        opacity: .5;
    }

    .icon img {
        position: absolute;
        top: 20px;
        right: 20px;
        height: 80px;
        opacity: .3;
        transition: 1s;
    }

    .small-box:hover .icon img {
        top: 10px;
        right: 10px;
        height: 100px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid" ng-controller="dashboardController">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><%numberStaff%>/<%numberFemaleStaff%></h3>

                    <p>Tổng số cán bộ / cán bộ nữ</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                @can('viewAny',App\NhanVien::class)
                <a href="{{route('admin.nhanvien.index')}}" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
                @endcan
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-fuchsia">
                <div class="inner">
                    <h3><%avgAge%></h3>

                    <p>Độ tuổi trung bình</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
                @can('viewAny',App\NhanVien::class)
                <a href="{{route('admin.nhanvien.index')}}" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
                @endcan
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3><%avgYearsWork%></h3>

                    <p>Số năm làm việc trung bình</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="{{route('admin.tuyendung.index')}}" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3><%heSoMax%></h3>

                    <p>Hệ số lương cao nhất</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                @can('view', App\Luong::class)
                <a href="{{route('admin.luong.index')}}" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
                @endcan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="small-box bg-gradient-indigo" ng-mouseover="show=true" ng-mouseleave="show=false" style="position: relative;">
                        <div class="inner">
                            <h3 ng-class="{'opacity-50': show}">Trang cá nhân</h3>
                            <p ng-class="{'opacity-50': show}">{{Session::get('user')[0]->nv_hoTen}}</p>
                        </div>
                        <div class="icon">
                            <img src="{{asset('storage/avatar/'.Session::get('user')[0]->nv_anh)}}" alt="user image" ng-class="['img-circle elevation-2 bg-white', {'opacity-50': show}]" height="100px">
                        </div>
                        <div ng-class="{detail: show, 'hide-detail': !show}" style="height: 100%; width:100%; background-color: #0008; display: flex; justify-content: center; align-items: center; position: absolute; top: 0; left: 0; transition: .2s;">
                            <a href="" class="text-white">
                                <h1>Đi đến <i class="fas fa-arrow-circle-right"></i></h1>
                            </a>
                        </div>
                        <a href="" ng-class="['small-box-footer', {'opacity-50': show}]">Đi đến</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="small-box bg-gradient-danger">
                        <div class="inner">
                            <h3>Email</h3>

                            <p>Liên hệ với quản trị viên</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <a href="{{route('admin.lienhe')}}" class="small-box-footer">Liên hệ</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Lịch
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse" data-toggle="tooltip" data-placement="top" title="Thu nhỏ/Phóng to">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove" data-toggle="tooltip" data-placement="top" title="Đóng">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-0" style="display: block;">
                            <div id="calendar" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-gradient-cyan">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-project-diagram"></i>
                                Quá trình làm việc
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-info btn-sm" data-toggle="tooltip" data-placement="top" title="Chi tiết">
                                    <a href="{{route('admin.quatrinhcongtac.index')}}"><i class="fas fa-eye"></i></a>
                                </button>
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse" data-toggle="tooltip" data-placement="top" title="Thu nhỏ/Phóng to">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove" data-toggle="tooltip" data-placement="top" title="Đóng">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="max-height: 490px!important; overflow: auto;">
                            <div class="timeline">
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: #0000;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    </div>
</div>
@endsection
@section('custom-scripts')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // $('[data-toggle="tooltip"]').mouseenter(function() {
    //     var that = $(this)
    //     that.tooltip('show');
    //     setTimeout(function() {
    //         that.tooltip('hide');
    //     }, 2000);
    // });

    $('[data-toggle="tooltip"]').mouseleave(function() {
        $(this).tooltip('hide');
    });
    app.controller('dashboardController', function($scope, $http) {
        $scope.show = false;

        function getData() {
            $http({
                method: 'GET',
                url: "{{route('api.nhanvien.soluong')}}"
            }).then(function successCallback(response) {
                $scope.numberStaff = response.data.result[0].soluong;
            });
            $http({
                method: 'GET',
                url: "{{route('api.nhanvien.soluong.nu')}}"
            }).then(function successCallback(response) {
                $scope.numberFemaleStaff = response.data.result[0].soluong;
            });
            $http({
                method: 'GET',
                url: "{{route('api.nhanvien.tuoi.trungbinh')}}"
            }).then(function successCallback(response) {
                $scope.avgAge = response.data.result[0].tuoiTrungBinh;
            });
            $http({
                method: 'GET',
                url: "{{route('api.tuyendung.ngaylam.trungbinh')}}"
            }).then(function successCallback(response) {
                $scope.avgYearsWork = response.data.result[0].soNamLamViecTB;
            });
            $http({
                method: 'GET',
                url: "{{route('api.luong.heso')}}"
            }).then(function successCallback(response) {
                $scope.heSoMax = response.data.result[0].heSoMax;
            });
        }
        getData();
        setInterval(function() {
            getData();
        }, 1000 * 60 * 5);
        $http({
            method: 'GET',
            url: "{{route('api.nhanvien.congviechientai')}}?nv_ma={{Session::get('user')[0]->nv_ma}}"
        }).then(function successCallback(response) {
            $scope.CVHienTai = response.data.result[0];
            $http({
                method: 'GET',
                url: "{{route('api.nhanvien.quatrinhlamviec')}}?nv_ma={{Session::get('user')[0]->nv_ma}}"
            }).then(function successCallback(response) {
                var html = '';
                $scope.quatrinh = response.data.result;
                $scope.quatrinh.forEach(function(item, index) {
                    html += `<div class="time-label">
                            <span class="bg-navy">${item.qtct_tuNgay} - ${item.qtct_denNgay}</span>
                        </div>
                        <div>
                            <i class="fas fa-address-card bg-primary"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header no-border"><a>Chức vụ</a> ${item.cvu_ten}</h3>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-building bg-lightblue"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header no-border"><a>Đơn vị</a> ${item.dv_ten}, ${item.dvql_ten}</h3>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-percent bg-info"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header no-border"><a>Hệ số lương</a> ${item.nb_heSoLuong}</h3>
                            </div>
                        </div>
                        `;
                })
                html += `
                    <div class="time-label">
                        <span class="bg-navy">Hiện tại</span>
                    </div>
                    <div>
                        <i class="fas fa-address-card bg-primary"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header no-border"><a>Chức vụ</a> ${$scope.CVHienTai.cvu_ten}</h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-building bg-lightblue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header no-border"><a>Đơn vị</a> ${$scope.CVHienTai.dv_ten}, ${$scope.CVHienTai.dvql_ten}</h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-percent bg-info"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header no-border"><a>Hệ số lương</a> ${$scope.CVHienTai.nb_heSoLuong}</h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>`;
                $('.timeline').html(html);
            });
        });
    })
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true,
        weeks: true,
        lang: 'vi'
    });
</script>
@endsection