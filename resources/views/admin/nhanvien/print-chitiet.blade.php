@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh sách sản phẩm
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
<style>
    * {
        font-size: 12px;
        font-family: 'Times New Roman', Times, serif;
    }

    td {
        vertical-align: top;
    }
</style>
@endsection

@section('content')
<section class="sheet padding-20mm">
    <article>
        <table border="1" cellpadding="0" cellspacing="0">
            <tr>
                <td width="8.7%">a</td>
                <td width="8.3%"></td>
                <td width="8.3%"></td>
                <td width="8.3%"></td>
                <td width="8.3%"></td>
                <td width="8.3%"></td>
                <td width="8.3%"></td>
                <td width="8.3%"></td>
                <td width="8.3%"></td>
                <td width="8.3%"></td>
                <td width="8.3%"></td>
                <td width="8.3%"></td>
            </tr>
            <tr>
                <td colspan="5">Cơ quan, đơn vị có thẩm quyền quản lý CBCC:</td>
                <td colspan="3">{{$nv->tuyenDung->donVi->donViQuanLy->dvql_ten}}</td>
                <td colspan="3">Số hiệu cán bộ, công chức:</td>
                <td colspan="1" align="center">{{$nv->nv_ma}}</td>
            </tr>
            <tr>
                <td colspan="3">Cơ quan, đơn vị sử dụng CBCC:</td>
                <td colspan="9">{{$nv->tuyenDung->donVi->dv_ten}}</td>
            </tr>
            <tr>
                <td colspan="12">&ensp;</td>
            </tr>
            <tr>
                <td colspan="2" rowspan="6" align="center">
                    <img src="{{ Storage::exists('public/avatar/' . $nv->nv_anh) ? asset('storage/avatar/' . $nv->nv_anh) : asset('storage/avatar/default.png') }}" width="100%" alt="User Image">
                </td>
                <td colspan="10" align="center">SƠ YẾU LÝ LỊCH CÁN BỘ, CÔNG CHỨC</td>
            </tr>
            <tr>
                <td colspan="10">&ensp;</td>
            </tr>
            <tr>
                <td colspan="4">1. Họ và tên khai sinh (viết chữ in hoa):</td>
                <td colspan="6" style="text-transform: uppercase;">{{$nv->nv_hoTen}}</td>
            </tr>
            <tr>
                <td colspan="2">2. Tên gọi khác</td>
                <td colspan="8" style="text-transform: uppercase;">{{$nv->nv_tenGoiKhac}}</td>
            </tr>
            <tr>
                <td colspan="2">3. Sinh ngày</td>
                <td colspan="1">{{getdate(strtotime($nv->nv_ngaySinh))['mday']}}</td>
                <td colspan="1">tháng</td>
                <td colspan="1">{{getdate(strtotime($nv->nv_ngaySinh))['mon']}}</td>
                <td colspan="1">năm</td>
                <td colspan="1">{{getdate(strtotime($nv->nv_ngaySinh))['year']}}</td>
                <td colspan="2">Giới tính (nam, nữ):</td>
                <td colspan="1">{{$nv->nv_gioiTinh == 1 ? 'mam' : 'nữ'}}</td>
            </tr>
        </table>
    </article>
</section>
@endsection