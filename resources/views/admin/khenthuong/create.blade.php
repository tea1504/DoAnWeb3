@extends('layouts.master')
@section('title')
Thêm khen thưởng
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
    <li class="breadcrumb-item active">Danh sách khen thưởng</li>
</ol>
@endsection
@section('content')
<div class="col-xl-12 col-lg-9 col-md-8 accordion pt-sm-0 pt-3" id="vungChua">
    <div class="collapse multi-collapse show" aria-labelledby="headingTwo" id="thongTinChung" data-parent="#vungChua">
        <div class="">
            <div class=" h1 bg-cyan font-weight-bold">Nhập thông tin mới</div>
                <div class="">
                    <form method="post" action="{{ route('admin.khenthuong.store') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên nhân viên : </label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <select name="nv_ma" class="form-control">
                                    @foreach($danhsachnhanvien as $nhanvien)
                                    <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                                    @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="date" id="kt_ngayKy" name="kt_ngayKy" class="form-control" value="{{ old('kt_ngayKy') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Người ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <select name="nv_ma" class="form-control">
                                    @foreach($danhsachnhanvien as $nhanvien)
                                    <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Lý do : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="kt_lyDo" name="kt_lyDo" class="form-control" value="{{ old('$kt_lyDo') }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày tạo mới : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="date" id="kt_taoMoi" name="kt_taoMoi" class="form-control" value="{{ old('$kt_taoMoi') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày cập nhật : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="date" id="kt_capNhat" name="kt_capNhat" class="form-control" value="{{ old('$kt_capNhat') }}" >
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
<script src="{{ asset('themes/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>
<script>
  
</script>

@endsection