@extends('layout.main')

@section('title') {{ __('app.getreporting') }} @endsection

@section('content')

<div class="pagetitle"><h1>{{ __('app.getreporting') }}</h1></div>

<section class="section">

{!! Form::open(['url' => [Asset('report')],'files' => true]) !!}
<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-12">
<label for="inputNanme4" class="form-label">{{ __('app.title') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="title" required>
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
