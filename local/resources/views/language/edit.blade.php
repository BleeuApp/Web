@extends('layout.main')

@section('title') @lang('app.Edit Details') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.Edit Details')</h1></div>

<section class="section">


{!! Form::model($data, ['url' => [Asset('language/'.$data->id)],'files' => true,'method' => 'PATCH']) !!}

@include('language.form')

</form>

</section>
@endsection