@extends('layouts.master')
@section('title')
Thêm tuyển dụng
@endsection
@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<h1>Thêm tuyển dụng</h1>
<form name="frmcreate" id="frmcreate" action="#" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}
  <div class="form-group">
      <label for="nv_ma">Mã nhân viên</label>
      <select name="nv_ma" class="form-control">
            @foreach($dsnv as $nv)
                <option value="{{ $nv->nv_ma }}">{{ $nv->nv_ma }}</option>
            @endforeach
        </select>
  </div>
  <div class="form-group">
    <label for="td_ngay">Ngày tuyển dụng</label>
    <input type="text" class="form-control" id="td_ngay" name="td_ngay" value="">
  </div>
  <div class="form-group">
    <label for="td_ngheTruocDay">Nghề nghiệp trước đó</label>
    <input type="text" class="form-control" id="td_ngheTruocDay" name="td_ngheTruocDay" value="">
  </div>
  <div class="form-group">
    <label for="dv_ma">Đơn vị tuyển dụng </label>
    <select name="dv_ma" class="form-control">
          @foreach($dsdv as $dv)
              <option value="{{ $dv->dv_ma }}">{{ $dv->dv_ma }}</option>
          @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="cvu_ma">Cơ quan tuyển dụng </label>
    <input type="text"  class="form-control" name="td_coQuanTuyen" id="td_coQuanTuyen" value="">
  </div>
  <div class="form-group">
    <label for="cvu_ma">Chức vụ </label>
    <select name="cvu_ma" class="form-control">
          @foreach($dscv as $cv)
              <option value="{{ $cv->cvu_ma }}">{{ $cv->cvu_ma }}</option>
          @endforeach
      </select>
  </div>
  <div class="form-group">
    <label for="td_ngayLam">Ngày làm việc</label>
    <input type="text" class="form-control" id="td_ngayLam" name="td_ngayLam" value="">
  </div>
  <div class="form-group">
    <label for="cv_ma">Công việc </label>
    <select name="cv_ma" class="form-control">
          @foreach($dscviec as $cviec)
              <option value="{{ $cviec->cv_ma }}">{{ $cviec->cv_ma }}</option>
          @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="td_soTruong">Sở trường</label>
    <input type="text" class="form-control" id="td_soTruong" name="td_soTruong" value="">
  </div>
  <div class="form-group">
    <label for="td_taoMoi">Ngày tạo mới</label>
    <input type="text" class="form-control" id="td_taoMoi" name="td_taoMoi" value="">
  </div>
  <div class="form-group">
    <label for="td_capNhat">Ngày cập nhật</label>
    <input type="text" class="form-control" id="td_capNhat" name="td_capNhat" value="">
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection
@section('custom-scripts')
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
<script>
</script>

@endsection