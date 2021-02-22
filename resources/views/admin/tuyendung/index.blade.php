@extends('layouts.master')
@section('title')
Danh sách tuyển dụng
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/toastr/toastr.min.css') }}">
<style>
    table#myTable {
        height: 540px;
    }

    table#myTable tr th {
        width: 540px;
    }
    .btn{
        font-size:small;
    }
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Danh sách tuyển dụng</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="tuyendungController">
    <div class="row">
        <div class="col text-right">
            <div class="btn-group" role="group">
                @can('create', App\TuyenDung::class)
                <a href="{{route('admin.tuyendung.create') }}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Thêm mới"><i class="fas fa-plus-circle"></i></button>
                @endcan
                @can('inAn', App\TuyenDung::class)
                <a href="{{route('admin.tuyendung.print') }}" class="btn btn-secondary text-white" data-toggle="tooltip" data-placement="top" title="In ấn"><i class="fas fa-print"></i></a>
                <a href="{{route('admin.tuyendung.excel') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Xuất Excel"><i class="fas fa-file-excel"></i></button>
                <a href="{{route('admin.tuyendung.pdf') }}" class="btn btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Xuất PDF"><i class="fas fa-file-pdf"></i></a>
                @endcan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover table-responsive table-bordered table-head-fixed w-100" id="myTable">
                        <thead>
                            <tr>
                                <th width="5px">Mã tuyển dụng</th>
                                <th>Mã nhân viên</th>
                                <th>Ngày tuyển dụng</th>
                                <th>Nghề nghiệp trước đó</th>
                                <th>Cơ quan tuyển dụng</th>
                                <th>Chức vụ</th>
                                <th>Ngày vào làm</th>
                                <th>Công việc</th>
                                <th width="20px">Sở trường</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dstuyendung as $td)
                            <tr>
                                <td class="text-center">{{$td -> td_ma}}</td>
                                <td>{{$td -> nhanVien -> nv_hoTen}}</td>
                                <td>{{$td -> td_ngay->format('d/m/Y')}}</td>
                                <td>{{$td -> td_ngheTruocDay}}</td>
                                <td>{{$td -> td_coQuanTuyen}}</td>
                                <td>{{$td ->chucVu->cvu_ten}}</td>
                                <td>{{$td -> td_ngayLam->format('d/m/Y')}}</td>
                                <td>{{$td ->congViec->cv_ten}}</td>
                                <td>{{$td -> td_soTruong}}</td>
                                <td>{{$td -> td_taoMoi->format('d/m/Y  H:i:s')}}</td>
                                <td>{{$td -> td_capNhat->format('d/m/Y H:i:s')}}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('admin.tuyendung.edit',['id' => $td->td_ma]) }}"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Sửa">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <form name="frmDelete" id="frmDelete" class="frmDelete btn p-0"  action="{{route('admin.tuyendung.destroy', ['id'=>$td->td_ma])}}" method="POST"
                                        data-id="{{$td->td_ma}}" data-nv="{{$td -> nhanVien -> nv_hoTen}}"  novalidate>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
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
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
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
    app.controller('tuyendungController', function($scope, $http) {});
    $('.frmDelete').click(function(e) {
        e.preventDefault();
        var dataSend = {
            'id': $(this).data('id'),
            '_token': '{{csrf_token()}}',
            '_method': 'DELETE'
        };
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa ?',
            html: 'Dữ liệu tuyển dụng của nhân viên <strong>' + $(this).data('nv') + '</strong> sẽ không thể phục hồi lại được',
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
                            window.location = "{{route('admin.tuyendung.index')}}"
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
</script>
@endsection