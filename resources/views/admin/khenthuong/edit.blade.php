@extends('layouts.master')
@section('title')
Sửa khen thưởng
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
    <li class="breadcrumb-item active">Sửa khen thưởng</li>
</ol>
@endsection
@section('content')
<div class="col-xl-12 col-lg-9 col-md-8 accordion pt-sm-0 pt-3" id="vungChua">
    <div class="collapse multi-collapse show" aria-labelledby="headingTwo" id="thongTinChung" data-parent="#vungChua">
        <div class="">
            <div class=" h1 bg-cyan font-weight-bold">Nhập thông tin mới</div>
                <div class="">
                    <form method="post" action="{{ route('admin.khenthuong.update',['id' => $kt->kt_ma] ) }}"  enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT" />
                        {{ csrf_field() }}
                        <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên nhân viên : </label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <select name="nv_ma" class="form-control">
                                    @foreach($nv as $nv)
                                        @if($nv->nv_ma == $kt->nv_ma)
                                        <option value="{{ $nv->nv_ma }}" selected>{{ $nv->nv_hoTen }}</option>
                                        @else
                                        <option value="{{ $nv->nv_ma }}">{{ $nv->nv_hoTen }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                   
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label" >Ngày ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="kt_ngayKy" name="kt_ngayKy" class="form-control" value="{{ old('kt_ngayKy', $kt->kt_ngayKy) }}" data-mask-datetime>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Người ký : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <select name="nv_ma" class="form-control">
                                    @foreach($nv as $nv)
                                        @if($nv->nv_ma == $kt->kt_nguoiKy)
                                        <option value="{{ $nv->nv_ma }}" selected>{{ $nv->nv_hoTen }}</option>
                                        @else
                                        <option value="{{ $nv->nv_ma }}">{{ $nv->nv_hoTen }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Lý do : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="kt_lyDo" name="kt_lyDo" class="form-control" value="{{ old('$kt_lyDo', $kt->kt_lyDo) }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày tạo mới : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="kt_taoMoi" name="kt_taoMoi" class="form-control" value="{{ old('$kt_taoMoi', $kt->kt_taoMoi) }}" data-mask-datetime>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Ngày cập nhật : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="kt_capNhat" name="kt_capNhat" class="form-control" value="{{ old('$kt_capNhat', $kt->kt_capNhat) }}" data-mask-datetime>
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