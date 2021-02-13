@extends('print.layouts.paper')

@section('title')
Phiếu in danh sách tuyển dụng
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 landscape @endsection
@section('paper-toolbar-top')
<input type="button" value="Quay về" onClick="window.location='{{route('admin.tuyendung.index')}}'" /><br>
@endsection
@section('paper-toolbar-bottom')
<input type="button" value="Quay về" onClick="window.location='{{route('admin.tuyendung.index')}}'" /><br>
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
                    <th colspan="10" style="font-size: 20px;">Danh sách tuyển dụng</th>
                </tr>
                <tr>
                    <th>Mã tuyển dụng</th>
                    <th>Mã các bộ</th>
                    <th>Tên cán bộ</th>
                    <th>Ngày tuyển dụng</th>
                    <th>Nghề nghiệp trước đó</th>
                    <th>Cơ quan tuyển dụng</th>
                    <th>Chức vụ</th>
                    <th>Ngày vào làm</th>
                    <th>Công việc</th>
                    <th>Sở trường</th>
                </tr>
            </thead>
            <tbody id="content">
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
                    <td>{{$td -> cv_ma}}</td>
                    <td>{{$td -> td_soTruong}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </article>
</section>
@endsection