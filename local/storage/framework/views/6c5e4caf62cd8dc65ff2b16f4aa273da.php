<div class="card">
<div class="card-body">
<?php echo $__env->make('language.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>

<div class="tab-content pt-2" id="myTabContent">
<?php $__currentLoopData = DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="tab-pane fade show" id="l<?php echo e($l->id); ?>" role="tabpanel" aria-labelledby="home-<?php echo e($l->id); ?>">

<input type="hidden" name="lid[]" value="<?php echo e($l->id); ?>">
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.title'); ?> <span class="req">*</span></label>
<?php echo Form::text('l_name[]',$data->getSData($data->s_data,$l->id,'l_name'),['id' => 'code','class' => 'form-control']); ?>


</div>
</div>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.title'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="title" required value="<?php echo e($data->title); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.time_type'); ?> <span class="req">*</span></label>
<select name="type" class="form-control">
<option value="1" <?php if($data->type == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.month'); ?></option>
<option value="2" <?php if($data->type == 2): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.week'); ?></option>
<option value="3" <?php if($data->type == 3): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.days'); ?></option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.value'); ?> &nbsp;<small><?php echo app('translator')->get('app.pdesc'); ?></small> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="value" required value="<?php echo e($data->value); ?>">
</div>
</div>

<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.rec'); ?><span class="req">*</span></label>
<select name="rec_payment" class="form-control">
<option value="0" <?php if($data->rec_payment == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.yes'); ?></option>
<option value="1" <?php if($data->rec_payment == 2): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.no'); ?></option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Sort No'); ?></label>
<input type="number" class="form-control" id="inputNanme4" name="sort_no" required value="<?php echo e($data->sort_no); ?>">
</div>
</div>
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('app.Submit'); ?>">
</div>
</div>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/plan/form.blade.php ENDPATH**/ ?>