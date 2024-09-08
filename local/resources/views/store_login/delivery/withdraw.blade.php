@extends('store_login.layout.main')

@section('title') @lang('store.wr') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('store.wr') </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('app.sno')</th>
<th>@lang('store.d_person')</th>
<th>@lang('app.amount')</th>
<th>@lang('store.req_date')</th>
<th>@lang('app.Status')</th>
<th>@lang('app.Option')</th>
</tr>
@php($i = 0)
@foreach($data as $row)
@php($i++)
<tr>
<td width="10%">{{ $i }}</td>
<td width="15%">{{ $row->name }}</td>
<td width="15%">Rs.{{ $row->amount }}</td>
<td width="15%">{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
<td width="15%">
@if($row->status == 0)
<span class="badge bg-warning">@lang('store.pending')</span>
@elseif($row->status == 1)
<span class="badge bg-success">@lang('store.approved')</span>
@else
<span class="badge bg-danger">@lang('store.rejected')</span>
@endif
</td>

<td width="15%">
@if($row->status == 0)
<a class="btn btn-success" onclick="return confirm('@lang('app.sure')')" href="{{ Asset(env('store').'/withdrawStatus?status=1&id='.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('store.approv')"><i class="bi bi-check-lg"></i></a>

<a class="btn btn-danger" onclick="return confirm('@lang('app.sure')')" href="{{ Asset(env('store').'/withdrawStatus?status=2&id='.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('store.rejct')"><i class="bi bi-x-lg"></i></a>
@endif
</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection