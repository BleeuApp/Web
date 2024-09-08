@extends('layout.main')

@section('title') @lang('app.manage_cate') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.manage_cate') <a class="btn btn-primary" style="float:right" href="{{ Asset('category/add') }}">@lang('app.add_new')</a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('app.image')</th>
<th>@lang('app.cate_name')</th>
<th>@lang('app.Sort No')</th>
<th>@lang('app.Status')</th>
<th>@lang('app.Option')</th>
</tr>

@foreach($data as $row)
<tr>
<td width="20%"><img src="{{ Asset('upload/category/'.$row->img) }}" height="50px"></td>
<td width="20%">{{ $row->name }}</td>
<td width="20%">{{ $row->sort_no }}</td>
<td width="20%">
<a href="{{ Asset('categoryStatus?id='.$row->id) }}" onclick="return confirm('Are you sure?')">

@if($row->status == 0) <span class="badge bg-success">@lang('app.active')</span> @else <span class="badge bg-danger">@lang('app.dis')</span> @endif

</a>
</td>
<td width="20%">
<a class="btn btn-success" href="{{ Asset('category/'.$row->id.'/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.Edit Detail')"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('@lang('app.sure')')" href="{{ Asset('category/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.delete')"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection