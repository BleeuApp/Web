<div class="card">
<div class="card-body">
@include('language.header')
<br>

<div class="tab-content pt-2" id="myTabContent">
@foreach(DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get() as $l)
<div class="tab-pane fade show" id="l{{ $l->id }}" role="tabpanel" aria-labelledby="home-{{ $l->id }}">

<input type="hidden" name="lid[]" value="{{ $l->id }}">
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.title') <span class="req">*</span></label>
{!! Form::text('l_name[]',$data->getSData($data->s_data,$l->id,'l_name'),['id' => 'code','class' => 'form-control'])!!}

</div>
</div>

</div>
@endforeach

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.title') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="title" required value="{{ $data->title }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.time_type') <span class="req">*</span></label>
<select name="type" class="form-control">
<option value="1" @if($data->type == 1) selected @endif>@lang('app.month')</option>
<option value="2" @if($data->type == 2) selected @endif>@lang('app.week')</option>
<option value="3" @if($data->type == 3) selected @endif>@lang('app.days')</option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.value') &nbsp;<small>@lang('app.pdesc')</small> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="value" required value="{{ $data->value }}">
</div>
</div>

<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.rec')<span class="req">*</span></label>
<select name="rec_payment" class="form-control">
<option value="0" @if($data->rec_payment == 1) selected @endif>@lang('app.yes')</option>
<option value="1" @if($data->rec_payment == 2) selected @endif>@lang('app.no')</option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Sort No')</label>
<input type="number" class="form-control" id="inputNanme4" name="sort_no" required value="{{ $data->sort_no }}">
</div>
</div>
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="@lang('app.Submit')">
</div>
</div>

