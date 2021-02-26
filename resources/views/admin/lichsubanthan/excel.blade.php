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
            <td colspan="6">
            </td>
        </tr>
        <tr>
            <td colspan="6" align="center">
                <span class="slogan"><b>Shin</b> <b>H</b>uman <b>R</b>esource <b>M</b>anagement</span>
            </td>
        </tr>
        <tr>
            <td colspan="6" align="center">
                <span class="slogan">Hệ thống quản lý nhân sự</span>
            </td>
        </tr>
        <tr>
            <td colspan="6" align="center">
                <span class="slogan">Website: <i><b>http://qlnhanluc.local</b></i></span>
            </td>
        <tr>
            <td colspan="6" align="center">
            </td>
        </tr>
        <tr>
            <th>#</th>
            <th>Nhân viên</th>
            <th>Hành vi phạm tội</th>
            <th>Tham gia tổ chức chính trị</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
        </tr>
        @foreach($dslsbt as $lsbt)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$lsbt->nhanVien->nv_hoTen}}</td>
            <td style="vertical-align: top;">{{ $lsbt->lsbt_hanhViPhamToi }}</td>
            <td style="vertical-align: top;">{{ $lsbt->lsbt_thamGiaToChucChinhTri }}</td>
            <td>{{$lsbt->lsbt_taoMoi->format('d/m/Y H:m:s')}}</td>
            <td>{{$lsbt->lsbt_capNhat->format('d/m/Y H:m:s')}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>