@extends('layouts.master')
@section('title')
Thêm danh sách quan hệ gia đình
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
    <li class="breadcrumb-item active">Thêm danh sách quan hệ gia đình</li>
</ol>
@endsection
@section('content')
<div class="col-xl-12 col-lg-9 col-md-8 accordion pt-sm-0 pt-3" id="vungChua">
    <div class="collapse multi-collapse show" aria-labelledby="headingTwo" id="thongTinChung" data-parent="#vungChua">
        <div class="">
            <div class=" h1 bg-cyan font-weight-bold">Nhập thông tin mới</div>
                <div class="">
                    <form method="post" action="{{ route('admin.quanhegiadinh.store') }}"  enctype="multipart/form-data">
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
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên quan hệ : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="qhgd_ten" name="qhgd_ten" class="form-control" value="{{ old('qhgd_ten') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Mối quan hệ : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="qhgd_moiQuanHe" name="qhgd_moiQuanHe" class="form-control" value="{{ old('qhgd_moiQuanHe') }}" >
                            </div>
                        </div>
                   
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Năm sinh : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="qhgd_" name="qhgd_namSinh" class="form-control" value="{{ old('qhgd_namSinh') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Địa chỉ : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="qhgd_diaChi" name="qhgd_diaChi" class="form-control" value="{{ old('qhgd_diaChi') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nghề nghiệp : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="qhgd_ngheNghiep" name="qhgd_ngheNghiep" class="form-control" value="{{ old('qhgd_ngheNghiep') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nước ngoài : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                    <input type="number" id="qhgd_nuocNgoai" name="qhgd_nuocNgoai" min="0" max="10" class="form-control" value="{{ old('qhgd_nuocNgoai') }}" >                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tạo mới : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="date" id="qhgd_taoMoi" name="qhgd_taoMoi" class="form-control" value="{{ old('qhgd_taoMoi') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Cập nhật : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="date" id="qhgd_capNhat" name="qhgd_capNhat" class="form-control" value="{{ old('qhgd_capNhat') }}" >
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
  /* $(document).ready(function() {
    
   

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Ngày tạo mới
    $('#kt_taoMoi').inputmask({
      alias: 'datetime',
      inputFormat: 'yyyy-mm-dd' // Định dạng Năm-Tháng-Ngày
    });

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Ngày cập nhật
    $('#kt_capNhat').inputmask({
      alias: 'datetime',
      inputFormat: 'yyyy-mm-dd' // Định dạng Năm-Tháng-Ngày
    });
  }); */
</script>

@endsection