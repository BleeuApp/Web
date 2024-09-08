<?php
if(Session::has('locale') && Session::get('locale') == "ar")
{
  $dir = "rtl";
}
else
{
  $dir = "ltr";
}
?>
<!DOCTYPE html>
<html lang="en" dir="{{ $dir }}">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>@yield('title')</title>

<link href="{{ Asset('assets/img/favicon.png') }}" rel="icon">
<link href="{{ Asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<link href="{{ Asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ Asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ Asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ Asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ Asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ Asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ Asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
<link href="{{ Asset('assets/css/style.css') }}" rel="stylesheet">

<style>
.req
{
color:red;
}

.fright
{
  float: right;color:gray;
}

</style>

@yield('css')

</head>

<body>

@include('layout.header')

@include('layout.menu')

<main id="main" class="main">

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ Session::get('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ Session::get('message') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@yield('content')

</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="{{ Asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ Asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ Asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{ Asset('assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{ Asset('assets/vendor/quill/quill.min.js')}}"></script>
<script src="{{ Asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{ Asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{ Asset('assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{ Asset('assets/js/main.js')}}"></script>
@yield('js')
</body>

</html>