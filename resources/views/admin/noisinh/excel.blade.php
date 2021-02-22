<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách nơi sinh</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        * {
            font-size: 14px;
            font-family: DejaVu Sans, sans-serif;
        }
        td,
        th {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td colspan="8">
            </td>
        </tr>
        <tr>
            <td colspan="8" align="center">
                <span class="slogan"><b>Shin</b> <b>H</b>uman <b>R</b>esource <b>M</b>anagement</span>
            </td>
        </tr>
        <tr>
            <td colspan="8" align="center">
                <span class="slogan">Hệ thống quản lý nhân sự</span>
            </td>
        </tr>
        <tr>
            <td colspan="8" align="center">
                <span class="slogan">Website: <i><b>http://qlnhanluc.local</b></i></span>
            </td>
        <tr>
            <td colspan="8" align="center">
            </td>
        </tr>
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
        @foreach($dsns as $ns)
        <tr>
            <td align="center">{{$loop->index + 1}}</td>
            <td>{{$ns->nhanVien->nv_hoTen}}</td>
            <td>{{$ns->xa->x_ten}}</td>
            <td>{{$ns->huyen->h_ten}}</td>
            <td>{{$ns->tinh->t_ten}}</td>
            <td>{{$ns->ns_diaChi}}</td>
            <td align="center">{{$ns->ns_taoMoi->format('d/m/Y H:m:s')}}</td>
            <td align="center">{{$ns->ns_capNhat->format('d/m/Y H:m:s')}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>