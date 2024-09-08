<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Language Name') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="{{ $data->name }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.image') @if(!$data->id)<span class="req">*</span>@endif</label>
<input type="file" class="form-control" @if(!$data->id) required @endif name="img">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Type') <span class="req">*</span></label>
<select name="type" class="form-control">
<option value="0" @if($data->type == 0) selected @endif>@lang('app.LTR')</option>
<option value="1" @if($data->type == 1) selected @endif>@lang('app.RTL')</option>
</select>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-2">
<label for="inputNanme4" class="form-label">@lang('app.Sort No') <span class="req">*</span></label>
<input type="number" class="form-control" id="inputNanme4" name="sort_no" required value="{{ $data->sort_no }}">
</div>

<div class="col-lg-10">
<label for="inputNanme4" class="form-label">@lang('app.Translation File Name') <small style="margin-left: 30px;">@lang('app.file_desc')</small></label>
<input type="text" class="form-control" id="inputNanme4" name="file_name" required value="{{ $data->file_name }}">
</div>
</div>


<br>
<input type="submit" class="btn btn-primary" value="@lang('app.Submit')">
</div>
</div>

