@extends('layouts.master')
@section('title')
Danh sách thông tin chung
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/toastr/toastr.min.css') }}">
<style>
    table#myTable {
        height: 500px;
    }

    /* table#myTable thead tr th{
        width: 540px;
    } */
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Danh sách thông tin chung</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="trinhdoController">
    <div class="row">
        <div class="col text-right">
            <div class="btn-group" role="group">
                <a href="" id="add" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Thêm mới"><i class="fas fa-plus-circle"></i></a>
                <a href="" id="print" class="btn btn-secondary text-white" data-toggle="tooltip" data-placement="top" title="In ấn"><i class="fas fa-print"></i></a>
                <a href="{{route('admin.vanbang.excel')}}" id="excel" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Xuất Excel"><i class="fas fa-file-excel"></i></a>
                <a href="" id="pdf" class="btn btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Xuất PDF"><i class="fas fa-file-pdf"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-responsive table-bordered table-head-fixed w-100 order-column" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ảnh</th>
                                <th>Họ và tên</th>
                                <th>Ngày sinh</th>
                                <th>Chức vụ</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dsttc as $ttc)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$loop->index}}</td>
                                <td>{{$loop->index}}</td>
                                <td>{{$loop->index}}</td>
                                <td>{{$loop->index}}</td>
                                <td><button data-id="{{$loop->index + 1}}">toggle</button></td>
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
<script src="{{ asset('themes/AdminLTE/plugins/toastr/toastr.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
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
                [20, 30, 40, 50, 100, 200, -1],
                [10, 15, 20, 25, 50, 100, "Tất cả"]
            ]
        });
    });
    app.controller('trinhdoController', function($scope, $http) {});
</script>
@endsection