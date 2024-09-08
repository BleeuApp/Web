<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-6">
<label for="inputNanme4" class="form-label">@lang('app.image') @if(!$data->id)<span class="req">*</span>@endif</label>
<input type="file" class="form-control" @if(!$data->id) required @endif name="img">
</div>

<div class="col-lg-3">
<label for="inputNanme4" class="form-label">@lang('app.link_to')</label>
<select name="link_to" class="form-control">
<option value="0" @if($data->link_to == 0) selected @endif>@lang('app.none')</option>
<option value="1" @if($data->link_to == 1) selected @endif>@lang('app.store')</option>
<option value="2" @if($data->link_to == 2) selected @endif>@lang('app.custom_link')</option>
</select>
</div>

<div class="col-lg-3">
<label for="inputNanme4" class="form-label">@lang('app.link')</label>
<input type="text" class="form-control" id="inputNanme4" name="link" value="{{ $data->link }}" placeholder="@lang('app.store_link')">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-6">
<label for="inputNanme4" class="form-label">@lang('app.Sort No')</label>
<input type="number" class="form-control" id="inputNanme4" name="sort_no" required value="{{ $data->sort_no }}">
</div>
</div>


<br>
<input type="submit" class="btn btn-primary" value="@lang('app.Submit')">
</div>
</div>

