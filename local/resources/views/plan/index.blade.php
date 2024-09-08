@extends('layout.main')

@section('title') @lang('app.plan_title') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.plan_title') <a class="btn btn-primary" style="float:right" href="{{ Asset('plan/add') }}">@lang('app.add_new')</a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('app.plan')</th>
<th>@lang('app.time')</th>
<th>@lang('app.rec')</th>
<th>@lang('app.Status')</th>
<th>@lang('app.Option')</th>
</tr>

@foreach($data as $row)
<tr>
<td width="20%">{{ $row->title }}</td>
<td width="20%">
@if($row->type == 1)
{{ $row->value }} @lang('app.month')
@elseif($row->type == 2)
{{ $row->value }} @lang('app.week')
@else
{{ $row->value }} @lang('app.days')
@endif
</td>
<td width="20%">@if($row->rec_payment == 0) @lang('app.yes') @else @lang('app.no') @endif</td>
<td width="20%">
<a href="{{ Asset('planStatus?id='.$row->id) }}" onclick="return confirm('@lang('app.sure')')">

@if($row->status == 0) <span class="badge bg-success">@lang('app.active')</span> @else <span class="badge bg-danger">@lang('app.dis')</span> @endif

</a>
</td>
<td width="20%">
<a class="btn btn-success" href="{{ Asset('plan/'.$row->id.'/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.Edit Detail')"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('@lang('app.sure')')" href="{{ Asset('plan/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.delete')"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection