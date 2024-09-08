@extends('store_login.layout.main')

@section('title') {{ $title }} @endsection

@section('content')

<div class="pagetitle"><h1>{{ $title }}

<a class="btn btn-primary" href="{{ $nextLink }}" style="float: right;">@lang('store.next_date')</a>

<a href="{{ Asset(env('store').'/print?date='.$date) }}" class="btn btn-warning" style="float:right;margin-right: 20px;" target="_blank">@lang('store.print')</a>

<a href="{{ Asset(env('store').'/itemChart?date='.$date) }}" class="btn btn-dark" style="float:right;margin-right: 20px;" target="_blank">@lang('store.item_chart')</a>

</h1></div><br>
<div class="card">
<div class="card-body">
<ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
<li class="nav-item flex-fill" role="presentation">
<button class="nav-link w-100 active" id="breakfast-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Breakfast ({{ count($breakfast) }})</button>
</li>
<li class="nav-item flex-fill" role="presentation">
<button class="nav-link w-100" id="lunch-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Lunch ({{ count($lunch) }})</button>
</li>
<li class="nav-item flex-fill" role="presentation">
<button class="nav-link w-100" id="dinner-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Dinner ({{ count($dinner) }})</button>
</li>
<li class="nav-item flex-fill" role="presentation">
<button class="nav-link w-100" id="item-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-item" type="button" role="tab" aria-controls="contact" aria-selected="false">View Item Count</button>
</li>
</ul>
<div class="tab-content pt-2" id="borderedTabJustifiedContent">

<div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="breakfast-tab">
<br>@include('store_login.order.delivery_detail',['data' => $breakfast])
</div>

<div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="lunch-tab">
<br>@include('store_login.order.delivery_detail',['data' => $lunch])

</div>

<div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="dinner-tab">
    <br>@include('store_login.order.delivery_detail',['data' => $dinner])
</div>

<div class="tab-pane fade" id="bordered-justified-item" role="tabpanel" aria-labelledby="item-tab">
    <br>@include('store_login.order.item_detail')
</div>

</div>

</div>
</div>
@endsection