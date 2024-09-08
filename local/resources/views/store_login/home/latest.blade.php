<h4 style="font-size: 19px;color:black">@lang('store.latest')</h4>
<div class="row">
<div class="col-lg-9">
<div class="card">
<div class="card-body">
<br>
@include('store_login.order.table',['data' => $orders,'dash' => true])
<a href="{{ Asset(env('store').'/order') }}" class="btn btn-primary" style="float:right;margin-right: 70px;">View All</a>
</div>
</div>
</div>