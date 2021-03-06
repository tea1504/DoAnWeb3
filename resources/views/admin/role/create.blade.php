@extends('layouts.master')
@section('title')
Thêm mới role
@endsection
@section('custom-css')
<link href="{{ asset('themes/AdminLTE/plugins/summernote/summernote-bs4.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.role.index')}}">Danh sách role</a></li>
    <li class="breadcrumb-item active">Thêm mới role</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="tuyendungController">
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
                <h1>Thêm mới role</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form name="frmCreate" id="frmCreate" method="POST" action="{{route('admin.role.store')}}" novalidate>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="role_ten">Tên role</label>
                            <input type="text" class="form-control" ng-class="frmCreate.role_ten.$touched?frmCreate.role_ten.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'" id="role_ten" name="role_ten" value="{{old('role_ten')}}" ng-model="role_ten" ng-required="true" ng-minlength="3" ng-maxlength="50">
                            <div class="invalid-feedback">
                                <span ng-show="frmCreate.role_ten.$error.required">Bạn phải điền tên role</span>
                                <span ng-show="frmCreate.role_ten.$error.minlength">Tên role phải chứa ít nhất 3 ký tự</span>
                                <span ng-show="frmCreate.role_ten.$error.maxlength">Tên role chỉ chứa nhiều nhất 50 ký tự</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role_mota">Mô tả</label>
                            <textarea name="role_mota" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="quyen">Quyền</label>
                            @foreach($dsq as $q)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$q->q_ma}}" name="quyen[]" id="quyen_{{$q->q_ma}}">
                                <label class="form-check-label" for="quyen_{{$q->q_ma}}">
                                {{$q->q_ten}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group justify-content-center">
                            <button type="submit" class="btn btn-primary" ng-disabled="frmCreate.$invalid">Thêm mới</button>
                            <a href="{{route('admin.role.index')}}" class="btn btn-secondary">Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script src="{{ asset('themes/AdminLTE/plugins/summernote/summernote-bs4.min.js') }}" type="text/javascript"></script>
<script>
    $('textarea').summernote({
        height: 200, //set editable area's height
        codemirror: { // codemirror options
            theme: 'monokai'
        }
    })
    $('.toast').toast('show');
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    app.controller('tuyendungController', function($scope, $http) {});
</script>

@endsection