@extends('layout.main')

@section('title') @lang('app.add_new') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.add_new') </h1></div>

<section class="section">


{!! Form::model($data, ['url' => [Asset('slider')],'files' => true]) !!}

@include('slider.form')

</form>

</section>
@endsection