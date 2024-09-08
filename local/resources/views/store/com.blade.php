@extends('layout.main')

@section('title') @lang('app.vc') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.vc') </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('app.store')</th>
<th>@lang('app.Total Earning')</th>
<th>@lang('app.Total Commission')</th>
<th>@lang('app.Payable Balance')</th>
<th>@lang('app.Last Paid')</th>
<th>@lang('app.option')</th>
</tr>
@php($i = 0)
@foreach($data as $row)
@php($balance = $row->balance($row->id))
@php($last = $row->lastPaid($row->id))
@php($i++)
<tr>
<td width="18%">{{ $row->name }}</td>
<td width="18%">{{ $currency.$row->totalEarning($row->id) }}</td>
<td width="18%">{{ $currency.$row->getCom($row->id) }}</td>
<td width="18%">{{ $currency.$balance }}</td>
<td width="18%">@if($last) {{ $currency.$last }} @endif</td>
<td width="10%">@if($balance > 0) <a class="btn btn-success" href="{{ Asset('paid?id='.$row->id) }}">@lang('app.update')</a> @endif</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection

