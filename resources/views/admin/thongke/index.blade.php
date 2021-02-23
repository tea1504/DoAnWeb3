@extends('layouts.master')
@section('title')
Thống kê
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{asset('themes/AdminLTE/plugins/chart.js/Chart.min.css')}}">
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Thống kê</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="thongkeController">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-gradient-info">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        Tuổi
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-light btn-sm" data-card-widget="collapse" data-toggle="tooltip" data-placement="top" title="Thu nhỏ/Phóng to">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-light btn-sm" data-card-widget="remove" data-toggle="tooltip" data-placement="top" title="Đóng">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0" style="display: block;">
                    <canvas id="charTuoi" style="display: block; width: 635px; height: 317px;" class="bg-white"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-gradient-lightblue">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        Giới tính
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-light btn-sm" data-card-widget="collapse" data-toggle="tooltip" data-placement="top" title="Thu nhỏ/Phóng to">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-light btn-sm" data-card-widget="remove" data-toggle="tooltip" data-placement="top" title="Đóng">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0" style="display: block;">
                    <canvas id="charGioiTinh" style="display: block; width: 635px; height: 317px;" class="bg-white"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-gradient-primary">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        Dân tộc
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-light btn-sm" data-card-widget="collapse" data-toggle="tooltip" data-placement="top" title="Thu nhỏ/Phóng to">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-light btn-sm" data-card-widget="remove" data-toggle="tooltip" data-placement="top" title="Đóng">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0" style="display: block;">
                    <canvas id="charDanToc" style="display: block; width: 635px; height: 317px;" class="bg-white"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-gradient-purple">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        Tôn giáo
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-light btn-sm" data-card-widget="collapse" data-toggle="tooltip" data-placement="top" title="Thu nhỏ/Phóng to">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-light btn-sm" data-card-widget="remove" data-toggle="tooltip" data-placement="top" title="Đóng">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0" style="display: block;">
                    <canvas id="charTonGiao" style="display: block; width: 635px; height: 317px;" class="bg-white"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script src="{{asset('themes/AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    app.controller('thongkeController', function($scope, $http) {
        // Tuoi 
        var dataTuoi = [];
        var labelTuoi = [];
        $http({
            method: 'GET',
            url: "{{route('api.nhanvien.tuoi.trongkhoang')}}?tu=0&&den=20"
        }).then(function successCallback(response) {
            dataTuoi.push(response.data.result.soLuong)
            labelTuoi.push('0 - 20')
            $http({
                method: 'GET',
                url: "{{route('api.nhanvien.tuoi.trongkhoang')}}?tu=21&&den=40"
            }).then(function successCallback(response) {
                dataTuoi.push(response.data.result.soLuong)
                labelTuoi.push('21 - 40')
                $http({
                    method: 'GET',
                    url: "{{route('api.nhanvien.tuoi.trongkhoang')}}?tu=41&&den=60"
                }).then(function successCallback(response) {
                    dataTuoi.push(response.data.result.soLuong)
                    labelTuoi.push('41 - 60')
                    $http({
                        method: 'GET',
                        url: "{{route('api.nhanvien.tuoi.trongkhoang')}}?tu=61&&den=100"
                    }).then(function successCallback(response) {
                        dataTuoi.push(response.data.result.soLuong)
                        labelTuoi.push('>60')
                        var tuoi = document.getElementById('charTuoi').getContext('2d');
                        var charTuoi = new Chart(tuoi, {
                            type: 'bar',
                            data: {
                                labels: labelTuoi,
                                datasets: [{
                                    label: 'Số lượng cán bộ',
                                    data: dataTuoi,
                                    backgroundColor: ['rgba(23, 120, 255, 1)', 'rgba(23, 120, 210, 1)', 'rgba(23, 120, 165, 1)', 'rgba(23, 120, 120, 1)'],
                                    borderColor: ['rgba(23, 120, 255, 1)', 'rgba(23, 120, 210, 1)', 'rgba(23, 120, 165, 1)', 'rgba(23, 120, 120, 1)'],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    text: 'Biểu đồ thống kê số tuổi cán bộ theo khoảng'
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    });
                });
            });
        });
        // End Tuoi 
        // Gioi tinh 
        var dataGioiTinh = [];
        var labelGioiTinh = [];
        $http({
            method: 'GET',
            url: "{{route('api.nhanvien.soluong.nu')}}"
        }).then(function successCallback(response) {
            dataGioiTinh.push(response.data.result[0].soluong);
            labelGioiTinh.push('Nữ');
            $http({
                method: 'GET',
                url: "{{route('api.nhanvien.soluong')}}"
            }).then(function successCallback(response) {
                dataGioiTinh.push(response.data.result[0].soluong - dataGioiTinh[0]);
                labelGioiTinh.push('Nam');
                var gioiTinh = document.getElementById('charGioiTinh').getContext('2d');
                var charGioiTinh = new Chart(gioiTinh, {
                    type: 'pie',
                    data: {
                        labels: labelGioiTinh,
                        datasets: [{
                            label: '# số lượng cán bộ',
                            data: dataGioiTinh,
                            backgroundColor: ['rgba(255, 99, 132)', 'rgba(23, 120, 247)'],
                            borderColor: ['rgba(255, 99, 132)', 'rgba(23, 120, 247, 1)'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Biểu đồ thống kê giới tính'
                        },
                    }
                });
            });
        });
        // End Gioi tinh 
        // Dân tộc 
        var dataDanToc = [];
        var labelDanToc = [];
        $http({
            method: 'GET',
            url: "{{route('api.dantoc.thongke')}}"
        }).then(function successCallback(response) {
            response.data.result.forEach(function(item, index, array) {
                dataDanToc.push(item.soLuong);
                labelDanToc.push(item.dt_ten);
            });
            var danToc = document.getElementById('charDanToc').getContext('2d');
            var charDanToc = new Chart(danToc, {
                type: 'bar',
                data: {
                    labels: labelDanToc,
                    datasets: [{
                        label: '# số lượng cán bộ',
                        data: dataDanToc,
                        backgroundColor: 'rgba(255, 99, 132)',
                        borderColor: 'rgba(255, 99, 132)',
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Biểu đồ thống kê số lượng nhân viên theo dân tộc'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
        // End Dân tộc 
        // Tôn giáo
        var dataTonGiao = [];
        var labelTonGiao = [];
        $http({
            method: 'GET',
            url: "{{route('api.tongiao.thongke')}}"
        }).then(function successCallback(response) {
            response.data.result.forEach(function(item, index, array) {
                dataTonGiao.push(item.soLuong);
                labelTonGiao.push(item.tg_ten);
            });
            var danToc = document.getElementById('charTonGiao').getContext('2d');
            var charTonGiao = new Chart(danToc, {
                type: 'bar',
                data: {
                    labels: labelTonGiao,
                    datasets: [{
                        label: '# số lượng cán bộ',
                        data: dataTonGiao,
                        backgroundColor: 'rgba(23, 120, 247)',
                        borderColor: 'rgba(23, 120, 247)',
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Biểu đồ thống kê số lượng nhân viên theo tôn giáo'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
        // End Tôn giáo 
    });
</script>
@endsection