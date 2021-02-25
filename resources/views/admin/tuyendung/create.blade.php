@extends('layouts.master')
@section('title')
Thêm mới tuyển dụng
@endsection
@section('custom-css')
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{route('admin.tuyendung.index')}}">Danh sách tuyển dụng</a></li>
  <li class="breadcrumb-item active">Thêm mới tuyển dụng</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="tuyendungController" >
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
      <div class="card-header bg-cyan font-weight-bold">
        <h1>Thêm mới tuyển dụng</h1>
      </div>
      <div class="card">
        <div class="card-body">
        <form name="frmCreate" id="frmCreate" method="POST" action="{{route('admin.tuyendung.store')}}" novalidate>
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nv_ma">Thông tin nhân viên</label>
              <select name="nv_ma" class="form-control" id="nv_ma" ng-class="frmCreate.nv_ma.$touched?frmCreate.nv_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="nv_ma" ng-required="true">
              <option value=""></option>
                  @foreach($dsnv as $nv)
                      <option value="{{$nv->nv_ma}}" >{{$nv->nv_ma}},{{$nv->nv_hoTen}}</option>
                  @endforeach
              </select>
              <div class="invalid-feedback">
                    <span ng-show="frmCreate.nv_ma.$error.required">Bạn phải chọn nhân viên</span>
                </div>
            </div>
            <div class="row form-group">
              <div class="col">
                <div class="form-group">
                  <label for="td_ngay">Ngày tuyển dụng</label>
                  <input type="text" class="form-control"ng-class="frmCreate.td_ngay.$touched?frmCreate.td_ngay.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" id="td_ngay" name="td_ngay" value="{{ old('td_ngay')}}" ng-model="td_ngay" ng-required="true" ng-minlength="10" ng-maxlength="10" ng-pattern="/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/" 
                  data-toggle="tooltip" data-placement="top" title="Điền theo định dạng năm-tháng-ngày. VD:2020-01-20" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"</div></div>'>
                  <div class="invalid-feedback">
                      <span ng-show="frmCreate.td_ngay.$error.required">Bạn phải điền ngày tuyển dụng</span>
                      <span ng-show="frmCreate.td_ngay.$error.minlength">Giá trị quá ngắn</span>
                      <span ng-show="frmCreate.td_ngay.$error.maxlength">Giá trị quá dài</span>
                      <span ng-show="frmCreate.td_ngay.$error.pattern&&!(frmCreate.td_ngay.$error.minlength||frmCreate.td_ngay.$error.maxlength)">Từ ngày không hợp lệ</span>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="td_ngheTruocDay">Nghề nghiệp trước đó</label>
                  <input type="text" class="form-control" ng-class="frmCreate.td_ngheTruocDay.$touched?frmCreate.td_ngheTruocDay.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'"  id="td_ngheTruocDay" name="td_ngheTruocDay" value="{{old('td_ngheTruocDay')}}"  ng-model="td_ngheTruocDay" ng-required="true" ng-minlength="5" ng-maxlength="50">    
                  <div class="invalid-feedback">
                    <span ng-show="frmCreate.td_ngheTruocDay.$error.required">Bạn phải điền nghề nghiệp trước đó</span>
                    <span ng-show="frmCreate.td_ngheTruocDay.$error.minlength">Nghề nghiệp trước đó phải chứa ít nhất 5 ký tự</span>
                    <span ng-show="frmCreate.td_ngheTruocDay.$error.maxlength">Nghề nghiệp trước đó chỉ chứa nhiều nhất 50 ký tự</span>
                  </div>
                </div> 
              </div>
            </div>
            <div class="row form-group">
              <div class="col">
                <div class="form-group">
                  <label for="dv_ma">Đơn vị tuyển dụng </label>
                  <select name="dv_ma" class="form-control" ng-class="frmCreate.dv_ma.$touched?frmCreate.dv_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="dv_ma" ng-required="true">
                    <option value=""></option>
                    @foreach($dsdv as $dv)
                    <option value="{{ $dv->dv_ma }}">{{ $dv->dv_ten }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    <span ng-show="frmCreate.dv_ma.$error.required">Bạn phải đơn vị tuyển dụng</span>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="td_coQuanTuyen">Cơ quan tuyển dụng </label>
                  <input type="text" class="form-control" ng-class="frmCreate.td_coQuanTuyen.$touched?frmCreate.td_coQuanTuyen.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" name="td_coQuanTuyen" id="td_coQuanTuyen" value="{{old('td_coQuanTuyen')}}"  ng-model="td_coQuanTuyen" ng-required="true" >
               
                  <div class="invalid-feedback">
                    <span ng-show="frmCreate.td_coQuanTuyen.$error.required">Bạn phải điền cơ quan tuyển dụng</span>
                    <span ng-show="frmCreate.td_coQuanTuyen.$error.minlength">Cơ quan tuyển dụng phải chứa ít nhất 5 ký tự</span>
                    <span ng-show="frmCreate.td_coQuanTuyen.$error.maxlength">Cơ quan tuyển dụng chỉ chứa nhiều nhất 50 ký tự</span>
                 </div>
                </div>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <div class="form-group">
                  <label for="cvu_ma">Chức vụ </label>
                  <select name="cvu_ma" class="form-control" ng-class="frmCreate.cvu_ma.$touched?frmCreate.cvu_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="cvu_ma" ng-required="true">
                    <option value=""></option>
                    @foreach($dscv as $cv)
                    <option value="{{ $cv->cvu_ma }}">{{ $cv->cvu_ten }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    <span ng-show="frmCreate.cvu_ma.$error.required">Bạn phải chọn chức vụ</span>
                  </div>
                </div> 
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="td_ngayLam">Ngày làm việc</label>
                  <input type="text"  ng-class="frmCreate.td_ngayLam.$touched?frmCreate.td_ngayLam.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'"  class="form-control" id="td_ngayLam" name="td_ngayLam" value="{{old('td_ngayLam')}} " ng-model="td_ngayLam" ng-minlength="10"
                        ng-maxlength="10" ng-required=true ng-pattern="/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/" data-toggle="tooltip" data-placement="top" title="Điền theo định dạng năm-tháng-ngày. VD:2020-01-20" data-html="true" data-template='<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-cyan border"</div></div>'>
                  <div class="invalid-feedback">
                    <span ng-show="frmCreate.td_ngayLam.$error.required">Bạn phải điền ngày làm việc</span>
                    <span ng-show="frmCreate.td_ngayLam.$error.minlength">Giá trị quá ngắn</span>
                    <span ng-show="frmCreate.td_ngayLam.$error.maxlength">Giá trị quá dài</span>
                    <span ng-show="frmCreate.td_ngayLam.$error.pattern&&!(frmCreate.td_ngayLam.$error.minlength||frmCreate.td_ngayLam.$error.maxlength)">Từ ngày không hợp lệ</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row form-group">
              <div class="col">
                <div class="form-group">
                  <label for="cv_ma">Công việc </label>
                  <select name="cv_ma" class="form-control" ng-class="frmCreate.cv_ma.$touched?frmCreate.cv_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" ng-model="cv_ma" ng-required="true">
                    <option value=""></option>
                    @foreach($dscviec as $cviec)
                    <option value="{{ $cviec->cv_ma }}">{{ $cviec->cv_ten }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    <span ng-show="frmCreate.cv_ma.$error.required">Bạn phải chọn công việc</span>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="td_soTruong">Sở trường</label>
                  <input type="text" class="form-control" ng-class="frmCreate.td_soTruong.$touched?frmCreate.td_soTruong.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'"  id="td_soTruong" name="td_soTruong" value="{{old('td_soTruong')}}"  ng-model="td_soTruong" ng-required="true" ng-minlength="5" ng-maxlength="50">
                  <div class="invalid-feedback">
                    <span ng-show="frmCreate.td_soTruong.$error.required">Bạn phải điền tên trường</span>
                    <span ng-show="frmCreate.td_soTruong.$error.minlength">Nhập quá ngắn, phải chứa ít nhất 5 ký tự</span>
                    <span ng-show="frmCreate.td_soTruong.$error.maxlength">Nhập quá dài, chỉ chứa nhiều nhất 50 ký tự</span>
                  </div>
                 </div>
              </div>
            </div>
            <div class="form-group justify-content-center">
              <button type="submit" class="btn btn-primary" ng-disabled="frmCreate.$invalid">Thêm mới</button>
              <a href="{{route('admin.tuyendung.index')}}" class="btn btn-secondary">Trở về</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('custom-scripts')

<script>
  $('.toast').toast('show');
  $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
  app.controller('tuyendungController', function($scope, $http) {});
</script>

@endsection