@extends('layout.main')

@section('title') @lang('app.Edit Detail') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.Edit Detail') </h1></div>

<section class="section">


{!! Form::model($data, ['url' => [Asset('banner/'.$data->id)],'files' => true,'method' => 'PATCH']) !!}

@include('banner.form')

</form>

</section>
@endsection