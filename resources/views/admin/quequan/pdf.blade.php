<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách quê quán</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        * {
            font-size: 12px;
            font-family: DejaVu Sans, sans-serif;
        }
        td {
            vertical-align: middle;
            line-height: 20px;
        }
        table {
            page-break-inside: auto
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }
        thead {
            display: table-header-group
        }
        tfoot {
            display: table-footer-group
        }
        @page {
            size: 297mm 209mm;
            margin: 20mm;
        }
        .page-break {
            page-break-after: always;
        }
        #container thead tr {
            background-color: #2c3e50;
            color: white;
        }
        #container tbody tr:nth-child(odd) {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <table align="center">
        <tr>
            <td align="center" width="100px">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" height="100px">
            </td>
        </tr>
        <tr>
            <td align="center">
                <span class="slogan"><b>Shin</b> <b>H</b>uman <b>R</b>esource <b>M</b>anagement</span>
            </td>
        </tr>
        <tr>
            <td align="center">
                <span class="slogan">Hệ thống quản lý nhân sự</span>
            </td>
        </tr>
        <tr>
            <td align="center">
                <span class="slogan">Website: <i><b>http://qlnhanluc.local</b></i></span>
            </td>
        </tr>
    </table>
    <table border="1" cellspacing="0" cellpadding="5" id="container" style="border: none; width:100%;" align="center">
        <thead>
            <tr>
                <th>#</th>
                <th>Nhân viên</th>
                <th>Xã</th>
                <th>Huyện</th>
                <th>Tỉnh</th>
                <th>Địa chỉ</th>
                <th>Ngày tạo mới</th>
                <th>Ngày cập nhật</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsqq as $qq)
            <tr>
                <td align="center">{{$loop->index + 1}}</td>
                <td>{{$qq->nhanVien->nv_hoTen}}</td>
                <td>{{$qq->xa->x_ten}}</td>
                <td>{{$qq->huyen->h_ten}}</td>
                <td>{{$qq->tinh->t_ten}}</td>
                <td>{{$qq->qq_diaChi}}</td>
                <td align="center">{{$qq->qq_taoMoi->format('d/m/Y H:m:s')}}</td>
                <td align="center">{{$qq->qq_capNhat->format('d/m/Y H:m:s')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>