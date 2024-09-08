<?php $__env->startSection('title'); ?> <?php echo e(__('app.Edit Details')); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo e(__('app.Edit Details')); ?></h1></div>

<section class="section">

<?php echo Form::open(['url' => [Asset('userEdit?id='.$data->id)],'files' => true,'method' => 'POST']); ?>


<div class="card">
<div class="card-body">
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Name')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="<?php echo e($data->name); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Phone')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="phone" required value="<?php echo e($data->phone); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Email')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="email" required value="<?php echo e($data->email); ?>">
</div>
</div>
<br>
<b><?php echo e(__('app.Update Wallet')); ?></b><br><br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Type')); ?></label>
<select name="type" class="form-control">
<option value=""><?php echo e(__('app.Select')); ?></option>
<option value="0"><?php echo e(__('app.Add +')); ?></option>
<option value="1"><?php echo e(__('app.Deduct -')); ?></option>
</select>
</div>
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Amount')); ?></label>
<input type="number" class="form-control" id="inputNanme4" name="amount">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Notes')); ?></label>
<input type="text" class="form-control" id="inputNanme4" name="notes">
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="<?php echo e(__('app.Submit')); ?>">
</div>
</div>

</form>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/home/edit.blade.php ENDPATH**/ ?>