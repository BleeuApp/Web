<title>@lang('store.item_chart') - {{ date('d-M-Y',strtotime($_GET['date'])) }}</title>

<div style="width:100%">
<h1 align="center">@lang('store.item_chart') - {{ date('d-M-Y',strtotime($_GET['date'])) }}</h1>
@foreach($data as $row)
<div style="width:33%;float:left">
<h3>{{ $row['tiffin'] }}</h3>

<style>
td
{
    padding:10px 10px
}
</style>

<table width="90%" border="1" cellpadding="0" cellspacing="0" style="float:left">
<tr style="background-color: #607d8b;color:white">
<td width="60%"><b>@lang('store.item')</b></td>
<td width="40%"><b>@lang('store.qty')</b></td>
</tr>
@foreach($row['item'] as $item)
<tr>
<td width="60%"><b>{{ $item['name'] }}</b></td>
<td width="40%"><b>{{ $item['sum'] }}</b></td>
</tr>
@endforeach
</table>
</div>
@endforeach

</div>