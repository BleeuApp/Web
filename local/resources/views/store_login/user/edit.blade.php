@extends('store_login.layout.main')

@section('title') @lang('app.Edit Detail') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.Edit Detail') </h1></div>

<section class="section">


{!! Form::open(['url' => [Asset(env('store').'/userEdit?id='.$data->id)],'files' => true,'method' => 'POST']) !!}

<div class="card">
<div class="card-body">
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Name') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="{{ $data->name }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Phone') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="phone" required value="{{ $data->phone }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Email') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="email" required value="{{ $data->email }}">
</div>
</div>
<br>
<b>{{ __('app.Update Wallet') }}</b><br><br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Type')</label>
<select name="type" class="form-control">
<option value="">{{ __('app.Select') }}</option>
<option value="0">{{ __('app.Add +') }}</option>
<option value="1">{{ __('app.Deduct -') }}</option>
</select>
</div>
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Amount')</label>
<input type="number" class="form-control" id="inputNanme4" name="amount">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Notes')</label>
<input type="text" class="form-control" id="inputNanme4" name="notes">
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="@lang('app.Submit')">
</div>
</div>

</form>

</section>
@endsection