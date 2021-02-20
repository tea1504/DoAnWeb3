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
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.tuyendung.index')}}">Danh sách tuyển dụng</a></li>
    <li class="breadcrumb-item active">Thêm mới tuyển dụng</li>
</ol>
@endsection
@section('content')
<div class="container-fluid">
  @if (Session::has('alert'))
    <div aria-live="polite" aria-atomic="true" class="flex-column justify-content-center align-items-center" style="position: fixed; top:0; right:0; z-index: 100000;">
        <div class="toast bg-success m-2" data-delay="2000" role="alert" aria-live="assertive" aria-atomic="true" style="width: 400px;">
            <div class="toast-header">
                <img src="{{asset('storage/images/shin.gif')}}" class="rounded mr-2 bg-light" height="30px" alt="...">
                <strong class="mr-auto">Thành công</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{Session::get('alert')}}
            </div>
        </div>
    </div>
    @endif
  <div class="row">
    <div class="col-md-12">
      <div class="card-header bg-cyan font-weight-bold"><h1>Thêm mới tuyển dụng</h1></div>
      <div class="card">
        <div class="card-body">
          <form name="frmCreate" id="frmCreate" action="{{route('admin.tuyendung.store') }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nv_ma">Mã nhân viên</label>
                <select name="nv_ma" class="form-control">
                      @foreach($dsnv as $nv)
                          <option value="{{ $nv->nv_ma }}">{{ $nv->nv_ma }},{{ $nv->nv_hoTen }}</option>
                      @endforeach
                  </select>
            </div>
            <div class="row form-group">
              <div class="col">
                <div class="form-group">
                  <label for="td_ngay">Ngày tuyển dụng</label>
                  <input type="text" class="form-control" id="td_ngay" name="td_ngay" value="">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="td_ngheTruocDay">Nghề nghiệp trước đó</label>
                  <input type="text" class="form-control" id="td_ngheTruocDay" name="td_ngheTruocDay" value="">
                </div>
              </div>
            </div>
            <div class="row form-group">
              <div class="col">
                <div class="form-group">
                <label for="dv_ma">Đơn vị tuyển dụng </label>
                <select name="dv_ma" class="form-control">
                      @foreach($dsdv as $dv)
                          <option value="{{ $dv->dv_ma }}">{{ $dv->dv_ten }}</option>
                      @endforeach
                </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="cvu_ma">Cơ quan tuyển dụng </label>
                  <input type="text"  class="form-control" name="td_coQuanTuyen" id="td_coQuanTuyen" value="">
                </div>
              </div>
            </div>
            
            <div class="row form-group">
              <div class="col">
                <div class="form-group">
                  <label for="cvu_ma">Chức vụ </label>
                  <select name="cvu_ma" class="form-control">
                      @foreach($dscv as $cv)
                          <option value="{{ $cv->cvu_ma }}">{{ $cv->cvu_ten }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="td_ngayLam">Ngày làm việc</label>
                  <input type="text" class="form-control" id="td_ngayLam" name="td_ngayLam" value="">
                </div>
              </div>
            </div>
          
            <div class="row form-group">
              <div class="col">
                <div class="form-group">
                  <label for="cv_ma">Công việc </label>
                  <select name="cv_ma" class="form-control">
                        @foreach($dscviec as $cviec)
                            <option value="{{ $cviec->cv_ma }}">{{ $cviec->cv_ten }}</option>
                        @endforeach
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="td_soTruong">Sở trường</label>
                  <input type="text" class="form-control" id="td_soTruong" name="td_soTruong" value="">
                </div>
              </div>
            </div>
            <div class="row form-group justify-content-center">
              <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


</div>


@endsection
@section('custom-scripts')
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
<script>
    $('.toast').toast('show');
</script>

@endsection