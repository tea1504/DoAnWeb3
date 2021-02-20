@extends('layouts.master')
@section('title')
Danh sách thông tin chung
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/toastr/toastr.min.css') }}">
<style>
    table#myTable {
        height: 540px;
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
<div class="container-fluid" ng-controller="thongtinController">
    <div class="modal fade" tabindex="-1" id="myModal">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h5 class="modal-title"><%thongTin.nv_ma%> - <%thongTin.nv_hoTen%></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img ng-src="/storage/avatar/<%thongTin.nv_anh%>" class="img-fluid" alt="User Image" fallback-src="/storage/avatar/default.png">
                        </div>
                        <div class="col-md-8">
                            <p><strong>Tên gọi khác :</strong> <%thongTin.nv_tenGoiKhac%></p>
                            <p><strong>Giới tính :</strong> <%thongTin.nv_gioiTinh==1?'Nam':'Nữ'%></p>
                            <p><strong>Trình độ chuyên môn :</strong> <%thongTin.nv_trinhDoChuyenMon%></p>
                            <p><strong>Năm sinh :</strong> <%thongTin.nv_ngaySinh | date:'dd/MM/yyyy'%></p>
                            <p><strong>Dân tộc :</strong> <%thongTin.dt_ten%></p>
                            <p><strong>Tôn giáo :</strong> <%thongTin.tg_ten%></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Hộ khẩu thường trú :</strong> <%thongTin.nv_hoKhauThuongTru%></p>
                            <p><strong>Nơi ở hiện nay :</strong> <%thongTin.nv_noiOHienNay%></p>
                            <p><strong>Ngày vào Đảng :</strong> <%thongTin.nv_ngayVaoDang | date:'dd/MM/yyyy'%>, <strong>Ngày vào Đảng chính thức :</strong> <%thongTin.nv_ngayVaoDangChinhThuc | date:'dd/MM/yyyy'%></p>
                            <p><strong>Ngày nhập ngũ :</strong> <%thongTin.nv_ngayNhapNgu | date:'dd/MM/yyyy'%>, <strong>Ngày xuất ngũ :</strong> <%thongTin.nv_ngayXuatNgu | date:'dd/MM/yyyy'%>, <strong>Quân hàm :</strong> <%thongTin.nv_quanHam%></p>
                            <p><strong>Sức khỏe :</strong> <%thongTin.nv_sucKhoe%>, <strong>Chiều cao :</strong> <%thongTin.nv_chieuCao%> m, <strong>Cân nặng :</strong> <%thongTin.nv_canNang%> kg, <strong>Nhóm máu :</strong> <%thongTin.nm_ten%></p>
                            <p><strong>Hạng thương binh :</strong> <%thongTin.nv_hangThuongBinh%>, <strong>Gia đình chính sách :</strong> <%thongTin.nv_giaDinhChinhSach%></p>
                            <p><strong>CMND/CCCD :</strong> <%thongTin.nv_cmnd%>, <strong>Ngày cấp :</strong> <%thongTin.nv_cmndNgayCap | date:'dd/MM/yyyy'%>, <strong>Bảo hiểm xã hội :</strong> <%thongTin.nv_bhxh%></p>
                            <p><strong>Trình độ :</strong> <%thongTin.td_ten%></p>
                            <p><strong>Số điện thoại :</strong> <%thongTin.nv_sdt%>, <strong>Email :</strong> <%thongTin.nv_email%></p>
                            <p><strong>Chức vụ :</strong> <%thongTin.cvu_ten%></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-cyan">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="" class="btn btn-success" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit" aria-hidden="true"></i> Thêm mới</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col text-right">
            <div class="btn-group" role="group">
                <a href="{{route('admin.thongtinchung.create')}}" id="add" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Thêm mới"><i class="fas fa-plus-circle"></i></a>
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
                    <table class="table table-hover table-responsive table-striped table-bordered table-head-fixed w-100 order-column" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ảnh</th>
                                <th>Họ và tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Chức vụ</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Tạo mới</th>
                                <th>Cập nhật</th>
                                <th width="150px">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dsttc as $ttc)
                            <tr>
                                <td class="align-middle text-center">{{$loop->index + 1}}</td>
                                <td class="align-middle"><img src="{{ Storage::exists('public/avatar/' . $ttc->nv_anh) && ($ttc->nv_anh!=null) ? asset('storage/avatar/' . $ttc->nv_anh) : asset('storage/avatar/default.png') }}" class="img-circle border bg-white" height="100px" alt="User Image"></td>
                                <td class="align-middle">{{$ttc->nv_hoTen}}</td>
                                <td class="align-middle">{{$ttc->nv_gioiTinh==1?'Nam':'Nữ'}}</td>
                                <td class="align-middle">{{$ttc->nv_ngaySinh->format('d/m/Y')}}</td>
                                <td class="align-middle">{{$ttc->chucVu->cvu_ten}}</td>
                                <td class="align-middle">{{$ttc->nv_email}}</td>
                                <td class="align-middle">{{$ttc->nv_sdt}}</td>
                                <td class="align-middle">{{$ttc->nv_taoMoi->format('d/m/Y H:m:s')}}</td>
                                <td class="align-middle">{{$ttc->nv_capNhat->format('d/m/Y H:m:s')}}</td>
                                <td class="align-middle text-center">
                                    <button ng-click="layThongTin('{{$ttc->nv_ma}}')" type="button" class="btn btn-secondary btn-show btn-sm" data-toggle="tooltip" data-placement="top" title="Xem chi tiết"><i class="fas fa-eye"></i></button>
                                    <a href="{{route('admin.thongtinchung.edit', ['id' => $ttc->nv_ma])}}" class="btn btn-success btn-sm" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <form class="fDelete btn p-0" method="POST" action="{{route('admin.thongtinchung.destroy', ['id' => $ttc->nv_ma])}}" data-nv="{{$ttc->nv_hoTen}}" data-id="{{$ttc->nv_ma}}">
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
            'id': $(this).data('id'),
            '_token': '{{csrf_token()}}',
            '_method': 'DELETE'
        };
        console.log(dataSend);
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa ?',
            html: 'Dữ liệu của nhân viên <strong>' + $(this).data('nv') + '</strong> sẽ không thể phục hồi lại được. Bao gồm dữ liệu về <strong>(thông tin chung, lương, tuyển dụng, quê quán, ...)</strong>',
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
                            window.location = "{{route('admin.thongtinchung.index')}}"
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
    app.directive('fallbackSrc', function() {
        return {
            link: function postLink(scope, element, attrs) {
                element.bind('error', function() {
                    angular.element(this).attr("src", attrs.fallbackSrc);
                });
            }
        }
    });
    app.controller('thongtinController', function($scope, $http) {
        $scope.layThongTin = function(nv_ma) {
            $http({
                method: 'GET',
                url: "{{route('api.nhanvien.daydu')}}?nv_ma=" + nv_ma
            }).then(function successCallback(response) {
                $scope.thongTin = response.data.result[0];
                $('#myModal').modal('show');
            }, function errorCallback(response) {});
        }
    });
</script>
@endsection