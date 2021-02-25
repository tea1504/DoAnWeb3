@extends('layouts.master')
@section('title')
Danh sách xã
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/toastr/toastr.min.css') }}">
<style>
    table#myTable {
        height: 540px;
    }
    table#myTable thead tr th{
        width: 450px;
        text-align: center;
    }
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Danh sách xã</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="quanlyController">
    <div class="row">
        <div class="col text-right">
            <div class="btn-group" role="group">
                <a href="{{route('admin.xa.create')}}" id="add" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Thêm mới</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-responsive table-striped table-bordered table-head-fixed w-100 order-column" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên xã</th>
                                <th>Tên huyện và tỉnh</th>
                                <th>Ngày tạo mới</th>
                                <th>Ngày cập nhật</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dsx as $x)
                            <tr>
                                <td class="align-middle text-center">{{$loop->index + 1}}</td>
                                <td class="align-middle">{{$x->x_ten}}</td>
                                <td class="align-middle">{{$x->huyen->h_ten}}, {{$x->huyen->tinh->t_ten}}</td>
                                <td class="align-middle text-center">{{$x->x_taoMoi->format('d/m/Y H:m:s')}}</td>
                                <td class="align-middle text-center">{{$x->x_capNhat->format('d/m/Y H:m:s')}}</td>
                                <td class="align-middle text-center">
                                <a href="{{route('admin.xa.edit', ['id' => $x->x_ma])}}" class="btn btn-success btn-sm" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <form class="fDelete btn p-0" method="POST" action="{{route('admin.xa.destroy', ['id'=>$x->x_ma])}}">
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
<script src="{{ asset('themes/AdminLTE/plugins/toastr/toastr.min.js') }}"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
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
                [10, 15, 20, 25, 50, 100, -1],
                [10, 15, 20, 25, 50, 100, "Tất cả"]
            ]
        });
    });
    $('.fDelete').click(function(e) {
        e.preventDefault();
        var dataSend = {
            '_token': '{{csrf_token()}}',
            '_method': 'DELETE'
        };
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa ?',
            html: 'Dữ liệu sẽ không thể phục hồi lại được',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'post',
                    url: $(this).attr('action'),
                    data: dataSend,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Đã xóa thành công'
                        }).then(function() {
                            window.location = "{{route('admin.xa.index')}}"
                        })
                    },
                    error: function(response) {
                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: '<i class="fas fa-exclamation-circle"></i> Thất bại',
                            autohide: true,
                            delay: 2000,
                            body: "Đã xảy ra lỗi trong khi xóa dữ liệu. Hãy thử lại sau."
                        })
                    }
                });
            } else {
                Swal.fire({
                    title: 'Đã hủy xóa',
                    icon: 'info',
                    timer: 1000,
                })
            }
        })
    });
    app.controller('quanlyController', function($scope, $http) {
        
    });
</script>
@endsection 