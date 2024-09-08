@extends('store_login.layout.main')

@section('title') @lang('app.app_users') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.app_users') </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>{{ __('app.sno') }}</th>
<th>{{ __('app.Name') }}</th>
<th>{{ __('app.Email') }}</th>
<th>{{ __('app.Phone') }}</th>
<th>{{ __('app.Status') }}</th>
<th>{{ __('app.Wallet') }}</th>
<th>{{ __('app.Reg. Date') }}</th>
<th>{{ __('app.Option') }}</th>
</tr>
@php($i = 0)
@foreach($data as $row)
@php($i++)
<tr>
<td width="10%">{{ $i }}</td>
<td width="12%">{{ $row->name }}</td>
<td width="15%">{{ $row->email }}</td>
<td width="12%">{{ $row->phone }}</td>
<td width="10%">
<a href="{{ Asset(env('store').'/userStatus?id='.$row->id) }}" onclick="return confirm('Are you sure?')">

@if($row->status == 1) <span class="badge bg-success">@lang('app.active')</span> @else <span class="badge bg-danger">@lang('app.dis')</span> @endif

</a>
</td>
<td width="12%">{{ $row->wallet }}</td>
<td width="12%">{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
<td width="12%"><a class="btn btn-success" href="{{ Asset(env('store').'/userEdit?id='.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.Edit Detail')"><i class="bi bi-pencil-square"></i></a>
</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection