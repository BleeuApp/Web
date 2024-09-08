@php($i = 0)
@foreach($data as $row)
<div style="border: 1px solid gray;padding: 10px 10px;border-radius: 10px;margin-top: 20px;">
<table width="100%" style="text-align: center;">

<tr>
<td width="80%">
<b>Delivered On : {{ date('l, M d, Y',strtotime($row->delivery_date)) }}</b>

<h2>{{ Auth::guard('store')->user()->name }}</h2>
</td>
<td width="20%" style="text-align: left !important;">&nbsp;</td>
</tr>

<tr>
<td width="80%"><h1>{{ $row->name }}<span style="display: block;font-weight: 100;font-size: 15;">{{ $row->address }}</span></h1></td>
<td width="20%">&nbsp;</td>
</tr>

<tr>
<td width="80%"><b>{{ $row->description }}</b></td>
<td width="20%">&nbsp;</td>
</tr>

<tr>
<td width="80%"><b>Notes : </b> {{ $row->notes }}</td>
<td width="20%">&nbsp;</td>
</tr>

</table>
</div>
@endforeach