<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách thông tin tuyển dụng</title>
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
    <table border="1" cellspacing="0" cellpadding="3" style="border: none;">
        <thead>
            <tr>
                <th colspan="10" style="font-size: 20px;">Danh sách cán bộ</th>
            </tr>
            <tr>
                <th width="100px">Mã tuyển dụng</th>
                <th width="50px">Mã các bộ</th>
                <th>Tên cán bộ</th>
                <th width="120px">Ngày tuyển dụng</th>
                <th>Nghề nghiệp trước đó</th>
                <th width="100px">Cơ quan tuyển dụng</th>
                <th width="130px">Chức vụ</th>
                <th>Ngày vào làm</th>
                <th>Công việc</th>
                <th>Sở trường</th>
                
            </tr>
        </thead>
        <tbody id="content">
            @foreach($dstuyendung as $td)
            <tr>
                <td align="center">{{$td->td_ma}}</td>
                <td>{{$td ->nv_ma}}</td>
                <td>{{$td ->nhanVien -> nv_hoTen}}</td>
                <td>{{$td -> td_ngay->format('d/m/Y')}}</td>
                <td>{{$td -> td_ngheTruocDay}}</td>
                <td>{{$td -> td_coQuanTuyen}}</td>
                <td>{{$td -> chucVu->cvu_ten}}</td>
                <td>{{$td ->td_ngayLam->format('d/m/Y')}}</td>
                <td>{{$td -> congViec->cv_ten}}</td>
                <td>{{$td -> td_soTruong}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>