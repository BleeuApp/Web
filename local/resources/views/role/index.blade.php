@extends('layout.main')

@section('title') Manage User Roles @endsection

@section('content')

<div class="pagetitle"><h1>Manage User Roles <a class="btn btn-primary" style="float:right" href="{{ Asset('role/add') }}">Add New</a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>Role</th>
<th>Permission</th>
<th>Option</th>
</tr>

@foreach($data as $row)
<tr>
<td width="10%">{{ $row->name }}</td>
<td width="70%">
@foreach(explode(",",$row->perm) as $perm) <span class="badge bg-primary">{{ $perm }}</span> @endforeach
</td>
<td width="20%">
<a class="btn btn-success" href="{{ Asset('role/'.$row->id.'/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Detail"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ Asset('role/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>
@endsection