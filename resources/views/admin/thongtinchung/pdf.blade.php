<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách thông tin chung</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        * {
            font-size: 8px;
            font-family: DejaVu Sans, sans-serif;
        }

        td {
            vertical-align: middle;
            line-height: 10px;
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
    <table border="1" cellspacing="0" cellpadding="5" id="container" style="border: none; width:100%;" align="center">
        <thead>
            <tr>
                <th>#</th>
                <th>Mã cán bộ</th>
                <th>Họ và tên<br>(Tên gọi khác)</th>
                <th>Giới tính</th>
                <th>Trình độ chuyên môn</th>
                <th>Trình độ</th>
                <th>Ngày sinh</th>
                <th>Dân tộc</th>
                <th>Tôn giáo</th>
                <th>Hộ khẩu thường trú<br>Nơi ở hiện nay</th>
                <th>Ngày vào Đảng <br>-<br> Ngày vào Đảng chính thức</th>
                <th>Ngày nhập ngũ <br>-<br> Ngày xuất ngũ</th>
                <th>Quân hàm</th>
                <th>Sức khỏe,<br>chiều cao,<br>cân nặng,<br>nhóm máu</th>
                <th>Hạng thương binh</th>
                <th>Gia đình chính sách</th>
                <th>CMND/CCCD</th>
                <th>Số BHXH</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsttc as $ttc)
            <tr>
                <td align="center">{{$loop->index + 1}}</td>
                <td align="center">{{$ttc->nv_ma}}</td>
                <td>{{$ttc->nv_hoTen}}<br>({{$ttc->nv_tenGoiKhac}})</td>
                <td>{{$ttc->nv_gioiTinh==1?'Nam':'Nữ'}}</td>
                <td>{{$ttc->nv_trinhDoChuyenMon}}</td>
                <td>{{$ttc->trinhDo->td_ten}}</td>
                <td align="center">{{$ttc->nv_ngaySinh->format('d/m/Y')}}</td>
                <td>{{$ttc->danToc->dt_ten}}</td>
                <td>{{$ttc->tonGiao->tg_ten}}</td>
                <td>{{$ttc->nv_hoKhauThuongTru}}
                    <hr>{{$ttc->nv_noiOHienNay}}
                </td>
                <td align="center">{{isset($ttc->nv_ngayVaoDang)?$ttc->nv_ngayVaoDang->format('d/m/Y'):''}} - {{isset($ttc->nv_ngayVaoDangChinhThuc)?$ttc->nv_ngayVaoDangChinhThuc->format('d/m/Y'):''}}</td>
                <td align="center">{{isset($ttc->nv_ngayNhapNgu)?$ttc->nv_ngayNhapNgu->format('d/m/Y'):''}} - {{isset($ttc->nv_ngayXuatNgu)?$ttc->nv_ngayXuatNgu->format('d/m/Y'):''}}</td>
                <td>{{$ttc->nv_quanHam}}</td>
                <td>{{$ttc->nv_sucKhoe}}<br>{{$ttc->nv_chieuCao}}m<br>{{$ttc->nv_canNang}}kg<br>{{$ttc->nhomMau->nm_ten}}</td>
                <td>{{$ttc->nv_hangThuongBinh}}</td>
                <td>{{$ttc->nv_giaDinhChinhSach}}</td>
                <td>{{$ttc->nv_cmnd}}</td>
                <td>{{$ttc->nv_bhxh}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>