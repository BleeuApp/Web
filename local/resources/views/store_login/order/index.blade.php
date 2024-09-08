@extends('store_login.layout.main')

@section('title') @lang('store.sub') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('store.sub')</h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>

@include('store_login.order.table')

</div>
</div>
</section>
@endsection