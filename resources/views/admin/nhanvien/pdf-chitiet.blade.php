<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$nv->nv_ma}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        * {
            font-size: 11px;
            font-family: DejaVu Sans, sans-serif;
        }

        td {
            vertical-align: top;
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
    </style>
</head>

<body>
<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
            <tr>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
            </tr>
            <tr>
                <td colspan="8">Cơ quan, đơn vị có thẩm quyền quản lý CBCC:</td>
                <td colspan="5">{{$nv->tuyenDung->donVi->donViQuanLy->dvql_ten}}</td>
                <td colspan="5">Số hiệu cán bộ, công chức:</td>
                <td colspan="2" align="center">{{$nv->nv_ma}}</td>
            </tr>
            <tr>
                <td colspan="6">Cơ quan, đơn vị sử dụng CBCC:</td>
                <td colspan="14">{{$nv->tuyenDung->donVi->dv_ten}}</td>
            </tr>
            <tr>
                <td colspan="20"></td>
            </tr>
            <tr>
                <td colspan="5" rowspan="13" align="center">
                    <img src="{{ Storage::exists('public/avatar/' . $nv->nv_anh) ? asset('storage/avatar/' . $nv->nv_anh) : asset('storage/avatar/default.png') }}" width="151.18px" height="226.77px" alt="User Image">
                </td>
                <td colspan="15"></td>
            </tr>
            <tr>
                <td colspan="15" align="center" style="font-weight: bold; font-size: 16px;">SƠ YẾU LÝ LỊCH CÁN BỘ, CÔNG CHỨC</td>
            </tr>
            <tr>
                <td colspan="15"></td>
            </tr>
            <tr>
                <td colspan="15"></td>
            </tr>
            <tr>
                <td colspan="7">1. Họ và tên khai sinh (viết chữ in hoa):</td>
                <td colspan="8" style="text-transform: uppercase;">{{$nv->nv_hoTen}}</td>
            </tr>
            <tr>
                <td colspan="3">2. Tên gọi khác :</td>
                <td colspan="12" style="text-transform: uppercase;">{{$nv->nv_tenGoiKhac}}</td>
            </tr>
            <tr>
                <td colspan="2">3. Sinh ngày</td>
                <td colspan="1">{{getdate(strtotime($nv->nv_ngaySinh))['mday']}}</td>
                <td colspan="2">tháng</td>
                <td colspan="1">{{getdate(strtotime($nv->nv_ngaySinh))['mon']}}</td>
                <td colspan="2">năm</td>
                <td colspan="1">{{getdate(strtotime($nv->nv_ngaySinh))['year']}}</td>
                <td colspan="4">Giới tính (nam, nữ):</td>
                <td colspan="2">{{$nv->nv_gioiTinh == 1 ? 'nam' : 'nữ'}}</td>
            </tr>
            <tr>
                <td colspan="15"></td>
            </tr>
            <tr>
                <td colspan="15"></td>
            </tr>
            <tr>
                <td colspan="2">4. Nơi sinh :</td>
                <td colspan="1">Xã </td>
                <td colspan="3">{{$nv->noiSinh->xa->x_ten}}</td>
                <td colspan="2">, Huyện </td>
                <td colspan="2">{{$nv->noiSinh->huyen->h_ten}}</td>
                <td colspan="2">, Tỉnh </td>
                <td colspan="3">{{$nv->noiSinh->tinh->t_ten}}</td>
            </tr>
            <tr>
                <td colspan="3">5. Quê quán: </td>
                <td colspan="1">Xã </td>
                <td colspan="3">{{$nv->queQuan->xa->x_ten}}</td>
                <td colspan="2">, Huyện </td>
                <td colspan="2">{{$nv->queQuan->huyen->h_ten}}</td>
                <td colspan="2">, Tỉnh </td>
                <td colspan="2">{{$nv->queQuan->tinh->t_ten}}</td>
            </tr>
            <tr>
                <td colspan="15"></td>
            </tr>
            <tr>
                <td colspan="15"></td>
            </tr>
            <tr>
                <td colspan="2">6. Dân tộc : </td>
                <td colspan="8">{{$nv->danToc->dt_ten}}</td>
                <td colspan="3">, 7. Tôn giáo : </td>
                <td colspan="7">{{$nv->tonGiao->tg_ten}}</td>
            </tr>
            <tr>
                <td colspan="6">8. Nơi đăng ký hộ khẩu thường trú : </td>
                <td colspan="14">{{$nv->nv_hoKhauThuongTru}}</td>
            </tr>
            <tr>
                <td colspan="20">(Số nhà, đường phố, thành phố; xóm, thôn, xã, huyện, tỉnh)</td>
            </tr>
            <tr>
                <td colspan="3">9. Nơi ở hiện nay : </td>
                <td colspan="17">{{$nv->nv_hoKhauThuongTru}}</td>
            </tr>
            <tr>
                <td colspan="20">(Số nhà, đường phố, thành phố; xóm, thôn, xã, huyện, tỉnh)</td>
            </tr>
            <tr>
                <td colspan="6">10. Nghề nghiệp khi được tuyển dụng : </td>
                <td colspan="14">{{$nv->tuyenDung->td_ngheTruocDay}}</td>
            </tr>
            <tr>
                <td colspan="4">11. Ngày tuyển dụng : </td>
                <td colspan="6">{{$nv->tuyenDung->td_ngay->format('d/m/Y')}}</td>
                <td colspan="4">, Cơ quan tuyển dụng : </td>
                <td colspan="6">{{$nv->tuyenDung->td_coQuanTuyen}}</td>
            </tr>
            <tr>
                <td colspan="6">12. Chức vụ (chức danh) hiện tại : </td>
                <td colspan="14">{{$nv->chucVu->cvu_ten}}</td>
            </tr>
            <tr>
                <td colspan="20">(Về chính quyền hoặc Đảng, đoàn thể, kể cả chức vụ kiêm nhiệm)</td>
            </tr>
            <tr>
                <td colspan="6">13. Công việc chính được giao : </td>
                <td colspan="14">{{$nv->tuyenDung->congViec->cv_ten}}</td>
            </tr>
            <tr>
                <td colspan="6">14. Ngạch công chức (viên chức) : </td>
                <td colspan="4">{{$nv->luong->ngach_luong->ng_ten}}</td>
                <td colspan="3">, Mã ngạch : </td>
                <td colspan="7">{{$nv->luong->ngach_luong->ng_ma}}</td>
            </tr>
            <tr>
                <td colspan="2">Bậc lương:</td>
                <td>{{$nv->luong->bac_luong->b_ten}}</td>
                <td colspan="2">, Hệ số</td>
                <td>{{$nv->luong->ngach_luong->dsBac->where('b_ma', $nv->luong->b_ma)->first()->pivot->nb_heSoLuong}}</td>
                <td colspan="3">, Ngày hưởng</td>
                <td colspan="1"></td>
                <td colspan="3">, Phụ cấp chức vụ:</td>
                <td colspan="3">{{$nv->luong->phucap_luong->pc_ten}}</td>
                <td colspan="3">, Phụ cấp khác:</td>
                <td colspan="1"></td>
            </tr>
            <tr>
                <td colspan="12">15.1. Trình độ giáo dục phổ thông (đã tốt nghiệp lớp mấy/ thuộc hệ nào):</td>
                <td colspan="8">{{$nv->trinhDo->td_ten}}</td>
            </tr>
            <tr>
                <td colspan="6">
                    15.2. Trình độ chuyên môn cao nhất: </td>
                <td colspan="14">{{$nv->nv_trinhDoChuyenMon}}</td>
            </tr>
            <tr>
                <td colspan="20">
                    (TSKH, TS, Ths, cử nhân, kỹ sư, cao đẳng, trung cấp, sơ cấp; chuyên ngành)</td>
            </tr>
            <tr>
                <td colspan="4">
                    15.3. Lý luận chính trị:</td>
                <td colspan="6">
                    <?php
                    $trinhdovbcc = '';
                    foreach ($nv->dsVBCC as $vbcc) {
                        if ($vbcc->lvbcc_ma == 4) {
                            $tenvbcc = $vbcc->vbcc_ten;
                            $trinhdovbcc = $vbcc->vbcc_trinhDo;
                        }
                    }
                    echo $trinhdovbcc;
                    ?>
                </td>
                <td colspan="5">, 15.4. Quản lý nhà nước: </td>
                <td colspan="5">
                    <?php
                    $trinhdovbcc = '';
                    foreach ($nv->dsVBCC as $vbcc) {
                        if ($vbcc->lvbcc_ma == 5) {
                            $tenvbcc = $vbcc->vbcc_ten;
                            $trinhdovbcc = $vbcc->vbcc_trinhDo;
                        }
                    }
                    echo $trinhdovbcc;
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="10">(Cao cấp, trung cấp, sơ cấp và tương đương)</td>
                <td colspan="10">(Chuyên viên cao cấp, chuyên viên chính, chuyên viên, cán sự…)</td>
            </tr>
            <tr>
                <td colspan="3">15.5. Ngoại ngữ:</td>
                <td colspan="6">
                    <?php
                    $tenvbcc = '';
                    $trinhdovbcc = '';
                    foreach ($nv->dsVBCC as $vbcc) {
                        if ($vbcc->lvbcc_ma == 3) {
                            $tenvbcc = $vbcc->vbcc_ten;
                            $trinhdovbcc = $vbcc->vbcc_trinhDo;
                        }
                    }
                    $result = ($tenvbcc != '') ? (($trinhdovbcc != '') ? $tenvbcc . ' (' . $trinhdovbcc . ')' : $tenvbcc) : '';
                    echo $result;
                    ?>
                </td>
                <td colspan="3">, 15.6. Tin học:</td>
                <td colspan="8">
                    <?php
                    $tenvbcc = '';
                    $trinhdovbcc = '';
                    foreach ($nv->dsVBCC as $vbcc) {
                        if ($vbcc->lvbcc_ma == 2) {
                            $tenvbcc = $vbcc->vbcc_ten;
                            $trinhdovbcc = $vbcc->vbcc_trinhDo;
                        }
                    }
                    $result = ($tenvbcc != '') ? (($trinhdovbcc != '') ? $tenvbcc . ' (' . $trinhdovbcc . ')' : $tenvbcc) : '';
                    echo $result;
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="9">(Tên ngoại ngữ + Trình độ A, B, C, D,…)</td>
                <td colspan="11"> (Trình độ A, B, C,…)</td>
            </tr>
            <tr>
                <td colspan="7">16. Ngày vào Đảng cộng sản Việt Nam</td>
                <td colspan="3">{{isset($nv->nv_ngayVaoDang)?$nv->nv_ngayVaoDang->format('d/m/Y'):''}}</td>
                <td colspan="4">, Ngày chính thức:</td>
                <td colspan="6">{{isset($nv->nv_ngayVaoDangChinhThuc)?$nv->nv_ngayVaoDangChinhThuc->format('d/m/Y'):''}}</td>
            </tr>
            <tr>
                <td colspan="7">17. Ngày tham gia tổ chức chính trị - xã hội:</td>
                <td colspan="13"> </td>
            </tr>
            <tr>
                <td colspan="20">(Ngày tham gia tổ chức: Đoàn, Hội,…. Và làm việc gì trong tổ chức đó)</td>
            </tr>
        </table>
        <!-- <div class="page-break"></div> -->
        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
            <tr>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
            </tr>
            <tr>
                <td colspan="4">18. Ngày nhập ngũ :</td>
                <td colspan="2">{{isset($nv->nv_ngayNhapNgu)?$nv->nv_ngayNhapNgu->format('d/m/Y'):''}}</td>
                <td colspan="3">, Ngày xuất ngũ :</td>
                <td colspan="2">{{isset($nv->nv_ngayXuatNgu)?$nv->nv_ngayXuatNgu->format('d/m/Y'):''}}</td>
                <td colspan="4">, Quân hàm cao nhất :</td>
                <td colspan="5">{{$nv->nv_quanHam}}</td>
            </tr>
            <tr>
                <td colspan="7">19. Danh hiệu được phong tặng cao nhất : </td>
                <td colspan="13"></td>
            </tr>
            <tr>
                <td colspan="20">(Anh hùng lao động, anh hùng lực lượng vũ trang; nhà giáo, thầy thuốc, nghệ sĩ nhân dân, ưu tú,…)</td>
            </tr>
            <tr>
                <td colspan="4">20. Sở trường công tác :</td>
                <td colspan="16">{{$nv->tuyenDung->td_soTruong}}</td>
            </tr>
            <tr>
                <td colspan="3">21. Khen thưởng :</td>
                <td colspan="7">
                    <?php
                    $result = "";
                    foreach ($nv->dsKhenThuong as $kt) {
                        $result = $kt->kt_lyDo . ', năm ' . (getdate(strtotime($kt->kt_ngayKy))['year']);
                    }
                    echo $result
                    ?>
                </td>
                <td colspan="3">, 22. Kỷ luật :</td>
                <td colspan="7">
                    <?php
                    $result = "";
                    foreach ($nv->dsKyLuat as $kl) {
                        $result = $kl->kl_lyDo . ', năm ' . (getdate(strtotime($kt->kl_ngayKy))['year']);
                    }
                    echo $result
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="10">(Hình thức cao nhất, năm nào)</td>
                <td colspan="10"> (Về đảng, chính quyền, đoàn thể hình thức cao nhất, năm nào)</td>
            </tr>
            <tr>
                <td colspan="5"> 23. Tình trạng sức khỏe :</td>
                <td colspan="2">{{$nv->nv_sucKhoe}}</td>
                <td colspan="3">, Chiều cao :</td>
                <td colspan="1">{{$nv->nv_chieuCao}}</td>
                <td colspan="2"> Cân nặng :</td>
                <td colspan="2">{{$nv->nv_canNang}} kg</td>
                <td colspan="3">, Nhóm máu :</td>
                <td colspan="2">{{$nv->nhomMau->nm_ten}}</td>
            </tr>
            <tr>
                <td colspan="5">24. Là thương binh hạng :</td>
                <td colspan="4">{{$nv->nv_hangThuongBinh}}</td>
                <td colspan="6">, Là con gia đình chính sách() :</td>
                <td colspan="5">{{$nv->nv_giaDinhChinhSach}}</td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td colspan="11">(Con thương binh, con liệt sĩ, người nhiễm chất độc da cam Dioxin)</td>
            </tr>
            <tr>
                <td colspan="5">25. Số chứng minh nhân dân:</td>
                <td colspan="5">{{$nv->nv_cmnd}}</td>
                <td colspan="2">Ngày cấp: </td>
                <td colspan="8">{{$nv->nv_cmndNgayCap->format('d/m/Y')}}</td>
            </tr>
            <tr>
                <td colspan="3">26. Số sổ BHXH : </td>
                <td colspan="17">{{$nv->nv_bhxh}}</td>
            </tr>
            <tr>
                <td colspan="20">27. Đào tạo, bồi dưỡng về chuyên môn, nghiệp vụ, lý luận chính trị, ngoại ngữ, tin học</td>
            </tr>
            <tr>
                <td colspan="20" align="center">
                    <table border="1" cellpadding="5" cellspacing="0" align="center" width="100%">
                        <thead>
                            <tr>
                                <th>Tên trường</th>
                                <th>Chuyên ngành đào tạo, bồi dưỡng</th>
                                <th width="100px">Từ tháng năm<br> Đến tháng năm</th>
                                <th>Hình thức đào tạo</th>
                                <th>Văn bằng, chứng chỉ, trình độ gì</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nv->dsVBCC as $vbcc)
                            <tr>
                                <td>{{$vbcc->vbcc_tenTruong}}</td>
                                <td>{{$vbcc->vbcc_ten}}</td>
                                <td align="center">{{$vbcc->vbcc_tuNgay}} - {{$vbcc->vbcc_tuNgay}}</td>
                                <td>{{$vbcc->vbcc_hinhThuc}}</td>
                                <td>{{$vbcc->vbcc_trinhDo}}</td>
                            </tr>
                            @endforeach
                            @for($i = 1; $i <= 9 - count($nv->dsVBCC); $i++)
                                <tr>
                                    <td style="height: 20px;"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="20">Ghi chú: Hình thức đào tạo: chính quy, tại chức, chuyên tu, bồi dưỡng . . . . . . . . . . . . / Văn bằng: TSKH, TS, Ths, Cử nhân, Kỹ sư . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</td>
            </tr>
        </table>
        <!-- <div class="page-break"></div> -->
        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
            <tr>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
            </tr>
            <tr>
                <td colspan="20">28. Tóm tắt quá trình công tác</td>
            </tr>
            <tr>
                <td colspan="20">
                    <table border="1" cellspacing="0" align="center" width="100%">
                        <thead>
                            <tr>
                                <th>Từ tháng, năm đến tháng, năm</th>
                                <th>Chức danh, chức vụ, đơn vị công tác (đảng, chính quyền, đoàn thể, tổ chức xã hội), kể cả thời gian được đào tạo, bồi dưỡng về chuyên môn, nghiệp vụ,…</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nv->dsQuaTrinhCongTac as $qtct)
                            <tr>
                                <td>{{$qtct->qtct_tuNgay}} - {{$qtct->qtct_denNgay}}</td>
                                <td>chức vụ : {{$qtct->chucvu_qtct->cvu_ten}}, đơn vị công tác: {{$qtct->donvi_qtct->dv_ten}}</td>
                            </tr>
                            @endforeach
                            @for($i = 1; $i <= 7 - count($nv->dsQuaTrinhCongTac); $i++)
                                <tr>
                                    <td style="height: 20px;"></td>
                                    <td></td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="20">29. Đặc điểm lịch sử bản thân:</td>
            </tr>
            <tr>
                <td colspan="20">- Khai rõ: bị bắt, bị tù (từ ngày tháng năm nào đến ngày tháng năm nào, ở đâu), đã khai báo cho ai, những vấn đề gì? Bản thân có làm việc trong chế độ cũ (cơ quan, đơn vị nào, địa điểm, chức danh, chức vụ, thời gian làm việc…)</td>
            </tr>
            <tr>
                <td colspan="20">{{$nv->lichSuBanThan->lsbt_hanhViPhamToi}}</td>
            </tr>
            <tr>
                <td colspan="20">- Thời gian hoặc có quan hệ với các tổ chức chính trị, kinh tế, xã hội nào ở nước ngoài (làm gì, tổ chức nào,đặt trụ sở ở đâu…?):</td>
            </tr>
            <tr>
                <td colspan="20">{{$nv->lichSuBanThan->lsbt_thamGiaToChucChinhTri}}</td>
            </tr>
            <tr>
                <td colspan="20">Có thân nhân (Cha, Mẹ, Vợ, chồng, con, anh chị em ruột) ở nước ngoài (làm gì, địa chỉ…)?</td>
            </tr>
            <tr>
                <td colspan="20">

                </td>
            </tr>
            <tr>
                <td colspan="20">
                    30. Quan hệ gia đình
                </td>
            </tr>
            <tr>
                <td colspan="20">
                    a. Về bản thân: Cha, Mẹ, Vợ (hoặc chồng), các con, anh chị em ruột
                </td>
            </tr>
            <tr>
                <td colspan="20">
                    <table border="1" cellspacing="0" cellpadding="2" width="100%">
                        <thead>
                            <tr>
                                <th>Mối quan hệ</th>
                                <th width="140px">Họ và tên </th>
                                <th>Năm sinh</th>
                                <th>Quê quán, nghề nghiệp, chức danh, chức vụ, đơn vị công tác, học tập, nơi ở (trong, ngoài nước); thành viên các tổ chức chính trị - xã hội…?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nv->dsQuanHeGiaDinh as $gd)
                            <tr>
                                <td>{{$gd->qhgd_moiQuanHe}}</td>
                                <td>{{$gd->qhgd_ten}}</td>
                                <td>{{$gd->qhgd_namSinh}}</td>
                                <td>{{$gd->qhgd_diaChi}}. Nghề nghiệp {{$gd->qhgd_ngheNghiep}}</td>
                            </tr>
                            @endforeach
                            @for($i = 1; $i <= 16 - count($nv->dsQuanHeGiaDinh); $i++)
                                <tr>
                                    <td style="height: 20px;"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
        <!-- <div class="page-break"></div> -->
        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
            <tr>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
                <td width="5%"></td>
            </tr>
            <tr>
                <td colspan="20">
                    b. Về bên vợ (hoặc chồng): Cha, Mẹ, anh chị em ruột
                </td>
            </tr>
            <tr>
                <td colspan="20">
                    <table border="1" cellspacing="0" cellpadding="2" width="100%">
                        <thead>
                            <tr>
                                <th>Mối quan hệ</th>
                                <th width="140px">Họ và tên </th>
                                <th>Năm sinh</th>
                                <th>Quê quán, nghề nghiệp, chức danh, chức vụ, đơn vị công tác, học tập, nơi ở (trong, ngoài nước); thành viên các tổ chức chính trị - xã hội…?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= 16; $i++) 
                            <tr>
                                <td style="height: 20px;"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="20">31. Nhận xét, đánh giá của cơ quan, đơn vị quản lý và sử dụng cán bộ công chức</td>
            </tr>
            <tr>
                <td colspan="20">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </td>
            </tr>
            <tr>
                <td colspan="10">
                    <table align="center">
                        <tr align="center">
                            <td>Người khai</td>
                        </tr>
                        <tr align="center">
                            <td>Tôi xin cam đoan những lời khai trên đây là đúng sự thật</td>
                        </tr>
                        <tr align="center">
                            <td>(Ký tên, ghi rõ họ tên)</td>
                        </tr>
                    </table>
                </td>
                <td colspan="10">
                    <table align="center">
                        <tr align="center">
                            <td>. . . . . . ., Ngày . . . . . . . tháng . . . . . . . năm 20 . . .</td>
                        </tr>
                        <tr align="center">
                            <td>Thủ trưởng cơ quan, đơn vị quản lý và sử dụng CBCC</td>
                        </tr>
                        <tr align="center">
                            <td>(Ký tên, đóng dấu)</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="20"></td>
            </tr>
            <tr>
                <td colspan="20"></td>
            </tr>
            <tr>
                <td colspan="20"></td>
            </tr>
            <tr>
                <td colspan="20"></td>
            </tr>
        </table>
</body>

</html>