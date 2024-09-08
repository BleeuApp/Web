<h1>{{ __('app.Hi') }}, {{ __('app.query.') }}</h1><br>

<table width="60%" colspan="0" cellpadding="0" border="1">

<tr>
<td width="40%"><b>{{ __('app.Name') }}</b></td>
<td width="60%">@if(isset($data['name'])) {{ $data['name'] }} @endif</td>
</tr>

<tr>
<td width="40%"><b>{{ __('app.Phone') }}</b></td>
<td width="60%">@if(isset($data['phone'])) {{ $data['phone'] }} @endif</td>
</tr>

<tr>
<td width="40%"><b>{{ __('app.Email') }}</b></td>
<td width="60%">@if(isset($data['email'])) {{ $data['email'] }} @endif</td>
</tr>

<tr>
<td width="40%"><b>{{ __('app.Message') }}</b></td>
<td width="60%">@if(isset($data['msg'])) {{ $data['msg'] }} @endif</td>
</tr>

</table>
