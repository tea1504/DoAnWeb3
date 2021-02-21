<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách thông tin chung</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        * {
            font-size: 14px;
            font-family: DejaVu Sans, sans-serif;
        }

        td, th {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td colspan="32">
            </td>
        </tr>
        <tr>
            <td colspan="32" align="center">
                <span class="slogan"><b>Shin</b> <b>H</b>uman <b>R</b>esource <b>M</b>anagement</span>
            </td>
        </tr>
        <tr>
            <td colspan="32" align="center">
                <span class="slogan">Hệ thống quản lý nhân sự</span>
            </td>
        </tr>
        <tr>
            <td colspan="32" align="center">
                <span class="slogan">Website: <i><b>http://qlnhanluc.local</b></i></span>
            </td>
        <tr>
            <td colspan="32" align="center">
            </td>
        </tr>
        <tr>
            <th>#</th>
            <th>Ảnh</th>
            <th>Mã cán bộ</th>
            <th>Họ và tên</th>
            <th>Tên gọi khác</th>
            <th>Giới tính</th>
            <th>Trình độ chuyên môn</th>
            <th>Trình độ</th>
            <th>Ngày sinh</th>
            <th>Dân tộc</th>
            <th>Tôn giáo</th>
            <th>Hộ khẩu thường trú</th>
            <th>Nơi ở hiện nay</th>
            <th>Ngày vào Đảng</th>
            <th>Ngày vào Đảng chính thức</th>
            <th>Ngày nhập ngũ</th>
            <th>Ngày xuất ngũ</th>
            <th>Quân hàm</th>
            <th>Sức khỏe</th>
            <th>Chiều cao</th>
            <th>Cân nặng</th>
            <th>Nhóm máu</th>
            <th>Hạng thương binh</th>
            <th>Gia đình chính sách</th>
            <th>CMND/CCCD</th>
            <th>Ngày cấp CMND/CCCD</th>
            <th>Số BHXH</th>
            <th>Chức vụ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Thời gian tạo mới</th>
            <th>Thời gian cập nhật</th>
        </tr>
        @foreach($dsttc as $ttc)
        <tr>
            <td align="center">{{$loop->index + 1}}</td>
            <td width="13"></td>
            <td align="center">{{$ttc->nv_ma}}</td>
            <td>{{$ttc->nv_hoTen}}</td>
            <td>{{$ttc->nv_tenGoiKhac}}</td>
            <td>{{$ttc->nv_gioiTinh==1?'Nam':'Nữ'}}</td>
            <td>{{$ttc->nv_trinhDoChuyenMon}}</td>
            <td>{{$ttc->trinhDo->td_ten}}</td>
            <td align="center">{{$ttc->nv_ngaySinh->format('d/m/Y')}}</td>
            <td>{{$ttc->danToc->dt_ten}}</td>
            <td>{{$ttc->tonGiao->tg_ten}}</td>
            <td>{{$ttc->nv_hoKhauThuongTru}}</td>
            <td>{{$ttc->nv_noiOHienNay}}</td>
            <td align="center">{{isset($ttc->nv_ngayVaoDang)?$ttc->nv_ngayVaoDang->format('d/m/Y'):''}}</td>
            <td align="center">{{isset($ttc->nv_ngayVaoDangChinhThuc)?$ttc->nv_ngayVaoDangChinhThuc->format('d/m/Y'):''}}</td>
            <td align="center">{{isset($ttc->nv_ngayNhapNgu)?$ttc->nv_ngayNhapNgu->format('d/m/Y'):''}}</td>
            <td align="center">{{isset($ttc->nv_ngayXuatNgu)?$ttc->nv_ngayXuatNgu->format('d/m/Y'):''}}</td>
            <td>{{$ttc->nv_quanHam}}</td>
            <td>{{$ttc->nv_sucKhoe}}</td>
            <td align="center">{{$ttc->nv_chieuCao}}m</td>
            <td align="center">{{$ttc->nv_canNang}}kg</td>
            <td align="center">{{$ttc->nhomMau->nm_ten}}</td>
            <td>{{$ttc->nv_hangThuongBinh}}</td>
            <td>{{$ttc->nv_giaDinhChinhSach}}</td>
            <td>{{$ttc->nv_cmnd}}</td>
            <td align="center">{{$ttc->nv_cmndNgayCap->format('d/m/Y')}}</td>
            <td>{{$ttc->nv_bhxh}}</td>
            <td>{{$ttc->chucVu->cvu_ten}}</td> 
            <td>{{$ttc->nv_sdt}}</td> 
            <td align="center">{{$ttc->nv_email}}</td> 
            <td align="center">{{$ttc->nv_taoMoi->format('d/m/Y H:m:s')}}</td>
            <td align="center">{{$ttc->nv_capNhat->format('d/m/Y H:m:s')}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>