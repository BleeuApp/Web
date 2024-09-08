<?php $__env->startSection('title'); ?> <?php echo e(__('app.Account Setting')); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo e(__('app.Account Setting')); ?></h1></div>

<form action="<?php echo e(Asset('setting')); ?>" method="POST">
<?php echo csrf_field(); ?>


<section class="section">
<div class="card">
<div class="card-body">

<h5 class="card-title"><?php echo e(__('app.General Settings')); ?></h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Your Name')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="<?php echo e(Auth::user()->name); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Email')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="email" required value="<?php echo e(Auth::user()->email); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Currency Sign')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="currency" required value="<?php echo e(Auth::user()->currency); ?>">
</div>
</div>

<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Currency Code (INR,USD)')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="currency_code" required value="<?php echo e(Auth::user()->currency_code); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Welcome Page Title')); ?></label>
<input type="text" class="form-control" id="inputNanme4" name="welcome_title" value="<?php echo e(Auth::user()->welcome_title); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Terms & Condition Link')); ?></label>
<input type="text" class="form-control" id="inputNanme4" name="term_link" value="<?php echo e(Auth::user()->term_link); ?>">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-12">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Welcome Page Text')); ?></label>
<textarea type="text" class="form-control" id="inputNanme4" name="welcome_text"><?php echo e(Auth::user()->welcome_text); ?></textarea>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Signup Verify Type')); ?></label>
<select name="verify_type" class="form-control">
    <option value="0" <?php if(Auth::user()->verify_type == 0): ?> selected <?php endif; ?>><?php echo e(__('app.None')); ?></option>
    <option value="1" <?php if(Auth::user()->verify_type == 1): ?> selected <?php endif; ?>><?php echo e(__('app.With Twilio SMS')); ?></option>
    <option value="2" <?php if(Auth::user()->verify_type == 2): ?> selected <?php endif; ?>><?php echo e(__('app.Other SMS API')); ?></option>
    <option value="3" <?php if(Auth::user()->verify_type == 3): ?> selected <?php endif; ?>><?php echo e(__('app.With Email')); ?></option>

</select>
</div>

<div class="col-lg-8">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Other SMS API')); ?> <small style="color:red"><?php echo e(__('app.replace')); ?></small></label>
<input type="text" class="form-control" id="inputNanme4" name="sms_api"  value="<?php echo e(Auth::user()->sms_api); ?>">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.App Name')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="app_name" required value="<?php echo e(Auth::user()->app_name); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Country Code')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="country_code" required value="<?php echo e(Auth::user()->country_code); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Web App URL')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="web_url" required value="<?php echo e(Auth::user()->web_url); ?>">
</div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">

<h5 class="card-title"><?php echo e(__('app.OneSignal API Keys')); ?> <a href="https://dashboard.onesignal.com/" target="_blank" style="float: right;"><?php echo e(__('app.getKey')); ?></a></h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.User APP ID')); ?></label>
<input type="text" name="push_user_app_id" class="form-control" value="<?php echo e(Auth::user()->push_user_app_id); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.User App Rest API Key')); ?></label>
<input type="text" name="push_user_rest_id" class="form-control" value="<?php echo e(Auth::user()->push_user_rest_id); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.User Google Project Number')); ?></label>
<input type="text" name="push_user_google_id" class="form-control" value="<?php echo e(Auth::user()->push_user_google_id); ?>">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Store APP ID')); ?></label>
<input type="text" name="push_store_app_id" class="form-control" value="<?php echo e(Auth::user()->push_store_app_id); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Store App Rest API Key')); ?></label>
<input type="text" name="push_store_rest_id" class="form-control" value="<?php echo e(Auth::user()->push_store_rest_id); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Store Google Project Number')); ?></label>
<input type="text" name="push_store_google_id" class="form-control" value="<?php echo e(Auth::user()->push_store_google_id); ?>">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Delivery APP ID')); ?></label>
<input type="text" name="push_delivery_app_id" class="form-control" value="<?php echo e(Auth::user()->push_delivery_app_id); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Delivery App Rest API Key')); ?></label>
<input type="text" name="push_delivery_rest_id" class="form-control" value="<?php echo e(Auth::user()->push_delivery_rest_id); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Delivery Google Project Number')); ?></label>
<input type="text" name="push_delivery_google_id" class="form-control" value="<?php echo e(Auth::user()->push_delivery_google_id); ?>">
</div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">

<h5 class="card-title"><?php echo e(__('app.Payment Gateway')); ?> <small style="color:gray;float:right"><?php echo e(__('app.leave')); ?></small></h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Flutterwave Key')); ?></label>
<input type="text" name="flutter_key" class="form-control" value="<?php echo e(Auth::user()->flutter_key); ?>">
</div>
</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Razorpay Key')); ?></label>
<input type="text" name="razor_key" class="form-control" value="<?php echo e(Auth::user()->razor_key); ?>">
</div>
</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Stripe Key')); ?></label>
<input type="text" name="stripe_key" class="form-control" value="<?php echo e(Auth::user()->stripe_key); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Stripe Sec Key')); ?></label>
<input type="text" name="stripe_sec_key" class="form-control" value="<?php echo e(Auth::user()->stripe_sec_key); ?>">
</div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">

<h5 class="card-title"><?php echo e(__('app.Referral System')); ?> <small><?php echo e(__('app.1point')); ?></small></h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Referral Point for Who Referr')); ?></label>
<input type="text" name="point_who" class="form-control" value="<?php echo e(Auth::user()->point_who); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Referral Point for Who Use')); ?></label>
<input type="text" name="point_use" class="form-control" value="<?php echo e(Auth::user()->point_use); ?>">
</div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">

<h5 class="card-title"><?php echo e(__('app.Username & Password')); ?></h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Username')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="username" required value="<?php echo e(Auth::user()->username); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Your Current Password')); ?> <span class="req">*</span></label>
<input type="password" class="form-control" id="inputNanme4" name="current_password" required>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Change Password')); ?></label>
<input type="password" class="form-control" id="inputNanme4" name="new_password">
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="<?php echo e(__('app.Submit')); ?>">

</div>
</div>
</section>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/home/setting.blade.php ENDPATH**/ ?>