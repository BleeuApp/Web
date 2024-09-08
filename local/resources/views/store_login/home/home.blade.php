@extends('store_login.layout.main')

@section('title') {{ Auth::guard('store')->user()->name }} @endsection

@section('content')

<style>
.total
{
    border-left: 10px solid #03a9f4;
}

.current
{
    border-left: 10px solid #009688;
}

.last
{
    border-left: 10px solid #ff9800;
}
</style>

<div class="pagetitle"><h1>@lang('app.welcome'), {{ Auth::guard('store')->user()->name }}</h1></div>

<section class="section">
<br>
@include('store_login.home.overview')
<br>

@include('store_login.home.latest')

</section>
@endsection