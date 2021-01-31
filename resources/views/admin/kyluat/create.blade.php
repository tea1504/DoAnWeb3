@extends('layouts.master')
@section('title')
Thêm kỷ luật
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<style>
    table#myTable {
        height: 540px;
        width: 100%;
    }

    table#myTable td {
        width: 500px;
    }

    .my-card {
        transition: .2s;
    }

    .my-card:hover {
        transform: scale(1.05, 1.05);
        z-index: 9999;
        box-shadow: 0px 0px 20px #000;
    }

    .avatar {
        background-color: #fff;
    }
</style>
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Them kỷ luật</li>
</ol>
@endsection
@section('content')
<div class="col-xl-12 col-lg-9 col-md-8 accordion pt-sm-0 pt-3" id="vungChua">
    <div class="collapse multi-collapse show" aria-labelledby="headingTwo" id="thongTinChung" data-parent="#vungChua">
        <div class="card">
            <div class="card-header h1 bg-cyan font-weight-bold">Nhập thông tin mới</div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.khenthuong.store') }}">
                        <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên nhân viên : </label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <select name="nv_ma" class="form-control">
                                        @foreach($kl as $kl)
                                       <!--  @if( old('kl_ma') == $kl->kl_ma )
                                        <option value="{{ $kl->nhanVien->nv_ma }}" selected>{{ $kl->nhanVien->nv_hoTen }}</option>
                                        @else -->
                                        <option value="{{ $kl->nhanVien->nv_ma }}" selected>{{ $kl->nhanVien->nv_hoTen }}</option>
                                        <!-- @endif -->
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="date" class="form-control" value="{{ old('kl_ngayKy') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Người ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                   
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Lý do : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" class="form-control" value="{{ old('$kl_lyDo') }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày tạo mơi : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="date" class="form-control" value="{{ old('$kl_taoMoi') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày cập nhật : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="date" class="form-control" value="{{ old('$kl_capNhat') }}" >
                            </div>
                        </div>
                        
                        
                        <button type="sumbit" class="btn btn-primary">Thêm mới</button>

                    </form>   
                </div>
            </div>   
        </div>
     </div>
           
</div>
@endsection
@section('custom-scripts')
<script src="{{ asset('themes/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    
    
</script>

@endsection