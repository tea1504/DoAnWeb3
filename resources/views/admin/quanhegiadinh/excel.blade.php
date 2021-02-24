<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách quan hệ gia đình</title>
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
            <th>Tên</th>
            <th>Mối quan hệ</th>
            <th>Năm sinh</th>
            <th>Địa chỉ</th>
            <th>Nghề nghiệp</th>
            <th>Nước ngoài</th>
        </tr>
        @foreach($dsqhgd as $qhgd)
                <tr>
                <td align="center">{{$loop->index + 1}}</td>
                <td  align="center">{{$qhgd->nhanVien->nv_hoTen}}</td>
                <td  align="center">{{$qhgd->qhgd_ten}}</td>
                <td  align="center">{{$qhgd->qhgd_moiQuanHe}}</td>
                <td  align="center">{{$qhgd->qhgd_namSinh}}</td>
                <td  align="center">{{$qhgd->qhgd_diaChi}}</td>
                <td  align="center">{{$qhgd->qhgd_ngheNghiep}}</td>
                <td  align="center">{{$qhgd->qhgd_nuocNgoai}}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>