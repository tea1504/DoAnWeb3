<?php
$user = Session::get('user')[0];
?>
@extends('layouts.master')
@section('title')
{{$user->nv_hoTen}}
@endsection
@section('custom-css')
<style>
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">{{$user->nv_hoTen}}</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="userController">
    <div class="card bg-gradient-lightblue">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ Storage::exists('public/avatar/' . $d->nv_anh) && isset($d->nv_anh) ? asset('storage/avatar/' . $d->nv_anh) : asset('storage/avatar/default.png') }}" class="img-circle bg-white elevation-2 avatar" height="200px" alt="User Image">
                </div>
                <div class="col-md-12">
                    <i><small>*Nếu thông tin có sai sót hãy <a href="{{route('admin.lienhe')}}" class="text-white">liên hệ với quản trị viên</a> để chỉnh sửa</small></i>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header bg-gradient-cyan" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Thông tin chung
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Số hiệu cán bộ/công chức : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" class="form-control" value="{{$d->nv_ma}}" disabled>
                            </div>
                        </div>
                        <!--End số hiệu-->
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Họ và tên : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" class="form-control" value="{{$d->nv_hoTen}}" disabled>
                            </div>
                        </div>
                        <!--End họ và tên-->
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên gọi khác : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" class="form-control" value="{{$d->nv_tenGoiKhac}}" disabled>
                            </div>
                        </div>
                        <!--End tên gọi khác-->
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col col-form-label">Sinh ngày </label>
                                    <div class="col">
                                        <input type="text" class="form-control" value="{{getdate(strtotime($d->nv_ngaySinh))['mday']}}" disabled>
                                    </div>
                                    <label class="col col-form-label text-right">tháng </label>
                                    <div class="col">
                                        <input type="text" class="form-control" value="{{getdate(strtotime($d->nv_ngaySinh))['mon']}}" disabled>
                                    </div>
                                    <label class="col col-form-label text-right">năm </label>
                                    <div class="col">
                                        <input type="text" class="form-control" value="{{getdate(strtotime($d->nv_ngaySinh))['year']}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <!--End ngày sinh-->
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-2 col-sm-4 col-form-label">, Giới tính : </label>
                                    <div class="col-md-10 col-sm-8">
                                        <input type="text" class="form-control" value="{{$d->nv_gioiTinh == 1 ? 'Nam' : 'Nữ'}}" disabled>
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
                                        <input type="text" class="form-control" value="{{$d->noiSinh->xa->x_ten}}" disabled>
                                    </div>
                                    <label class="col-md-1 col-form-label text-md-right">, Huyện </label>
                                    <div class="col">
                                        <input type="text" class="form-control" value="{{$d->noiSinh->huyen->h_ten}}" disabled>
                                    </div>
                                    <label class="col-md-1 col-form-label text-md-right">, Tỉnh </label>
                                    <div class="col">
                                        <input type="text" class="form-control" value="{{$d->noiSinh->tinh->t_ten}}" disabled>
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
                                        <input type="text" class="form-control" value="{{$d->queQuan->xa->x_ten}}" disabled>
                                    </div>
                                    <label class="col-md-1 col-form-label text-md-right">, Huyện </label>
                                    <div class="col">
                                        <input type="text" class="form-control" value="{{$d->queQuan->huyen->h_ten}}" disabled>
                                    </div>
                                    <label class="col-md-1 col-form-label text-md-right">, Tỉnh </label>
                                    <div class="col">
                                        <input type="text" class="form-control" value="{{$d->queQuan->tinh->t_ten}}" disabled>
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
                                        <input type="text" class="form-control" value="{{$d->danToc->dt_ten}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <!--End dân tộc-->
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-2 col-sm-4 col-form-label">Tôn giáo : </label>
                                    <div class="col-md-10 col-sm-8">
                                        <input type="text" class="form-control" value="{{$d->tonGiao->tg_ten}}" disabled>
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
                                <input type="text" class="form-control" value="{{$d->nv_hoKhauThuongTru}}" disabled>
                            </div>
                        </div>
                        <!--End nơi đăng ký hộ khẩu thường trú-->
                        <div class="form-group row">
                            <label class="col-lg-3 col-md-5 col-sm-6 col-form-label">Nơi ở hiện nay : </label>
                            <div class="col-lg-9 col-md-7 col-sm-6">
                                <input type="text" class="form-control" value="{{$d->nv_noiOHienNay}}" disabled>
                            </div>
                        </div>
                        <!--End nơi ở hiện nay-->
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-5 col-form-label">Trình độ giáo dục phổ thông : </label>
                            <div class="col-lg-10 col-md-8 col-sm-7">
                                <input type="text" class="form-control" value="{{$d->trinhDo->td_ten}}" disabled>
                            </div>
                        </div>
                        <!--End trình độ gdph-->
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-5 col-form-label">Trình độ chuyên môn : </label>
                            <div class="col-lg-10 col-md-8 col-sm-7">
                                <input type="text" class="form-control" value="{{$d->nv_trinhDoChuyenMon}}" disabled>
                            </div>
                        </div>
                        <!--End trình độ chuyên môn-->
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-6 col-form-label">Ngày vào Đảng cộng sản Việt Nam : </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="{{isset($d->nv_ngayVaoDang)?$d->nv_ngayVaoDang->format('d/m/Y'):''}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-6 col-form-label">Ngày chính thức : </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="{{isset($d->nv_ngayVaoDangChinhThuc)?$d->nv_ngayVaoDangChinhThuc->format('d/m/Y'):''}}" disabled>
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
                                        <input type="text" class="form-control" disabled value="{{isset($d->nv_ngayNhapNgu)?$d->nv_ngayNhapNgu->format('d/m/Y'):''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="" class="col-md-4 col-form-label">Ngày xuất ngũ : </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" disabled value="{{isset($d->nv_ngayXuatNgu)?$d->nv_ngayXuatNgu->format('d/m/Y'):''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Quân hàm cao nhất : </label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" disabled value="{{$d->nv_quanHam}}">
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
                                        <input type="text" class="form-control" value="{{$d->nv_sucKhoe}}" disabled>
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
                                                <input type="text" class="form-control" value="{{$d->nv_chieuCao}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End chiều cao -->
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label class="col-md-6 col-form-label">Cân nặng : </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{$d->nv_canNang}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End cân nặng -->
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label class="col-md-6 col-form-label">Nhóm máu : </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{$d->nhomMau->nm_ten}}" disabled>
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
                                        <input type="text" class="form-control" value="{{$d->nv_hangThuongBinh}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-4 col-form-label">Là con gia đình chính sách : </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{$d->giaDinhChinhSach}}" disabled>
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
                                        <input type="text" class="form-control" value="{{$d->nv_cmnd}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-2 col-form-label">Ngày cấp : </label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="{{$d->nv_cmndNgayCap->format('d/m/Y')}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Số sổ bảo hiểm xã hội : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$d->nv_bhxh}}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-gradient-cyan" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Khen thưởng/Kỷ luật
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <form>
                        <h2>Khen thưởng</h2>
                        @if(count($d->dsKhenThuong) > 0)
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Lý do</th>
                                    <th>Người ký</th>
                                    <th>Ngày ký</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($d->dsKhenThuong as $kt)
                                <tr>
                                    <td>{{$kt->kt_lyDo}}</td>
                                    <td>{{$kt->nguoiKy->nv_hoTen}}</td>
                                    <td>{{$kt->kt_ngayKy->format('d/m/Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        Không có khen thưởng
                        @endif
                        <h2>Kỷ luật</h2>
                        @if(count($d->dsKyLuat) > 0)
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Lý do</th>
                                    <th>Người ký</th>
                                    <th>Ngày ký</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($d->dsKyLuat as $kl)
                                <tr>
                                    <td>{{$kl->kl_lyDo}}</td>
                                    <td>{{$kl->nguoiKy->nv_hoTen}}</td>
                                    <td>{{$kl->kl_ngayKy->format('d/m/Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        Không có kỷ luật
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-gradient-cyan" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Trình độ
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-4 col-md-6 col-form-label">Lý luận chính trị : </label>
                                    <div class="col-lg-8 col-md-6">
                                        <?php
                                        $tenvbcc = '';
                                        $trinhdovbcc = '';
                                        foreach ($d->dsVBCC as $vbcc) {
                                            if ($vbcc->lvbcc_ma == 4) {
                                                $tenvbcc = $vbcc->vbcc_ten;
                                                $trinhdovbcc = $vbcc->vbcc_trinhDo;
                                            }
                                        }
                                        $result = ($tenvbcc != '') ? (($trinhdovbcc != '') ? $tenvbcc . ' (' . $trinhdovbcc . ')' : $tenvbcc) : '';
                                        ?>
                                        <input type="text" class="form-control" value="{{$result}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- End lý luận chính trị -->
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-4 col-md-6 col-form-label">Quản lý nhà nước : </label>
                                    <div class="col-lg-8 col-md-6">
                                        <?php
                                        $tenvbcc = '';
                                        $trinhdovbcc = '';
                                        foreach ($d->dsVBCC as $vbcc) {
                                            if ($vbcc->lvbcc_ma == 5) {
                                                $tenvbcc = $vbcc->vbcc_ten;
                                                $trinhdovbcc = $vbcc->vbcc_trinhDo;
                                            }
                                        }
                                        $result = ($tenvbcc != '') ? (($trinhdovbcc != '') ? $tenvbcc . ' (' . $trinhdovbcc . ')' : $tenvbcc) : '';
                                        ?>
                                        <input type="text" class="form-control" value="{{$result}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- End quản lý nhà nước -->
                        </div>
                        <!--End lý luận chính trị và quản lý nhà nước-->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-4 col-md-6 col-form-label">Ngoại ngữ : </label>
                                    <div class="col-lg-8 col-md-6">
                                        <?php
                                        $tenvbcc = '';
                                        $trinhdovbcc = '';
                                        foreach ($d->dsVBCC as $vbcc) {
                                            if ($vbcc->lvbcc_ma == 3) {
                                                $tenvbcc = $vbcc->vbcc_ten;
                                                $trinhdovbcc = $vbcc->vbcc_trinhDo;
                                            }
                                        }
                                        $result = ($tenvbcc != '') ? (($trinhdovbcc != '') ? $tenvbcc . ' (' . $trinhdovbcc . ')' : $tenvbcc) : '';
                                        ?>
                                        <input type="text" class="form-control" value="{{$result}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- End ngoại ngữ -->
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-4 col-md-6 col-form-label">Tin học : </label>
                                    <div class="col-lg-8 col-md-6">
                                        <?php
                                        $tenvbcc = '';
                                        $trinhdovbcc = '';
                                        foreach ($d->dsVBCC as $vbcc) {
                                            if ($vbcc->lvbcc_ma == 2) {
                                                $tenvbcc = $vbcc->vbcc_ten;
                                                $trinhdovbcc = $vbcc->vbcc_trinhDo;
                                            }
                                        }
                                        $result = ($tenvbcc != '') ? (($trinhdovbcc != '') ? $tenvbcc . ' (' . $trinhdovbcc . ')' : $tenvbcc) : '';
                                        ?>
                                        <input type="text" class="form-control" value="{{$result}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- End tin học -->
                        </div>
                        <!--End ngoại ngữ và tin học-->
                    </form>
                    <hr>
                    <table class="table table-bordered">
                        <caption class="text-center">Bảng đào tạo, bồi dưỡng về chuyên môn, nghiệp vụ, lý luận chính trị, ngoại ngữ, tin học</caption>
                        <thead class="thead-light">
                            <tr>
                                <th>Tên trường</th>
                                <th>Chuyên ngành đào tạo, bồi dưỡng</th>
                                <th class="text-center">Từ tháng, năm đến tháng, năm</th>
                                <th class="text-center">Hình thức đào tạo</th>
                                <th class="text-center">Văn bằng, chứng chỉ, trình độ gì</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($d->dsVBCC as $vbcc)
                            <tr>
                                <td>{{$vbcc->vbcc_tenTruong}}</td>
                                <td>{{$vbcc->vbcc_ten}}</td>
                                <td class="text-center">{{$vbcc->vbcc_tuNgay}} - {{$vbcc->vbcc_denNgay}}</td>
                                <td class="text-center">{{$vbcc->vbcc_hinhThuc}}</td>
                                <td class="text-center">{{$vbcc->vbcc_trinhDo}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-gradient-cyan" id="heading4">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        Quan hệ gia đình
                    </button>
                </h2>
            </div>
            <div id="collapse4" class="collapse show" aria-labelledby="heading4" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Mối quan hệ</th>
                                <th>Họ và tên</th>
                                <th>Năm sinh</th>
                                <th>Quê quán, nghề nghiệp, chức danh, chức vụ, đơn vị công tác, học tập, nơi ở (trong, ngoài nước);<br>thành viên các tổ chức chính trị - xã hội…?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($d->dsQuanHeGiaDinh as $qh)
                            <tr>
                                <td>{{$qh->qhgd_moiQuanHe}}</td>
                                <td>{{$qh->qhgd_ten}}</td>
                                <td>{{$qh->qhgd_namSinh}}</td>
                                <td>
                                    Địa chỉ : {{$qh->qhgd_diaChi}}<br>
                                    Nghề nghiệp: {{$qh->qhgd_ngheNghiep}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-gradient-cyan" id="heading5">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        Lương/Phụ cấp
                    </button>
                </h2>
            </div>
            <div id="collapse5" class="collapse show" aria-labelledby="heading5" data-parent="#accordionExample">
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-4 col-form-label">Ngạch công chức (viên chức) : </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{$d->luong->ngach_luong->ng_ten}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-2 col-form-label">Mã ngạch : </label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="{{$d->luong->ngach_luong->ng_ma}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="" class="col-md-3 col-form-label">Bậc lương : </label>
                                    <div class="col-md-9"><input type="text" class="form-control" value="{{$d->luong->bac_luong->b_ten}}" disabled></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="" class="col-md-3 col-form-label">Hệ số : </label>
                                    <div class="col-md-9"><input type="text" class="form-control" value="{{$d->luong->ngach_luong->dsBac->where('b_ma', $d->luong->b_ma)->first()->pivot->nb_heSoLuong}}" disabled></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="" class="col-md-3 col-form-label">Ngày hưởng : </label>
                                    <div class="col-md-9"><input type="text" class="form-control" value="" disabled></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-gradient-cyan" id="heading6">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                        Thông tin tuyển dụng
                    </button>
                </h2>
            </div>
            <div id="collapse6" class="collapse show" aria-labelledby="heading6" data-parent="#accordionExample">
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Cơ quan, đơn vị có thẩm quyền quản lý CBC : </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$d->tuyenDung->donVi->donViQuanLy->dvql_ten}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Cơ quan, đơn vị sử dụng CBCC : </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$d->tuyenDung->donVi->dv_ten}}" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Nghề nghiệp trước khi được tuyển dụng : </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$d->tuyenDung->td_ngheTruocDay}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Ngày tuyển dụng : </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{$d->tuyenDung->td_ngay->format('d/m/Y')}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Cơ quan tuyển dụng : </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{$d->tuyenDung->td_coQuanTuyen}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Chức vụ hiện tại : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$d->chucVu->cvu_ten}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Chức vụ khi tuyển : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$d->tuyenDung->chucVu->cvu_ten}}" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Công việc chính được giao : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$d->tuyenDung->congViec->cv_ten}}" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Sở trường công tác : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$d->tuyenDung->td_soTruong}}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-gradient-cyan" id="heading7">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                        Quá trình công tác
                    </button>
                </h2>
            </div>
            <div id="collapse7" class="collapse show" aria-labelledby="heading7" data-parent="#accordionExample">
                <div class="card-body">
                    @if(count($d->dsQuaTrinhCongTac) > 0)
                    <table class="table table-bordered">
                        <theah class="thead-light">
                            <tr>
                                <th>Từ tháng năm đến tháng năm</th>
                                <th>Chức danh, chức vụ, đơn vị công tác (đảng, chính quyền, đoàn thể, tổ chức xã hội), kể cả thời gian được đào tạo, bồi dưỡng về chuyên môn, nghiệp vụ,…</th>
                            </tr>
                        </theah>
                        <tbody>
                            @foreach($d->dsQuaTrinhCongTac as $ct)
                            <tr>
                                <td>{{$ct->qtct_tuNgay}} - {{$ct->qtct_denNgay}}</td>
                                <td>chức vụ : {{$ct->chucvu_qtct->cvu_ten}}, đơn vị công tác: {{$ct->donvi_qtct->dv_ten}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    Chưa có dữ liệu
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script>
    app.controller('userController', function($scope, $http) {});
</script>
@endsection