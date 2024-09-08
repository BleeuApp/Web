<div class="card">
<div class="card-body">
<?php echo $__env->make('language.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>

<div class="tab-content pt-2" id="myTabContent">
<?php $__currentLoopData = DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="tab-pane fade show" id="l<?php echo e($l->id); ?>" role="tabpanel" aria-labelledby="home-<?php echo e($l->id); ?>">

<input type="hidden" name="lid[]" value="<?php echo e($l->id); ?>">
<div class="row">
<div class="col-lg-8">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.desc'); ?> <span class="req">*</span></label>
<?php echo Form::text('l_desc[]',$data->getSData($data->s_data,$l->id,'l_desc'),['id' => 'code','class' => 'form-control']); ?>

</div>
</div>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Discount Code'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="code" required value="<?php echo e($data->code); ?>">
</div>

<div class="col-lg-8">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.desc'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="text" required value="<?php echo e($data->text); ?>">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Discount Type'); ?><span class="req">*</span></label>
<select name="type" class="form-control" required>
<option value="0" <?php if($data->type == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.Fixed Amount'); ?></option>
<option value="1" <?php if($data->type == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.in %'); ?></option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"> <?php echo app('translator')->get('app.Discount Value'); ?><span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="value" required value="<?php echo e($data->value); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"> <?php echo app('translator')->get('app.Select Store'); ?></label>
<select name="store_id[]" class="form-control select2" multiple style="width:100%">
<?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($s->id); ?>" <?php if(in_array($s->id,$array)): ?> selected <?php endif; ?>><?php echo e($s->name); ?> </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div>

</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('app.Submit'); ?>">
</div>
</div>


<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/offer/form.blade.php ENDPATH**/ ?>