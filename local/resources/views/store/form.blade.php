@include('language.header')
<br>

<div class="tab-content pt-2" id="myTabContent">
@foreach(DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get() as $l)
<div class="tab-pane fade show" id="l{{ $l->id }}" role="tabpanel" aria-labelledby="home-{{ $l->id }}">
<div class="card">
<div class="card-body"><br>
<input type="hidden" name="lid[]" value="{{ $l->id }}">
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.name') }} <span class="req">*</span></label>
{!! Form::text('l_name[]', $data->getSData($data->s_data, $l->id, 0), ['id' => 'code', 'class' => 'form-control'])!!}
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.address') }} <span class="req">*</span></label>
{!! Form::text('l_address[]', $data->getSData($data->s_data, $l->id, 1), ['id' => 'code', 'class' => 'form-control'])!!}
</div>
</div>

</div>
</div>
</div>
@endforeach

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="card">
<div class="card-body">
<h5 class="card-title">{{ __('app.general_info') }}</h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.name') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="{{ $data->name }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Phone') }}<span class="req">*</span></label>
<input type="number" class="form-control" id="inputNanme4" name="phone" required value="{{ $data->phone }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Email') }}<span class="req">*</span></label>
<input type="email" class="form-control" id="inputNanme4" name="email" required value="{{ $data->email }}">
</div>
</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.whatsapp_no') }}</label>
<input type="number" class="form-control" id="inputNanme4" name="whatsapp_no" value="{{ $data->whatsapp_no }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.can_msg') }} <span class="req">*</span></label>
<select name="can_msg" class="form-control" required>
<option value="0" @if($data->can_msg == 0) selected @endif>{{ __('app.yes') }}</option>
<option value="1" @if($data->can_msg == 1) selected @endif>{{ __('app.no') }}</option>
</select>
</div>

<div class="col-lg-4">
@if($data->id)
<label for="inputNanme4" class="form-label">{{ __('app.change_password') }}</label>
<input type="password" class="form-control" id="inputNanme4" name="password">
@else
<label for="inputNanme4" class="form-label">{{ __('app.password') }} <span class="req">*</span></label>
<input type="password" class="form-control" id="inputNanme4" name="password" required>
@endif
</div>
</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.avg_cost') }} <small>(e.g $10-15 Per Person)</small></label>
<input type="text" class="form-control" id="inputNanme4" name="avg_cost" required value="{{ $data->avg_cost }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.max_km') }} <small>(Put 0 for no restriction)</small><span class="req">*</span></label>
<input type="number" class="form-control" id="inputNanme4" name="max_km" required value="{{ $data->max_km }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.img') }} <span class="req">*</span></label>
<input type="file" class="form-control" id="inputNanme4" name="img" @if(!$data->id) required @endif>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.address') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="address" required value="{{ $data->address }}">
</div>
</div>


</div>
</div>

<div class="card">
<div class="card-body">
<h5 class="card-title">{{ __('app.geo_location') }}</h5>
@include('store.google')
</div>
</div>

@if(isset($admin))
<div class="card">
<div class="card-body">
<h5 class="card-title">{{ __('app.comm_type') }}</h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.comm_type') }} <span class="req">*</span></label>
<select name="com_type" class="form-control" required>
<option value="0" @if($data->com_type == 0) selected @endif>{{ __('app.fix_commission') }}</option>
<option value="1" @if($data->com_type == 1) selected @endif>% {{ __('app.from_order_value') }}</option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.comm_value') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="com_value" required value="{{ $data->com_value }}">
</div>
</div>

</div>
</div>
@endif
<div class="card">
<div class="card-body">
<h5 class="card-title">{{ __('app.working_days') }}</h5>
@php($array = explode(",",$data->working_day))
<div class="row">
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Monday" @if(in_array("Monday",$array)) checked @endif> {{ __('app.monday') }}</div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Tuesday" @if(in_array("Tuesday",$array)) checked @endif> {{ __('app.tuesday') }}</div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Wednesday" @if(in_array("Wednesday",$array)) checked @endif> {{ __('app.wednesday') }}</div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Thursday" @if(in_array("Thursday",$array)) checked @endif> {{ __('app.thursday') }}</div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Friday" @if(in_array("Friday",$array)) checked @endif> {{ __('app.friday') }}</div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Saturday" @if(in_array("Saturday",$array)) checked @endif> {{ __('app.saturday') }}</div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Sunday" @if(in_array("Sunday",$array)) checked @endif> {{ __('app.sunday') }}</div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">
<h5 class="card-title">{{ __('app.other_info') }}</h5>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.provide_breakfast') }} <span class="req">*</span></label>
<select name="breakfast" class="form-control" required onchange="setBreakfastTime(this.value)">
<option value="0" @if($data->breakfast == 0) selected @endif>{{ __('app.yes') }}</option>
<option value="1" @if($data->breakfast == 1) selected @endif>{{ __('app.no') }}</option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.breakfast_time_from') }} <span class="req">*</span></label>
<input type="text" name="b_time_from" class="form-control" placeholder="{{ __('app.example_time_from_b') }}" id="b_time_from" value="{{ $data->b_time_from }}" @if($data->breakfast == 1) disabled @endif>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.breakfast_time_to') }} <span class="req">*</span></label>
<input type="text" name="b_time_to" class="form-control" placeholder="{{ __('app.example_time_to_b') }}" id="b_time_to" value="{{ $data->b_time_to }}" @if($data->breakfast == 1) disabled @endif>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.provide_lunch') }} <span class="req">*</span></label>
<select name="lunch" class="form-control" required onchange="setLunchTime(this.value)">
<option value="0" @if($data->lunch == 0) selected @endif>{{ __('app.yes') }}</option>
<option value="1" @if($data->lunch == 1) selected @endif>{{ __('app.no') }}</option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.lunch_time_from') }} <span class="req">*</span></label>
<input type="text" name="l_time_from" class="form-control" placeholder="{{ __('app.example_time_from_l') }}" id="l_time_from" value="{{ $data->l_time_from }}" @if($data->lunch == 1) disabled @endif>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.lunch_time_to') }} <span class="req">*</span></label>
<input type="text" name="l_time_to" class="form-control" placeholder="{{ __('app.example_time_to_l') }}" id="l_time_to" value="{{ $data->l_time_to }}" @if($data->lunch == 1) disabled @endif>
</div>
</div>

<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.provide_dinner') }} <span class="req">*</span></label>
<select name="dinner" class="form-control" required onchange="setDinnerTime(this.value)">
<option value="0" @if($data->dinner == 0) selected @endif>{{ __('app.yes') }}</option>
<option value="1" @if($data->dinner == 1) selected @endif>{{ __('app.no') }}</option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.dinner_time_from') }} <span class="req">*</span></label>
<input type="text" name="d_time_from" class="form-control" placeholder="{{ __('app.example_time_from_d') }}" id="d_time_from" value="{{ $data->d_time_from }}" @if($data->dinner == 1) disabled @endif>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.dinner_time_to') }} <span class="req">*</span></label>
<input type="text" name="d_time_to" class="form-control" placeholder="{{ __('app.example_time_to_d') }}" id="d_time_to" value="{{ $data->d_time_to }}" @if($data->dinner == 1) disabled @endif>
</div>
</div>

</div>
</div>

</div>
</div>
<input type="submit" class="btn btn-primary" value="{{ __('app.Submit') }}">

<script>
function setBreakfastTime(type)
{
    var from = document.getElementById("b_time_from");
    var to   = document.getElementById("b_time_to");

    if(type == 1)
    {
        from.disabled = true;
        to.disabled   = true;
    }
    else
    {
        from.disabled = false;
        to.disabled   = false;
    }
}

function setLunchTime(type)
{
    var from = document.getElementById("l_time_from");
    var to   = document.getElementById("l_time_to");

    if(type == 1)
    {
        from.disabled = true;
        to.disabled   = true;
    }
    else
    {
        from.disabled = false;
        to.disabled   = false;
    }
}

function setDinnerTime(type)
{
    var from = document.getElementById("d_time_from");
    var to   = document.getElementById("d_time_to");

    if(type == 1)
    {
        from.disabled = true;
        to.disabled   = true;
    }
    else
    {
        from.disabled = false;
        to.disabled   = false;
    }
}
</script>
