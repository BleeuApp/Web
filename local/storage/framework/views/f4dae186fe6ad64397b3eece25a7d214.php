<?php $__env->startSection('title'); ?> <?php echo e(__('app.app')); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo e(__('app.app')); ?></h1></div>

<section class="section">

<?php echo Form::open(['url' => [Asset('push')],'files' => true]); ?>

<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.app')); ?> <span class="req">*</span></label>
<select name="app" class="form-control">
<option value="1"><?php echo e(__('app.user_app')); ?></option>
<option value="2"><?php echo e(__('app.store_app')); ?></option>
<option value="3"><?php echo e(__('app.delivery_app')); ?></option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.title')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="title" required>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.any_image')); ?></label>
<input type="file" class="form-control" id="inputNanme4" name="file">
</div>

</div>
<br>
<div class="row">
<div class="col-lg-12">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.description')); ?> <span class="req">*</span></label>
<textarea name="desc" class="form-control" required></textarea>
</div>
</div>
<br>
<input type="submit" class="btn btn-primary" value="<?php echo e(__('app.Submit')); ?>">

</div>
</div>
</form>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/push/index.blade.php ENDPATH**/ ?>