@extends('store_login.layout.main')

@section('title') @lang('app.add_new') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.add_new') </h1></div>

<section class="section">


{!! Form::model($data, ['url' => [Asset(env('store').'/delivery')],'files' => true]) !!}

@include('store_login.delivery.form')

</form>

</section>
@endsection