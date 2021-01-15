@extends('layouts.master')
@section('title')
Danh sách nhân viên
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<style>
    table {
        height: 500px;
        width: 100%;
    }

    table td {
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
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Danh sách nhân viên</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="nhanvienController">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-outline-danger mb-3" ng-click="showTable()">Bấm <% show %></button>
        </div>
    </div>
    <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1" ng-show="!show" id="sortable">
        @foreach($data as $d)
        <div class="col">
            <div class="card my-card">
                <div class="card-header bg-dark" style="cursor: move;">
                    <div class="image">
                        <img src="{{ asset('themes/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" height="50px" alt="User Image">
                        Featured
                    </div>
                </div>
                <div class="card-body">
                    {{ $d }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row" ng-show="show">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive table-head-fixed" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td><img src="{{ asset('themes/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" height="50px" alt="User Image"></td>
                                <td>{{$d}}</td>
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
    $(document).ready(function() {
        $("#sortable").sortable({
            cancel: '.card-body',
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
    });
    app.controller('nhanvienController', function($scope) {
        $scope.show = false;
        $scope.showTable = function() {
            $scope.show = !$scope.show;
        }
    });
</script>

@endsection