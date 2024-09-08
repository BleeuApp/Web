<table class="table">
<tr>
<th>@lang('app.sno')</th>
<th>@lang('store.user')</th>
<th>@lang('app.Phone')</th>
<th>@lang('app.address')</th>
<th>@lang('app.amount')</th>
<th>@lang('app.plan')</th>
<th>@lang('store.sdate')</th>
<th>@lang('store.valid')</th>
<th>@lang('app.Option')</th>
</tr>
@php($i = 1)
@foreach($data as $row)
<tr>
<td width="5%">{{ $i++ }}</td>
<td width="10%">{{ $row->user_name }}</td>
<td width="10%">{{ $row->user_phone }}</td>
<td width="20%">{{ $row->address }} {{ $row->floor }} {{ $row->landmark }}</td>
<td width="10%">{{ $setting->currency.$row->total }}</td>
<td width="10%">{{ $row->plan }}</td>
<td width="10%">{{ date('d-M-Y',strtotime($row->start_date)) }}</td>
<td width="10%">{{ date('d-M-Y',strtotime($row->end_date)) }}</td>
<td width="10%"><a class="btn btn-primary" href="{{ Asset(env('store').'/orderView?id='.$row->id) }}" target="_blank">@lang('store.view')</a></td>
</tr>
@endforeach
</table>