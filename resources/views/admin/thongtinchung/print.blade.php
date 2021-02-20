@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh sách quá trình công tác
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 landscape @endsection
@section('paper-toolbar-top')
<button onclick="window.location='{{route('admin.quatrinhcongtac.index')}}'">Quay về</button>
@endsection
@section('paper-toolbar-bottom')
<button onclick="window.location='{{route('admin.quatrinhcongtac.index')}}'">Quay về</button>
@endsection
@section('custom-css')
<style>
    * {
        font-size: 12px;
        font-family: DejaVu Sans, sans-serif;
    }

    td {
        vertical-align: middle;
        line-height: 20px;
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
        <table border="1" cellspacing="0" cellpadding="5" id="container" style="border: none; width: 100%">
            <thead>
                <tr>
                    
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </article>
</section>
@endsection