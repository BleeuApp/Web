<table class="table">
<thead class="table-primary">
<tr>
<th>@lang('app.image')</th>
<th>@lang('app.Name')</th>
<th>@lang('store.breakfast')</th>
<th>@lang('store.lunch')</th>
<th>@lang('store.dinner')</th>
</tr>
</thead>
@foreach($items as $row)
<tr>
<td width="20%"><img src="{{ $row['img'] }}" style="width:100px"></td>
<td width="20%">{{ $row['name'] }}</td>
<td width="20%">{{ $row['breakfast'] }}</td>
<td width="20%">{{ $row['lunch'] }}</td>
<td width="20%">{{ $row['dinner'] }}</td>
</tr>
@endforeach
</table>
