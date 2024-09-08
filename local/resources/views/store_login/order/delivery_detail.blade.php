<form method="POST" action="{{ Asset(env('store').'/assign') }}" onsubmit="return confirm('@lang('app.sure')')">
{!! csrf_field() !!}

<div class="row">
<div class="col-lg-3">
<select name="delivery_id" class="form-control" required>
<option value="">@lang('store.select_person')</option>
@foreach($delivery as $d)
<option value="{{ $d->id }}">{{ $d->name }}</option>
@endforeach
</select>
</div>
<div class="col-lg-3"><button type="submit" class="btn btn-primary">@lang('store.assign')</button></div>
</div>
<br>
<table class="table">
<thead class="table-light">
<tr>
<th>@lang('app.sno')</th>
<th>@lang('store.user')</th>
<th>@lang('app.Phone')</th>
<th>@lang('app.address')</th>
<th>@lang('store.item')</th>
<th>@lang('app.desc')</th>
</tr>
</thead>
@php($i = 1)
@foreach($data as $row)
<tr>
<td width="5%">{{ $i++ }} @if(!$row->delivery_id) <input type="checkbox" name="chk[]" value="{{ $row->date_id }}">@endif</td>
<td width="10%">{{ $row->user_name }}</td>
<td width="10%">{{ $row->user_phone }}</td>
<td width="20%">{{ $row->address }} {{ $row->floor }} {{ $row->landmark }} <a href="http://maps.google.com/?q={{ $row->lat }},{{ $row->lng }}" target="_blank">@lang('store.view_loc')</a>

@if($row->notes) <small style="display: block;color:red">@lang('app.notes') : {{ $row->notes }}</small> @endif

</td>
<td width="20%">{{ $row->name }}<br><small>{{ $row->description }}</small></td>
<td width="10%">{{ number_format($row->distance,2) }}@lang('store.km')</td>
</tr>
@endforeach
</table>
</form>
