@extends('layout.main')

@section('title') {{ __('app.App Pages Content') }} @endsection

@section('content')

<div class="pagetitle"><h1>{{ __('app.App Pages Content') }}</h1></div>

<section class="section">

{!! Form::open(['url' => [Asset('page')],'files' => true]) !!}


<div class="card">
<div class="card-body">
@include('language.header')
<br>
    
    <div class="tab-content pt-2" id="myTabContent">
    @foreach(DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get() as $l)
    <div class="tab-pane fade show" id="l{{ $l->id }}" role="tabpanel" aria-labelledby="home-{{ $l->id }}">
    
    <input type="hidden" name="lid[]" value="{{ $l->id }}">
    <div class="row">
    <div class="col-lg-12">
    <label for="inputNanme4" class="form-label">{{ __('app.About Us') }}</label>
    {!! Form::textarea('l_about_us[]',$data->getSData($data->s_data,$l->id,0),['id' => 'code','class' => 'form-control'])!!}
    </div>
    </div>
    <br>
    <div class="row">
    <div class="col-lg-12">
    <label for="inputNanme4" class="form-label">{{ __("FAQ's") }}</label>
    {!! Form::textarea('l_faq[]',$data->getSData($data->s_data,$l->id,1),['id' => 'code','class' => 'form-control'])!!}
    </div>
    </div>
    </div>
    @endforeach
    
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    
    <div class="row">
    <div class="col-lg-6">
    <label for="inputNanme4" class="form-label">{{ __('app.About Us Image') }}</label>
    <input type="file" class="form-control" name="about_img">

    @if($data->about_img)<br><img src="{{ Asset('upload/page/'.$data->about_img) }}" height="100"> @endif

    </div>

    <div class="col-lg-6">
    <label for="inputNanme4" class="form-label">{{ __("FAQ's Image") }}</label>
    <input type="file" class="form-control" name="faq_img">
    @if($data->faq_img)<br><img src="{{ Asset('upload/page/'.$data->faq_img) }}" height="100"> @endif
    </div>
    </div>
    <br><br>
    <div class="row">
    <div class="col-lg-12">
    <label for="inputNanme4" class="form-label">{{ __('app.About Us Text') }}</label>
    <textarea name="about_us" class="form-control" rows="8">{{ $data->about_us }}</textarea>
    </div>
    </div>

    <br><br>
    <div class="row">
    <div class="col-lg-12">
    <label for="inputNanme4" class="form-label">{{ __("FAQ's Text") }}</label>
    <textarea name="faq" class="form-control" rows="8">{{ $data->faq }}</textarea>
    </div>
    </div>

    </div>
    </div>
    
    <br>
    <input type="submit" class="btn btn-primary" value="{{ __('app.Submit') }}">
    </div>
    </div>    

</form>

</section>
@endsection
