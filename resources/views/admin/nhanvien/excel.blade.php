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
            <td align="center">
                
            </td>
        </tr>
        <tr>
            <td align="center">
                Shin Human Resource Management
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
    <table border="1" cellspacing="0" cellpadding="3">
        <thead>
            <tr>
                <th width="5">#</th>
                <th width="15">Mã cán bộ</th>
                <th width="20">Ảnh</th>
                <th width="30">Tên cán bộ</th>
                <th width="25">Chức vụ</th>
                <th width="70">Địa chỉ</th>
                <th width="20">Điện thoại</th>
                <th width="30">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsnv as $nv)
            <tr>
                <td align="center"><b>{{$loop->index + 1}}</b></td>
                <td align="center">{{$nv->nv_ma}}</td>
                <td align="center">
                </td>
                <td>{{$nv->nv_hoTen}}</td>
                <td>{{$nv->chucVu->cvu_ten}}</td>
                <td>{{$nv->nv_noiOHienNay}}</td>
                <td align="center">{{$nv->nv_sdt}}</td>
                <td>{{$nv->nv_email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>