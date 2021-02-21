@extends('layouts.master')
@section('title')
Thêm quan hệ gia đình
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
    <li class="breadcrumb-item active">Danh sách quan hệ gia đình</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="quanheController">
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
            <div class="card">
                <div class="card-header bg-cyan h1 font-weight-bold">Sửa quan hệ gia đình</div>
                <div class="card-body">
                    <form method="post" name="frmEdit" id="frmEdit" action="{{ route('admin.quanhegiadinh.update', ['id' => $qhgd->qhgd_ma]) }}"  enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT" />
                        {{ csrf_field() }}
                        <input type="hidden" name="nv_ma" id="nv_ma" value="{{$qhgd->nv_ma}}">
                        <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên nhân viên : </label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                <select name="nv_ma" id="nv_ma" class="form-control" disabled>
                                @foreach($danhsachnhanvien as $nv)
                                <option value="{{$nv->nv_ma}}" {{old('nv_ma', $nv->nv_ma)==$nv->nv_ma?'selected':''}}>{{$nv->nv_hoTen}}</option>
                                @endforeach
                                    </select>                                  
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tên quan hệ : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="qhgd_ten" name="qhgd_ten" value="{{old('qhgd_ten',$qhgd->qhgd_ten)}}" ng-class="frmEdit.qhgd_ten.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_ten" ng-required="true" ng-minlength="3" ng-maxlength="30">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_ten.$error.required">Bạn phải điền tên mối quan hệ</span>
                                    <span ng-show="frmEdit.qhgd_ten.$error.minlength">Tên quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmEdit.qhgd_ten.$error.maxlength">Tên quá dày, chỉ chứa nhiều nhất 30 ký tự</span>
                                </div>    
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Mối quan hệ : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="qhgd_moiQuanHe" name="qhgd_moiQuanHe" value="{{old('qhgd_moiQuanHe',$qhgd->qhgd_moiQuanHe)}}" ng-class="frmEdit.qhgd_moiQuanHe.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_moiQuanHe" ng-required="true" ng-minlength="2" ng-maxlength="30">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_moiQuanHe.$error.required">Bạn phải điền mối quan hệ</span>
                                    <span ng-show="frmEdit.qhgd_moiQuanHe.$error.minlength">Mối quan hệ quá ngắn, phải chứa ít nhất 2 ký tự</span>
                                    <span ng-show="frmEdit.qhgd_moiQuanHe.$error.maxlength">Mối quan hệ, chỉ chứa nhiều nhất 30 ký tự</span>
                                </div>   
                            </div>                  
                        </div>                 
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Năm sinh : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="qhgd_namSinh" name="qhgd_namSinh"  value="{{old('qhgd_namSinh',$qhgd->qhgd_namSinh)}}" ng-class="frmEdit.qhgd_namSinh.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_namSinh" ng-required="true" ng-minlength="4" ng-maxlength="4">
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_namSinh.$error.required">Bạn phải điền năm sinh</span>
                                    <span ng-show="frmEdit.qhgd_namSinh.$error.minlength">Năm sinh quá ngắn, phải chứa ít nhất 4 ký tự</span>
                                    <span ng-show="frmEdit.qhgd_namSinh.$error.maxlength">Mối quan hệ quá dày, chỉ chứa nhiều nhất 4 ký tự</span>
                                </div>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Địa chỉ : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="qhgd_diaChi" name="qhgd_diaChi" value="{{old('qhgd_diaChi',$qhgd->qhgd_diaChi)}}" ng-class="frmEdit.qhgd_diaChi.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_diaChi" ng-required="true" ng-minlength="3" ng-maxlength="100" >
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_diaChi.$error.required">Bạn phải điền địa chỉ</span>
                                    <span ng-show="frmEdit.qhgd_diaChi.$error.minlength">Địa chỉ quá ngắn, phải chứa ít nhất 3 ký tự</span>
                                    <span ng-show="frmEdit.qhgd_diaChi.$error.maxlength">Địa chỉ quá dày, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div> 
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nghề nghiệp : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <input type="text" id="qhgd_ngheNghiep" name="qhgd_ngheNghiep" value="{{old('qhgd_ngheNghiep',$qhgd->qhgd_ngheNghiep)}}" ng-class="frmEdit.qhgd_ngheNghiep.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_ngheNghiep" ng-required="true" ng-minlength="3" ng-maxlength="100"  >
                                <div class="invalid-feedback">
                                    <span ng-show="frmEdit.qhgd_ngheNghiep.$error.required">Bạn phải điền ngề nghiệp</span>
                                    <span ng-show="frmEdit.qhgd_ngheNghiep.$error.minlength">Nghề nghiệp quá ngắn, phải chứa ít nhất 2 ký tự</span>
                                    <span ng-show="frmEdit.qhgd_ngheNghiep.$error.maxlength">Nghề nghiệp quá dày, chỉ chứa nhiều nhất 100 ký tự</span>
                                </div> 
                            </div>                             
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nước ngoài : </label>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                    <input type="text" id="qhgd_nuocNgoai" name="qhgd_nuocNgoai" min="0" max="10" value="{{old('qhgd_nuocNgoai',$qhgd->qhgd_nuocNgoai)}}" ng-class="frmEdit.qhgd_nuocNgoai.$invalid?'form-control is-invalid':'form-control is-valid'" ng-model="qhgd_nuocNgoai" ng-required="true">                            
                                    <div class="invalid-feedback">
                                        <span ng-show="frmEdit.qhgd_nuocNgoai.$error.required">Bạn phải số người thân ở nước ngoài</span>                                  
                                    </div>
                            </div>                              
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-disabled="frmEdit.$invalid">Cập nhật</button>
                            <a href="{{route('admin.quanhegiadinh.index')}}" class="btn btn-secondary">Trở về</a>
                        </div>
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
    $('.toast').toast('show');
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    app.controller('quanheController', function($scope, $http) {
        $scope.qhgd_ten = '{{$qhgd->qhgd_ten}}';
        $scope.qhgd_moiQuanHe = '{{$qhgd->qhgd_moiQuanHe}}';
        $scope.qhgd_namSinh = '{{$qhgd->qhgd_namSinh}}';
        $scope.qhgd_diaChi = '{{$qhgd->qhgd_diaChi}}';
        $scope.qhgd_ngheNghiep = '{{$qhgd->qhgd_ngheNghiep}}';
        $scope.qhgd_nuocNgoai = '{{$qhgd->qhgd_nuocNgoai}}';
       
    });
</script>

@endsection