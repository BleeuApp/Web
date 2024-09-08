<div class="row">
<div class="col-lg-4">
<div class="card total">
<div class="card-body">
<br>
<b><i class="bi bi-person-check-fill"></i> &nbsp;@lang('app.total_user') <span class="fright">{{ $overview['total_user'] }}</span></b><br><br>
<b><i class="bi bi-calendar-check-fill"></i> &nbsp;@lang('app.this_month') <span class="fright">{{ $overview['month_user'] }}</span></b>
</div>
</div>
</div>

<div class="col-lg-4">
<div class="card current">
<div class="card-body">
<br>
<b><i class="bi bi-person-check-fill"></i> &nbsp; @lang('app.total_sub') <span class="fright">{{ $overview['total_order'] }}</span></b><br><br>
<b><i class="bi bi-calendar-check-fill"></i> &nbsp; @lang('app.this_month_sub')  <span class="fright">{{ $overview['month_order'] }}</span></b>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-4">
<div class="card last">
<div class="card-body">
<br>
<b><i class="bi bi-cash-coin"></i> &nbsp; @lang('app.total_com') <span class="fright">{{ $setting->currency.$overview['total_com'] }}</span></b><br><br>
<b><i class="bi bi-calendar-check-fill"></i> &nbsp; @lang('app.this_month_com') <span class="fright">{{ $setting->currency.$overview['month_com'] }}</span></b>
</div>
</div>
</div>

<div class="col-lg-4">
<div class="card total">
<div class="card-body">
<br>
<b><i class="bi bi-house-door"></i> &nbsp; @lang('app.total_store') <span class="fright">{{ $overview['total_store'] }}</span></b><br><br>
<b><i class="bi bi-calendar-check-fill"></i> &nbsp; @lang('app.this_month_added')  <span class="fright">{{ $overview['month_store'] }}</span></b>
</div>
</div>
</div>
</div>