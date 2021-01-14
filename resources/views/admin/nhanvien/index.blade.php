@extends('layouts.master')
@section('title')
Danh sách nhân viên
@endsection
@section('custom-css')
@endsection
@section('duongdan')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active">Danh sách nhân viên</li>
</ol>
@endsection
@section('content')
<div class="container-fluid" ng-controller="nhanvienController">
        <button class="btn btn-outline-danger" ng-click="showTable()">Bấm <% show %></button>
    <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1" ng-show="!show">
        @foreach($data as $d)
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="image">
                        <img src="{{ asset('themes/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" height="50px" alt="User Image">
                        Featured
                    </div>
                </div>
                <div class="card-body">
                    {{ $d }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row" ng-show="show">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <th>{{$loop->index+1}}</th>
                        <th><img src="{{ asset('themes/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" height="50px" alt="User Image"></th>
                        <th>{{$d}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script src="{{ asset('themes/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    app.controller('nhanvienController', function($scope) {
        $scope.show = false;
        $scope.showTable = function() {
            $scope.show = !$scope.show;
        }
    });
</script>

@endsection