<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách lương</title>
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
            <td colspan="5">
            </td>
        </tr>
        <tr>
            <td colspan="5" align="center">
                <span class="slogan"><b>Shin</b> <b>H</b>uman <b>R</b>esource <b>M</b>anagement</span>
            </td>
        </tr>
        <tr>
            <td colspan="5" align="center">
                <span class="slogan">Hệ thống quản lý nhân sự</span>
            </td>
        </tr>
        <tr>
            <td colspan="5" align="center">
                <span class="slogan">Website: <i><b>http://qlnhanluc.local</b></i></span>
            </td>
        <tr>
            <td colspan="5" align="center">
            </td>
        </tr>
        <tr>
            <th>#</th>
            <th>Nhân viên</th>
            <th>Ngạch lương</th>
            <th>Bậc lương</th>
            <th>Phụ cấp</th>
        </tr>
        @foreach($dsl as $l)
        <tr>
            <td align="center">{{$loop->index + 1}}</td>
            <td>{{$l->nhanvien_luong->nv_hoTen}}</td>
            <td align="center">{{$l->ngach_luong->ng_ten}}</td>
            <td align="center">{{$l->bac_luong->b_ten}}</td>
            <td>{{$l->phucap_luong->pc_ten}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>