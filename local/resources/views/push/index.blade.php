@extends('layout.main')

@section('title') {{ __('app.app') }} @endsection

@section('content')

<div class="pagetitle"><h1>{{ __('app.app') }}</h1></div>

<section class="section">

{!! Form::open(['url' => [Asset('push')],'files' => true]) !!}
<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.app') }} <span class="req">*</span></label>
<select name="app" class="form-control">
<option value="1">{{ __('app.user_app') }}</option>
<option value="2">{{ __('app.store_app') }}</option>
<option value="3">{{ __('app.delivery_app') }}</option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.title') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="title" required>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.any_image') }}</label>
<input type="file" class="form-control" id="inputNanme4" name="file">
</div>

</div>
<br>
<div class="row">
<div class="col-lg-12">
<label for="inputNanme4" class="form-label">{{ __('app.description') }} <span class="req">*</span></label>
<textarea name="desc" class="form-control" required></textarea>
</div>
</div>
<br>
<input type="submit" class="btn btn-primary" value="{{ __('app.Submit') }}">

</div>
</div>
</form>

</section>
@endsection
