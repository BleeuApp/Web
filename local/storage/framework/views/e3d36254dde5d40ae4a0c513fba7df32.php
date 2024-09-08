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
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.iname'); ?> <span class="req">*</span></label>
<?php echo Form::text('l_name[]',$data->getSData($data->s_data,$l->id,0),['id' => 'code','class' => 'form-control']); ?>

</div>
<div class="col-lg-8">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.desc'); ?> <span class="req">*</span></label>
<?php echo Form::text('l_desc[]',$data->getSData($data->s_data,$l->id,1),['id' => 'code','class' => 'form-control']); ?>

</div>

</div>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.iname'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="<?php echo e($data->name); ?>">
</div>

<div class="col-lg-8">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.desc'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="text" required value="<?php echo e($data->text); ?>">
</div>
</div>
<br>
<div class="row">

<div class="col-lg-2">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.iprice'); ?></label>
<input type="text" class="form-control" id="inputNanme4" name="price" required value="<?php echo e($data->price); ?>">
</div>

<div class="col-lg-2">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Sort No'); ?></label>
<input type="number" class="form-control" id="inputNanme4" name="sort_no" required value="<?php echo e($data->sort_no); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.image'); ?></label>
<input type="file" class="form-control" name="img">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Type'); ?> <small> <?php echo app('translator')->get('store.tdesc'); ?></small></label>
<select name="type" class="form-control">
<option value="0" <?php if($data->type == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('store.tbox'); ?></option>
<option value="1" <?php if($data->type == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('store.sitem'); ?></option>
</select>
</div>
</div>
<br>
<br><h4><?php echo app('translator')->get('store.itype'); ?></h4><br>
<div class="row">

<?php if(Auth::guard('store')->user()->breakfast == 0): ?>
<div class="col-lg-2">
<input type="checkbox" id="inputNanme4" name="breakfast" value="1" <?php if($data->breakfast == 1): ?> checked <?php endif; ?>> <?php echo app('translator')->get('store.breakfast'); ?>
</div>
<?php endif; ?>

<?php if(Auth::guard('store')->user()->lunch == 0): ?>
<div class="col-lg-2">
<input type="checkbox"  id="inputNanme4" name="lunch" value="1" <?php if($data->lunch == 1): ?> checked <?php endif; ?>> <?php echo app('translator')->get('store.lunch'); ?>
</div>
<?php endif; ?>

<?php if(Auth::guard('store')->user()->dinner == 0): ?>
<div class="col-lg-2">
<input type="checkbox"  id="inputNanme4" name="dinner" value="1" <?php if($data->dinner == 1): ?> checked <?php endif; ?>> <?php echo app('translator')->get('store.dinner'); ?>
</div>
<?php endif; ?>
</div>

</div>
</div>

<br><br>
<h3>Item Invetory for Chart</h3>

<?php if(isset($inv)): ?>

<?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row">
<div class="col-lg-3">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.item_name'); ?></label>
<input type="text" class="form-control" id="inputNanme4" name="item_name[]" placeholder="Item with unit (Dal oz)" value="<?php echo e($in->name); ?>">
</div>

<div class="col-lg-2">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.qty'); ?></label>
<input type="number" class="form-control" id="inputNanme4" name="item_qty[]" value="<?php echo e($in->qty); ?>">
</div>
</div>
<br>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

<?php for($i = 0;$i<6;$i++): ?>

<div class="row">
<div class="col-lg-3">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.item_name'); ?></label>
<input type="text" class="form-control" id="inputNanme4" name="item_name[]" placeholder="Item with unit (Dal oz)">
</div>

<div class="col-lg-2">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.qty'); ?></label>
<input type="number" class="form-control" id="inputNanme4" name="item_qty[]">
</div>
</div>
<br>
<?php endfor; ?>

<br>
<input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('app.Submit'); ?>">
</div>
</div>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/tifin/form.blade.php ENDPATH**/ ?>