@extends('store_login.layout.main')

@section('title') @lang('store.d_staff') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('store.d_staff') <a class="btn btn-primary" style="float:right" href="{{ Asset(env('store').'/delivery/add') }}">@lang('app.add_new')</a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('app.sno')</th>
<th>@lang('app.Name')</th>
<th>@lang('app.Phone')</th>
<th>@lang('app.Status')</th>
<th>@lang('store.online')</th>
<th>@lang('app.Option')</th>
</tr>
@php($i = 0)
@foreach($data as $row)
@php($i++)
<tr>
<td width="10%">{{ $i }}</td>
<td width="15%">{{ $row->name }}</td>
<td width="15%">{{ $row->phone }}</td>
<td width="15%">
<a href="{{ Asset(env('store').'/deliveryStatus?id='.$row->id) }}" onclick="return confirm('Are you sure?')">

@if($row->status == 0) <span class="badge bg-success">@lang('app.active')</span> @else <span class="badge bg-danger">@lang('app.dis')</span> @endif

</a>
</td>

<td width="15%">
<a href="{{ Asset(env('store').'/onlineStatus?id='.$row->id) }}" onclick="return confirm('Are you sure?')">

@if($row->online == 1) <span class="badge bg-success">@lang('store.online')</span> @else <span class="badge bg-danger">@lang('store.offline')</span> @endif

</a>
</td>

<td width="15%">
<a class="btn btn-success" href="{{ Asset(env('store').'/delivery/'.$row->id.'/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.Edit Detail')"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('@lang('app.sure')')" href="{{ Asset(env('store').'/delivery/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.delete')"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection