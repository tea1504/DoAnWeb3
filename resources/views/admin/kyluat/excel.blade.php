<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách kỷ luật</title>
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
            <th>Ngày ký</th>
            <th>Người ký</th>
            <th>Lý do</th>
        </tr>
        @foreach($dskl as $kl)
                <tr>
                <td  align="center">{{$loop->index + 1}}</td>
                <td  align="center">{{$kl->nhanVienKL->nv_hoTen}}</td>
                <td  align="center">{{$kl->kl_ngayKy}}</td>
                <td  align="center">{{$kl->nguoiKy->nv_hoTen}}</td>
                <td  align="center">{{$kl->kl_lyDo}}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>