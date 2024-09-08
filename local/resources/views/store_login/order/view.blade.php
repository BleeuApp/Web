@extends('store_login.layout.main')

@section('title') @lang('store.view_title') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('store.view_title')</h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('store.user')</th>
<th>@lang('app.Phone')</th>
<th>@lang('app.address')</th>
<th>@lang('app.amount')</th>
<th>@lang('store.discount')</th>
<th>@lang('store.total')</th>
<th>@lang('app.plan')</th>
<th>@lang('store.sdate')</th>
<th>@lang('store.valid')</th>
</tr>
<tr>
<td width="10%">{{ $data->user_name }}</td>
<td width="10%">{{ $data->user_phone }}</td>
<td width="20%">{{ $data->address }} {{ $data->floor }} {{ $data->landmark }}</td>
<td width="10%">{{ $setting->currency.$data->total + $data->discount }}</td>
<td width="10%">@if($data->discount) {{ $setting->currency.$data->discount }} @else 0 @endif</td>
<td width="10%">{{ $setting->currency.$data->total }}</td>
<td width="10%">{{ $data->plan }}</td>
<td width="10%">{{ date('d-M-Y',strtotime($data->start_date)) }}</td>
<td width="10%">{{ date('d-M-Y',strtotime($data->end_date)) }}</td>
</tr>
</table>

</div>
</div>
</section>

<div class="pagetitle"><h1>@lang('store.item')</h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th>@lang('store.item')</th>
<th>@lang('app.desc')</th>
<th>@lang('app.Type')</th>
<th>@lang('store.price')</th>
<th>@lang('app.days')</th>
<th>@lang('store.total')</th>
</tr>
@foreach($data->getItem($data->id) as $item)
<tr>
<td width="10%">{{ $item->name }}</td>
<td width="25%">{{ $item->description }}</td>
<td width="10%">{{ $item->type }}</td>
<td width="10%">{{ $setting->currency.$item->price }}</td>
<td width="35%">@foreach(explode(',',$item->days) as $day) <span class="badge bg-info">{{ $day }}</span> @endforeach</td>
<td width="10%">{{ $setting->currency.$item->price_total }}</td>
</tr>
@endforeach
</table>

</div>
</div>
</section>



@endsection