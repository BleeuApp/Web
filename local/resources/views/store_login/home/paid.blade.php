@extends('store_login.layout.main')

@section('title') @lang('store.paid_history') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('store.paid_history') </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('app.date_added')</th>
<th>@lang('app.amount')</th>
<th>@lang('app.notes')</th>

@foreach($data as $row)

<tr>
<td width="33%">{{ date('d-M-Y',strtotime($row->date_added)) }}</td>
<td width="33%">{{ $c.$row->amount }}</td>
<td width="33%">{{ $row->notes }}</td>
</tr>

@endforeach

</tr>
</table>

</div>
</div>
</section>
@endsection