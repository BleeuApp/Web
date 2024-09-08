@extends('layout.main')

@section('title') {{ __('app.Edit Details') }} @endsection

@section('content')

<div class="pagetitle"><h1>{{ __('app.Edit Details') }}</h1></div>

<section class="section">

{!! Form::open(['url' => [Asset('userEdit?id='.$data->id)],'files' => true,'method' => 'POST']) !!}

<div class="card">
<div class="card-body">
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Name') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="{{ $data->name }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Phone') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="phone" required value="{{ $data->phone }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Email') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="email" required value="{{ $data->email }}">
</div>
</div>
<br>
<b>{{ __('app.Update Wallet') }}</b><br><br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Type') }}</label>
<select name="type" class="form-control">
<option value="">{{ __('app.Select') }}</option>
<option value="0">{{ __('app.Add +') }}</option>
<option value="1">{{ __('app.Deduct -') }}</option>
</select>
</div>
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Amount') }}</label>
<input type="number" class="form-control" id="inputNanme4" name="amount">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Notes') }}</label>
<input type="text" class="form-control" id="inputNanme4" name="notes">
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="{{ __('app.Submit') }}">
</div>
</div>

</form>

</section>
@endsection
