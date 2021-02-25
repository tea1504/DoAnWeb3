@extends('layouts.master')
@section('title')
Danh sách quan hệ gia đình
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/toastr/toastr.min.css') }}">
<style>
    table#myTable {
        height: 540px;
    }
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Danh sách quạn hệ gia đình</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="trinhdoController">
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
                <a href="{{ route('admin.quanhegiadinh.create') }}" id="add" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Thêm mới"><i class="fas fa-plus-circle"></i></a>
                <a href="{{ route('admin.quanhegiadinh.print') }}" id="" class="btn btn-secondary text-white" data-toggle="tooltip" data-placement="top" title="In ấn"><i class="fas fa-print"></i></a>
                <a href="{{route('admin.quanhegiadinh.excel')}}" id="excel" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Xuất Excel"><i class="fas fa-file-excel"></i></a>
                <a href="{{route('admin.quanhegiadinh.pdf')}}" id="pdf" class="btn btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Xuất PDF"><i class="fas fa-file-pdf"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover table-responsive table-bordered table-head-fixed w-100  order-column" id="myTable" onmouseover="showtooltip()">
                        <thead>
                            <tr class="w-100">
                                <th>#</th>
                                <th>Nhân viên</th>
                                <th>Tên</th>
                                <th>Mối quan hệ</th>
                                <th>Năm sinh</th>
                                <th>Địa chỉ</th>
                                <th>Nghề nghiệp</th>
                                <th>Nước ngoài</th>
                                <th>Thêm mới</th>
                                <th>Cập nhật</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
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
    //$('.toast').toast('show');
    $('.toast').toast('show');

    var table = $('#myTable').DataTable({
        ajax: {
            url: "{{route('api.nhanvien.quanhegiadinh')}}",
            dataSrc: 'result'
        },
        columns: [{
                data: null
            },
            {
                data: "nv_hoTen"
            },
            {
                data: "qhgd_ten"
            },
            {
                data: "qhgd_moiQuanHe"
            },
            {
                data: "qhgd_namSinh"
            },
            {
                data: "qhgd_diaChi"
            },
            {
                data: "qhgd_ngheNghiep"
            },
            {
                data: "qhgd_nuocNgoai",
                render: function(data, type, row, meta) {
                    return data==1?"có quan hệ ở nước ngoài":"không có quan hệ ở nước ngoài";
                  
                }          
            },
            {
                data: "qhgd_taoMoi",
                render: function(data, type, row, meta) {
                    var d = new Date(data);
                    // return d.getMonth().padding();
                    return [d.getDate(),
                            (d.getMonth() + 1),
                            d.getFullYear()
                        ].join('/') +
                        ' ' + [d.getHours(),
                            d.getMinutes(),
                            d.getSeconds()
                        ].join(':');
                }
            },
            {
                data: "qhgd_capNhat",
                render: function(data, type, row, meta) {
                    var d = new Date(data);
                    // return d.getMonth().padding();
                    return [d.getDate(),
                            (d.getMonth() + 1),
                            d.getFullYear()
                        ].join('/') +
                        ' ' + [d.getHours(),
                            d.getMinutes(),
                            d.getSeconds()
                        ].join(':');
                }
            },
            {
                data: {
                    'nv_ma': 'nv_ma',
                    'nv_hoTen': 'nv_hoTen',
                    'qhgd_ma': 'qhgd_ma'
                },
                render: function(data, type, row, meta) {
                    return `
                            <a href="/admin/quanhegiadinh/${data['qhgd_ma']}/edit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Sửa" onmouseleave="hidetooltip()"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                
                                <form class="fDelete btn p-0" method="POST" action="quanhegiadinh/${data['qhgd_ma']}" data-id="${data['qhgd_ma']}" data-nv="${data['nv_hoTen']}" id="vb_${data['qhgd_ma']}" onclick="xoa(${data['qhgd_ma']})" onmouseleave="hidetooltip()">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>`;
                }
            },
        ],
        columnDefs: [{
                targets: 0,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle text-center');
                }
            },
            {
                targets: 1,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle');
                }
            },
            {
                targets: 2,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle');
                }
            },
            {
                targets: 3,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle');
                }
            },
            {
                targets: 4,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle');
                }
            },
            {
                targets: 5,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle');
                }
            },
            {
                targets: 6,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle');
                }
            },
            {
                targets: 7,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle text-center');
                }
            },
            {
                targets: 8,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle text-center');
                }
            },
            {
                targets: 9,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle text-center');
                }
            },
            {
                targets: 10,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle text-center');
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
    table.on('order.dt search.dt', function() {
        table.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    table.ajax.url("{{route('api.nhanvien.quanhegiadinh')}}" + "?nv_ma=" + $('#nhanVien').val());
    table.ajax.reload();
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

    function showtooltip() {
        $('[data-toggle="tooltip"]').hover(function() {
            var that = $(this)
            that.tooltip('show');
            setTimeout(function() {
                that.tooltip('hide');
            }, 1000);
        });
    }

    function hidetooltip() {
        $('[data-toggle="tooltip"]').mouseleave(function() {
            $(this).tooltip('hide');
        });
    }

    $('#nhanVien').change(function(e) {
        e.preventDefault();
        table.ajax.url("{{route('api.nhanvien.quanhegiadinh')}}" + "?nv_ma=" + $(this).val());
        table.ajax.reload();
        $('#add').attr('href', getLink() + "/" + $('#nhanVien').val())
        //$('#print').attr('href', "{{route('admin.quanhegiadinh.print')}}" + "/" + $('#nhanVien').val());
        //$('#pdf').attr('href', "{{route('admin.quanhegiadinh.pdf')}}" + "/" + $('#nhanVien').val());
    });

    
    $('#add').attr('href', getLink() + "/" + $('#nhanVien').val());
    //$('#print').attr('href', "{{route('admin.quanhegiadinh.print')}}" + "/" + $('#nhanVien').val());
    $('#pdf').attr('href', "{{route('admin.quanhegiadinh.pdf')}}" + "/" + $('#nhanVien').val());

    function xoa(id) {
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa ?',
            html: 'Dữ liệu văn bằng của nhân viên <strong>' + $('#vb_' + id).data('nv') + '</strong> sẽ không thể phục hồi lại được',
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
                    url: $('#vb_' + id).attr('action'),
                    data: {
                        'id': $('#vb_' + id).data('id'),
                        '_token': $('#vb_' + id + ' input[name="_token"]').val(),
                        '_method': $('#vb_' + id + ' input[name="_method"]').val()
                    },
                    success: function(response) {
                        table.ajax.url("{{route('api.nhanvien.quanhegiadinh')}}" + "?nv_ma=" + $('#nhanVien').val());
                        table.ajax.reload();
                        // Toast.fire({
                        //     icon: 'success',
                        //     title: 'Đã xóa thành công'
                        // })
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: '<i class="fas fa-check-circle"></i> Thành công',
                            autohide: true,
                            delay: 2000,
                            body: "Đã xóa dữ liệu thành công"
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

    }
    app.controller('trinhdoController', function($scope, $http) {});
</script>
@endsection