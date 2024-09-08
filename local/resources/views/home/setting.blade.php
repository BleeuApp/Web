@extends('layout.main')

@section('title') {{ __('app.Account Setting') }} @endsection

@section('content')

<div class="pagetitle"><h1>{{ __('app.Account Setting') }}</h1></div>

<form action="{{ Asset('setting') }}" method="POST">
{!! csrf_field() !!}

<section class="section">
<div class="card">
<div class="card-body">

<h5 class="card-title">{{ __('app.General Settings') }}</h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Your Name') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="{{ Auth::user()->name }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Email') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="email" required value="{{ Auth::user()->email }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Currency Sign') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="currency" required value="{{ Auth::user()->currency }}">
</div>
</div>

<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Currency Code (INR,USD)') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="currency_code" required value="{{ Auth::user()->currency_code }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Welcome Page Title') }}</label>
<input type="text" class="form-control" id="inputNanme4" name="welcome_title" value="{{ Auth::user()->welcome_title }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Terms & Condition Link') }}</label>
<input type="text" class="form-control" id="inputNanme4" name="term_link" value="{{ Auth::user()->term_link }}">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-12">
<label for="inputNanme4" class="form-label">{{ __('app.Welcome Page Text') }}</label>
<textarea type="text" class="form-control" id="inputNanme4" name="welcome_text">{{ Auth::user()->welcome_text }}</textarea>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Signup Verify Type') }}</label>
<select name="verify_type" class="form-control">
    <option value="0" @if(Auth::user()->verify_type == 0) selected @endif>{{ __('app.None') }}</option>
    <option value="1" @if(Auth::user()->verify_type == 1) selected @endif>{{ __('app.With Twilio SMS') }}</option>
    <option value="2" @if(Auth::user()->verify_type == 2) selected @endif>{{ __('app.Other SMS API') }}</option>
    <option value="3" @if(Auth::user()->verify_type == 3) selected @endif>{{ __('app.With Email') }}</option>

</select>
</div>

<div class="col-lg-8">
<label for="inputNanme4" class="form-label">{{ __('app.Other SMS API') }} <small style="color:red">{{ __('app.replace') }}</small></label>
<input type="text" class="form-control" id="inputNanme4" name="sms_api"  value="{{ Auth::user()->sms_api }}">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.App Name') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="app_name" required value="{{ Auth::user()->app_name }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Country Code') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="country_code" required value="{{ Auth::user()->country_code }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Web App URL') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="web_url" required value="{{ Auth::user()->web_url }}">
</div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">

<h5 class="card-title">{{ __('app.OneSignal API Keys') }} <a href="https://dashboard.onesignal.com/" target="_blank" style="float: right;">{{ __('app.getKey') }}</a></h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.User APP ID') }}</label>
<input type="text" name="push_user_app_id" class="form-control" value="{{ Auth::user()->push_user_app_id }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.User App Rest API Key') }}</label>
<input type="text" name="push_user_rest_id" class="form-control" value="{{ Auth::user()->push_user_rest_id }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.User Google Project Number') }}</label>
<input type="text" name="push_user_google_id" class="form-control" value="{{ Auth::user()->push_user_google_id }}">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Store APP ID') }}</label>
<input type="text" name="push_store_app_id" class="form-control" value="{{ Auth::user()->push_store_app_id }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Store App Rest API Key') }}</label>
<input type="text" name="push_store_rest_id" class="form-control" value="{{ Auth::user()->push_store_rest_id }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Store Google Project Number') }}</label>
<input type="text" name="push_store_google_id" class="form-control" value="{{ Auth::user()->push_store_google_id }}">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Delivery APP ID') }}</label>
<input type="text" name="push_delivery_app_id" class="form-control" value="{{ Auth::user()->push_delivery_app_id }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Delivery App Rest API Key') }}</label>
<input type="text" name="push_delivery_rest_id" class="form-control" value="{{ Auth::user()->push_delivery_rest_id }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Delivery Google Project Number') }}</label>
<input type="text" name="push_delivery_google_id" class="form-control" value="{{ Auth::user()->push_delivery_google_id }}">
</div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">

<h5 class="card-title">{{ __('app.Payment Gateway') }} <small style="color:gray;float:right">{{ __('app.leave') }}</small></h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Flutterwave Key') }}</label>
<input type="text" name="flutter_key" class="form-control" value="{{ Auth::user()->flutter_key }}">
</div>
</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Razorpay Key') }}</label>
<input type="text" name="razor_key" class="form-control" value="{{ Auth::user()->razor_key }}">
</div>
</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Stripe Key') }}</label>
<input type="text" name="stripe_key" class="form-control" value="{{ Auth::user()->stripe_key }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Stripe Sec Key') }}</label>
<input type="text" name="stripe_sec_key" class="form-control" value="{{ Auth::user()->stripe_sec_key }}">
</div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">

<h5 class="card-title">{{ __('app.Referral System') }} <small>{{ __('app.1point') }}</small></h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Referral Point for Who Referr') }}</label>
<input type="text" name="point_who" class="form-control" value="{{ Auth::user()->point_who }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Referral Point for Who Use') }}</label>
<input type="text" name="point_use" class="form-control" value="{{ Auth::user()->point_use }}">
</div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">

<h5 class="card-title">{{ __('app.Username & Password') }}</h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Username') }} <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="username" required value="{{ Auth::user()->username }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Your Current Password') }} <span class="req">*</span></label>
<input type="password" class="form-control" id="inputNanme4" name="current_password" required>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">{{ __('app.Change Password') }}</label>
<input type="password" class="form-control" id="inputNanme4" name="new_password">
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="{{ __('app.Submit') }}">

</div>
</div>
</section>
</form>
@endsection
