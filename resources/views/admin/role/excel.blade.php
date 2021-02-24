<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách role</title>
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
            <td align="center" colspan="5">

            </td>
        </tr>
        <tr>
            <td align="center" colspan="5">
                Shin Human Resource Management
            </td>
        </tr>
        <tr>
            <td align="center" colspan="5">
                <span class="slogan">Hệ thống quản lý nhân sự</span>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="5">
                <span class="slogan">Website: <i><b>http://qlnhanluc.local</b></i></span>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="5">

            </td>
        </tr>
        <tr>
            <th width="15">Mã role</th>
            <th width="15"> Tên role</th>
            <th width="30">Mô tả</th>
        </tr>
        @foreach($dsrole as $role)
        <tr>
            <td align="center">{{$role->role_ma}}</td>
            <td>{{$role ->role_ten}}</td>
            <td>{{$role ->role_mota}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>