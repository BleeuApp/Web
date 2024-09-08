<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('store.create_order'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('store.create_order'); ?> </h1></div>

<section class="section">


<?php echo Form::open(['url' => [Asset(env('store').'/createOrder')],'files' => true]); ?>



<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.cust_name'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.cust_phone'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="phone" required>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.cust_email'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="email" required>
</div>
</div>

<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.select_item'); ?> <span class="req">*</span></label>
<select name="item_id" class="form-control" required>
<option value=""><?php echo app('translator')->get('store.select'); ?></option>
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.sdate'); ?><span class="req">*</span></label>
<input type="text" class="form-control" name="start_date" required id="datepicker" autocomplete="off">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.valid'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" name="valid_till" required id="datepicker2" autocomplete="off">
</div>
</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.stime'); ?> <span class="req">*</span></label>
<select name="type" class="form-control" required>
<option value="Breakfast"><?php echo app('translator')->get('store.breakfast'); ?></option>
<option value="Lunch"><?php echo app('translator')->get('store.lunch'); ?></option>
<option value="Dinner"><?php echo app('translator')->get('store.dinner'); ?></option>
</select>
</div>
</div>

<br>

<?php echo $__env->make('store.google',['data' => $data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<br>
<div class="row">
<div class="col-lg-8">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.notes'); ?></label>
<input type="text" class="form-control" id="inputNanme4" name="notes">
</div>


<div class="col-lg-4" style="margin-top: 30px;"><button type="submit" class="btn btn-primary"><?php echo app('translator')->get('store.cbtn'); ?></button></div>
</div>

</div>
</div>

</form>

</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
    $( "#datepicker2" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
});

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/order/create.blade.php ENDPATH**/ ?>