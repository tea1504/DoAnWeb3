@extends('layouts.master')
@section('title')
Không tìm thấy trang
@endsection
@section('custom-css')

@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Không tìm thấy trang</li>
</ol>
@endsection
@section('content')
<div class="error-page">
    <h2 class="headline text-warning"> 404</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Lỗi!!! Không tìm thấy trang.</h3>
        <p>
            Chúng tôi không thể tìm thấy trang bạn yêu cầu.<br>
            Hãy quay lại <a href="{{route('admin')}}" class="text-warning">trang chủ</a> <br>
            Hoặc <a href="{{route('admin.lienhe')}}" class="text-warning">liên hệ</a> với quản trị viên
        </p>
    </div>
    <!-- /.error-content -->
</div>
@endsection
@section('custom-scripts')

@endsection