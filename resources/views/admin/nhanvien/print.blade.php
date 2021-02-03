@extends('print.layouts.paper')

@section('title')
Phiếu in danh sách cán bộ công chức
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 landscape @endsection
@section('paper-toolbar-top') @endsection
@section('paper-toolbar-bottom') @endsection
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
</style>
@endsection

@section('content')
<section class="sheet padding-20mm">
    <article>

        <table border="1" cellspacing="0" cellpadding="3" style="border: none;">
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