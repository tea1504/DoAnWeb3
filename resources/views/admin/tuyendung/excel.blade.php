<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách tuyển dụng</title>
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
            <td align="center" colspan="10">

            </td>
        </tr>
        <tr>
            <td align="center" colspan="10">
                Shin Human Resource Management
            </td>
        </tr>
        <tr>
            <td align="center" colspan="10">
                <span class="slogan">Hệ thống quản lý nhân sự</span>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="10">
                <span class="slogan">Website: <i><b>http://qlnhanluc.local</b></i></span>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="10">

            </td>
        </tr>
        <tr>
            <th width="15">Mã tuyển dụng</th>
            <th width="15">Mã cán bộ</th>
            <th width="30">Tên cán bộ</th>
            <th width="30">Ngày tuyển dụng</th>
            <th width="25">Nghề nghiệp trước đó</th>
            <th width="30">Cơ quan tuyển dụng</th>
            <th width="30">Chức vụ</th>
            <th width="20">Ngày vào làm</th>
            <th width="30">Công việc</th>
            <th width="30">Sở trường</th>
        </tr>
        @foreach($dstuyendung as $td)
        <tr>
            <td align="center">{{$td->td_ma}}</td>
            <td>{{$td -> nv_ma}}</td>
            <td></td>
            <td>{{$td -> td_ngay}}</td>
            <td>{{$td -> td_ngheTruocDay}}</td>
            <td>{{$td -> td_coQuanTuyen}}</td>
            <td>{{$td -> cvu_ma}}</td>
            <td>{{$td -> td_ngayLam}}</td>
            <td align="center">{{$td -> cv_ma}}</td>
            <td>{{$td -> td_soTruong}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>