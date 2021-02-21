@extends('layouts.master')
@section('title')
Danh sách tuyển dụng
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

<style>
    table#myTable {
        height: 540px;
        width: 100%;
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
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <button class="btn btn-dark mb-3" ng-click="showTable()"><i class="fas <%icon%>"></i></button>
        </div>
        <div class="col text-right">
            <div class="btn-group" role="group">
                <a href="{{route('admin.tuyendung.create') }}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Thêm mới"><i class="fas fa-plus-circle"></i></button>
                <a href="{{route('admin.tuyendung.print') }}" class="btn btn-secondary text-white" data-toggle="tooltip" data-placement="top" title="In ấn"><i class="fas fa-print"></i></a>
                <a href="{{route('admin.tuyendung.excel') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Xuất Excel"><i class="fas fa-file-excel"></i></button>
                <a href="{{route('admin.tuyendung.pdf') }}" class="btn btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Xuất PDF"><i class="fas fa-file-pdf"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive table-head-fixed" id="myTable" >
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
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dstuyendung as $td)
                            <tr>
                                <td>{{$td -> td_ma}}</td>
                                <td>{{$td -> nv_ma}}</td>
                                <td>{{$td -> td_ngay->format('d/m/Y')}}</td>
                                <td>{{$td -> td_ngheTruocDay}}</td>
                                <td>{{$td -> td_coQuanTuyen}}</td>
                                <td>{{$td ->chucVu->cvu_ten}}</td>
                                <td>{{$td -> td_ngayLam->format('d/m/Y')}}</td>
                                <td>{{$td ->congViec->cv_ten}}</td>
                                <td>{{$td -> td_soTruong}}</td>
                                <td>{{$td -> td_taoMoi->format('d/m/Y  H:i:s')}}</td>
                                <td>{{$td -> td_capNhat->format('d/m/Y H:i:s')}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Sửa">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
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
</script>
<script>
   
</script>
@endsection