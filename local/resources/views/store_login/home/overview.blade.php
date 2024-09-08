<div class="row">
<div class="col-lg-3">
<div class="card total">
<div class="card-body">
<br>
<b><i class="bi bi-person-check-fill"></i> &nbsp;@lang('store.Total Subscriber') <span style="float: right;color:gray">{{ $overview['total_sub'] }}</span></b><br><br>
<b><i class="bi bi-cash-coin"></i> &nbsp; @lang('store.Total Earnings')<span style="float: right;color:gray">{{ $setting->currency.$overview['total_earning'] }}</span></b>
</div>
</div>
</div>

<div class="col-lg-3">
<div class="card current">
<div class="card-body">
<br>
<b><i class="bi bi-person-check-fill"></i> &nbsp;@lang('store.Total Subscriber') <small style="color:gray">@lang('store.c_month')</small> <span style="float: right;color:gray">{{ $overview['current_sub'] }}</span></b><br><br>
<b><i class="bi bi-cash-coin"></i> &nbsp;@lang('store.Total Earnings')  <span style="float: right;color:gray">{{ $setting->currency.$overview['current_earning'] }}</span></b>
</div>
</div>
</div>

<div class="col-lg-3">
<div class="card last">
<div class="card-body">
<br>
<b><i class="bi bi-person-check-fill"></i> &nbsp;@lang('store.Total Subscriber') <small style="color:gray">@lang('store.last_month')</small> <span style="float: right;color:gray">{{ $overview['last_sub'] }}</span></b><br><br>
<b><i class="bi bi-cash-coin"></i> &nbsp;@lang('store.Total Earnings')  <span style="float: right;color:gray">{{ $setting->currency.$overview['last_earning'] }}</span></b>
</div>
</div>
</div>
</div>