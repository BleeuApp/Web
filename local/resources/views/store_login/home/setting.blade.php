@extends('store_login.layout.main')

@section('title') @lang('app.account_setting') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.account_setting')</h1></div>

<form action="{{ Asset(env('store').'/setting') }}" method="POST">
{!! csrf_field() !!}

@include('store.form',['data' => Auth::guard('store')->user()])

</form>
@endsection