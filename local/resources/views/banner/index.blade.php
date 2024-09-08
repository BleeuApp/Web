@extends('layout.main')

@section('title') @lang('app.manage_banner') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.manage_banner') <a class="btn btn-primary" style="float:right" href="{{ Asset('banner/add') }}">@lang('app.add_new')</a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('app.image')</th>
<th>@lang('app.link_to')</th>
<th>@lang('app.link')</th>
<th>@lang('app.Status')</th>
<th>@lang('app.Option')</th>
</tr>

@foreach($data as $row)
<tr>
<td width="20%"><img src="{{ Asset('upload/banner/'.$row->img) }}" height="60px"></td>
<td width="20%">@if($row->link_to == 1) Store @elseif($row->link_to == 2) Coustom Link @else None @endif</td>
<td width="20%">{{ $row->link }}</td>
<td width="20%">
<a href="{{ Asset('bannerStatus?id='.$row->id) }}" onclick="return confirm('Are you sure?')">

@if($row->status == 0) <span class="badge bg-success">@lang('app.active')</span> @else <span class="badge bg-danger">@lang('app.disbale')</span> @endif

</a>
</td>
<td width="20%">
<a class="btn btn-success" href="{{ Asset('banner/'.$row->id.'/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.Edit Detail')"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('@lang('app.sure')')" href="{{ Asset('banner/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.delete')"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection