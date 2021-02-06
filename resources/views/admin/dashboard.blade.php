@extends('layouts.master')
@section('title')
Dashboard
@endsection
@section('custom-css')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('login') }}">Login</a>
            <br>
            Xin chào
            @if(Session::has('user'))
            {{Session::get('user')[0]->nv_hoTen}}
            @endif
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
@endsection