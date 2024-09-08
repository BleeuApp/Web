@extends('store_login.layout.main')

@section('title') @lang('store.up_d') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('store.up_d') </h1></div><br>

<div class="card">
<div class="card-body">
<br>
<form action="{{ Asset(env('store').'/next') }}">
<div class="row">
<div class="col-lg-3"><input type="text" class="form-control" placeholder="@lang('store.from_date')" id="datepicker" name="from" autocomplete="off" value="{{ $from }}" required></div>
<div class="col-lg-3"><input type="text" class="form-control" placeholder="@lang('store.to_date')" id="datepicker2" name="to" autocomplete="off" value="{{ $to }}" required></div>
<div class="col-lg-3"><button class="btn btn-primary" type="submit">@lang('store.get_data')</button></div>
</div>
</form>
</div>
</div>

@if(isset($_GET['from']))
<div class="card">
<div class="card-body">
<br>
<table class="table">
<thead class="table-light">
<tr>
<th>@lang('app.sno')</th>
<th>@lang('store.date')</th>
<th>@lang('store.breakfast')</th>
<th>@lang('store.lunch')</th>
<th>@lang('store.dinner')</th>
<th>View</th>
</tr>
</thead>
@php($i=1)

@foreach($data as $row)
<tr>
<td width="10%">{{ $i++ }}</td>
<td width="15%">{{ date('d-M-Y',strtotime($row['date'])) }}</td>
<td width="15%">{{ $row['breakfast'] }}</td>
<td width="15%">{{ $row['lunch'] }}</td>
<td width="15%">{{ $row['dinner'] }}</td>
<td width="15%"><a class="btn btn-primary" href="{{ Asset(env('store').'/today?date='.$row['date']) }}" target="_blank">@lang('store.view_detail')</a></td>
</tr>
@endforeach

</table>

</div>
</div>
@endif
@endsection

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
    $( "#datepicker2" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
});

  </script>
@endsection