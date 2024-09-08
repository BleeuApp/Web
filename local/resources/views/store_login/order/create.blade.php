@extends('store_login.layout.main')

@section('title') @lang('store.create_order') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('store.create_order') </h1></div>

<section class="section">


{!! Form::open(['url' => [Asset(env('store').'/createOrder')],'files' => true]) !!}


<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('store.cust_name') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('store.cust_phone') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="phone" required>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('store.cust_email') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="email" required>
</div>
</div>

<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('store.select_item') <span class="req">*</span></label>
<select name="item_id" class="form-control" required>
<option value="">@lang('store.select')</option>
@foreach($items as $item)
<option value="{{ $item->id }}">{{ $item->name }}</option>
@endforeach
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('store.sdate')<span class="req">*</span></label>
<input type="text" class="form-control" name="start_date" required id="datepicker" autocomplete="off">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('store.valid') <span class="req">*</span></label>
<input type="text" class="form-control" name="valid_till" required id="datepicker2" autocomplete="off">
</div>
</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('store.stime') <span class="req">*</span></label>
<select name="type" class="form-control" required>
<option value="Breakfast">@lang('store.breakfast')</option>
<option value="Lunch">@lang('store.lunch')</option>
<option value="Dinner">@lang('store.dinner')</option>
</select>
</div>
</div>

<br>

@include('store.google',['data' => $data])

<br>
<div class="row">
<div class="col-lg-8">
<label for="inputNanme4" class="form-label">@lang('app.notes')</label>
<input type="text" class="form-control" id="inputNanme4" name="notes">
</div>


<div class="col-lg-4" style="margin-top: 30px;"><button type="submit" class="btn btn-primary">@lang('store.cbtn')</button></div>
</div>

</div>
</div>

</form>

</section>
@endsection

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
    $( "#datepicker2" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
});

  </script>
@endsection