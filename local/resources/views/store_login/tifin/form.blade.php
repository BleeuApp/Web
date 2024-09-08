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
<label for="inputNanme4" class="form-label">@lang('store.iname') <span class="req">*</span></label>
{!! Form::text('l_name[]',$data->getSData($data->s_data,$l->id,0),['id' => 'code','class' => 'form-control'])!!}
</div>
<div class="col-lg-8">
<label for="inputNanme4" class="form-label">@lang('app.desc') <span class="req">*</span></label>
{!! Form::text('l_desc[]',$data->getSData($data->s_data,$l->id,1),['id' => 'code','class' => 'form-control'])!!}
</div>

</div>

</div>
@endforeach

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('store.iname') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="{{ $data->name }}">
</div>

<div class="col-lg-8">
<label for="inputNanme4" class="form-label">@lang('app.desc') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="text" required value="{{ $data->text }}">
</div>
</div>
<br>
<div class="row">

<div class="col-lg-2">
<label for="inputNanme4" class="form-label">@lang('store.iprice')</label>
<input type="text" class="form-control" id="inputNanme4" name="price" required value="{{ $data->price }}">
</div>

<div class="col-lg-2">
<label for="inputNanme4" class="form-label">@lang('app.Sort No')</label>
<input type="number" class="form-control" id="inputNanme4" name="sort_no" required value="{{ $data->sort_no }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.image')</label>
<input type="file" class="form-control" name="img">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Type') <small> @lang('store.tdesc')</small></label>
<select name="type" class="form-control">
<option value="0" @if($data->type == 0) selected @endif>@lang('store.tbox')</option>
<option value="1" @if($data->type == 1) selected @endif>@lang('store.sitem')</option>
</select>
</div>
</div>
<br>
<br><h4>@lang('store.itype')</h4><br>
<div class="row">

@if(Auth::guard('store')->user()->breakfast == 0)
<div class="col-lg-2">
<input type="checkbox" id="inputNanme4" name="breakfast" value="1" @if($data->breakfast == 1) checked @endif> @lang('store.breakfast')
</div>
@endif

@if(Auth::guard('store')->user()->lunch == 0)
<div class="col-lg-2">
<input type="checkbox"  id="inputNanme4" name="lunch" value="1" @if($data->lunch == 1) checked @endif> @lang('store.lunch')
</div>
@endif

@if(Auth::guard('store')->user()->dinner == 0)
<div class="col-lg-2">
<input type="checkbox"  id="inputNanme4" name="dinner" value="1" @if($data->dinner == 1) checked @endif> @lang('store.dinner')
</div>
@endif
</div>

</div>
</div>

<br><br>
<h3>Item Invetory for Chart</h3>

@if(isset($inv))

@foreach($inv as $in)

<div class="row">
<div class="col-lg-3">
<label for="inputNanme4" class="form-label">@lang('store.item_name')</label>
<input type="text" class="form-control" id="inputNanme4" name="item_name[]" placeholder="Item with unit (Dal oz)" value="{{ $in->name }}">
</div>

<div class="col-lg-2">
<label for="inputNanme4" class="form-label">@lang('store.qty')</label>
<input type="number" class="form-control" id="inputNanme4" name="item_qty[]" value="{{ $in->qty }}">
</div>
</div>
<br>

@endforeach

@endif

@for($i = 0;$i<6;$i++)

<div class="row">
<div class="col-lg-3">
<label for="inputNanme4" class="form-label">@lang('store.item_name')</label>
<input type="text" class="form-control" id="inputNanme4" name="item_name[]" placeholder="Item with unit (Dal oz)">
</div>

<div class="col-lg-2">
<label for="inputNanme4" class="form-label">@lang('store.qty')</label>
<input type="number" class="form-control" id="inputNanme4" name="item_qty[]">
</div>
</div>
<br>
@endfor

<br>
<input type="submit" class="btn btn-primary" value="@lang('app.Submit')">
</div>
</div>

