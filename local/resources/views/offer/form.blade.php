<div class="card">
<div class="card-body">
@include('language.header')
<br>

<div class="tab-content pt-2" id="myTabContent">
@foreach(DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get() as $l)
<div class="tab-pane fade show" id="l{{ $l->id }}" role="tabpanel" aria-labelledby="home-{{ $l->id }}">

<input type="hidden" name="lid[]" value="{{ $l->id }}">
<div class="row">
<div class="col-lg-8">
<label for="inputNanme4" class="form-label">@lang('app.desc') <span class="req">*</span></label>
{!! Form::text('l_desc[]',$data->getSData($data->s_data,$l->id,'l_desc'),['id' => 'code','class' => 'form-control'])!!}
</div>
</div>

</div>
@endforeach

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Discount Code') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="code" required value="{{ $data->code }}">
</div>

<div class="col-lg-8">
<label for="inputNanme4" class="form-label">@lang('app.desc') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="text" required value="{{ $data->text }}">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Discount Type')<span class="req">*</span></label>
<select name="type" class="form-control" required>
<option value="0" @if($data->type == 0) selected @endif>@lang('app.Fixed Amount')</option>
<option value="1" @if($data->type == 1) selected @endif>@lang('app.in %')</option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"> @lang('app.Discount Value')<span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="value" required value="{{ $data->value }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"> @lang('app.Select Store')</label>
<select name="store_id[]" class="form-control select2" multiple style="width:100%">
@foreach($store as $s)
<option value="{{ $s->id }}" @if(in_array($s->id,$array)) selected @endif>{{ $s->name }} </option>
@endforeach
</select>
</div>
</div>

</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="@lang('app.Submit')">
</div>
</div>


