@extends('layout.main')

@section('title') Manage Users @endsection

@section('content')

<div class="pagetitle"><h1>Manage Users <a class="btn btn-primary" style="float:right" href="{{ Asset('user/add') }}">Add New</a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>Name</th>
<th>Username</th>
<th>Role</th>
<th>Status</th>
<th>Option</th>
</tr>

@foreach($data as $row)
<tr>
<td width="20%">{{ $row->name }}</td>
<td width="20%">{{ $row->username }}</td>
<td width="20%"><span class="badge bg-primary">{{ $row->role }}</span></td>
<td width="20%">
<a href="{{ Asset('userStatus?id='.$row->id) }}" onclick="return confirm('Are you sure?')">

@if($row->status == 0) <span class="badge bg-success">Active</span> @else <span class="badge bg-danger">Disabled</span> @endif

</a>
</td>
<td width="20%">
<a class="btn btn-success" href="{{ Asset('user/'.$row->id.'/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Detail"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ Asset('user/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection