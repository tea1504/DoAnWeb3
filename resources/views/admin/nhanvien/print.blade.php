@extends('print.layouts.paper')

@section('title')
Phiếu in danh sách cán bộ công chức
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 landscape @endsection
@section('paper-toolbar-top')
<input type="button" value="Quay về" onClick="window.location='{{route('admin.nhanvien.index')}}'" /><br>
@endsection
@section('paper-toolbar-bottom')
<input type="button" value="Quay về" onClick="window.location='{{route('admin.nhanvien.index')}}'" /><br>
@endsection
@section('custom-css')
<style>
    * {
        font-size: 14px;
        font-family: 'Times New Roman', Times, serif;
    }

    td {
        vertical-align: middle;
        line-height: 20px;
    }

    .page-break {
        page-break-after: always;
    }

    @page {
        size: 297mm 209mm;
        margin: 20mm;
    }

    .slogan,
    b {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
@endsection

@section('content')
<section class="sheet padding-20mm">
    <article>
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
        <table border="1" cellspacing="0" cellpadding="3" style="border: none; margin-top: 20px;">
            <thead>
                <tr>
                    <th width="20px">#</th>
                    <th>Mã cán bộ</th>
                    <th>Ảnh</th>
                    <th>Tên cán bộ</th>
                    <th>Chức vụ</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dsnv as $nv)
                <tr>
                    <td align="center">{{$loop->index + 1}}</td>
                    <td align="center">{{$nv->nv_ma}}</td>
                    <td>
                        <img src="{{ Storage::exists('public/avatar/' . $nv->nv_anh) ? asset('storage/avatar/' . $nv->nv_anh) : asset('storage/avatar/default.png') }}" width="50px" alt="User Image">
                    </td>
                    <td>{{$nv->nv_hoTen}}</td>
                    <td>{{$nv->chucVu->cvu_ten}}</td>
                    <td>{{$nv->nv_noiOHienNay}}</td>
                    <td>{{$nv->nv_sdt}}</td>
                    <td>{{$nv->nv_email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </article>
</section>
@endsection