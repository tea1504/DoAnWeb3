<form>
    <div class="form-group row">
        <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Số hiệu cán bộ/công chức : </label>
        <div class="col-lg-10 col-md-9 col-sm-8">
            <input type="text" class="form-control" value="{{$nv->nv_ma}}" disabled>
        </div>
    </div>
    <!--End số hiệu-->
    <div class="form-group row">
        <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Họ và tên : </label>
        <div class="col-lg-10 col-md-9 col-sm-8">
            <input type="text" class="form-control" value="{{$nv->nv_hoTen}}" disabled>
        </div>
    </div>
    <!--End họ và tên-->
    <div class="form-group row">
        <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên gọi khác : </label>
        <div class="col-lg-10 col-md-9 col-sm-8">
            <input type="text" class="form-control" value="{{$nv->nv_tenGoiKhac}}" disabled>
        </div>
    </div>
    <!--End tên gọi khác-->
    <hr>
    <div class="form-group row">
        <div class="col-md-6">
            <div class="row">
                <label class="col col-form-label">Sinh ngày </label>
                <div class="col">
                    <input type="text" class="form-control" value="{{getdate(strtotime($nv->nv_ngaySinh))['mday']}}" disabled>
                </div>
                <label class="col col-form-label text-right">tháng </label>
                <div class="col">
                    <input type="text" class="form-control" value="{{getdate(strtotime($nv->nv_ngaySinh))['mon']}}" disabled>
                </div>
                <label class="col col-form-label text-right">năm </label>
                <div class="col">
                    <input type="text" class="form-control" value="{{getdate(strtotime($nv->nv_ngaySinh))['year']}}" disabled>
                </div>
            </div>
        </div>
        <!--End ngày sinh-->
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-2 col-sm-4 col-form-label">, Giới tính : </label>
                <div class="col-md-10 col-sm-8">
                    <input type="text" class="form-control" value="{{$nv->nv_gioiTinh == 1 ? 'Nam' : 'Nữ'}}" disabled>
                </div>
            </div>
        </div>
        <!--End giới tính-->
    </div>
    <!--End ngày sinh và giới tính-->
    <div class="form-group row">
        <label class="col-lg-1 col-md-2 col-sm-4 col-form-label">Nơi sinh : </label>
        <div class="col-lg-11 col-md-10 col-sm-8">
            <div class="row">
                <label class="col-md-1 col-form-label text-md-right">Xã </label>
                <div class="col">
                    <input type="text" class="form-control" value="{{$nv->noiSinh->xa->x_ten}}" disabled>
                </div>
                <label class="col-md-1 col-form-label text-md-right">, Huyện </label>
                <div class="col">
                    <input type="text" class="form-control" value="{{$nv->noiSinh->huyen->h_ten}}" disabled>
                </div>
                <label class="col-md-1 col-form-label text-md-right">, Tỉnh </label>
                <div class="col">
                    <input type="text" class="form-control" value="{{$nv->noiSinh->tinh->t_ten}}" disabled>
                </div>
            </div>
        </div>
    </div>
    <!--End nơi sinh-->
    <div class="form-group row">
        <label class="col-lg-1 col-md-2 col-sm-4 col-form-label">Quê quán : </label>
        <div class="col-lg-11 col-md-10 col-sm-8">
            <div class="row">
                <label class="col-md-1 col-form-label text-md-right">Xã </label>
                <div class="col">
                    <input type="text" class="form-control" value="{{$nv->queQuan->xa->x_ten}}" disabled>
                </div>
                <label class="col-md-1 col-form-label text-md-right">, Huyện </label>
                <div class="col">
                    <input type="text" class="form-control" value="{{$nv->queQuan->huyen->h_ten}}" disabled>
                </div>
                <label class="col-md-1 col-form-label text-md-right">, Tỉnh </label>
                <div class="col">
                    <input type="text" class="form-control" value="{{$nv->queQuan->tinh->t_ten}}" disabled>
                </div>
            </div>
        </div>
    </div>
    <!--End quê quán-->
    <hr>
    <div class="form-group row">
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-2 col-sm-4 col-form-label">Dân tộc : </label>
                <div class="col-md-10 col-sm-8">
                    <input type="text" class="form-control" value="{{$nv->danToc->dt_ten}}" disabled>
                </div>
            </div>
        </div>
        <!--End dân tộc-->
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-2 col-sm-4 col-form-label">Tôn giáo : </label>
                <div class="col-md-10 col-sm-8">
                    <input type="text" class="form-control" value="{{$nv->tonGiao->tg_ten}}" disabled>
                </div>
            </div>
        </div>
        <!--End tôn giáo-->
    </div>
    <!--End dân tộc và tôn giáo-->
    <hr>
    <div class="form-group row">
        <label class="col-lg-3 col-md-5 col-sm-6 col-form-label">Nơi đăng ký hộ khẩu thường trú : </label>
        <div class="col-lg-9 col-md-7 col-sm-6">
            <input type="text" class="form-control" value="{{$nv->nv_hoKhauThuongTru}}" disabled>
        </div>
    </div>
    <!--End nơi đăng ký hộ khẩu thường trú-->
    <div class="form-group row">
        <label class="col-lg-3 col-md-5 col-sm-6 col-form-label">Nơi ở hiện nay : </label>
        <div class="col-lg-9 col-md-7 col-sm-6">
            <input type="text" class="form-control" value="{{$nv->nv_noiOHienNay}}" disabled>
        </div>
    </div>
    <!--End nơi ở hiện nay-->
    <hr>
    <div class="form-group row">
        <label class="col-lg-2 col-md-4 col-sm-5 col-form-label">Trình độ giáo dục phổ thông : </label>
        <div class="col-lg-10 col-md-8 col-sm-7">
            <input type="text" class="form-control" value="{{$nv->trinhDo->td_ten}}" disabled>
        </div>
    </div>
    <!--End trình độ gdph-->
    <div class="form-group row">
        <label class="col-lg-2 col-md-4 col-sm-5 col-form-label">Trình độ chuyên môn : </label>
        <div class="col-lg-10 col-md-8 col-sm-7">
            <input type="text" class="form-control" value="{{$nv->nv_trinhDoChuyenMon}}" disabled>
        </div>
    </div>
    <!--End trình độ chuyên môn-->
    <hr>
    <div class="form-group row">
        <div class="col-md-6">
            <div class="row">
                <label class="col-lg-6 col-form-label">Ngày vào Đảng cộng sản Việt Nam : </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" value="{{isset($nv->nv_ngayVaoDang)?$nv->nv_ngayVaoDang->format('d/m/Y'):''}}" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <label class="col-lg-6 col-form-label">Ngày chính thức : </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" value="{{isset($nv->nv_ngayVaoDangChinhThuc)?$nv->nv_ngayVaoDangChinhThuc->format('d/m/Y'):''}}" disabled>
                </div>
            </div>
        </div>
    </div>
    <!-- End ngày vào Đảng -->
    <div class="form-group row">
        <label class="col-lg-3 col-md-5 col-form-label">Ngày tham gia tổ chức chính trị - xã hội : </label>
        <div class="col-lg-9 col-md-7">
            <input type="text" class="form-control" value="" disabled>
        </div>
    </div>
    <!--End trình độ chuyên môn-->
    <div class="form-group row">
        <div class="col-md-4">
            <div class="row">
                <label for="" class="col-md-4 col-form-label">Ngày nhập ngũ : </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" disabled value="{{isset($nv->nv_ngayNhapNgu)?$nv->nv_ngayNhapNgu->format('d/m/Y'):''}}">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <label for="" class="col-md-4 col-form-label">Ngày xuất ngũ : </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" disabled value="{{isset($nv->nv_ngayXuatNgu)?$nv->nv_ngayXuatNgu->format('d/m/Y'):''}}">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <label for="" class="col-md-5 col-form-label">Quân hàm cao nhất : </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" disabled value="{{$nv->nv_quanHam}}">
                </div>
            </div>
        </div>
    </div>
    <!-- End nhập ngũ, xuất ngũ, quân hàm -->
    <hr>
    <div class="form-group row">
        <div class="col-md-4">
            <div class="row">
                <label class="col-md-6 col-form-label">Tình trạng sức khỏe : </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" value="{{$nv->nv_sucKhoe}}" disabled>
                </div>
            </div>
        </div>
        <!-- End sức khỏe -->
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-6 col-form-label">Chiều cao : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$nv->nv_chieuCao}}" disabled>
                        </div>
                    </div>
                </div>
                <!-- End chiều cao -->
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-6 col-form-label">Cân nặng : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$nv->nv_canNang}}" disabled>
                        </div>
                    </div>
                </div>
                <!-- End cân nặng -->
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-6 col-form-label">Nhóm máu : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$nv->nhomMau->nm_ten}}" disabled>
                        </div>
                    </div>
                </div>
                <!-- End nhóm máu -->
            </div>
        </div>
        <!-- End chiều cao cân nặng nhóm máu -->
    </div>
    <!-- End chiều cao cân nặng sức khỏe nhóm máu -->
    <hr>
    <div class="form-group row">
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-4 col-form-label">Là thương binh hạng : </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$nv->nv_hangThuongBinh}}" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-4 col-form-label">Là con gia đình chính sách : </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$nv->giaDinhChinhSach}}" disabled>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-4 col-form-label">Số cmnd/cccd : </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$nv->nv_cmnd}}" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-2 col-form-label">Ngày cấp : </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" value="{{$nv->nv_cmndNgayCap->format('d/m/Y')}}" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Số sổ bảo hiểm xã hội : </label>
        <div class="col-md-10">
            <input type="text" class="form-control" value="{{$nv->nv_bhxh}}" disabled>
        </div>
    </div>
</form>