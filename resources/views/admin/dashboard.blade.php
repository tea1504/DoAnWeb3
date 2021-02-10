@extends('layouts.master')
@section('title')
Dashboard
@endsection
@section('custom-css')
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
                <a href="{{route('admin.nhanvien.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{route('admin.nhanvien.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{route('admin.luong.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endcan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color: #0000;">
                <div class="card-header bg-cyan h1 font-weight-bold">Quá trình làm việc</div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="time-label">
                            <span class="bg-navy">10 Feb. 2014</span>
                        </div>
                        <div>
                            <i class="fas fa-briefcase"></i>
                            <div class="timeline-item">
                                <div class="timeline-body">
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script>
    app.controller('dashboardController', function($scope, $http) {
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
        }, 1000 * 60 * 5)
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
                            <h3 class="timeline-header no-border"><a>Chức vụ</a></h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-building bg-lightblue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header no-border"><a>Đơn vị</a></h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-percent bg-info"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header no-border"><a>Hệ số lương</a></h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>`;
            console.log($('.timeline').html(html));
        });
    })
</script>
@endsection