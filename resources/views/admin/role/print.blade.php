@extends('print.layouts.paper')

@section('title')
Phiếu in danh sách role
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 landscape @endsection
@section('paper-toolbar-top')
<input type="button" value="Quay về" onClick="window.location='{{route('admin.role.index')}}'" /><br>
@endsection
@section('paper-toolbar-bottom')
<input type="button" value="Quay về" onClick="window.location='{{route('admin.role.index')}}'" /><br>
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
    thead tr {
        background-color: #2c3e50;
        color: white;
    }

    #printTable tbody tr:nth-child(odd) {
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
        <table border="1" id="printTable" cellspacing="0" cellpadding="3" style="border: none; margin-top: 20px;" >
            <thead>
                <tr>
                    <th colspan="10" style="font-size: 20px;">Danh sách role</th>
                </tr>
                <tr>
                    <th width="5%">Mã role</th>
                    <th width="25%">Tên role</th>
                    <th width="100%">Mô Tả</th>
                </tr>
            </thead>
            <tbody id="content">
                @foreach($dsrole as $role)
                <tr>
                    <td align="center">{{$role->role_ma}}</td>
                    <td align="center">{{$role ->role_ten}}</td>
                    <td>{{$role ->role_mota}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </article>
</section>
@endsection