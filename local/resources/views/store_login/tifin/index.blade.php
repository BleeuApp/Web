@extends('store_login.layout.main')

@section('title') @lang('store.tifin')  @endsection

@section('content')

<div class="pagetitle"><h1>@lang('store.tifin') <a class="btn btn-primary" style="float:right" href="{{ Asset(env('store').'/tifin/add') }}">@lang('app.add_new')</a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('app.sno')</th>
<th>@lang('app.image')</th>
<th>@lang('app.title')</th>
<th>@lang('app.desc')</th>
<th>@lang('store.price')</th>
<th>@lang('app.Status')</th>
<th>@lang('app.Option')</th>
</tr>
@php($i = 0)
@foreach($data as $row)
@php($i++)
@php($admin = App\Models\User::find(1))
<tr>
<td width="5%">{{ $i }}</td>
<td width="12%">@if($row->img) <img src="{{ Asset('upload/tifin/'.$row->img) }}" height="50px"> @endif</td>
<td width="17%">{{ $row->name }}</td>
<td width="17%">{{ $row->text }}</td>
<td width="17%">{{ $admin->currency.$row->price }}</td>
<td width="17%">
<a href="{{ Asset(env('store').'/tifinStatus?id='.$row->id) }}" onclick="return confirm('Are you sure?')">

@if($row->status == 0) <span class="badge bg-success">@lang('app.active')</span> @else <span class="badge bg-danger">@lang('app.dis')</span> @endif

</a>
</td>
<td width="15%">
<a class="btn btn-success" href="{{ Asset(env('store').'/tifin/'.$row->id.'/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.Edit Detail')"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('@lang('app.sure')')" href="{{ Asset(env('store').'/tifin/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.delete')"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection