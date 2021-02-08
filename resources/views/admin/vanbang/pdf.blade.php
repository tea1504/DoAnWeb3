<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách văn bằng chứng chỉ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        * {
            font-size: 12px;
            font-family: DejaVu Sans, sans-serif;
        }

        td {
            vertical-align: middle;
            line-height: 20px;
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

        @page {
            size: 297mm 209mm;
            margin: 20mm;
        }

        .page-break {
            page-break-after: always;
        }

        #container thead tr {
            background-color: #2c3e50;
            color: white;
        }

        #container tbody tr:nth-child(odd) {
            background-color: #ddd;
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
    <table border="1" cellspacing="0" cellpadding="5" id="container" style="border: none;" align="center">
        <thead>
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
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @if(isset($id))
            @foreach($dsvbcc as $vbcc)
            @if($id==$vbcc->nv_ma)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$vbcc->nhanVien->nv_hoTen}}</td>
                <td>{{$vbcc->vbcc_tenTruong}}</td>
                <td>{{$vbcc->vbcc_ten}}</td>
                <td>{{$vbcc->loaiVBCC->lvbcc_ten}}</td>
                <td>{{$vbcc->vbcc_hinhThuc}}</td>
                <td align="center">{{$vbcc->vbcc_trinhDo}}</td>
                <td align="center">{{$vbcc->vbcc_tuNgay}}</td>
                <td align="center">{{$vbcc->vbcc_denNgay}}</td>
            </tr>
            @endif
            @endforeach
            @else
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
            @endif
        </tbody>
    </table>
</body>

</html>