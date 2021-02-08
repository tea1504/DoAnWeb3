@extends('layouts.master')
@section('title')
Danh sách khen thưởng
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
    <li class="breadcrumb-item active">Danh sách khen thưởng</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="khuyenthuongController" ng-init="start = 0;">
    <div class="row">
        <div class="col text-right">
            <div class="btn-group" role="group">
                <a href="{{ route('admin.khenthuong.create') }}">
                    <button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Thêm mới"><i class="fas fa-plus-circle"></i></button>
                </a>
                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="In ấn"><i class="fas fa-print"></i></button>
                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Xuất Excell"><i class="fas fa-file-excel"></i></button>
                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Xuất PDF"><i class="fas fa-file-pdf"></i></button>
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
                                <th>Mã khen thưởng</th>
                                <th>Tên</th> 
                                <th>Ngày ký</th>
                                <th>Người ký</th>
                                <th>Lý do</th>
                                <th>Tạo mới</th>
                                <th>Cập nhật</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsachkhenthuong as $kt)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$kt->kt_ma}}</td>
                                <td>{{$kt->nhanVien->nv_hoTen}}</td>
                                <td>{{$kt->kt_ngayKy}}</td>
                                <td>{{$kt->nguoiKy->nv_hoTen}}</td>
                                <td>{{$kt->kt_lyDo}}</td>                         
                                <td>{{$kt->kt_taoMoi}}</td>                         
                                <td>{{$kt->kt_capNhat}}</td>                         
                                <td>
                                    <a href="{{ route('admin.khenthuong.edit', ['id' => $kt->kt_ma]) }}" class="btn btn-warning " data-toggle="tooltip" data-placement="top" title="Sửa">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true">Sửa</i>
                                    </a>
                                    
                                    <!-- <a href="#" class="btn btn-danger btnDelete" data-toggle="tooltip" data-placement="top" title="xóa">
                                        <i class="fa fa-trash-o" aria-hidden="true">Xóa</i>
                                    </a> -->
                                    <form method="post" action="{{ route('admin.khenthuong.destroy', ['id' => $kt->kt_ma]) }}" class="pull-left">
                                        <input type="hidden" name="_method" value="DELETE" />                                      
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btnDelete">Xóa</button>
                                    </form>
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
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>

@endsection