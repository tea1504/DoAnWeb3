<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách quá trình công tác</title>
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
            <th>Từ ngày</th>
            <th>Đến ngày</th>
            <th>Chức vụ</th>
            <th>Đơn vị</th>
            <th>Ngạch lương</th>
            <th>Bậc lương</th>
        </tr>
        @foreach($dsqtct as $qtct)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$qtct->nv_qtct->nv_hoTen}}</td>
            <td>{{$qtct->qtct_tuNgay}}</td>
            <td>{{$qtct->qtct_denNgay}}</td>
            <td>{{$qtct->chucvu_qtct->cvu_ten}}</td>
            <td>{{$qtct->donvi_qtct->dv_ten}}, {{$qtct->donvi_qtct->donViQuanLy->dvql_ten}}</td>
            <td>{{$qtct->nb_qtct->ngach_nb->ng_ten}}</td>
            <td>{{$qtct->nb_qtct->bac_nb->b_ten}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>