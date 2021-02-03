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

        tbody tr:nth-child(odd) {
            background: #ddd;
        }
    </style>
</head>

<body>
    <table border="1" cellspacing="0" cellpadding="3" style="border: none;">
        <thead>
            <tr>
                <th colspan="8" style="font-size: 20px;">Danh sách cán bộ</th>
            </tr>
            <tr>
                <th width="20px">#</th>
                <th width="100px">Mã cán bộ</th>
                <th width="50px">Ảnh</th>
                <th>Tên cán bộ</th>
                <th width="120px">Chức vụ</th>
                <th>Địa chỉ</th>
                <th width="100px">Điện thoại</th>
                <th width="130px">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsnv as $nv)
            <tr>
                <td align="center"><b>{{$loop->index + 1}}</b></td>
                <td align="center">{{$nv->nv_ma}}</td>
                <td align="center">
                    <img src="{{ Storage::exists('public/avatar/' . $nv->nv_anh) ? asset('storage/avatar/' . $nv->nv_anh) : asset('storage/avatar/default.png') }}" width="50px" alt="User Image">
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