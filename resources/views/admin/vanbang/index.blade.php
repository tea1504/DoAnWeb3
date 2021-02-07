@extends('layouts.master')
@section('title')
Danh sách văn bằng chứng chỉ
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<style>
    table#myTable {
        height: 540px;
    }
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Danh sách văn bằng chứng chỉ</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="trinhdoController">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-6">
                    <select name="nhanVien" id="nhanVien" class="form-control">
                        <option value="" selected>Tất cả</option>
                        @foreach($dsnv as $nv)
                        <option value="{{$nv->nv_ma}}">{{$nv->nv_hoTen}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col text-right">
            <div class="btn-group" role="group">
                <a href="" id="add" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Thêm mới"><i class="fas fa-plus-circle"></i></a>
                <a href="{{route('admin.nhanvien.print')}}" class="btn btn-secondary text-white" data-toggle="tooltip" data-placement="top" title="In ấn"><i class="fas fa-print"></i></a>
                <a href="{{route('admin.nhanvien.excel')}}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Xuất Excel"><i class="fas fa-file-excel"></i></a>
                <a href="{{route('admin.nhanvien.pdf')}}" class="btn btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Xuất PDF"><i class="fas fa-file-pdf"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover table-responsive table-bordered table-head-fixed w-100" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nhân viên</th>
                            <th>Trường đào tạo</th>
                            <th>Tên văn bằng</th>
                            <th>Loại văn bằng</th>
                            <th>Hình thức</th>
                            <th>Trình độ</th>
                            <th>Từ ngày</th>
                            <th>Đến ngày</th>
                            <th>Thêm mới</th>
                            <th>Cập nhật</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
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
        var index = 1;
        var table = $('#myTable').DataTable({
            ajax: {
                url: "{{route('api.nhanvien.vbcc')}}",
                dataSrc: 'result'
            },
            columns: [{
                    data: "vbcc_ma"
                },
                {
                    data: "nv_hoTen"
                },
                {
                    data: "vbcc_tenTruong"
                },
                {
                    data: "vbcc_ten"
                },
                {
                    data: "lvbcc_ten"
                },
                {
                    data: "vbcc_hinhThuc"
                },
                {
                    data: "vbcc_trinhDo"
                },
                {
                    data: "vbcc_tuNgay"
                },
                {
                    data: "vbcc_denNgay"
                },
                {
                    data: "vbcc_taoMoi",
                    render: function(data, type, row, meta) {
                        return (new Date(data)).toLocaleDateString("vn");
                    }
                },
                {
                    data: "vbcc_capNhat",
                    render: function(data, type, row, meta) {
                        return (new Date(data)).toLocaleDateString("vn");
                    }
                },
                {
                    data: {
                        'nv_ma': 'nv_ma',
                        'vbcc_ma': 'vbcc_ma'
                    },
                    render: function(data, type, row, meta) {
                        return `<a href="/admin/vanbang/${data['vbcc_ma']}/edit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <form class="fDelete btn p-0" method="POST" action="admin/vanbang/${data['vbcc_ma']}" data-id="${data['vbcc_ma']}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>`;
                    }
                },
            ],
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
        $('#nhanVien').change(function(e) {
            e.preventDefault();
            table.ajax.url("{{route('api.nhanvien.vbcc')}}" + "?nv_ma=" + $(this).val());
            table.ajax.reload();
            $('#add').attr('href', getLink() + "/" + $('#nhanVien').val())
        });

        function getLink() {
            return "{{route('admin.vanbang.create_id')}}"
        }
        $('#add').attr('href', getLink() + "/" + $('#nhanVien').val())
    });
    app.controller('trinhdoController', function($scope, $http) {});
</script>
@endsection