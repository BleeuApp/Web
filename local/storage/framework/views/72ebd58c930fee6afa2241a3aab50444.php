<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.Edit Detail'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.Edit Detail'); ?> </h1></div>

<section class="section">


<?php echo Form::open(['url' => [Asset(env('store').'/userEdit?id='.$data->id)],'files' => true,'method' => 'POST']); ?>


<div class="card">
<div class="card-body">
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Name'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="<?php echo e($data->name); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Phone'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="phone" required value="<?php echo e($data->phone); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Email'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="email" required value="<?php echo e($data->email); ?>">
</div>
</div>
<br>
<b><?php echo e(__('app.Update Wallet')); ?></b><br><br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Type'); ?></label>
<select name="type" class="form-control">
<option value=""><?php echo e(__('app.Select')); ?></option>
<option value="0"><?php echo e(__('app.Add +')); ?></option>
<option value="1"><?php echo e(__('app.Deduct -')); ?></option>
</select>
</div>
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Amount'); ?></label>
<input type="number" class="form-control" id="inputNanme4" name="amount">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Notes'); ?></label>
<input type="text" class="form-control" id="inputNanme4" name="notes">
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('app.Submit'); ?>">
</div>
</div>

</form>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/user/edit.blade.php ENDPATH**/ ?>