@extends('layouts.master')
@section('title')
{{$nv->nv_hoTen}} - {{$nv->nv_ma}}
@endsection
@section('custom-css')
<style>
    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #17a2b8 !important;
        border-color: #17a2b8 !important;
    }
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.nhanvien.index')}}">Danh sách nhân viên</a></li>
    <li class="breadcrumb-item active">{{$nv->nv_hoTen}} - {{$nv->nv_ma}}</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="chitietnhanvienController">
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4">
            <div class="card">
                <div class="card-body p-0">
                    <img src="{{ Storage::exists('public/avatar/' . $nv->nv_anh) ? asset('storage/avatar/' . $nv->nv_anh) : asset('storage/avatar/default.png') }}" class="img-fluid" height="50px" alt="User Image">
                </div>
                <div class="card-footer bg-cyan">
                    <b>{{$nv->nv_hoTen}}</b>
                </div>
            </div>
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active" data-toggle="collapse" data-target="#thongTinChung" aria-controls="thongTinChung">
                    Thông tin chung
                </button>
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#khenThuong" aria-controls="khenThuong">
                    Khen thưởng/Kỷ luật
                </button>
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#trinhDo" aria-controls="trinhDo">
                    Trình độ
                </button>
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#giaDinh" aria-controls="giaDinh">
                    Quan hệ gia đình
                </button>
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#luong" aria-controls="luong">
                    Lương/Phụ cấp
                </button>
                <button type="button" class="list-group-item list-group-item-action" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#tuyenDung" aria-controls="tuyenDung">
                    Thông tin tuyển dụng
                </button>
            </div>
        </div>
        <div class="col-xl-10 col-lg-9 col-md-8 accordion pt-sm-0 pt-3" id="vungChua">
            <div class="collapse multi-collapse show" aria-labelledby="headingTwo" id="thongTinChung" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Thông tin chung</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Số hiệu cán bộ/công chức : </label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <input type="text" class="form-control" value="{{$nv->nv_ma}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Họ và tên : </label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <input type="text" class="form-control" value="{{$nv->nv_hoTen}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên gọi khác : </label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <input type="text" class="form-control" value="{{$nv->nv_tenGoiKhac}}" disabled>
                                </div>
                            </div>
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
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-md-2 col-sm-4 col-form-label">, Giới tính : </label>
                                        <div class="col-md-10 col-sm-8">
                                            <input type="text" class="form-control" value="{{$nv->nv_gioiTinh == 1 ? 'Nam' : 'Nữ'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-1 col-md-2 col-sm-4 col-form-label">Nơi sinh : </label>
                                <div class="col-lg-11 col-md-10 col-sm-8">
                                    <div class="row">
                                        <label class="col-md-1 col-form-label text-md-right">Xã </label>
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{$nv->noiSinh[0]->xa->x_ten}}" disabled>
                                        </div>
                                        <label class="col-md-1 col-form-label text-md-right">, Huyện </label>
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{$nv->noiSinh[0]->huyen->h_ten}}" disabled>
                                        </div>
                                        <label class="col-md-1 col-form-label text-md-right">, Tỉnh </label>
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{$nv->noiSinh[0]->tinh->t_ten}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-1 col-md-2 col-sm-4 col-form-label">Quê quán : </label>
                                <div class="col-lg-11 col-md-10 col-sm-8">
                                    <div class="row">
                                        <label class="col-md-1 col-form-label text-md-right">Xã </label>
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{$nv->queQuan[0]->xa->x_ten}}" disabled>
                                        </div>
                                        <label class="col-md-1 col-form-label text-md-right">, Huyện </label>
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{$nv->queQuan[0]->huyen->h_ten}}" disabled>
                                        </div>
                                        <label class="col-md-1 col-form-label text-md-right">, Tỉnh </label>
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{$nv->queQuan[0]->tinh->t_ten}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-md-2 col-sm-4 col-form-label">Tôn giáo : </label>
                                        <div class="col-md-10 col-sm-8">
                                            <input type="text" class="form-control" value="{{$nv->tonGiao->tg_ten}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="khenThuong" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Khen thưởng/Kỷ luật</div>
                    <div class="card-body"></div>
                </div>
            </div>
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="trinhDo" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Trình độ</div>
                    <div class="card-body">
                        <form>

                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên trường</th>
                                    <th>Chuyên ngành đào tạo, bồi dưỡng</th>
                                    <th class="text-center">Từ tháng, năm đến tháng, năm</th>
                                    <th class="text-center">Hình thức đào tạo</th>
                                    <th class="text-center">Văn bằng, chứng chỉ, trình độ gì</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nv->dsVBCC as $vbcc)
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
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="giaDinh" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Quan hệ gia đình</div>
                    <div class="card-body"></div>
                </div>
            </div>
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="luong" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Lương/Phụ cấp</div>
                    <div class="card-body"></div>
                </div>
            </div>
            <div class="collapse multi-collapse" aria-labelledby="headingTwo" id="tuyenDung" data-parent="#vungChua">
                <div class="card">
                    <div class="card-header h1 bg-cyan font-weight-bold">Thông tin tuyển dụng</div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script>
    $(document).ready(function() {
        $('.list-group button').click(function(e) {
            e.preventDefault();
            $('.list-group button').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
<script>
    app.controller('chitietnhanvienController', function($scope) {

    });
</script>
@endsection