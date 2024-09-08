@extends('layout.main')

@section('title') @lang('app.Manage Vendors') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.Manage Vendors') <a class="btn btn-primary" style="float:right" href="{{ Asset('store/add') }}">@lang('app.add_new')</a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('app.sno')</th>
<th>@lang('app.image')</th>
<th>@lang('app.name')</th>
<th>@lang('app.Email')</th>
<th>@lang('app.Status')</th>
<th>@lang('app.Option')</th>
</tr>
@php($i = 0)
@foreach($data as $row)
@php($i++)
<tr>
<td width="5%">{{ $i }}</td>
<td width="15%">@if($row->img) <img src="{{ Asset('upload/store/'.$row->img) }}" height="60px"> @endif

@if(!$row->password) <small style="color:red">Self Registered</small> @endif

</td>
<td width="20%">{{ $row->name }}</td>
<td width="20%">{{ $row->email }}</td>
<td width="15%">
    <a href="{{ Asset('storeStatus?id='.$row->id) }}" onclick="return confirm('Are you sure?')">
    
    @if($row->status == 0) <span class="badge bg-success">@lang('app.active')</span> @else <span class="badge bg-danger">@lang('app.disbale')</span> @endif
    
    </a>
    </td>
<td width="25%">
<a class="btn btn-primary" href="javascript::void()" data-bs-toggle="modal" data-bs-target="#largeModal{{ $row->id }}"><i class="bi bi-link-45deg"></i></a>

<a class="btn btn-dark" href="{{ Asset('createQr?id='.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.create_qr')" target="_blank"><i class="bi bi-qr-code"></i></a>


<a class="btn @if($row->trend == 1) btn-success @else btn-warning @endif" href="{{ Asset('trend?id='.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.trend')" onclick="return confirm('Are you sure?')"><i class="bi bi-rocket-takeoff"></i></a>
<a class="btn btn-info" href="{{ Asset('loginAsStore?id='.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.login_as')" target="_blank"><i class="bi bi-box-arrow-in-right"></i></i></a>
<a class="btn btn-success" href="{{ Asset('store/'.$row->id.'/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.Edit Detail')"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ Asset('store/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('app.delete')"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>

@include('store.cate')

@endforeach
</table>

</div>
</div>
</section>
@endsection