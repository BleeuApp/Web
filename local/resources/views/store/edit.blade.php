@extends('layout.main')

@section('title') @lang('app.Edit Detail') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.Edit Detail') </h1></div>

<section class="section">

{!! Form::model($data, ['url' => [Asset('store/'.$data->id)],'files' => true,'method' => 'PATCH']) !!}

@include('store.form')

</form>

</section>
@endsection