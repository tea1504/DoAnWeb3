<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách cán bộ công chức</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        * {
            font-size: 11px;
            font-family: DejaVu Sans, sans-serif;
        }

        td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td colspan="9">
            </td>
        </tr>
        <tr>
            <td colspan="9" align="center">
                <span class="slogan"><b>Shin</b> <b>H</b>uman <b>R</b>esource <b>M</b>anagement</span>
            </td>
        </tr>
        <tr>
            <td colspan="9" align="center">
                <span class="slogan">Hệ thống quản lý nhân sự</span>
            </td>
        </tr>
        <tr>
            <td colspan="9" align="center">
                <span class="slogan">Website: <i><b>http://qlnhanluc.local</b></i></span>
            </td>
        <tr>
            <td colspan="9" align="center">
            </td>
        </tr>
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
        </tr>
        @foreach($dsvbcc as $vbcc)
        <tr>
            <td align="center">{{$loop->index + 1}}</td>
            <td>{{$vbcc->nhanVien->nv_hoTen}}</td>
            <td>{{$vbcc->vbcc_tenTruong}}</td>
            <td>{{$vbcc->vbcc_ten}}</td>
            <td>{{$vbcc->loaiVBCC->lvbcc_ten}}</td>
            <td>{{$vbcc->vbcc_hinhThuc}}</td>
            <td align="center">{{$vbcc->vbcc_trinhDo}}</td>
            <td align="center">{{$vbcc->vbcc_tuNgay}}</td>
            <td align="center">{{$vbcc->vbcc_denNgay}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>