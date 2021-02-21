@extends('layouts.master')
@section('title')
Yêu cầu quyền truy cập
@endsection
@section('custom-css')
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Yêu cầu quyền truy cập</li>
</ol>
@endsection
@section('content')
<div class="error-page">
    <h2 class="headline text-danger"> 403</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-danger"></i> Lỗi!!! Quyền truy cập</h3>
        <p>
            Bạn không có quyền truy cập vào đây. <br>
            Hãy quay lại <a href="{{route('admin')}}" class="text-danger">trang chủ</a> <br>
            Hoặc <a href="{{route('admin.lienhe')}}" class="text-danger">liên hệ</a> với quản trị viên
        </p>

    </div>
    <!-- /.error-content -->
</div>
@endsection
@section('custom-scripts')

@endsection