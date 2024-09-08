<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-6">
<label for="inputNanme4" class="form-label">@lang('app.image') @if(!$data->id)<span class="req">*</span>@endif</label>
<input type="file" class="form-control" @if(!$data->id) required @endif name="img">
</div>

<div class="col-lg-6">
<label for="inputNanme4" class="form-label">@lang('app.Sort No')</label>
<input type="number" class="form-control" id="inputNanme4" name="sort_no" required value="{{ $data->sort_no }}">
</div>
</div>


<br>
<input type="submit" class="btn btn-primary" value="@lang('app.Submit')">
</div>
</div>

