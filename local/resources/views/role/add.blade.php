@extends('layout.main')

@section('title') Add New @endsection

@section('content')

<div class="pagetitle"><h1>Add New </h1></div>

<section class="section">


{!! Form::model($data, ['url' => [Asset('role')],'files' => true]) !!}

@include('role.form')

</form>

</section>
@endsection