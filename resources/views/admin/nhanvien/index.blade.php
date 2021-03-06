@extends('layouts.master')
@section('title')
Danh sách nhân viên
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
    <li class="breadcrumb-item active">Danh sách nhân viên</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="nhanvienController" ng-init="start = 0; number_card = 6;">
    @if (Session::has('alert-error'))
    <div aria-live="polite" aria-atomic="true" class="flex-column justify-content-center align-items-center" style="position: fixed; top:0; right:0; z-index: 100000;">
        <div class="toast bg-danger m-2" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true" style="width: 400px;">
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
        <div class="col">
            <button class="btn btn-dark mb-2" ng-click="showTable()"><i class="fas <%icon%>"></i></button>
        </div>
        <div class="col text-right">
            <div class="btn-group" role="group">
                <a href="{{route('admin.thongtinchung.create')}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Thêm mới"><i class="fas fa-plus-circle"></i></a>
                <a href="{{route('admin.nhanvien.print')}}" class="btn btn-secondary text-white" data-toggle="tooltip" data-placement="top" title="In ấn"><i class="fas fa-print"></i></a>
                <a href="{{route('admin.nhanvien.excel')}}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Xuất Excel"><i class="fas fa-file-excel"></i></a>
                <a href="{{route('admin.nhanvien.pdf')}}" class="btn btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Xuất PDF"><i class="fas fa-file-pdf"></i></a>
            </div>
        </div>
    </div>
    <div class="card" ng-show="!show">
        <div class="card-header">
            <form name="frmChucNang" class="row" novalidate>
                <div class="col-sm-4 text-sm-left text-center mb-sm-0">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Xem</div>
                        </div>
                        <select name="number_card" id="number_card" ng-model="number_card" class="form-control" value="6">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="9999">tất cả</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">mục</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-center mb-sm-0 mb-1">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-outline-secondary" ng-disabled="start<=0" ng-click="start=start-1">Trước</button>
                        <button class="btn btn-outline-secondary" ng-hide="start <= 1 || countPage((data | filter: keyWord).length).length == 3" ng-click="start=start-2">...</button>
                        <button ng-repeat="i in countPage((data | filter: keyWord).length)" ng-click="page(i)" ng-class="start==i?'btn btn-outline-secondary active':'btn btn-outline-secondary'" ng-hide="an(start, i, countPage((data | filter: keyWord).length).length)"><% i + 1 %></button>
                        <button class="btn btn-outline-secondary" ng-hide="start >= countPage((data | filter: keyWord).length).length - 2 || countPage((data | filter: keyWord).length).length == 3" ng-click="start=start+2">...</button>
                        <button class="btn btn-outline-secondary" ng-disabled="start>=countPage((data | filter: keyWord).length).length - 1" ng-click="start=start+1">Sau</button>
                    </div>
                </div>
                <div class="col-sm-4 text-sm-right text-center">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <select name="" id="" class="form-control" style="border-radius: .25rem 0 0 .25rem;" ng-model="field" ng-change="reset()">
                                <option value="1" id="check">Tên</option>
                                <option value="2">Số ĐT</option>
                                <option value="3">Địa chỉ</option>
                                <option value="4">Email</option>
                                <option value="5">Chức vụ</option>
                                <option value="6">Mã số</option>
                            </select>
                        </div>
                        <input type="text" placeholder="Tìm kiếm" class="form-control" style="border-radius: 0 .25rem .25rem 0;" ng-model="keyWord.nv_hoTen" ng-show="field==1">
                        <input type="text" placeholder="Tìm kiếm" class="form-control" style="border-radius: 0 .25rem .25rem 0;" ng-model="keyWord.nv_sdt" ng-show="field==2">
                        <input type="text" placeholder="Tìm kiếm" class="form-control" style="border-radius: 0 .25rem .25rem 0;" ng-model="keyWord.nv_noiOHienNay" ng-show="field==3">
                        <input type="text" placeholder="Tìm kiếm" class="form-control" style="border-radius: 0 .25rem .25rem 0;" ng-model="keyWord.nv_email" ng-show="field==4">
                        <input type="text" placeholder="Tìm kiếm" class="form-control" style="border-radius: 0 .25rem .25rem 0;" ng-model="keyWord.cvu_ten" ng-show="field==5">
                        <input type="text" placeholder="Tìm kiếm" class="form-control" style="border-radius: 0 .25rem .25rem 0;" ng-model="keyWord.nv_ma" ng-show="field==6">
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1" id="sortable">
                <div class="col" ng-repeat="d in data | filter: keyWord | limitTo: number_card: start*number_card">
                    <div class="card my-card">
                        <div class="card-header text-muted border-bottom-0 bg-cyan" style="cursor: move;">
                            <div class="card-title">
                                <h2 style="font-weight: bold;"><%d.nv_ma%></h2>
                            </div>
                            <div class="card-tools">
                                <a class="btn btn-outline-light" href="/admin/nhanvien/<%d.nv_ma%>">
                                    <i class="fas fa-info-circle"></i> Thông tin thêm
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img ng-src="/storage/avatar/<%d.nv_anh%>" class="img-fluid" alt="User Image" fallback-src="/storage/avatar/default.png">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="lead" style="font-style: italic;"><span><%d.nv_hoTen%></span></h5>
                                    <p class="text-muted text-sm"><b>Chức vụ: </b> <%d.cvu_ten%></p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>Địa chỉ: <%d.nv_noiOHienNay%></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>Điện thoại: <%d.nv_sdt%></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span>Email: <a href="mailto:<%d.nv_email%>"><%d.nv_email%></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" ng-show="show">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive table-head-fixed" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã nhân viên</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Chức vụ</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$d->nv_ma}}</td>
                                <td><img src="{{ Storage::exists('public/avatar/' . $d->nv_anh) ? asset('storage/avatar/' . $d->nv_anh) : asset('storage/avatar/default.png') }}" class="img-circle elevation-2 avatar" height="50px" alt="User Image"></td>
                                <td>{{$d->nv_hoTen}}</td>
                                <td>{{$d->chucVu->cvu_ten}}</td>
                                <td>{{$d->nv_noiOHienNay}}</td>
                                <td>{{$d->nv_sdt}}</td>
                                <td>{{$d->nv_email}}</td>
                                <td>
                                    <a href="{{route('admin.nhanvien.show',['id'=>$d->nv_ma])}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script src="{{ asset('themes/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $('.toast').toast('show');
    $(document).ready(function() {
        $("#sortable").sortable({
            cancel: '.card-body',
        });
        $("#sortable").sortable({
            cancel: '.card-footer',
        });
        $("#sortable").disableSelection();
        $('#myTable').DataTable({
            dom: "<'row'<'col-md-12 text-center'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-md-6'i><'col-md-6'p>>",
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            language: {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                },
                buttons: {
                    "copy": "Sao chép",
                    "excel": "Xuất ra file Excel",
                    "pdf": "Xuất ra file PDF",
                }
            },
            "lengthMenu": [
                [10, 15, 20, 25, 50, 100, -1],
                [10, 15, 20, 25, 50, 100, "Tất cả"]
            ]
        });
        document.getElementById('check').selected = "true";
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
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
    app.controller('nhanvienController', function($scope, $http) {
        $scope.show = false;
        $scope.number_card = 6;
        $scope.field = 1;
        $scope.icon = 'fa-th-large';
        $scope.showTable = function() {
            $scope.show = !$scope.show;
            if ($scope.show)
                $scope.icon = 'fa-bars';
            else
                $scope.icon = 'fa-th-large';
        }
        $scope.countPage = function(n) {
            var n = Math.ceil(n / $scope.number_card);
            var arr = [];
            for (var i = 0; i < n; i++)
                arr.push(i);
            return arr;
        }
        $scope.page = function(i) {
            $scope.start = i;
        }
        $scope.reset = function() {
            $scope.keyWord.nv_hoTen = '';
            $scope.keyWord.nv_sdt = '';
            $scope.keyWord.nv_noiOHienNay = '';
            $scope.keyWord.nv_email = '';
        }
        $scope.an = function(n, i, max) {
            if (n == 0 && (i == 0 || i == 1 || i == 2))
                return false;
            if (n == max - 1 && (i == max - 1 || i == max - 2 || i == max - 3))
                return false;
            if ((Math.abs(n - i) <= 1))
                return false;
            return true;
        }
        $http({
                url: "{{route('api.thongtin.nhanvien')}}",
                method: "GET",
            })
            .then(
                function success(respone) {
                    // console.table(respone.data.result);
                    $scope.data = respone.data.result;
                },
                function error(respone) {

                }
            );
    });
</script>

@endsection