<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách Role</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        * {
            font-size: 12px;
            font-family: DejaVu Sans, sans-serif;
        }

        td {
            vertical-align: middle;
            line-height: 14px;
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

        .page-break {
            page-break-after: always;
        }

        @page {
            size: 297mm 209mm;
            margin: 20mm;
        }

        tbody#content tr:nth-child(odd) {
            background: #ddd;
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
                <th colspan="3" style="font-size: 20px;">Danh sách role</th>
            </tr>
            <tr>
                <th>Mã role</th>
                <th>Tên role</th>
                <th>Mô Tả</th>
            </tr>
        </thead>
        <tbody id="content">
            @foreach($dsrole as $role)
                <tr>
                    <td align="center">{{$role->role_ma}}</td>
                    <td>{{$role ->role_ten}}</td>
                    <td>{{$role ->role_mota}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>