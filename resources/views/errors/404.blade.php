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
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

        <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
        </p>

        <form class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <!-- /.input-group -->
        </form>
    </div>
    <!-- /.error-content -->
</div>
@endsection
@section('custom-scripts')

@endsection