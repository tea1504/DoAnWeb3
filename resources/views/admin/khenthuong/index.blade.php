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
    @if (Session::has('alert'))
    <div aria-live="polite" aria-atomic="true" class="flex-column justify-content-center align-items-center" style="position: fixed; top:0; right:0; z-index: 100000;">
        <div class="toast bg-success m-2" data-delay="2000" role="alert" aria-live="assertive" aria-atomic="true" style="width: 400px;">
            <div class="toast-header">
                <img src="{{asset('storage/images/shin.gif')}}" class="rounded mr-2 bg-light" height="30px" alt="...">
                <strong class="mr-auto">Thành công</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{Session::get('alert')}}
            </div>
        </div>
    </div>
    @endif
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
                                <td>{{$kt->kt_ngayKy->format('d/m/Y')}}</td>
                                <td>{{$kt->nguoiKy->nv_hoTen}}</td>
                                <td>{{$kt->kt_lyDo}}</td>                         
                                <td>{{$kt->kt_taoMoi->format('d/m/Y')}}</td>                         
                                <td>{{$kt->kt_capNhat->format('d/m/Y')}}</td>                         
                                <td>                               
                                    <a href="{{ route('admin.khenthuong.edit', ['id' => $kt->kt_ma]) }}" class="btn btn-danger pull-left" data-toggle="tooltip" data-placement="top" title="Sửa">Sửa</a>
                                    
                                    <form class="fDelete btn p-0" method="POST" action="{{ route('admin.khenthuong.destroy', ['id' => $kt->kt_ma]) }}" data-id="{{ $kt->kt_ma }}" data-toggle="tooltip" data-placement="top" title="Xóa">
                                    {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button type="sumbit" class="btn btn-warning"  >Xóa</button>
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
    app.controller('khuyenthuongController', function($scope, $http) {
        $scope.show = true;
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
        
        
        
        
        /* $('.fDelete').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn muốn xóa?',
                text: "Dữ liệu sẽ không thể phục hồi lại được",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Chấp nhận',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: {
                            id: $(this).data('id'),
                            _token: $(this).find('[name="_token"]').val(),
                            _method: $(this).find('[name="_method"]').val()
                        },
                        success: function(data, textStatus, jqXHR) {
                            location.href = "{{ route('admin.khenthuong.index') }}";
                        }
                    })
                } else {
                    Swal.fire(
                        'Đã hủy xóa!'
                    )
                }
            })
        }); */
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>

@endsection