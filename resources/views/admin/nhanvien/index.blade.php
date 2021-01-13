@extends('layouts.master')
@section('title')
Danh sách nhân viên
@endsection
@section('custom-css')
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active">Danh sách nhân viên</li>
</ol>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
        @foreach($data as $d)
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="image">
                        <img src="{{ asset('themes/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" height="50px" alt="User Image">
                        Featured
                    </div>
                </div>
                <div class="card-body">
                    {{ $d }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('custom-scripts')
@endsection