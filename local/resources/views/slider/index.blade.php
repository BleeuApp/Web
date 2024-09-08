@extends('layout.main')

@section('title') @lang('app.welcome_slider') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.welcome_slider') <a class="btn btn-primary" style="float:right" href="{{ Asset('slider/add') }}">@lang('app.add_new')</a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('app.image')</th>
<th>@lang('app.Sort No')</th>
<th>@lang('app.Option')</th>
</tr>

@foreach($data as $row)
<tr>
<td width="40%"><img src="{{ Asset('upload/slider/'.$row->img) }}" height="60px"></td>
<td width="20%">{{ $row->sort_no }}</td>
<td width="20%">
<a class="btn btn-success" href="{{ Asset('slider/'.$row->id.'/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.Edit Detail')"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('@lang('app.sure')')" href="{{ Asset('slider/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.delete')"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection