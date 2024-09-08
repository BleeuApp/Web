<title>@lang('app.create_qr')</title>

<h3 align="center">@lang('app.qr_desc')</h3>
<br>
<p align="center">
    {!! QrCode::size(300)->generate($data->web_url.'/item/'.$_GET['id']) !!}
</p>

<br>
