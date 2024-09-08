@extends('layout.main')

@section('title') @lang('app.add_new') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.add_new') </h1></div>

<section class="section">


{!! Form::model($data, ['url' => [Asset('offer')],'files' => true]) !!}

@include('offer.form')

</form>

</section>
@endsection

@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<script>
$(document).ready(function() {
    $('.select2').select2({
    closeOnSelect: false
});
});
</script>

@endsection