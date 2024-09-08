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
<label for="inputNanme4" class="form-label">@lang('app.cate_name') <span class="req">*</span></label>
{!! Form::text('l_name[]',$data->getSData($data->s_data,$l->id,'l_name'),['id' => 'code','class' => 'form-control'])!!}

</div>
</div>

</div>
@endforeach

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.cate_name') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="{{ $data->name }}">
</div>
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.image') @if(!$data->id)<span class="req">*</span>@endif</label>
<input type="file" class="form-control" @if(!$data->id) required @endif name="img">
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

